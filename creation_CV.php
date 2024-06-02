<?php
// Fonction pour créer et enregistrer les informations dans un fichier XML
function createXMLFile($nom, $phone, $email, $address, $profile, $skills, $workExperiences) {
    $baseFilename = 'CVbis';
    $extension = '.xml';
    $filename = $baseFilename . $extension;
    $counter = 1;

    // Trouver un nom de fichier qui n'existe pas encore
    while (file_exists($filename)) {
        $filename = $baseFilename . '_' . $counter . $extension;
        $counter++;
    }

    // Création d'un nouvel objet SimpleXMLElement
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><personne></personne>');

    // Ajout des éléments au XML
    $xml->addChild('nom', $nom);
    $xml->addChild('telephone', $phone);
    $xml->addChild('email', $email);
    $xml->addChild('adresse', $address);
    $xml->addChild('profil', $profile);
    
    $competences = $xml->addChild('competences');
    foreach ($skills as $skill) {
        $competences->addChild('competence', $skill);
    }

    $experiences = $xml->addChild('experiences_professionnelles');
    foreach ($workExperiences as $experience) {
        $experiences->addChild('experience', $experience);
    }

    // Enregistrement du XML dans un fichier
    $xml->asXML($filename);

    return "Informations enregistrées avec succès dans le fichier $filename.";
}

// Initialiser le message de succès
$message = "";

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST["nom"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $adresse = $_POST["adresse"];
    $profil = $_POST["profil"];
    $competences = explode(",", $_POST["competences"]);
    $experiences_professionnelles = explode(",", $_POST["experiences_professionnelles"]);

    // Appel de la fonction pour créer et enregistrer le fichier XML
    $message = createXMLFile($nom, $telephone, $email, $adresse, $profil, $competences, $experiences_professionnelles);
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Enregistrer CV</title>
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
        form {
            background-color: #333;
            color: white;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
        }
        form input, form button {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
        }
        .back-button{
            color: white;
            background-color: green;
            padding: 10px 20px; /* Augmenter le padding */
            font-size: 18px; /* Augmenter la taille de la police */
        }
        .admin-form input.input-large {
            width: 600px; /* Ajuster la largeur */
                height: 200px; /* Ajuster le nombre de lignes */
        }

    </style>
</head>
<body>
    <header>
        <span class="title"><h2>Espace-Administrateur: Enregistrement CV</h2></span>
        <h2>Entrez les informations :</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Prénom/Nom : <input type="text" name="nom" placeholder="nom" required><br>
            Téléphone : <input type="text" name="telephone" placeholder="telephone" required><br>
            Email : <input type="email" name="email" placeholder="email" required><br>
            Adresse : <input type="text" name="adresse" placeholder="adresse" required><br>
            Profil/sport : <input type="text" name="profil" placeholder="profil" required><br><br>
            Compétences (développer) : <br>
            <textarea class="input-large" name="competences" rows="4" required></textarea><br><br>
            Expériences (développer) : <br>
            <textarea class="input-large" name="experiences_professionnelles" rows="4" required></textarea><br><br>
            <a class="back-button" href="modifier_info_coach.php">Enregistrer</a>
        </form>
        <?php
        // Afficher le message de succès s'il existe
        if (!empty($message)) {
            echo '<div class="success-message">' . $message . '</div>';
        }
        ?>
    </header>
</body>
</html>