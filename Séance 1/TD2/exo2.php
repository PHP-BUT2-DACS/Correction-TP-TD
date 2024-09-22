<?php

/**
 * Quelqu'un vient de remplir le formulaire de votre site WEB.
 * Vous allez rédiger le script permettant modifier les champs suivants :
 *  - Tous les champs doivent être "trimmés"
 *  - Le nom de famille de la personne est en majuscules
 *  - Son âge devra être transformé en int
 *
 * Et vous devrez aussi valider les champs suivants (après modification)
 *
 *  - L'âge doit être de 13 ans ou plus
 *  - Le prénom et le nom ne doivent pas êtres vides
 */


// Ici, remplir la fonction modifier_mon_formulaire
function modifier_mon_formulaire(array $formulaire) : array {

    return $formulaire;
}

// Ici, remplir la fonction valider_mon_formulaire
function valider_mon_formulaire(array $formulaire) : bool {

    return true;
}

/* --- NE PAS TOUCHER, VOUS POUVEZ REGARDER --- */

$formulaire1 = [
    "prenom" => "Julien",
    "nom" => "caposiena",
    "age" => 22
];

$formulaire2 = [
    "prenom" => "Christophe",
    "nom" => "JALOuX",
    "age" => "12"
];

$formulaire3 = [
    "prenom" => "           Mario",
    "nom" => " ",
    "age" => 99
];

/* VOUS POUVEZ IGNORER CETTE PARTIE */

// Valide le formulaire 1

$formulaire1_modifie = modifier_mon_formulaire($formulaire1);
$etape1_1 = oui_ou_non(modifier_mon_formulaire($formulaire1_modifie) == [
    "prenom" => "Julien",
    "nom" => "CAPOSIENA",
    "age" => 22
]);
$etape1_2 = oui_ou_non(valider_mon_formulaire($formulaire1_modifie) == true);


// Valide le formulaire 2

$formulaire2_modifie = modifier_mon_formulaire($formulaire2);
$etape2_1 = oui_ou_non(modifier_mon_formulaire($formulaire2_modifie) == [
    "prenom" => "Christophe",
    "nom" => "JALOUX",
    "age" => 12
]);
$etape2_2 = oui_ou_non(valider_mon_formulaire($formulaire2_modifie) == false);

// Valide le formulaire 3

$formulaire3_modifie = modifier_mon_formulaire($formulaire3);
$etape3_1 = oui_ou_non(modifier_mon_formulaire($formulaire3_modifie) == [
    "prenom" => "Mario",
    "nom" => "",
    "age" => 99
]);
$etape3_2 = oui_ou_non(valider_mon_formulaire($formulaire3_modifie) == false);

function oui_ou_non($var) : string {
    return $var ? "oui":"non";
}

echo "Le formulaire 1 a été correctement modifié : <b>$etape1_1</b>, a été correctement valide : <b>$etape1_2</b><br>";
echo "Le formulaire 2 a été correctement modifié : <b>$etape2_1</b>, a été correctement valide : <b>$etape2_2</b><br>";
echo "Le formulaire 3 a été correctement modifié : <b>$etape3_1</b>, a été correctement valide : <b>$etape3_2</b><br>";