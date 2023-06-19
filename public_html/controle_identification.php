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
if (isset($_POST['valid_connection'])) {
    // Requête sur les utilisateurs
    $bdd = BDD::instance();
    $user = $bdd->utilisateur($_POST["mail"], $_POST["mot_de_passe"]);
    if ($user != false) {
        if ($user['user_admin'] == 1) {
            $bdd->clean_php_session();
            session_start();
            $_SESSION['email'] = $user['user_mail'];
            $_SESSION['password'] = $user['user_password'];
            $_SESSION['admin'] = $user['user_admin'];
            header('Location: ./Admin/index.php');
    
        } else {
            $bdd->clean_php_session();
            session_start();
            $_SESSION['email'] = $user['user_mail'];
            $_SESSION['password'] = $user['user_password'];
            $_SESSION['admin'] = $user['user_admin'];
            header('Location: ./index.php');
        }
    }
    else {
        header('Location: ./connexion.php');
    }

}
else {
    $bdd = BDD::instance();
    $user = $bdd->utilisateur($_POST["mail"], $_POST["mot_de_passe"]);
    if ($user===false) {
        $bdd->ajouterUtilisateur($_POST["mail"], $_POST["mot_de_passe"]);
        header('Location: ./connexion.php');
    }
    else{
        header('Location: ./connexion.php');
    }
}