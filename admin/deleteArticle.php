<?php

session_start();
if(isset($_SESSION["admin"])):
    require_once '../connection.php';
    require_once '../vendor/autoload.php';

   
    $id = htmlspecialchars(strip_tags($_GET['id']));

    // Supprime l'article via son ID
    $query = $db->prepare('DELETE FROM posts WHERE idpost = :id');
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
 
    // Si aucun ligne n'a été affectées par la suppression, on redirige vers une erreur 404
if ($query->rowCount() === 0) {
	header('Location: ../404.php');
}
else {
	// Redirection vers la page d'accueil de l'admin en cas de succès
	header('Location: index.php?successDelete=1');
}

?>






<?php

else:
  header('Location: index.php');
endif;


?>
