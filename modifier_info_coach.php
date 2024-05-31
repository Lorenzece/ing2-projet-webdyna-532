<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Activités Sportives - Sportify</title>
    <style>
        /* Your existing styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: black;
            color: white;
        }
        header {
            background-color: black;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .header {
            text-align: center;
            padding: 10px;
            background-color: black;
            color: green;
            font-size: 24px;
        }
        .nav {
            display: flex;
            justify-content: center;
            background-color: #333;
            padding: 10px;
        }
        .nav button {
            background-color: green;
            color: white;
            border: none;
            margin: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        .container {
            padding: 2px;
            text-align: center;
            background-color: black;
        }
        .containerbis {
            padding: 10px;
            text-align: center;
            background-color: black;
        }
        .activity {
            background-color: green;
            color: white;
            border: none;
            margin: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        .activity h2 {
            color: white;
        }
        .responsible {
            background-color: #333;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            table-layout: fixed;
        }
        .responsible h3 {
            color: white;
            table-layout: fixed;
        }
        .responsible a {
            color: lightblue;
            text-decoration: none;
            table-layout: fixed;
        }
        .details {
            display: none;
            margin-top: 10px;
            padding: 10px;
            background-color: #444;
            border-radius: 5px;
            table-layout: fixed;
        }
        .details img {
            max-width: 100px;
            border-radius: 50%;
        }
        .details table {
            width: 100%;
            margin-top: 10px;
        }
        .details td {
            padding: 5px;
            border-bottom: 1px solid #555;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            padding: 40px;
            background-color: #333;
            color: white;
        }
        ab {
            color: green;
            display: inline;
        }
        table {
            padding: 40px;
            text-align: center;
            background-color: black;
            table-layout: fixed;
        }
        .admin-form {
            background-color: #333;
            color: white;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
        }
        .admin-form input, .admin-form button {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }
        .admin-form button {
            background-color: green;
            color: white;
            cursor: pointer;
        }
    </style>
    <script>
        function showResponsible(activity) {
            var responsibleDiv = document.getElementById('responsible-' + activity);
            responsibleDiv.style.display = responsibleDiv.style.display === 'block' ? 'none' : 'block';
        }

        function showDetails(activity) {
            var detailsDiv = document.getElementById('details-' + activity);
            detailsDiv.style.display = detailsDiv.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</head>
<body>
<header>
    <span class="title"><h1><ab>Sportify:</ab> Tout parcourir</h1></span>
</header>
<div class="container">
<div class="nav">
    <button onclick="location.href='#'">Accueil</button>
    <button onclick="location.href='#'">Recherche</button>
    <button onclick="location.href='#'">Rendez-vous</button>
    <button onclick="location.href='#'">Votre Compte</button>
    <button onclick="location.href='#'">Déconnexion</button>
</div>

<!-- Formulaire d'administration -->
<div class="admin-form">
    <h2>Espace-Administrateur</h2>
    <form method="post" action="">
        <h3>Ajouter un coach</h3>
        <input type="text" name="Nom" placeholder="Nom" required>
        <input type="text" name="Activité" placeholder="Activité" required>
        <input type="text" name="adresse bureau" placeholder="Adresse bureau" required>
        <input type="text" name="disponibilité" placeholder="Disponibilité" required>
        <input type="email" name="courrier" placeholder="Courrier" required>
        <input type="text" name="téléphone" placeholder="Téléphone" required>
        <input type="text" name="Photo" placeholder="URL de la photo" required>
        <input type="text" name="CV" placeholder="URL du CV" required>
        <button type="submit" name="add_coach">Ajouter</button>
    </form>
    <form method="post" action="">
        <h3>Supprimer un coach</h3>
        <input type="text" name="nom" placeholder="Nom du coach à supprimer" required>
        <button type="submit" name="delete_coach">Supprimer</button>
    </form>
</div>

<div class="footer">
    Contactez-nous par mail, téléphone, ou visitez-nous à notre adresse physique.
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "coach";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$activity_ids = [
    'Musculation' => 1,
    'Fitness' => 2,
    'Biking' => 3,
    'Cardio-Training' => 4,
    'Cours Collectifs' => 5,
    'Basketball' => 6,
    'Football' => 7,
    'Rugby' => 8,
    'Tennis' => 9,
    'Natation' => 10,
    'Plongeon' => 11
];

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_coach'])) {
        $nom = $_POST['Nom'];
        $activite = $_POST['Activité'];
        $adresse_bureau = $_POST['adresse bureau'];
        $disponibilite = $_POST['disponibilité'];
        $courrier = $_POST['courrier'];
        $telephone = $_POST['téléphone'];
        $photo = $_POST['Photo'];
        $cv = $_POST['CV'];
        $ID = isset($activity_ids[$activite]) ? $activity_ids[$activite] : 0;

        // Check if ID already exists
        $check_sql = "SELECT * FROM coach WHERE ID='$ID' AND Nom='$nom'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            $message = "Erreur : Un coach avec cet ID ou ce nom existe déjà.";
        } else {
            $sql = "INSERT INTO coach (ID, Nom, Activité, `adresse bureau`, disponibilité, courrier, téléphone, Photo, CV) VALUES ('$ID', '$nom', '$activite', '$adresse_bureau', '$disponibilite', '$courrier', '$telephone', '$photo', '$cv')";
            if ($conn->query($sql) === TRUE) {
                $message = "Nouveau coach ajouté avec succès.";
            } else {
                $message = "Erreur : " . $sql . "<br>" . $conn->error;
            }
        }
    }

    if (isset($_POST['delete_coach'])) {
        $nom = $_POST['nom'];
        $sql = "DELETE FROM coach WHERE Nom='$nom'";
    
        if ($conn->query($sql) === TRUE) {
            $message = "Coach supprimé avec succès.";
        } else {
            $message = "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<?php if ($message): ?>
    <div class="message">
        <p><?php echo $message; ?></p>
    </div>
<?php endif; ?>

</body>
</html>