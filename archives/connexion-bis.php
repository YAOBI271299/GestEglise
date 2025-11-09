<?php
// Afficher les erreurs pour debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['utilisateur']) && isset($_POST['mot_de_passe'])) {

    $formulaire_utilisateur = $_POST['utilisateur'];
    $formulaire_mot_de_passe = $_POST['mot_de_passe'];


    $nom_serveur = 'localhost';
    $utilisateur = "root";
    $mot_de_passe = "";
    $nom_base_donées = "GestEglise";

    $con = mysqli_connect($nom_serveur, $utilisateur,$mot_de_passe, $nom_base_donées);
    
        // Vérifier la connexion
    if (mysqli_connect_errno()) {
        // En cas d'échec, affiche l'erreur au lieu de la page blanche
        die("Échec de la connexion à MySQL: " . mysqli_connect_error());
    }

    // Requête sécurisée avec mysqli_prepare pour éviter l'injection SQL
    $stmt = mysqli_prepare($con, "SELECT mot_de_passe FROM utilisateur WHERE utilisateur = ?");
    mysqli_stmt_bind_param($stmt, "s", $formulaire_utilisateur);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if(mysqli_stmt_num_rows($stmt) == 1){
        mysqli_stmt_bind_result($stmt, $hash_en_base);
        mysqli_stmt_fetch($stmt);
    
    //$req = mysqli_query($con , "SELECT * FROM utilisateur WHERE utilisateur= '$formulaire_utilisateur' AND mot_de_passe = '$formulaire_mot_de_passe' " );
    
     // Vérification du mot de passe haché
        if(password_verify($formulaire_mot_de_passe, $hash_en_base)){
            // Mot de passe correct → redirection
            header("Location: bienvenu.php");
            exit();
        } else {
            echo "Mot de passe incorrect !";
        }
    } else {
        echo "Utilisateur introuvable !";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}

?>