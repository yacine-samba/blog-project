<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisionSneakers - Déconnexion</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

<header>

</header>

    <main>

        <?php
        session_start();
        session_destroy();
        echo 'Vous avez été déconnecté. Redirection automatique';
        ?>

    </main>

    <footer>
            <div>2022 - Yacine Samba</div>
    </footer>
    <script>
        setTimeout(() => {
            window.location = "index.php";
        }, 1500)
    </script>
</body>

</html>