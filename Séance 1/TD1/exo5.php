<?php

// Ici, remplir le tableau pour qu'il corresponde à l'usage voulu par la boucle for ci-dessous.
// Vous devez ajouter au moins 5 étudiants
$mes_etudiants = [

];

echo "<p>Age de mes étudiants :</p>";
echo "<ul>";

foreach ($mes_etudiants as $prenom => $age) {
    echo "<li>$prenom a $age ans</li>";
}

echo "</ul>";