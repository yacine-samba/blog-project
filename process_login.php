<?php
session_start();

include ("connect.php");

$db->query('SET NAMES utf8');


// Traitement du formulaire de connexion
if (isset($_POST['btnlogin'])) {
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Récupération de l'utilisateur
    $query = "SELECT * FROM users WHERE login='$login' LIMIT 1";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    $hash = '$2y$10$a/18CJKb5josPHFmj5/PAePyzW9hJFVw3pWNVAAalcd';

    if ($user) { // si l'utilisateur existe
        if (password_verify($password, $user['password'])) { // vérification du mot de passe
            // Connexion réussie
        $_SESSION['login'] = $login;
        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?error=incorrect_password");
        exit;
    }
} else {
    header("Location: login.php?error=user_not_found");
    exit;
}
}

// Fermeture de la connexion
mysqli_close($db);

?>

