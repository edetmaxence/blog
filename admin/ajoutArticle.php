<?php

session_start();

if(isset($_SESSION["admin"])):
require_once '../connection.php';
require_once '../vendor/autoload.php';
require_once 'functionAdmin.php';



$title=  htmlspecialchars(strip_tags($_POST["title"]));
$content=  htmlspecialchars(strip_tags($_POST["content"]));

$idcat = $_POST["category"][0];

if(!empty($_FILES["cover"])):




$imgName = new SplFileInfo($_FILES["cover"]["name"]);
//var_dump($info->getExtension());
$extension = strtolower($imgName->getExtension());
// verifier la casse

$taille = $_FILES["cover"]["size"];
$type = $_FILES["cover"]["type"];
//autre methode pour recuperer l'extension du cover

//$extension = pathinfo($_FILES['cover']['name'],PATHINFO_EXTENSION);
$poidsMax = 1* 1048576;
$erreur=null;



        if (verifExtension($extension,$type)){

          
                if($taille <= $poidsMax){
                         //ajout des images dans le dossier adequat
                       
                        move_uploaded_file($_FILES["cover"]["tmp_name"],
                        "../images/upload/$imgName");
                        $cat= $db ->prepare("INSERT INTO  posts (title,content,cover,created_at,idcat,iduser) VALUES (:title,:content,:cover,now(),:idcat,:iduser)");
                        $cat -> bindValue(':title',$title);
                        $cat -> bindValue(':content',$content);
                        $cat -> bindValue(':cover',$imgName);
                        $cat -> bindValue(':iduser',1 , PDO::PARAM_INT);
                        $cat -> bindValue(':idcat',$idcat, PDO::PARAM_INT);
                        $cat-> execute();
                        header("Location: ../index.php");
            
                 }
               
                
                
                else{
                    echo "le poids est trop gros";
                } 
                
                
            
        }   
            
        else{
                $erreur= "veuillez selectionner une image avec la bonne extension";
            }






endif;
else:
        header('Location: index.php');
endif;
?>