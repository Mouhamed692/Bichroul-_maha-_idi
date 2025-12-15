<?php

// Database configuration
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db   = 'php_membre1';
$port = 3377;

// Connect to MySQL (procedural style)
$con = mysqli_connect($host, $user, $pass, $db, $port);

if (!$con) {
    die('La connexion a échoué : ' . mysqli_connect_error());
}

// Set charset to UTF-8
if (!mysqli_set_charset($con, 'utf8')) {
    die('Erreur lors du chargement du jeu de caractères utf8 : ' . mysqli_error($con));
}

?>