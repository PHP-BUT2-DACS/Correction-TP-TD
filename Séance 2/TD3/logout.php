<?php

// Détruit la session courante
session_destroy();

// Redirige vers la page de connexion
header('Location: login.php');