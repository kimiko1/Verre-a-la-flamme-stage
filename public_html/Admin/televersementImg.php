<?php
// Inclusion des models
require('../../model/BDD.php');

use Model\BDD;

ob_start();

$bdd = BDD::instance();

// On a soumis un formulaire un POST avec un champ "submit"?
if (isset($_POST["submit"])) {
    // On vérifie l'extension de fichier
    $fileType = pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);
    if ($fileType == "png") {
        $src = 'img/Presentation/' . $_POST['nom_du_fichier'] . ".png";

        // Répertoire de destination pour les téléversements.
        $target_dir = "../img/Presentation/";

        // Construction du chemin du fichier final.
        $target_file = $target_dir . $_POST['nom_du_fichier'] . ".png";

        // On déplace le fichier temporaire vers la destination finale.
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }
    if ($fileType == "JPG") {
        $src = 'img/Presentation/' . $_POST['nom_du_fichier'] . ".JPG";
        
        // Répertoire de destination pour les téléversements.
        $target_dir = "../img/Presentation/";

        // Construction du chemin du fichier final.
        $target_file = $target_dir . $_POST['nom_du_fichier'] . ".JPG";

        // Si un fichier du même nom existe sur le serveur, on le supprime.
        if (file_exists($target_file)) {
            @unlink($target_file);
        }

        // On déplace le fichier temporaire vers la destination finale.
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }
}
$id = $_POST['id'];
$bdd->updateImgPresentation($src, $id);
$bdd->updateImgPresentationPosition($_POST['position'], $_POST['finalPosition']);
header('Location: index.php');
?>