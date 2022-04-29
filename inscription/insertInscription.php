<?php

require_once '../connection.php';
require_once '../vendor/autoload.php';


$firstname= htmlspecialchars(strip_tags($_POST["firstname"]));
$lastname= htmlspecialchars(strip_tags($_POST["lastname"]));
$email= htmlspecialchars(strip_tags($_POST["email"]));
$password= htmlspecialchars(strip_tags($_POST["password"]));
$role= "ROLE_USER";

$select =$db->prepare("SELECT * from users WHERE firstname=:firstname & lastname=:lastname & email=:email");
$select-> bindValue(":lastname", $lastname);
$select-> bindValue(":firstname", $firstname);
$select-> bindValue(":email", $email);
$select->execute();
$users = $select->fetchAll();

if(!$users){
    $query =$db ->prepare("INSERT into users (lastname,firstname,email,password,role,created_at) VALUES (:lastname,:firstname,:email,:password,:role, now())");
$query-> bindValue(":lastname", $lastname);
$query-> bindValue(":firstname", $firstname);
$query-> bindValue(":email", $email);
$query-> bindValue(":password", password_hash($password,PASSWORD_ARGON2I));
$query-> bindValue(":role", $role);

$query->execute();

echo "ajout réussi";
}
else {

    echo "ce compte existe déja";
}


