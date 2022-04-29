<?php

/**
 * test de  var_dumper()
 */

 // chargement de l'autoloader de composer
require_once "vendor/autoload.php";

$array =[
    'id' =>1,
    'prenom' => 'Max'
];

dump($array);
