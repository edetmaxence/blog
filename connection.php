<?php

/**
 * Connection à la bd
 */
// localisation de la bd
 const DB_HOST ='localhost';

 // nom user
 const DB_USER ='root';
const DB_PASS ='';

// nom de la bd

const DB_NAME ='blog';
// PDO = PHP Data Objects
$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER,DB_PASS, 
[
    //Gestion des erreurs
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    // Gestion du jeu de caractere
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    //Choix des retours des résultats
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC

]
);
