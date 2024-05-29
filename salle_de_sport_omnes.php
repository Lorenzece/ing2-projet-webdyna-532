<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Salle de sport Omnes - Sportify</title>
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
        .menu {
            background-color: green;
            padding: 10px;
            text-align: center;
        }
        .menu a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: inline-block;
        }
        .menu a:hover {
            background-color: white;
            color: green;
        }
        .section {
            margin: 20px 0;
            text-align: left;
        }
        .responsible {
            background-color: green;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
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
        .return-button {
            background-color: green;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }
        .return-button:hover {
            background-color: white;
            color: green;
        }
    </style>
    <script>
        function showDetails(activity) {
            var detailsDiv = document.getElementById('details-' + activity);
            detailsDiv.style.display = detailsDiv.style.display === 'block' ? 'none' : 'block';
        }
    </script>
</head>
<body>
    <div class="menu">
        <a href="salle_de_sport_omnes.php">Salle de sport Omnes</a>
        <!-- Ajoutez d'autres éléments de menu ici -->
    </div>
    <div class="container">
        <h1>Salle de sport Omnes</h1>

        <div class="section">
            <h2>Services Disponibles</h2>
            <ul>
                <li>
                    <strong>Règles sur l’utilisation des machines</strong>
                    <p><strong>Q:</strong> Puis-je utiliser les machines librement?<br>
                    <strong>R:</strong> Oui, mais veuillez respecter les autres utilisateurs et suivre les instructions affichées sur chaque machine.</p>
                    
                    <p><strong>Q:</strong> Dois-je nettoyer les machines après utilisation?<br>
                    <strong>R:</strong> Oui, il est obligatoire de désinfecter les machines après chaque utilisation pour garantir l'hygiène.</p>

                    <p><strong>Q:</strong> Puis-je réserver une machine?<br>
                    <strong>R:</strong> Non, les machines sont disponibles selon le principe du premier arrivé, premier servi.</p>
                </li>
                <li>
                    <strong>Horaire de la gym</strong>
                    <p><strong>Q:</strong> Quels sont les horaires d'ouverture de la salle de sport?<br>
                    <strong>R:</strong> La salle de sport est ouverte du lundi au vendredi de 6h00 à 22h00, et le samedi de 8h00 à 20h00. Elle est fermée le dimanche.</p>
                    
                    <p><strong>Q:</strong> Y a-t-il des heures réservées pour les cours?<br>
                    <strong>R:</strong> Oui, les cours collectifs ont lieu de 18h00 à 20h00 en semaine. Veuillez consulter le planning affiché pour plus de détails.</p>

                    <p><strong>Q:</strong> Puis-je accéder à la salle de sport en dehors des heures d'ouverture?<br>
                    <strong>R:</strong> Non, pour des raisons de sécurité, l'accès est strictement limité aux heures d'ouverture.</p>
                </li>
                <li>
                    <strong>Questionnaires pour les nouveaux utilisateurs</strong>
                    <p><strong>Q:</strong> Pourquoi dois-je remplir un questionnaire?<br>
                    <strong>R:</strong> Le questionnaire nous aide à comprendre vos besoins et à adapter nos services en conséquence.</p>

                    <p><strong>Q:</strong> Que contient le questionnaire?<br>
                    <strong>R:</strong> Il contient des questions sur votre état de santé général, vos objectifs de fitness, et vos expériences passées en salle de sport.</p>

                    <p><strong>Q:</strong> Comment puis-je remplir le questionnaire?<br>
                    <strong>R:</strong> Vous pouvez remplir le questionnaire en ligne sur notre site web ou en version papier disponible à l'accueil.</p>
                </li>
                <!-- Ajoutez d'autres services ici -->
            </ul>
        </div>

        <div class="section">
            <h2>Coordonnées des Responsables</h2>
            <?php
            // Nom de la base de données
            $database = "coach";

            // Connexion au serveur
            $db_handle = mysqli_connect('localhost', 'root', 'root');

            if ($db_handle) {
                $db_found = mysqli_select_db($db_handle, $database);

                // Si la base de données existe, faire le traitement
                if ($db_found) {
                    $sql = "SELECT * FROM coach";
                    $result = mysqli_query($db_handle, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "<div class='responsible' onclick=\"showDetails('" . htmlspecialchars($data['Nom']) . "')\">";
                            echo "<h3>Responsable : " . htmlspecialchars($data['Nom']) . "</h3>";
                            echo "<div class='details' id='details-" . htmlspecialchars($data['Nom']) . "'>";
                            echo "<table>";
                            echo "<tr><td>Nom:</td><td>" . htmlspecialchars($data['Nom']) . "</td></tr>";
                            echo "<tr><td>Activité:</td><td>" . htmlspecialchars($data['Activité']) . "</td></tr>";
                            echo "<tr><td>Adresse bureau:</td><td>" . htmlspecialchars($data['adresse bureau']) . "</td></tr>";
                            echo "<tr><td>Disponibilité:</td><td>" . htmlspecialchars($data['disponibilité']) . "</td></tr>";
                            echo "<tr><td>Courrier:</td><td>" . htmlspecialchars($data['courrier']) . "</td></tr>";
                            echo "<tr><td>Téléphone:</td><td>" . htmlspecialchars($data['téléphone']) . "</td></tr>";
                            $photoPath = htmlspecialchars($data['Photo']);
                            echo "<tr><td>Photo:</td><td><img src='$photoPath' alt='Photo'></td></tr>";
                            echo "<tr><td>CV:</td><td><a href='" . htmlspecialchars($data['cv']) . "' target='_blank'>Voir CV</a></td></tr>";
                            echo "</table>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "Aucun responsable trouvé.";
                    }
                } else {
                    echo "Base de données non trouvée";
                }

                // Fermer la connexion
                mysqli_close($db_handle);
            } else {
                die("Échec de la connexion au serveur : " . mysqli_connect_error());
            }
            ?>
        </div>

        <a href="javascript:history.back()" class="return-button">Retour tout parcourir</a>
    </div>
</body>
</html>