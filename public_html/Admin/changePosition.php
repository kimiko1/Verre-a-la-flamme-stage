<?php
// Inclusion des models
require('../../model/BDD.php');

use Model\BDD;

ob_start();

$bdd = BDD::instance();

$position = $_POST['position'];
$finalPosition = $_POST['finalPosition'];
$bdd->updateImgPresentationPosition($position, $finalPosition);
header('Location: index.php');
?>