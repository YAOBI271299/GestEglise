<?php
// Afficher les erreurs pour debug (à retirer en production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_POST['utilisateur']) && isset($_POST['mot_de_passe'])) {

    $formulaire_utilisateur = $_POST['utilisateur'];
    $formulaire_mot_de_passe = $_POST['mot_de_passe'];

    // Connexion à la base
    $nom_serveur = 'localhost';
    $utilisateur = 'root';
    $mot_de_passe = '';
    $nom_base_donnees = 'GestEglise';

    $con = mysqli_connect($nom_serveur, $utilisateur, $mot_de_passe, $nom_base_donnees);

    if (!$con) {
        die("Erreur de connexion à MySQL : " . mysqli_connect_error());
    }

    // Requête SQL pour vérifier l'utilisateur
    $req = mysqli_query($con, 
        "SELECT * FROM utilisateur WHERE utilisateur = '$formulaire_utilisateur' AND mot_de_passe = '$formulaire_mot_de_passe'");

    if (mysqli_num_rows($req) > 0) {
        // Enregistrer l'utilisateur dans la session
        $_SESSION['utilisateur'] = $formulaire_utilisateur;

        // Rediriger vers la page de bienvenue
        header("Location: bienvenu.php");
        exit();
    } else {
        echo "<p style='color:red; text-align:center;'>Nom d'utilisateur ou mot de passe incorrect.</p>";
        echo "<p style='text-align:center;'><a href='connexion.php'>Retour à la connexion</a></p>";
    }

    mysqli_close($con);

} else {
    echo "<p style='color:red; text-align:center;'>Veuillez remplir tous les champs.</p>";
    echo "<p style='text-align:center;'><a href='connexion.php'>Retour</a></p>";
}
?>
