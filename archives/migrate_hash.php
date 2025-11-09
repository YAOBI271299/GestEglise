<?php
// migrate_hash.php - Exécutez une seule fois
ini_set('display_errors', 1); error_reporting(E_ALL);

$con = mysqli_connect('localhost', 'root', '', 'gesteglise');
if (!$con) { die("Connexion impossible : " . mysqli_connect_error()); }

$sql = "SELECT id, mot_de_passe FROM utilisateur";
$res = mysqli_query($con, $sql);
if (!$res) { die("Erreur lecture: " . mysqli_error($con)); }

while ($row = mysqli_fetch_assoc($res)) {
    $id = (int)$row['id'];
    $mot = $row['mot_de_passe'];

    // Si déjà haché (approximation : bcrypt/argon hash sont longs)
    if (strlen($mot) >= 60 && (strpos($mot, '$2y$') === 0 || strpos($mot, '$argon') !== false)) {
        // on considère que c'est déjà haché
        continue;
    }

    $hash = password_hash($mot, PASSWORD_DEFAULT);

    $upd = mysqli_prepare($con, "UPDATE utilisateur SET mot_de_passe = ? WHERE id = ?");
    mysqli_stmt_bind_param($upd, "si", $hash, $id);
    mysqli_stmt_execute($upd);
    mysqli_stmt_close($upd);
}

mysqli_free_result($res);
mysqli_close($con);
echo "Migration terminée.";
?>
