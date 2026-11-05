<?php 
include('inc/head.php'); 

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if ($_POST['edit'] === 'remplacer') {
        if (file_exists($_GET['q'])) {
            $myfile = fopen($_GET['q'], 'w');
        $txt = $_POST['editText'] . "\n";
        fwrite($myfile, $txt);
        fclose($myfile);
        } else echo 'Fichier introuvable';
    }
    if ($_POST['edit'] === 'ajouter') {
        if (file_exists($_GET['q'])) {
            $myfile = fopen($_GET['q'], 'a') or die("Fichier impossible à ouvrir");
            $txt = "\n" . $_POST['editText'] . "\n";
            fwrite($myfile, $txt);
            fclose($myfile);
        } else echo 'Fichier introuvable';
    }
    header('Location: index.php');
}


?>

<a href="index.php">Retour</a>
<form method="post">
    <textarea name="editText" placeholder="Tapez votre texte ..."></textarea><br>
    <label for="remplacer">Remplacer</label>
    <input type="radio" id="remplacer" name="edit" value="remplacer">
    <label for="ajouter">Ajouter</label>
    <input type="radio" id="ajouter" name="edit" value="ajouter" checked>
    <button type="submit" name="editButton">Valider</button>

</form>



<?php
include('inc/foot.php'); ?>