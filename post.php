<?php
session_start();
include ("connect.php");

if (!isset($_SESSION['login']) || $_SESSION['login'] != "yacine.samba") {
    header("Location: index.php?error=unauthorized");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionSneakers - Se connecter</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<header>

        <?php

        if (isset($_SESSION['login']) && !empty($_SESSION['login'])) {
            echo "<ul>
            <li><a href='index.php'>Accueil</a></li>
            <li><a href='archives.php'>Archives</a></li>
            <li><a href='post.php'>Nouveau post</a></li>
            <li style='float:right'><a class='active' href='profil.php'>" . $_SESSION['login'] . "</a></li>
            <li style='float:right'><a href='logout.php'>Se déconnecter</a></li>
        </ul>";
        } else {
            echo "<ul>
            <li><a href='index.php'>Accueil</a></li>
            <li><a href='archives.php'>Archives</a></li>
            <li style='float:right'><a href='login.php'>Se connecter</a></li>
            <li style='float:right'><a
            class='active' href='signup.php'>S'inscrire</a></li>
        </ul>";
        }
        if (isset($_GET['error'])) {
            switch ($_GET['error']) {
                case 'unauthorized':
                    echo "<p style='color:red'>Seul un administrateur peut poster </p>";
                    break;
            }
        }; ?>
    </header>
    <main>

    <h1>Publier un article</h1>
    <form method="post" action="new_post.php">
        <label for="title">Titre :</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="content">Contenu :</label>
        <textarea id="content" name="content" required></textarea>
        <br>
        <input type="submit" name="submit" value="Publier">

    </main>

    <footer>
            <div>2022 - Yacine Samba</div>
    </footer>
</body>

</html>