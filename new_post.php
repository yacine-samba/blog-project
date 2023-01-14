<?php
session_start();

include("connect.php");

$db->query('SET NAMES utf8');

if (!isset($_SESSION['login']) || $_SESSION['login'] != "admin") {
    header("Location: login.php?error=unauthorized");
    exit;
}


// Traitement du formulaire de création d'article
if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $content = mysqli_real_escape_string($db, $_POST['content']);
    $author = $_SESSION['login'];
    $created_at = date("Y-m-d H:i:s");

    // Insertion de l'article dans la base de données
    $query = "INSERT INTO articles (title, content, author, created_at) VALUES ('$title', '$content', '$author', '$created_at')";
    $result = mysqli_query($db, $query);

    if ($result) {
        $id = mysqli_insert_id($db);
        header("Location: article.php?id=" . $id);
        exit;
    } else {
        echo "Une erreur est survenue lors de l'insertion de l'article dans la base de données.";
    }
}

// Fermeture de la connexion
mysqli_close($db);
