<?php

// Ici, se connecter à la BDD chinook.db (afficher un message en cas d'erreur)
$pdo = null;

try {
    $pdo = new PDO('sqlite:' . __DIR__ . '/chinook.db');
    // Configuration des options PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à SQLite !";
}
catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit(1);
}

// Ici, effectuer une requête pour récupérer tous les clients (customers)
$result = $pdo->query("SELECT * FROM customers");

// Ici, afficher tous les clients, avec le format Prénom, Nom, Email
foreach ($result as $row) {
    echo "{$row['FirstName']}\t{$row['LastName']}\t{$row['Email']}\n";
}