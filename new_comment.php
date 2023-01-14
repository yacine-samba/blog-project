<?php
session_start();

// Connexion à la base de données
include("connect.php");

$db->query('SET NAMES utf8');

if (!isset($_SESSION['login'])) {
    header("Location: article.php?error=unauthorized");
    exit;
}

// Traitement du formulaire de commentaire
if (isset($_POST['submit'])) {
    $author = mysqli_real_escape_string($db, $_POST['author']);
    $content = mysqli_real_escape_string($db, $_POST['content']);

    // Insertion du commentaire dans la base de données
    $query = "INSERT INTO comments (article_id, author, content, created_at) VALUES ($id, '$author', '$content')";
    $result = mysqli_query($db, $query);
    if(!isset($_SESSION['login'])){
        header("Location: article.php?error=unauthorized");
    };
}


// Fermeture de la connexion
mysqli_close($db);
?>