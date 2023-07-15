<?php
ob_start();

// Inclusion des models
require('../../model/BDD.php');

// Inclusion des espaces de nommage utilisés dans notre code
use Model\BDD;

// On récupère les horaires de la base de données.
$bdd = BDD::instance();

$id = $_POST["id"];

$bdd->deleteImgPresentation($id);

header('Location: index.php');
?>