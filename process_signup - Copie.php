<?php
session_start();
include ("connect.php");

$db->query('SET NAMES utf8');

// Traitement du formulaire d'inscription
if (isset($_POST['signup'])) {
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $name = mysqli_real_escape_string($db, $_POST['login']);
    $login = mysqli_real_escape_string($db, $_POST['login']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT); // Hashage du mot de passe

    // Vérification de l'existence de l'utilisateur
    $user_check_query = "SELECT * FROM users WHERE login='$login' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // si l'utilisateur existe déjà
        if ($user['login'] === $login) {
            header("Location: signup.php?error=user_already_exist");
            exit;
        }
    } else { // sinon, on ajoute l'utilisateur à la base de données
        $query = "INSERT INTO users (login, password) VALUES('$login', '$password_hash')";
        mysqli_query($db, $query);
        echo "Inscription réussite";
        header("Location: login.php");
    exit;
    }
}


?>