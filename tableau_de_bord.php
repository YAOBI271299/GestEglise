<?php
session_start();
if (!isset($_SESSION['utilisateur'])) {
    header("Location: login.php");
    exit();
}
$utilisateur = $_SESSION['utilisateur'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/css/style-tableau_de_bord.css">
    <link rel="stylesheet" type="text/css" href="src/icones/css/all.css">
    <link rel="stylesheet" href="styles/css/remixicon.css" href="src/icones/bootstrap-icons-1.13.1">

    <title>Tableau de Bord</title>
</head>
<body class="">
    <nav>
        <div class="logo-nom">
            <div class="logo-image">
                <img src="src/images/Logo Miapeve.png" alt="">
            </div>
            
            <span class="logo_nom">FinChurch</span>
        </div>

        <div class="menu-icones">
            <ul class="nav-liens">
                <li>
                    <a href="menu.php">
                        <i class="fa-regular fa-house"></i>
                        <span class="liens-menu">Tableau de bord</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="liens-comptabilité">
                        <i class="fa-solid fa-file-invoice"></i>
                        <span class="liens-menu">Comptabilité</span>
                    </a>
                    <ul class="sous-menu">
                        <li>
                            <a href="Jour_du_Seigneur.php">
                                <i class="fa-solid fa-book"></i>
                                <span class="liens-sous-menu">Jour du Seigneur</span>
                            </a>
                        </li>
                    </ul>
                    
                </li>

                <li>
                    <a href="etat.php">
                        <i class="fa-solid fa-box-archive"></i>
                        <span class="liens-menu">Etat </span>
                    </a>
                </li>
                <li>
                    <a href="paramettre.php">
                        <i class="fa-solid fa-gears"></i>
                        <span class="liens-menu">Paramettre</span>
                    </a>
                </li>
            </ul>

            <ul class="mode-deconnexion">
                <li >
                    <a href="deconnexion.php" >
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="liens-menu">Déconnexion</span>
                    </a>
                </li>

                <li class="mode">
                    <a href="#">
                        <i class="fa-regular fa-moon"></i>
                        <span class="liens-menu">Mode sombre</span>
                    </a>

                    <div class="mode-sombre">
                        <span class="commutateur"></span>
                    </div>
                </li>
            </ul>

        </div>
    </nav>
    <section class="tableau_de_bord">
        <div class="top">
            <i class="fa-solid fa-bars sidebar-toggle"></i>

            <div class="recherche">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Recherche ...">
            </div>
        </div>

        <img src="" alt="">
    </section>

    <script src="styles/js/script_tableau_de_bord.js" ></script>
    
</body>
</html>