<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionSneakers - Inscription</title>
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
        include("connect.php");
        session_start();
        if (isset($_SESSION["login"])) {
            echo "Vout êtes déja connectée avec le compte : {$_SESSION["login"]} <a href='logout.php'>Déconnexion</a> <BR>";
        }
        ?>

<main>
<h1>Inscrivez vous !</h1>
        <form action="process_signup.php" method="post">
            <label for="username">Identifiant:</label>
            <input type="text" id="login" name="login" required>
            <br>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <input type="submit" value="S'inscrire" name="signup">
            <?php
            if (isset($_GET['error'])) {
                switch ($_GET['error']) {
                    case 'user_already_exist':
                        echo "<p style='color:red'>Identifiant déja utilisé</p>";
                        break;
                }
            }
            ?>
            <p>Déja inscrit ?<a href="login.php">Se connecter</a></p>
        </form>
</main>

    </main>

    <footer>
            <div>2022 - Yacine Samba</div>
    </footer>

</body>

</html>