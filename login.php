<?php 
 //Nous allons démarrer la session avant toute chose
    session_start() ;
  if(isset($_POST['boutton-valider'])){ // Si on clique sur le boutton , alors :
    //Nous allons verifiér les informations du formulaire
    if(isset($_POST['utilisateur']) && isset($_POST['mot_de_passe'])) { //On verifie ici si l'utilisateur a rentré des informations
      //Nous allons mettres l'email et le mot de passe dans des variables
        $formulaire_utilisateur = $_POST['utilisateur'];
        $formulaire_mot_de_passe = $_POST['mot_de_passe'];
        $erreur = "" ;
       //Nous allons verifier si les informations entrée sont correctes
       //Connexion a la base de données
        $nom_serveur = "localhost";
        $utilisateur = "root";
        $mot_de_passe ="";
        $nom_base_données ="gesteglise";
        $con = mysqli_connect($nom_serveur , $utilisateur ,$mot_de_passe , $nom_base_données);
       //requete pour selectionner  l'utilisateur qui a pour email et mot de passe les identifiants qui ont été entrées
        $req = mysqli_query($con , "SELECT * FROM utilisateur WHERE utilisateur = '$formulaire_utilisateur' AND mot_de_passe ='$formulaire_mot_de_passe' ") ;
        $num_ligne = mysqli_num_rows($req) ;//Compter le nombre de ligne ayant rapport a la requette SQL
        if($num_ligne > 0){
            header("Location:bienvenu.php") ;//Si le nombre de ligne est > 0 , on sera redirigé vers la page bienvenu
            // Nous allons créer une variable de type session qui vas contenir l'email de l'utilisateur
            $_SESSION['utilisateur'] = $formulaire_utilisateur ;
        }else {//si non
            $erreur = "Adresse Mail ou Mots de passe incorrectes !";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | MIAPEVE</title>
    <link rel="stylesheet" href="styles/css/style-connexion.css">
    <link rel="stylesheet" type="text/css" href="src/icones/css/all.css">
</head>
<body>

    <div class="wrapper">
        <?php 
        if(isset($erreur)){// si la variable $erreur existe , on affiche le contenu ;
            echo "<p class= 'Erreur'>".$erreur."</p>"  ;
        }
        ?>
        <form action="" method="POST" class="connexion">
            <h1 class="title_form">Connexion</h1>

            <div class="row">
                <input type="text" name="utilisateur" class="form_input" placeholder="utilisateur" required>
                <label class="form_label">Utilisateur</label>
                <i class="fas fa-user icon-right"></i>
            </div>

            <div class="row">
                <input type="password" name="mot_de_passe" class="form_input" placeholder="mot de passe" required>
                <label class="form_label">Mot de passe</label>
                <i class="fas fa-lock icon-right"></i>
            </div>

            <input type="submit" value="connexion" class="form_button" name="boutton-valider">
        </form>
    </div>
</body>
</html>
