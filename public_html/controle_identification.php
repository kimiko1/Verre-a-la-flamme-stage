<?php
/******************************************************************************
 *
 *  S C R I P T    D E    C O N T R O L E    D ' I D E N T I F I C A T I O N
 *
 *  Ce script est à inclure en entête des pages d'administration. Il se charge
 *  de vérifier si on est bien connecté et si la connection n'a pas expirée.
 */

ob_start();

 // Inclusion des espaces de nommage utilisés dans notre code
require '../model/BDD.php';

// Inclusion des espaces de nommage utilisés dans notre code.
use Model\BDD;

// Si la requête POST contient mail et mot_de_passe, on vérifie dans la base.
if (isset($_POST["mail"]) && isset($_POST["mot_de_passe"])) {
    // Requête sur les utilisateurs
    $bdd = BDD::instance();
    $user = $bdd->utilisateur($_POST["mail"], $_POST["mot_de_passe"]);
    if ($user['user_admin'] == 1) {
        header('Location: ./Admin/index.php');

    } else {
        header("Location: ./index.php");
    }

    die();

}