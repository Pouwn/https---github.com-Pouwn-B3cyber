<?php
// Récupération des données du formulaire
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connexion à la base de données
    $dsn = 'mysql:dbname=b3cyber;host=mysql';
    $user = 'root';
    $password_db = ''; // Attention à ne pas réutiliser la variable $password qui est déjà utilisée

    try {
        $dbh = new PDO($dsn, $user, $password_db);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        exit(); // Il est important d'arrêter le script en cas d'erreur de connexion à la base de données
    }

    // Vérification si l'email existe déjà dans la base de données
    $stmt = $dbh->prepare("SELECT COUNT(*) FROM form WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetchColumn();

    if ($result > 0) {
        // Affichage d'un message d'erreur si l'email existe déjà dans la base de données
        echo '<p class="text-danger">L\'email est déjà utilisé.</p>';
    } else {
        // Hashage du mot de passe avant de l'insérer dans la base de données
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Préparation et exécution de la requête d'insertion
        $stmt = $dbh->prepare("INSERT INTO form (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password); // Utilisation du mot de passe hashé
        $stmt->execute();

        // Redirection vers une page de confirmation
        header('Location: confirmation.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
     rel="stylesheet"
     integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
     crossorigin="anonymous">
    <title>Inscription</title>
    <style>
        h1{
            text-align: center;
            font-family: 'Times New Roman', Times, serif;

        }

        .container{
            font-family: 'Times New Roman', Times, serif;
            background-color: #F5F5F5;
       
            width: 550px;
            box-shadow: #F5F5F5;
            border-radius: 15px;
        }
    </style>
</head>
<body>

<h1 class="text-center mt-5 text-primary"><b>Création de votre compte</b></h1>
<div class="container mt-5">
    <div class="container mt-5 p-5">
    <form action="index.php" method="post">
    <div class="row">
                <div class="col">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" id="nom" required><br><br>
                </div>
                <div class="col">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required><br><br>
                </div>
    </div>
    <div class="row">
        <div class="col">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" placeholder="nom.prenom@gmail.com" required><br><br>
        </div>
        <div class="col">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="mot de passe" required><br><br>
        </div>
    </div>

    <div class="text-center">
        <input type="submit" class="btn btn-lg mt-5  btn-outline-primary" value="S'inscrire">
        <div class="text-center mt-4"><p>vous avez deja un compte?  
            <a href="login.php">Connectez-vous</a></p></div>   
    </div>
    </div>
    </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>