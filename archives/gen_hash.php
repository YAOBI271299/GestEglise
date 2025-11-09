<?php
// gen_hash.php - génère un hash à copier-coller
if (isset($_POST['plain'])) {
    $plain = $_POST['plain'];
    $hash = password_hash($plain, PASSWORD_DEFAULT);
    echo "<p>Hash généré (copiez-le) :</p><textarea cols='80' rows='3' readonly>" . htmlspecialchars($hash) . "</textarea>";
    echo "<p>Exemple SQL à copier (remplace <HASH_ADMIN> par ce hash) :</p>";
    echo "<pre>INSERT INTO utilisateur (utilisateur, mot_de_passe) VALUES ('admin', '" . htmlspecialchars($hash) . "');</pre>";
    exit;
}
?>
<form method="post">
 Mot de passe admin à hacher: <input name="plain" type="text" />
 <button type="submit">Générer</button>
</form>
