<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: Page_Connexion.html");
    exit();
}

$servername = "localhost";
$username = "root2";
$password = "root";
$dbname_projet = "projet";
$dbname_paiement = "paiement";

$conn_projet = new mysqli($servername, $username, $password, $dbname_projet);
$conn_paiement = new mysqli($servername, $username, $password, $dbname_paiement);

$email = $_SESSION['email'];

$sql = "SELECT name, adresse, email, carte_etudiant FROM login WHERE email = ?";
$stmt = $conn_projet->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$sql = "SELECT type_carte, numero_carte, date_expiration, code_securite, nom_sur_carte FROM detailspaiement WHERE paiement_id = 1";
$stmt = $conn_paiement->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$paiement = $result->fetch_assoc();

$conn_projet->close();
$conn_paiement->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportify: Votre Compte - Client</title>
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
        .hidden-info {
            color: #1DB954;
            cursor: pointer;
        }
        .hidden-content {
            display: none;
        }
        footer {
            background-color: #282828;
            text-align: center;
            padding: 20px 0;
            border-top: 2px solid #1DB954;
            color: #b3b3b3;
        }
    </style>
    <script>
        function togglePaymentInfo() {
            var info = document.getElementById("payment-info");
            if (info.style.display === "none") {
                info.style.display = "block";
            } else {
                info.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <div class="wrapper">
        <header>
            <h1>Votre Compte - Client</h1>
        </header>
        <nav>
            <a href="client.php">Accueil</a>
            <a href="Page_NoLogin.html">Déconnexion</a>
        </nav>
        <div class="content">
            <div class="section">
                <h2>Informations du Compte</h2>
                <div class="card">
                    <p><strong>Nom/Prénom:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
                    <p><strong>Adresse:</strong> <?php echo htmlspecialchars($user['adresse']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                    <p><strong>Carte Etudiante:</strong> <?php echo htmlspecialchars($user['carte_etudiant']); ?></p>
                    <?php if ($paiement): ?>
                        <p><strong>Informations de paiement:</strong> <span class="hidden-info" onclick="togglePaymentInfo()">Cliquez pour voir</span></p>
                        <div id="payment-info" class="hidden-content">
                            <p><strong>Type de Carte:</strong> <?php echo htmlspecialchars($paiement['type_carte']); ?></p>
                            <p><strong>Numéro de Carte:</strong> <?php echo str_repeat('*', strlen($paiement['numero_carte']) - 4) . substr($paiement['numero_carte'], -4); ?></p>
                            <p><strong>Date d'Expiration:</strong> <?php echo htmlspecialchars($paiement['date_expiration']); ?></p>
                            <p><strong>Code de Sécurité:</strong> ***</p>
                            <p><strong>Titulaire de la Carte:</strong> <?php echo htmlspecialchars($paiement['nom_sur_carte']); ?></p>
                        </div>
                    <?php else: ?>
                        <p>Aucune information de paiement disponible.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <footer>
            <p>Contactez-nous par mail, téléphone, ou visitez-nous à notre adresse physique.</p>
        </footer>
    </div>
</body>
</html>
