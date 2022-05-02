<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["admin"]);
session_destroy();
header("Location: /");


/**
 * Detruit toute les variables  sessions existante
 */
/*
 session_unset();
 
 //detruit toutes les sessions existantes
 session_destroy();

 */