<?php
ob_start();

// Inclusion des models
require('../../model/BDD.php');

// Inclusion des espaces de nommage utilisés dans notre code
use Model\BDD;

// On récupère les horaires de la base de données.
$bdd = BDD::instance();

var_dump($_POST);

$jour = $_POST["jour"];

$horaire = $_POST["horaire"];

$update = $bdd->updateHoraires($jour, $horaire);

$_POST['message'] = "Félication";

header('Location: index.php');
?>