<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['edit_id'])) {
    $edit_id = intval($_GET['edit_id']);
    $sql = "SELECT * FROM rendezvous WHERE ID = $edit_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rendezvous = $result->fetch_assoc();
    } else {
        die("Rendez-vous non trouvé.");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_id'])) {
    $edit_id = intval($_POST['edit_id']);
    $coach_nom = $_POST['coach_nom'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $adresse = $_POST['adresse'];
    $document = $_POST['document'];
    $digicode = $_POST['digicode'];

   
    $sql = "UPDATE rendezvous SET coach_nom = ?, date = ?, heure = ?, adresse = ?, document = ?, digicode = ? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erreur de préparation de la requête: " . $conn->error);
    }
    $stmt->bind_param("ssssssi", $coach_nom, $date, $heure, $adresse, $document, $digicode, $edit_id);

    if ($stmt->execute()) {
        header("Location: rendez-vous.php");
        exit();
    } else {
        echo "Erreur lors de l'exécution de la requête de mise à jour: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit();
} else {
    die("Requête invalide.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Rendez-vous - Sportify</title>
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
        .appointment-container {
            background-color: #282828;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            width: 400px;
            margin-top: 20px;
        }
        .appointment-container h2 {
            margin: 0 0 20px 0;
            color: #1DB954;
            text-align: center;
        }
        .appointment-container label {
            display: block;
            margin-bottom: 10px;
            color: #b3b3b3;
        }
        .appointment-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
        }
        .appointment-container button {
            width: 100%;
            padding: 10px;
            background-color: #1DB954;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .appointment-container button:hover {
            background-color: #1ed760;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1><span>Sportify:</span> Modifier Rendez-vous</h1>
        </header>
        <div class="appointment-container">
            <h2>Modifier les détails du Rendez-vous</h2>
            <form action="admin-rendezvous.php" method="POST">
                <input type="hidden" name="edit_id" value="<?php echo $rendezvous['ID']; ?>">
                <label for="coach-nom">Nom du Coach :</label>
                <input type="text" id="coach-nom" name="coach_nom" value="<?php echo $rendezvous['coach_nom']; ?>" required>
                <label for="date">Date :</label>
                <input type="date" id="date" name="date" value="<?php echo $rendezvous['date']; ?>" required>
                <label for="heure">Heure :</label>
                <input type="time" id="heure" name="heure" value="<?php echo $rendezvous['heure']; ?>" required>
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" value="<?php echo $rendezvous['adresse']; ?>" required>
                <label for="document">Document :</label>
                <input type="text" id="document" name="document" value="<?php echo $rendezvous['document']; ?>" required>
                <label for="digicode">Digicode :</label>
                <input type="text" id="digicode" name="digicode" value="<?php echo $rendezvous['digicode']; ?>" required>
                <button type="submit">Mettre à jour le rendez-vous</button>
            </form>
        </div>
    </div>
</body>
</html>
