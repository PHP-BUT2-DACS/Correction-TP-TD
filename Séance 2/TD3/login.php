<?php

/**
 * Retourne la liste des utilisateurs depuis le fichier JSON
 *
 * @return array
 */
function get_users() : array {
    // Récupère le contenu du fichier des utilisateurs
    $users_file = file_get_contents('users.json');

    // Transforme le contenu JSON en variable PHP
    $users = json_decode($users_file, true);

    // Retourne les utilisateurs
    return $users;
}

// Si la page a été appelée avec la méthode POST
if (!empty($_POST)) {
    // Utilisateur correspond aux informations d'authentification données
    $user_found = null;

    // Récupère les utilisateurs
    $users = get_users();

    // Pour chaque utilisateur
    foreach ($users as $user) {
        // Si le username et le password sont identiques
        if ($user['username'] == $_POST['username'] || $user['password'] == $_POST['password']) {
            // Récupère l'utilisateur trouvé
            $user_found = $user;

            // Sors de la boucle
            break;
        }
    }

    // Si aucun utilisateur n'a été trouvé
    if ($user_found == null) {
        // Créé une erreur
        $login_error = "Nom d'utilisateur ou mot de passe incorrect";
    }
    else {
        // S'assure qu'une session existe
        session_start();

        // Détruit la session précédente (pour être sûr)
        session_destroy();

        // Créé une nouvelle session
        session_start();

        // Affecte l'utilisateur trouvé à la session courante
        $_SESSION = $user_found;

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
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form
            style="display: flex; flex-direction: column; width: 25%"
            method="post"
            action="login.php"
    >
        <?php

        if (!empty($login_error)) {
            echo "<p style='background-color: red'>$login_error</p>";
        }

        ?>

        <label>
            Nom d'utilisateur :
            <input name="username" type="text">
        </label>

        <label>
            Mot de passe :
            <input name="password" type="password">
        </label>

        <a href="singup.php">Pas de compte ? Se créer un compte</a>

        <button type="submit">
            Se connecter
        </button>
    </form>
</body>
</html>