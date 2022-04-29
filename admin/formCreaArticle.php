<?php

require_once '../connection.php';
require_once '../function.php';
require_once '../vendor/autoload.php';
$requette = $db->query("SELECT * from category ORDER BY name");
$cats = $requette->fetchAll();

if(!empty($_GET["idpost"])):
    $query = $db->prepare("SELECT posts.* from posts where idpost = :idpost");
    $query->bindValue("idpost", $_GET["idpost"],PDO::PARAM_INT);
    $query->execute();
    $post = $query->fetch();

    dump($post);

endif;


?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Creation Article</title>

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
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </div>
                <div class="col-12 d-none d-lg-block">

                    <nav>
                        <ul class="d-lg-flex align-items-center justify-content-center py-3 gap-5">
                            <li><a href="#" title="Home" class="text-secondary text-decoration-none">Home</a></li>
                            <li><a href="inscription/formInscription.php" title="Inscription" class="text-secondary text-decoration-none">Inscription</a></li>
                            <li><a href="../deconnection.php" title="deconnection" class="text-secondary text-decoration-none">Deconnexion</a></li>
                            <li><a href="../index.php" title="About" class="text-secondary text-decoration-none">list Articles</a></li>
                            <li><a href="admin/formCreaArticle.php" title="About" class="text-secondary text-decoration-none">Creation Article</a></li>
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>


    </header>
    <main>


        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Creation article</h1>
                </div>


                <form action="ajoutArticle.php" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="titreArticle" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="titreArticle" name="title">

                    </div>
                    <div class="col-12">
                        <label for="content" class="form-label">Content</label>
                        <textarea type="text" class="form-control" id="content" name="content" rows="10"></textarea>
                    </div>
                    
                    <div class="col-12">
                    <label for="cover" class="form-label">Image</label>
                      <div class="row">
                          <div class="col-6">
 
                                <input  class=" form-control" id="cover" type="file" name="cover" > 
                           
                        
                          </div>
                         
                      </div>
                    </div>

                    <div class="col-6">
                        <label for="category" class="form-label">Categorie</label>
                        <select id="category"name="category">
                            <?php foreach ($cats as $cat) : ?>
                                <option value="<?= $cat['idcat'] ?> " ><?php echo $cat['name']; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </main>


</body>

</html>
