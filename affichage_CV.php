
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #333;
            color: white;
            text-align: center;
        }
        .back-button {
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            border: none;
            font-size: 16px;
            background-color: green;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>CV</h1>
    <div id="person-info"></div>

    <script>
        function loadXMLDoc(filename) {
            return new Promise((resolve, reject) => {
                const xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        resolve(this.responseXML);
                    } else if (this.readyState == 4) {
                        reject("Failed to load XML file");
                    }
                };
                xhttp.open("GET", filename, true);
                xhttp.send();
            });
        }

        function displayPersonInfo(xml) {
            const person = xml.getElementsByTagName("personne")[0];
            const name = person.getElementsByTagName("nom")[0].textContent;
            const phone = person.getElementsByTagName("telephone")[0].textContent;
            const email = person.getElementsByTagName("email")[0].textContent;
            const address = person.getElementsByTagName("adresse")[0].textContent;
            const profile = person.getElementsByTagName("profil")[0].textContent;
            const competences = person.getElementsByTagName("competence")[0].textContent;
            const experiences = person.getElementsByTagName("experience")[0].textContent;

            const personInfo = `
                <h2>${name}</h2>
                <p>Téléphone: ${phone}</p>
                <p>Email: ${email}</p>
                <p>Address: ${address}</p>
                <p>Profile: ${profile}</p>
                <p>Competences: ${competences}</p>
                <p>Experiences: ${experiences}</p>
            `;

            document.getElementById("person-info").innerHTML = personInfo;
        }

        // Nouvelle fonction pour générer le nom du fichier XML en fonction des données XML
        function getXMLFileName() {
            <?php showResponsibleDetails('basketball'); ?>
            //condition si on veut que le nom de phpmyadmin soit 
            //if(name == $nom ?>){
                // Vous pouvez remplacer cette logique par celle que vous avez décrite
                // Pour l'exemple, je vais simplement utiliser une valeur statique.
                //const xmlNamePrefix = "CV"; // Prefixe du nom du fichier XML
                //const xmlNameSuffix = " $ID ?>"; // Suffixe du nom du fichier XML
            //}
            //else{
            //
                const xmlNamePrefix = "CV"; // Prefixe du nom du fichier XML

                //modifier le chiffre suivant ces infos :'Musculation' => 1,'Fitness' => 2,'Biking' => 3,'Cardio-Training' => 4,'Cours Collectifs' => 5,'Basketball' => 6,'Football' => 7,'Rugby' => 8,'Tennis' => 9,'Natation' => 10,'Plongeon' => 11
                const xmlNameSuffix = "1"; // Suffixe du nom du fichier XML
            //}
            const xmlName = `${xmlNamePrefix}_${xmlNameSuffix}.xml`;
            return xmlName;
        }

        const xmlFileName = getXMLFileName();
        loadXMLDoc(xmlFileName)
            .then(xml => displayPersonInfo(xml))
            .catch(error => console.error(error));
    </script>
    <br>
    <a class="back-button" href="...">Retour</a>

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
        $nom = $_POST['Nom'];
        $activite = $_POST['Activité'];
        $adresse_bureau = $_POST['adresse bureau'];
        $disponibilite = $_POST['disponibilité'];
        $courrier = $_POST['courrier'];
        $telephone = $_POST['téléphone'];
        $photo = $_POST['Photo'];
        $cv = $_POST['CV'];
        $ID = $_POST['ID'];
    }
    
    $conn->close();
}
?>

</body>
</html>
