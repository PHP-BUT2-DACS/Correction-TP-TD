<?php

/**
 * Créé un compte dans la liste des utilisateurs
 *
 * @param array $user
 * @return void
 */
function add_user(array $user) : void {
    // Récupère le contenu du fichier des utilisateurs
    $users_file_content = file_get_contents('users.json');

    // Transforme le contenu JSON en variable PHP
    $users = json_decode($users_file_content, true);

    // Ajoute l'utilisateur au tableau
    $users[] = $user;

    // Ré-encode le tableau PHP en JSON
    $users_file = json_encode($users, JSON_PRETTY_PRINT);

    // Écrit le fichier avec le JSON
    file_put_contents('users.json', $users_file);
}

// Si la page a été appelée avec la méthode POST
if (!empty($_POST)) {
    // Tableau contenant les erreurs rencontrées lors de la validation du formulaire
    $errors = [];

    /*
     * TODO
     * Ici, valider que le champ username :
     * - existe
     * - est un string
     * - fait au moins 4 caractères
     */
    $username = $_POST['username'];
    if (!isset($username) || !is_string($username) || strlen($username) < 4) {
        $errors[] = "Erreur sur le nom d'utilisateur";
    }

    /*
     * TODO
     * Ici, valider que le champ mail :
     * - existe
     * - est un string
     * - contient un @
     */
    $mail = $_POST['mail'];
    if (!isset($mail) || !is_string($mail) || !str_contains($mail, "@")) {
        $errors[] = "Erreur sur l'email";
    }

    /*
     * TODO
     * Ici, valider que le champ nationality :
     * - existe
     * - est un string
     * - n'est pas vide
     * - est compris dans la liste suivante : Français, Anglais, Italien
     */
    $nationality = $_POST['nationality'];
    if (!isset($nationality) || !is_string($nationality) || strlen($nationality) <= 0 || !in_array($nationality, ["Français", "Anglais", "Italien"])) {
        $errors[] = "Erreur sur la nationalité";
    }

    /*
     * TODO
     * Ici, valider que le champ password :
     * - existe
     * - est un string
     * - fait au moins 4 caractères
     */
    $password = $_POST['password'];
    if (!isset($password) || !is_string($password) || strlen($password) < 4) {
        $errors[] = "Erreur sur le mot de passe";
    }

    // S'il n'existe aucune erreur lors de la création du compte
    if (sizeof($errors) == 0) {
        // S'assure qu'une session existe
        session_start();

        // Détruit la session précédente (pour être sûr)
        session_destroy();

        // Créé une nouvelle session
        session_start();

        // Ajoute le nouveau compte au fichier JSON des utilisateurs
        add_user($_POST);

        // Attribut les données de l'utilisateur à la session courante
        $_SESSION = [
            'username' => $username,
            'mail' => $mail,
            'nationality' => $nationality,
            'password' => $password
        ];

        // Redirige vers la page de profil
        header('Location: profile.php');
        return;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Se créer un compte</title>
</head>
<body>
    <h2>Se créer un compte</h2>
    <form
            style="display: flex; flex-direction: column; width: 25%"
            method="post"
            action="singup.php"
    >
        <?php

        // Si le tableau des erreurs existe et n'est pas vide
        if (!empty($errors)) {
            // Pour chaque erreur
            foreach ($errors as $error) {
                // Affiche l'erreur
                echo "<span style='background-color: red'>$error</span>";
            }
        }

        ?>

        <label>
            Nom d'utilisateur :
            <input name="username" type="text">
        </label>

        <label>
            Email :
            <input name="mail" type="email">
        </label>

        <label>
            Nationalité :
            <select name="nationality">
                <option>Français</option>
                <option>Anglais</option>
                <option>Italien</option>
            </select>
        </label>

        <label>
            Mot de passe :
            <input name="password" type="password">
        </label>

        <button type="submit">
            Se créer un compte
        </button>
    </form>
</body>
</html>