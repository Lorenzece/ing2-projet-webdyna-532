<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: Page_Connexion.html");
    exit();
}

$servername = "localhost";
$username = "root2";
$password = "root";
$dbname = "projet";

$conn = new mysqli($servername, $username, $password, $dbname);

$email = $_SESSION['email'];

$sql = "SELECT name, adresse, email FROM login WHERE email = ? AND role = 'admin'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify: Votre Compte - Admin</title>
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
        }
        header {
            background-color: #191414;
            padding: 20px;
            text-align: center;
            position: relative;
            border-bottom: 2px solid #1DB954;
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
        .content {
            padding: 50px;
            color: white;
        }
        .section {
            margin-bottom: 30px;
        }
        .section h2 {
            color: #1DB954;
            margin-bottom: 10px;
        }
        .card {
            background-color: #282828;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }
        footer {
            background-color: #282828;
            text-align: center;
            padding: 20px 0;
            border-top: 2px solid #1DB954;
            color: #b3b3b3;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Votre Compte - Admin</h1>
        </header>
        <nav>
            <a href="admin.php">Accueil</a>
            <a href="Page_NoLogin.html">Déconnexion</a>
        </nav>
        <div class="content">
            <div class="section">
                <h2>Informations du Compte</h2>
                <div class="card">
                    <p><strong>Nom/Prénom:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                    <p><strong>Adresse:</strong> <?php echo htmlspecialchars($user['adresse']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                </div>
            </div>
        </div>
        <footer>
            <p>Contactez-nous par mail, téléphone, ou visitez-nous à notre adresse physique.</p>
        </footer>
    </div>
</body>
</html>
