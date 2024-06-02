<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root2";
    $password = "root";
    $dbname = "projet";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La connexion a échoué: " . $conn->connect_error);
    }

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT id, role FROM login WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Erreur de préparation de la requête: " . $conn->error);
    }
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $stmt->bind_result($user_id, $role);
    $stmt->fetch();
    $stmt->close();

    if ($role) {
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = $user_id; 
        $_SESSION['role'] = $role;
        if ($role == 'coach') {
            echo "<script>window.location.href='coach.php';</script>";
        } elseif ($role == 'admin') {
            echo "<script>window.location.href='admin.php';</script>";
        } else {
            echo "<script>window.location.href='client.php';</script>";
        }
    } else {
        echo "<p style='color: red; text-align: center;'>Adresse mail ou mot de passe incorrect.</p>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Sportify</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #191414;
            color: white; 
        }
        .wrapper {
            width: 100%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        header {
            background-color: #191414; 
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #1DB954; 
            width: 100%;
        }
        header h1 {
            margin: 0;
            font-size: 2em;
            color: white;
        }
        header span {
            color: #1DB954; 
        }
        nav {
            background-color: #282828; 
            padding: 10px 0;
            text-align: center;
            width: 100%;
        }
        nav a {
            display: inline-block;
            margin: 0 10px;
            padding: 10px 20px;
            background-color: #1DB954; 
            border-radius: 10px;
            text-decoration: none;
            color: white; 
            font-weight: bold;
        }
        nav a:hover {
            background-color: #1ed760;
        }
        .login-container {
            background-color: #282828; 
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            width: 300px;
        }
        .login-container h2 {
            margin: 0 0 20px 0;
            color: #1DB954; 
            text-align: center;
        }
        .login-container label {
            display: block;
            margin-bottom: 10px;
            color: #b3b3b3; 
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #1DB954; 
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #1ed760; 
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1><span>Sportify:</span> Connexion</h1>
        </header>
        <nav>
            <a href="Page_NoLogin.html">Accueil</a>
            <a href="Page_Inscription.html">Inscription</a>
        </nav>
        <div class="login-container">
            <h2>Connexion</h2>
            <form action="connexion.php" method="POST">
                <label for="email">Adresse mail :</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Se connecter</button>
            </form>
        </div>
    </div>
</body>
</html>
