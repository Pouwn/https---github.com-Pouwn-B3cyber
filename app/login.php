<?php

// Connexion à la base de données
$dsn = 'mysql:dbname=b3cyber;host=mysql';
$user = 'root';
$password_db = ''; 

try {
    $dbh = new PDO($dsn, $user, $password_db);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
    exit();
}

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Récupération du mot de passe hashé depuis la base de données
    $stmt = $dbh->prepare("SELECT password FROM form WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe hashé
    if ($result !== false && password_verify($password, $result['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: accueil.php");
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect";
    }
}


/*
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


if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Hashage du mot de passe avant de l'insérer dans la base de données
    
    
    // Vérifiez les identifiants de l'utilisateur
    if ($email == "votre_email" && $password == "votre_mot_de_passe") {
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("Location: accueil.php"); // Redirigez l'utilisateur vers une page de bienvenue après la connexion réussie
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect";
    }
}*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" 
     rel="stylesheet"
     integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" 
     crossorigin="anonymous">
    <title>connexion</title>
    <style>
        h1{
            text-align: center;
            font-family: 'Times New Roman', Times, serif;

        }

        .container{
            font-family: 'Times New Roman', Times, serif;
            background-color: #F5F5F5;
            height: 300px;
            width: 550px;
            box-shadow: #F5F5F5;
            border-radius: 15px;
        }
    </style>
</head>
<body>
<h1 class="text-center mt-5 text-primary"><b>Connexion</b></h1>
<div class="container mt-5">
    <div class="container mt-5 p-5">
    <form action="login.php" method="post">
    <div class="row">
        <div class="col">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" placeholder="nom.prenom@gmail.com" required><br><br>
        </div>
        <div class="col">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required><br><br>
        </div>
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-lg mt-5  btn-outline-primary" value="login">
        <div class="text-center mt-4"><p>vous pas de compte?  
            <a href="index.php">inscrivez-vous</a></p></div>   

    </div>
    </div>
    </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>