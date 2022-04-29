<?php
require_once 'connection.php';
require_once 'function.php';
$requette= $db ->query("SELECT * FROM posts INNER JOIN category ON category.idcat=posts.idcat  ORDER BY created_at desc" );
$posts = $requette ->fetchAll();
session_start();




?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Philosophy.</title>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- Placer sa feuille de style CSS en dernière position ;) -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header class="bg-dark py-4 py-lg-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-lg-12 text-lg-center text-start">
                        <h1 class="mb-4 mb-lg-0">
                            <a href="#" title="Philosophy." class="logo text-white text-decoration-none">
                                Philosophy.
                            </a>
                        </h1>
                    </div>
                    <div class="col-6 d-flex d-lg-none justify-content-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-list text-white" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </div>
                    <div class="col-12 d-none d-lg-block">
                        <?php if(isset($_SESSION["admin"])):?>
                            <nav>
                                <ul class="d-lg-flex align-items-center justify-content-center py-3 gap-5">
                                    <li><a href="#" title="Home" class="text-secondary text-decoration-none">Home</a></li>
                                    <li><a href="inscription/formInscription.php" title="Inscription" class="text-secondary text-decoration-none">Inscription</a></li>
                                    <li><a href="../deconnection.php" title="deconnection" class="text-secondary text-decoration-none">Deconnexion</a></li>
                                    <li><a href="admin/" title="About" class="text-secondary text-decoration-none">list Articles</a></li>
                                    <li><a href="admin/formCreaArticle.php" title="About" class="text-secondary text-decoration-none">Creation Article</a></li>
                                   <li><span class="text-secondary text-decoration-none"> Bonjour <?php echo $_SESSION["admin"]?></span></li>
                                </ul>
                            </nav>
                            <?php elseif(isset($_SESSION["user"])):?>
                        <nav>
                            <ul class="d-lg-flex align-items-center justify-content-center py-3 gap-5">
                                <li><a href="#" title="Home" class="text-secondary text-decoration-none">Home</a></li>
                                <li><a href="../deconnection.php" title="Deconnexion" class="text-secondary text-decoration-none">Deconexion</a></li>
                               
                                <li><span class="text-secondary text-decoration-none" > Bonjour : <?php echo $_SESSION["user"]?></span></li>
                            </ul>
                        </nav>
                        <?php else: ?>   
                            <nav>
                            <ul class="d-lg-flex align-items-center justify-content-center py-3 gap-5">
                                <li><a href="#" title="Home" class="text-secondary text-decoration-none">Home</a></li>
                                <li><a href="../inscription/formInscription.php" title="Inscription" class="text-secondary text-decoration-none">Inscription</a></li>
                                <li><a href="../connection/index.php" title="Connection" class="text-secondary text-decoration-none">Connection</a></li>
                                <li><a href="#" title="About" class="text-secondary text-decoration-none">About</a></li>
                                
                            </ul>
                        </nav>
                        <?php endif;?>
                    </div>
                    <!--Carrousel-->
                    <div class="col-12">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-3 d-none d-lg-block text-end"><!--d-none element disparé sur tous les ecrans / d-lg-block affiche que pour les grands ecran-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left-short text-white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                </svg>
                            </div>
                            <div class="col-12 col-lg-6 pt-3 pt-lg-0">
                                <img src="Images/slide/03.jpg" alt="Slide 01" class="w-100 rounded carousel-img">
                            </div>
                            <div class="col-lg-3 d-none d-lg-block text-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right-short text-white" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="gradient"></div>

        <main class="py-5">
            <div class="container">
                <div class="row">
                    <?php foreach ($posts as $post) : ?>
                    <div class="col-lg-6 col-12">
                        
                        <article>
                            <a href="article.php?idpost=<?php  echo "{$post['idpost']}"; ?> " title="Just a Standard Format Post" class="text-decoration-none text-dark">
                                <img src="Images/upload/<?php echo "{$post['cover']}";?>" alt="Just a Standard Format Post" class="w-100 rounded article-img">
                                <h1 class="pt-2"><?php echo "{$post['title']}";?></h1>
                            </a>
                            <p class="text-secondary text-sm"><?php  echo formatDate($post['created_at']);?></p>
                            <p class="py-2"><?php echo truncateText($post['content'],300);?></p>
                            
                            <div class="d-flex align-items-center list-unstyled gap-2">
                                <a href="categorie.php?idcat=<?php echo "{$post['idcat']}";?> " title="categorie" class="badge rounded-pill bg-primary text-decoration-none"><?php echo "{$post['name']}";?></a>
                                 
                            </div>
                        
                        </article>
                      
                    </div>
                      <?php endforeach; ?>
                    
                </div>
            </div>
        </main>
        <footer class="bg-dark">
            <div class="container">
                <p class="m-0 text-white py-4">&copy; Copyright Philosophy 2022</p>
            </div>
        </footer>
    </body>
</html>
