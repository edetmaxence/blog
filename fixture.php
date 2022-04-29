<?php
require_once "vendor/autoload.php";
require_once "connection.php";

//creation a l'instance de faker

$faker = Faker\Factory::create("fr_FR");


$db ->query('SET FOREIGN_KEY_CHECKS= 0;');
$db ->query('TRUNCATE TABLE users;');
$db ->query('TRUNCATE TABLE posts;');
$db ->query('TRUNCATE TABLE category;');
$db ->query('SET FOREIGN_KEY_CHECKS=1;');


for($i =0; $i<10 ;$i++){
    
    $query = $db-> prepare('INSERT INTO category(name) VALUE (:name)');
    $query -> bindValue(':name', $faker -> colorName );
    $query->execute();
    

}
/*

$query = $db-> prepare('INSERT INTO users(lastname,firstname,email,password,role,created_at) VALUE (:lastname,:firstname,:email,:password,:role,:created_at)');
    $query -> bindValue(':lastname', 'admin');
    $query -> bindValue(':firstname', 'root' );
    $query -> bindValue(':email', 'admin.admin@admin.fr');
    $query -> bindValue(':password',password_hash('root',PASSWORD_DEFAULT));
    $query -> bindValue(':role', 'ROLE_ADMIN');
    $query -> bindValue(':created_at', $faker ->date());
    $query->execute();
*/

  
   $createdAt= $faker->dateTimeBetween('-3 years');

for($i =0; $i<20 ;$i++){
    
 
    $query = $db-> prepare('INSERT INTO users(lastname,firstname,email,password,role,created_at) VALUE (:lastname,:firstname,:email,:password,:role,:created_at)');
    $query -> bindValue(':lastname', $faker ->lastName);
    $query -> bindValue(':firstname', $faker ->firstName);
    $query -> bindValue(':email', $faker ->unique()->email);
    $query -> bindValue(':password', password_hash('secret',PASSWORD_ARGON2I));
    $query -> bindValue(':role', $i ===0 ? 'ROLE_ADMIN':'ROLE_USER');
    $query -> bindValue(':created_at', $createdAt->format('Y-m-d'));
    $query->execute();


   
}


for($i =0; $i<20 ;$i++){
 
    $query = $db-> prepare('INSERT INTO posts(title,content,cover,created_at,idcat,iduser) Values (:title,:content,:cover,:created_at,:idcat,:iduser)');
    $query -> bindValue(':title', $faker ->safeColorName);
    $query -> bindValue(':content', $faker ->realText(1200));
    $query -> bindValue(':cover', '01.jpg');
    $query -> bindValue(':created_at', $createdAt->format('Y-m-d'));
    $query -> bindValue(':iduser', rand(1,20),PDO::PARAM_INT);
    $query -> bindValue(':idcat', rand(1,10),PDO::PARAM_INT);
    
    $query->execute();


   
}