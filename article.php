<?php
session_start();

// Connexion à la base de données
include("connect.php");

$db->query('SET NAMES utf8');

// Récupération de l'identifiant de l'article
$id = mysqli_real_escape_string($db, $_GET['id']);

// Récupération de l'article
$query = "SELECT * FROM articles WHERE id='$id' LIMIT 1";
$result = mysqli_query($db, $query);
$article = mysqli_fetch_assoc($result);

// Traitement du formulaire de commentaire
if (isset($_POST['submit'])) {
    if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
    echo "<p style='color:red'>Vous devez être connecté pour poster un commentaire</p>";
    } else {
    $author = mysqli_real_escape_string($db, $_POST['author']);
    $content = mysqli_real_escape_string($db, $_POST['content']);

    // Insertion du commentaire dans la base de données
    $query = "INSERT INTO comments (article_id, author, content) VALUES ($id, '$author', '$content')";
    $result = mysqli_query($db, $query);
    }
}

// Récupération des commentaires de l'article
$query = "SELECT * FROM comments WHERE article_id = $id ORDER BY created_at ASC";
$result = mysqli_query($db, $query);
$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);


// Fermeture de la connexion
mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionSneakers - Notre vision de la sneakers</title>
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
    <h1><?php echo $article['title']; ?></h1>
    <p>Auteur : <?php echo $article['author']; ?></p>
    <p>Créé le : <?php echo $article['created_at']; ?></p>
    <p><?php echo $article['content']; ?></p>

    <h2>Commentaires</h2>

    <button id="toggle-comments">Afficher/Cacher les commentaires</button>
    <div id="comments" style="display: none;">
        <?php foreach ($comments as $comment) : ?>
            <p><strong><?php echo $comment['author']; ?></strong> a dit :</p>
            <p><?php echo $comment['content']; ?></p>
            <p>Posté le : <?php echo $comment['created_at']; ?></p>
        <?php endforeach; ?>
    </div>

    <h2>Laissez un commentaire</h2>
    <?php 
    if (isset($_GET['error'])) {
        switch ($_GET['error']) {
            case 'unauthorized':
                echo "<p style='color:red'>Connecter vous pour ajouter un comme </p>";
                break;
        }
    }?>



    <form action="" method="post">
        <label for="author">Nom :</label>
        <input type="text" id="author" name="author">
        <br>
        <label for="content">Commentaire :</label>
        <textarea id="content" name="content"></textarea>
        <br>
        <input type="submit" name="submit" value="Poster">
    </form>

    <a href="archives.php">Voir tout les articles</a><br>
    <a href="post.php">Poster un nouvel article</a><br>
    <a href="index.php">Retourner à la page d'accueil</a>

    </main>
    <footer>
            <div>2022 - Yacine Samba</div>
    </footer>
</body>
<script>
    let toggleBtn = document.getElementById("toggle-comments");
    let comments = document.getElementById("comments");

    toggleBtn.addEventListener("click", function() {
        if (comments.style.display === "none") {
            comments.style.display = "block";
            toggleBtn.innerHTML = "Cacher les commentaires";
        } else {
            comments.style.display = "none";
            toggleBtn.innerHTML = "Afficher les commentaires";
        }
    });
</script>

</html>