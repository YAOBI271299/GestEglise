<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header("Location: login.php");
    exit();
}
$utilisateur = $_SESSION['utilisateur'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue | MIAPEVE</title>
    <link rel="stylesheet" href="styles/css/style-bienvenu.css">
</head>
<body>

<div class="container">
    <div class="welcome-box">
        <h1>👋 Bienvenue, <span><?= htmlspecialchars($utilisateur) ?></span> !</h1>
        <p>Chargement de votre tableau de bord...</p>
        <div class="loader"></div>
    </div>
</div>

<!-- Redirection automatique après 3 secondes -->
<script>
    setTimeout(function() {
        window.location.href = "tableau_de_bord.php";
    }, 3000);
</script>

</body>
</html>
