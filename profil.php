<?php
session_start();
include("connect.php");
$db->query('SET NAMES utf8');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$login = $_SESSION['login'];

// Récupération des informations de l'utilisateur
$query = "SELECT * FROM users WHERE login='$login' LIMIT 1";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

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
    <h1>Profil utilisateur</h1>
    <p>Nom d'utilisateur : <?php echo $user['login']; ?></p>
    <a href="post.php">Page d'accueil</a>
</main>
    <footer>
            <div>2022 - Yacine Samba</div>
    </footer>
</body>
</html>