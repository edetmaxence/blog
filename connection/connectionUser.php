<?php
session_start();
require_once '../connection.php';
require_once '../vendor/autoload.php';

$firstname= htmlspecialchars(strip_tags($_POST["firstname"]));
$lastname= htmlspecialchars(strip_tags($_POST["lastname"]));
$email= htmlspecialchars(strip_tags($_POST["email"]));
$password= htmlspecialchars(strip_tags($_POST["password"]));

if(!empty($firstname) && !empty($lastname) &&!empty($email) && !empty($password) ){

    $cnn= $db-> prepare("SELECT * from users  where firstname=:firstname && lastname=:lastname && email=:email");

    $cnn-> bindValue(":lastname", $lastname);
    $cnn-> bindValue(":firstname", $firstname);
    $cnn-> bindValue(":email", $email);

    $cnn->execute();
    $user = $cnn->fetch();
    //dump($user);

    if($user ){
        
        $pass = password_verify($password,$user["password"]);

        if($pass){

           
            echo "bienvenu ".$user["lastname"];
            
            if($user["role"]==="ROLE_ADMIN"){
                
                $_SESSION["admin"]=$user["firstname"];
                header("Location: ../index.php");
            }
            $_SESSION["user"]=$user["firstname"];
            header("Location: ../index.php");
        }
        else{
             echo"mauvais mdp";
        }
    }
    else{
         echo "l'utilisateur n'existe pas";
    }
   
}
else{
    echo"remplissez les champs";
}




