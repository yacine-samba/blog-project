<?php
session_start();
include ("connect.php");
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

    <h1>Connectez vous !</h1>

        <!-- Formulaire de connexion -->
        <form action="process_login.php" method="post">
            <label for="login">Identifant:</label>
            <input type="text" id="login" name="login" required>
            <br>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <input type="submit" value="Se connecter" name="btnlogin">
            <?php
            if (isset($_GET['error'])) {
                switch ($_GET['error']) {
                    case 'user_not_found':
                        echo "<p style='color:red'>Utilisateur introuvable</p>";
                        break;
                    case 'incorrect_password':
                        echo "<p style='color:red'>Mot de passe incorrect</p>";
                        break;
                }
            }
            ?>
            <p>Pas de compte ?<a href="signup.php">S'inscrire</a></p>
        </form>
        

    </main>

    <footer>
            <div>2022 - Yacine Samba</div>
    </footer>

</body>

</html>