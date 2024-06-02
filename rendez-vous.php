<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}


$servername = "localhost";
$username = "root2";
$password = "root";
$dbname = "projet";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}


$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    $delete_sql = "DELETE FROM rendezvous WHERE ID = $delete_id";
    if ($role != 'admin') {
        if ($role == 'coach') {
            $delete_sql .= " AND coach_id = $user_id";
        } else {
            $delete_sql .= " AND client_ID = $user_id";
        }
    }
    if ($conn->query($delete_sql) === TRUE) {
        echo "Rendez-vous supprimé avec succès.<br>";
    } else {
        echo "Erreur lors de la suppression du rendez-vous: " . $conn->error . "<br>";
    }
}


if ($role == 'admin') {
    $sql = "SELECT ID, coach_nom, date, heure, adresse, document, digicode FROM rendezvous";
} elseif ($role == 'coach') {
    $sql = "SELECT ID, coach_nom, date, heure, adresse, document, digicode FROM rendezvous WHERE coach_id = $user_id";
} else {
    $sql = "SELECT ID, coach_nom, date, heure, adresse, document, digicode FROM rendezvous WHERE client_ID = $user_id";
}

$result = $conn->query($sql);

if ($result === FALSE) {
    die("Erreur de requête SQL: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENDEZ-VOUS</title>
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
        .rendezvous-container {
            background-color: #282828; 
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            width: 80%;
            margin-top: 20px;
        }
        .rendezvous-container h2 {
            margin: 0 0 20px 0;
            color: #1DB954; 
            text-align: center;
        }
        .rendezvous-container .rendezvous-item {
            border-bottom: 1px solid #444;
            padding: 10px 0;
        }
        .rendezvous-container .rendezvous-item:last-child {
            border-bottom: none;
        }
        .rendezvous-container form {
            margin: 0;
        }
        .rendezvous-container button {
            padding: 5px 10px; 
            font-size: 1em;   
            background-color: #1DB954; 
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .rendezvous-container button:hover {
            background-color: #1ed760; 
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1><span>Sportify:</span> Rendez-vous</h1>
        </header>
        <nav>
            <a href="Page_Selection.html">Accueil</a>
            <a href="parcourir.html">Tout Parcourir</a>
            <a href="Page_Recherche2.html">Recherche</a>
            <a href="#">Votre Compte</a>
            <a href="Page_NoLogin.html">Déconnexion</a>
        </nav>
        <div class="rendezvous-container">
            <h2>Liste des Rendez-vous</h2>
            <?php
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo '<div class="rendezvous-item">';
                    echo "ID: " . $row["ID"]. " - Coach: " . $row["coach_nom"]. " - Date: " . $row["date"]. " - Heure: " . $row["heure"]. " - Adresse: " . $row["adresse"]. " - Document: " . $row["document"]. " - Digicode: " . $row["digicode"]. "<br>";
                    echo '<form method="POST" action="">
                            <input type="hidden" name="delete_id" value="' . $row["ID"] . '">
                            <button type="submit">Annuler le rendez-vous</button>
                          </form>';
                    echo '</div>';
                }
            } else {
                echo "0 résultats";
            }

            
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>

