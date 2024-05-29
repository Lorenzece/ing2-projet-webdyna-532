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
    <div class="activity" onclick="showResponsible('musculation')">
        <h2>Musculation</h2>
        <div class="responsible" id="responsible-musculation">
            <h3>responsable de cette activité : <a href="javascript:void(0)" onclick="showDetails('musculation')">voir responsable</a></h3>
            <div class="details" id="details-musculation">
                <?php showResponsibleDetails('musculation'); ?>
            </div>
        </div>
    </div>
    <div class="activity" onclick="showResponsible('fitness')">
        <h2>Fitness</h2>
        <div class="responsible" id="responsible-fitness">
            <h3>responsable de cette activité : <a href="javascript:void(0)" onclick="showDetails('fitness')">voir responsable</a></h3>
            <div class="details" id="details-fitness">
                <?php showResponsibleDetails('fitness'); ?>
            </div>
        </div>
    </div>
    <div class="activity" onclick="showResponsible('biking')">
        <h2>Biking</h2>
        <div class="responsible" id="responsible-biking">
            <h3>responsable de cette activité : <a href="javascript:void(0)" onclick="showDetails('biking')">voir responsable</a></h3>
            <div class="details" id="details-biking">
                <?php showResponsibleDetails('biking'); ?>
            </div>
        </div>
    </div>
    <div class="activity" onclick="showResponsible('cardio-training')">
        <h2>Cardio-Training</h2>
        <div class="responsible" id="responsible-cardio-training">
            <h3>responsable de cette activité : <a href="javascript:void(0)" onclick="showDetails('cardio-training')">voir responsable</a></h3>
            <div class="details" id="details-cardio-training">
                <?php showResponsibleDetails('cardio-training'); ?>
            </div>
        </div>
    </div>
    <div class="activity" onclick="showResponsible('cours-collectifs')">
        <h2>Cours Collectifs</h2>
        <div class="responsible" id="responsible-cours-collectifs">
            <h3>responsable de cette activité : <a href="javascript:void(0)" onclick="showDetails('cours-collectifs')">voir responsable</a></h3>
            <div class="details" id="details-cours-collectifs">
                <?php showResponsibleDetails('cours-collectifs'); ?>
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

    $activityIds = [
        'musculation' => 1,
        'fitness' => 2,
        'biking' => 3,
        'cardio-training' => 4,
        'cours-collectifs' => 5
    ];

    if (array_key_exists($activity, $activityIds)) {
        $id = $activityIds[$activity];

        $sql = "SELECT * FROM coach WHERE ID = $id";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            echo '<table class="center" border="1">';
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
                echo "<td><img src='" . $data['Photo'] . "' alt='Photo'></td>";
                echo "<td><a href='" . $data['cv'] . "' target='_blank'>Voir CV</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
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