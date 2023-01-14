<?php

// Connexion à la base de données
$host = "localhost"; // Adresse de l'hôte de la base de données

$username = "samba_admin"; // Nom d'utilisateur de la base de données
$password = "_3rAZwN$5-qa"; // Mot de passe de la base de données
$dbname = "samba_visionsneakers"; // Nom de la base de données

// Création de la connexion
$db = mysqli_connect($host, $username, $password, $dbname);

// Vérification de la connexion
if (!$db) {
    die("La connexion a échoué: " . mysqli_connect_error());
}

?>