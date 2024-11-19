<?php

$search = $_GET['search'];
$results = [];

if (!empty($search)) {
    try {
        // Ici, se connecter à la base de données
        $pdo = new PDO('sqlite:chinook.db');
        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connexion réussie à SQLite !";

        // Ici, mettre la recherche en minuscule
        $search = strtolower($search);

        // Ici, préparer une requête pour trouver les artistes correspondants à la recherche (la colonne Name doit être en minuscule)
        $statement = $pdo->prepare("SELECT * FROM artists WHERE lower(Name) like :search");

        // Associer la requête préparée à la variable recherche (search)
        // -> Aidez vous de la command execute()
        $statement->execute([
            ':search' => "%$search%"
        ]);

        // Récupérer les résultats
        // -> Aidez vous de la commande fetchAll()
        $results = $statement->fetchAll();
    }
    catch (PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
}

?>


<form action="exo5.php">
    <label for="search">Rechercher un artiste :</label>
    <input type="text" name="search" id="search" required/>
    <button type="submit">Chercher</button>
</form>

<ul>
    <?php

    // Ici, afficher le nom de chaque artiste trouvé dans une balise <li>
    foreach ($results as $artist) {
        echo "<li>{$artist['Name']}</li>";
    }

    ?>
</ul>
