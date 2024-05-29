<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Activités Sportives - Sportify</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: black;
            color: white;
        }
        .container {
            padding: 20px;
            text-align: center;
        }
        .activity {
            background-color: green;
            color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }
        .activity h2 {
            color: white;
        }
        .responsible {
            background-color: #333;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
        }
        .responsible h3 {
            color: white;
        }
        .responsible a {
            color: lightblue;
            text-decoration: none;
        }
        .details {
            display: none;
            margin-top: 10px;
            padding: 10px;
            background-color: #444;
            border-radius: 5px;
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
<div class="container">
    <h1>Activités Sportives</h1>
    <div class="activity" onclick="showResponsible('basketball')">
        <h2>Basketball</h2>
        <div class="responsible" id="responsible-basketball">
            <h3>responsable de cette activité : <a href="javascript:void(0)" onclick="showDetails('basketball')">voir responsable</a></h3>
            <div class="details" id="details-basketball">
                <?php showResponsibleDetails('basketball'); ?>
            </div>
        </div>
    </div>
    <div class="activity" onclick="showResponsible('football')">
        <h2>Football</h2>
        <div class="responsible" id="responsible-football">
            <h3>responsable de cette activité : <a href="javascript:void(0)" onclick="showDetails('football')">voir responsable</a></h3>
            <div class="details" id="details-football">
                <?php showResponsibleDetails('football'); ?>
            </div>
        </div>
    </div>
    <div class="activity" onclick="showResponsible('rugby')">
        <h2>Rugby</h2>
        <div class="responsible" id="responsible-rugby">
            <h3>responsable de cette activité : <a href="javascript:void(0)" onclick="showDetails('rugby')">voir responsable</a></h3>
            <div class="details" id="details-rugby">
                <?php showResponsibleDetails('rugby'); ?>
            </div>
        </div>
    </div>
    <div class="activity" onclick="showResponsible('tennis')">
        <h2>Tennis</h2>
        <div class="responsible" id="responsible-tennis">
            <h3>responsable de cette activité : <a href="javascript:void(0)" onclick="showDetails('tennis')">voir responsable</a></h3>
            <div class="details" id="details-tennis">
                <?php showResponsibleDetails('tennis'); ?>
            </div>
        </div>
    </div>
    <div class="activity" onclick="showResponsible('natation')">
        <h2>Natation</h2>
        <div class="responsible" id="responsible-natation">
            <h3>responsable de cette activité : <a href="javascript:void(0)" onclick="showDetails('natation')">voir responsable</a></h3>
            <div class="details" id="details-natation">
                <?php showResponsibleDetails('natation'); ?>
            </div>
        </div>
    </div>
    <div class="activity" onclick="showResponsible('plongeon')">
        <h2>Plongeon</h2>
        <div class="responsible" id="responsible-plongeon">
            <h3>responsable de cette activité : <a href="javascript:void(0)" onclick="showDetails('plongeon')">voir responsable</a></h3>
            <div class="details" id="details-plongeon">
                <?php showResponsibleDetails('plongeon'); ?>
            </div>
        </div>
    </div>
    <a class="back-button" href="parcourir.html">Retour tout parcourir</a>
</div>

<?php
function showResponsibleDetails($activity) {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "coach";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Mapping des activités aux IDs correspondants
    $activityIds = [
        'basketball' => 6,
        'football' => 7,
        'rugby' => 8,
        'tennis' => 9,
        'natation' => 10,
        'plongeon' => 11
    ];

    if (array_key_exists($activity, $activityIds)) {
        $id = $activityIds[$activity];

        $sql = "SELECT * FROM coach WHERE ID = $id";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            echo '<table class="center" border="1">'; // Ajout de la classe "center"
            
            // Ajouter une ligne d'en-tête pour les noms des colonnes
            echo "<tr>";
            echo "<th>Nom</th>";
            echo "<th>Activité</th>";
            echo "<th>Adresse bureau</th>";
            echo "<th>Disponibilité</th>";
            echo "<th>Courrier</th>";
            echo "<th>Téléphone</th>";
            echo "<th>Photo</th>";
            echo "<th>CV</th>";
            echo "</tr>";
            
            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $data['Nom'] . "</td>";
                echo "<td>" . $data['Activité'] . "</td>";
                echo "<td>" . $data['adresse bureau'] . "</td>";
                echo "<td>" . $data['disponibilité'] . "</td>";
                echo "<td>" . $data['courrier'] . "</td>";
                echo "<td>" . $data['téléphone'] . "</td>";
                echo "<td><img src='{$row['Photo']}' alt='Photo' width='50'></td>";
                echo "<td><a href='$data' target='_blank'>Voir CV</a></td>";
                echo "</tr>";
            }
            
            echo "</table>";
        }else {
            echo "Aucun responsable trouvé pour cette activité.";
        }
    } else {
        echo "Activité non reconnue.";
    }

    $conn->close();
}
?>

</body>
</html>