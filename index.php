<?php
session_start();
include("connect.php");
$db->query('SET NAMES utf8');
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
        <?php

        // Récupération des 3 derniers articles
        $query = "SELECT * FROM articles ORDER BY created_at DESC LIMIT 3";
        $result = mysqli_query($db, $query);
        $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?> 
        <h1>Nos derniers articles</h1>
        <div class="articles">
        <?php
        foreach ($articles as $article) : ?>
            <div class='article'>
            <h2><a href="article.php?id=<?php echo $article['id']; ?>">
            <?php echo $article['title']; ?></a></h2>
            <p>Par: <?php echo $article['author']; ?> le <?php echo $article['created_at']; ?> </p>
            </div>
        <?php endforeach;

        ?> </div> <?php

        // Récupération de tous les articles
        $query = "SELECT * FROM articles ORDER BY created_at DESC";
        $result = mysqli_query($db, $query);
        $articles = mysqli_fetch_all($result, MYSQLI_ASSOC); ?>
    
        <h1>Tous les articles</h1>
        <div class="articles">
        <?php foreach ($articles as $article) : ?>
            <div class='article'>
            <h2><a href="article.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h2>
            <p>Auteur : <?php echo $article['author']; ?></p>
            <p>Créé le : <?php echo $article['created_at']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    </main>

    <footer>
            <div>2022 - Yacine Samba</div>
    </footer>

</body>

</html>