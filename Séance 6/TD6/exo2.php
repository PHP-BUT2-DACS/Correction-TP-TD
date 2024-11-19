<?php

// Ici, se connecter à la BDD chinook.db (afficher un message en cas d'erreur)
try {
    $pdo = new PDO('sqlite:chinook.db');
    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à SQLite !";
}
catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}