<?php
session_start();




require_once '../connection.php';
require_once '../function.php';
require_once '../vendor/autoload.php';
$requette = $db->query("SELECT posts.*,users.*,category.* FROM posts INNER JOIN category ON category.idcat=posts.idcat INNER JOIN users on users.iduser=posts.iduser  order by posts.created_at DESC ");
$posts = $requette->fetchAll();
//dump($posts);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <script src="js/delete.js" defer></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Placer sa feuille de style CSS en dernière position ;) -->
    <link rel="stylesheet" href="css/style.css">
</head>
<?php if (isset($_SESSION["admin"])) : ?>
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
                            <li><a href="../index.php" title="Home" class="text-secondary text-decoration-none">Home</a></li>
                            <li><a href="../inscription/formInscription.php" title="Inscription" class="text-secondary text-decoration-none">Inscription</a></li>
                            <li><a href="../deconnection.php" title="deconnection" class="text-secondary text-decoration-none">Deconnexion</a></li>
                            <li><a href="#" title="About" class="text-secondary text-decoration-none">list Articles</a></li>
                            <li><a href="formCreaArticle.php" title="About" class="text-secondary text-decoration-none">Creation Article</a></li>
                            <li><span class="text-secondary text-decoration-none"> Bonjour <?php echo $_SESSION["admin"] ?></span></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

 
    </header>
   <div class="gradient"></div>
    <body>

        <div class="container">
            <?php if(isset($_GET['successDelete'])): ?>
                    <div class="alert alert-success mb-4">
                        L'article à bien été supprimé !
                    </div>
				<?php endif; ?>
        <div class="row mt-4">
            <div class="col-6  d-flex justify-content-start"><span> Lists des posts</span></div>
            <div class="col-6 d-flex justify-content-end "><a href="formCreaArticle.php" title="About" class="btn btn-outline-secondary text-decoration-none">Creation Article</a></div>

        </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">titre</th>
                        <th scope="col">dte creation</th>
                        <th scope="col">nom categorie</th>
                        <th scope="col">nom auteur</th>
                        <th scope="col">modifier</th>
                        <th scope="col">supprimer</th>

                    </tr>
                </thead>
                <tbody>


                    <?php foreach ($posts as $post) : ?>

                        <tr>

                            <td><?= "{$post['idpost']}"; ?></td>
                            <td><?= "{$post['title']}"; ?></td>
                            <td><?= "{$post['created_at']}"; ?></td>
                            <td><?= "{$post['name']}"; ?></td>
                            <td><?= "{$post['lastname']}"; ?></td>

                            <td><a href="edit.php?idpost=<?= "{$post['idpost']}"; ?>"> EDITER </a></td>
                            <td><a href="deleteArticle.php?id=<?= "{$post['idpost']}"; ?>" class="btn btn-primary btnDelete" > SUPPRIMER </a></td>
                            
                        </tr>



                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>
    </body>

</html>
<?php else : ?>

    <body>
        <div class="row">
            <div class="col-6 text-align">
                <h1>Vous devez vous connecter pour aller ici</h1>
                <a href="../connection"> Connection</a>
            </div>
        </div>

    </body>
<?php endif; ?>






<!-- modal -->
<div class="modal" id="modalDelete" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>MSupprimer ??</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <a href="#"  class="btn btn-primary btnDeleteModal">Oui Supprimer</a>
      </div>
    </div>
  </div>
</div>

       

           
        