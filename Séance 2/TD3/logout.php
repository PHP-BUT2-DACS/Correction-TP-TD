<?php

// S'assure qu'une session existe
session_start();

// Détruit la session courante
session_destroy();

// Redirige vers la page de connexion
header('Location: login.php');