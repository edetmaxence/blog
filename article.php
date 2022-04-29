<?php
require_once 'connection.php';
require_once 'vendor/autoload.php';
require_once 'function.php';

$idpost =htmlspecialchars(strip_tags( $_GET["idpost"]));





$requette= $db ->prepare("SELECT distinct posts.*,users.*,category.* FROM posts INNER JOIN category ON category.idcat=posts.idcat INNER JOIN users on users.iduser=posts.iduser  where idpost = :idpost " );
$requette -> bindValue(':idpost', $idpost);
$requette -> execute();

$article = $requette ->fetch();

//dump($article);




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Article -  <?php echo $article["title"] ?></title>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <!-- Placer sa feuille de style CSS en dernière position ;) -->
    <link rel="stylesheet" href="css/style.css">
    




</head>

<?php if($article): ?>
<body>
    <header class="bg-dark py-4 py-lg-5" >
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-12 text-lg-center text-start">
                    <h1 class="mb-4 mb-lg-0">
                        <a href="#" title="Philosophy." class="logo text-white text-decoration-none">
                           <?php echo $article["title"] ?>
                        </a>
                    </h1>
                </div>
                <div class="col-6 d-flex d-lg-none justify-content-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list text-white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </div>
                <div class="col-12 d-none d-lg-block">
                    <nav>
                        <ul class="d-lg-flex align-items-center justify-content-center py-3 gap-5">
                            <li><a href="#" title="Home" class="text-secondary text-decoration-none">Home</a></li>
                            <li><a href="#" title="Categories" class="text-secondary text-decoration-none">Categories</a></li>
                            <li><a href="#" title="Styles" class="text-secondary text-decoration-none">Styles</a></li>
                            <li><a href="#" title="About" class="text-secondary text-decoration-none">About</a></li>
                            <li><a href="#" title="Contact" class="text-secondary text-decoration-none">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div> 
        
    </header>
    <div class="gradient"></div>


    <main  class="py-5 justify">


        <div class="container">
         
            <div class="row align-items-center">
                <div class="col-6 col-lg-12 text-lg-center">
                    <h1></h1>
                    <div class="row">
                        <div class="col col-lg-6 text-start text-lg-end">
                            <p class="text-secondary text-sm"><?php echo formatDate($article["created_at"]) ;?></p>
                        </div>
                        <div class="col-lg-6">

                            <div class="d-flex  list-unstyled gap-2">
                                <a href="categorie.php?idcat=<?php echo "{$article['idcat']}";?>" title="Design" class="badge rounded-pill bg-primary text-decoration-none"><?php echo $article["name"];?></a>
                                <span> Auteur :<?php echo $article["lastname"];?> </span>
                                
                            </div>
                        </div>
                    </div>
                
                    <img class="article-img rounded" src="images/upload/<?php echo $article['cover'];?>" alt="img">
                
                </div>
            </div>
        </div>

            <div class="container">
                <div class="row">
                     <!--paragraphe gras-->

                     <div class="col col-lg-6 offset-lg-3">
                        <p class="py-2 fw-bold text-justify text-start">
                        <?php echo $article["content"];?>
                        </p>
                   
                    </div>
                        
                   
                </div>
            </div>
                   
                
                


            
                <div class=" container bg-light">
                    <div class="row  offset-2">
                        <!--titre-->
                        <div class="col-12">
                            <h1>Comments</h1>
                        </div>
                        <div class="col-8 col-lg-10"> 
                            <div class="row">
                                <div class="col-lg-6 text-lg-start">
                                    <p class=" ">John Doe</p>
                                </div>
                                <div class="col-lg-6 text-lg-end">
                                    <p class="text-secondary text-sm ">December 12, 2021</p>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                                </p>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6 text-lg-start">
                                    <p class=" ">John Doe</p>
                                </div>
                                <div class="col-lg-6 text-lg-end">
                                    <p class="text-secondary text-sm ">December 12, 2021</p>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 text-lg-start">
                                    <p class=" ">John Doe</p>
                                </div>
                                <div class="col-lg-6 text-lg-end">
                                    <p class="text-secondary text-sm ">December 12, 2021</p>
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                                </p>
                            </div>
                        </div>                        
                    </div>

                    <form class="offset-2">
                        
                        <div class="row">
                            <div class="col-12">
                                <h1>Add a Comments</h1>
                            </div>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Author</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Comment</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          
                        </div>
                        
                         <div class="row">
                          <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary w-100 bg-black">Submit</button>
                          </div>
                      </div>
                        
                      </form>
                     


                    
                </div>
            
        
        

    </main>

    <footer class="bg-dark">
        <div class="container">
            <p class="m-0 text-white py-4">&copy; Copyright Philosophy 2022</p>
        </div>
    </footer>
    
</body>
</html>


<?php else: ?>
    <header class="bg-dark py-4 py-lg-5" >
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-12 text-lg-center text-start">
                    <h1 class="mb-4 mb-lg-0 text-white">
                       ERREUR cette id de post n'existe pas

                    </h1>
                    <a href="index.php">
                      retour
                    </a>
                </div>
            </div>
        </div>
    </header>
    
   <?php endif;?>