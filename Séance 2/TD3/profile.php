<?php

// Permet d'accéder à la variable $_SESSION
session_start();

// Récupère la variable username
$username = $_SESSION['username'];

// Récupère la variable mail
$email = $_SESSION['mail'];

// Récupère la variable nationality
$nationality = $_SESSION['nationality'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <h2>Profil</h2>
    <p><strong>Prénom : </strong><?php echo $username ?></p>
    <p><strong>Email : </strong><?php echo $email ?></p>
    <p><strong>Nationalité : </strong><?php echo $nationality ?></p>

    <a href="logout.php">
        <button>Déconnexion</button>
    </a>
</body>
</html>