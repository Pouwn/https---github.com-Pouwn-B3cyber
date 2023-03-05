<?php
// test pour enlever la page du cache
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $label = $_POST['label'];
    $description = $_POST['description'];

    // Connexion à la base de données
    $dsn = 'mysql:dbname=b3cyber;host=mysql';
    $user = 'root';
    $password_db = '';

    try {
        $dbh = new PDO($dsn, $user, $password_db);

        // Préparation et exécution de la requête SQL
        $stmt = $dbh->prepare("INSERT INTO Tasks (label, description) VALUES (?, ?)");
        $stmt->execute([$label, $description]);

        // Redirection vers la page d'accueil après l'ajout de la tâche
        header('Location: accueil.php');
        exit();
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        exit();
    }
}

require_once('function.php');

// Connexion à la base de données
$dsn = 'mysql:dbname=b3cyber;host=mysql';
$user = 'root';
$password_db = '';

try {
    $dbh = new PDO($dsn, $user, $password_db);
    $stmt = $dbh->query("SELECT id, label, description FROM Tasks");
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des tâches</title>
</head>
<body>
    <h1>Liste des tâches</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Label</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultat as $tache) : ?>
                <tr>
                    <td><?= $tache['id'] ?></td>
                    <td><?= $tache['label'] ?></td>
                    <td><?= $tache['description'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form method="POST">
        <label for="label">Label :</label>
        <input type="text" name="label" required>

        <label for="description">Description :</label>
        <textarea name="description" required></textarea>

        <input type="submit" value="Ajouter">
    </form>
    <a href="logout.php">Déconnexion</a>
</body>
</html>

