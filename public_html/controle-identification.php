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
require '../model/Cookie.php';
require '../model/BDD.php';

// Inclusion des espaces de nommage utilisés dans notre code.
use Model\BDD;
use Model\Cookie;

// Si la requête POST contient mail et mot_de_passe, on vérifie dans la base.
if (isset($_POST["mail"]) && isset($_POST["mot_de_passe"])) {
    // Requête sur les utilisateurs
    $bdd = BDD::instance();
    $user = $bdd->getUser($_POST["mail"], $_POST["mot_de_passe"]);

    if ($user != null) {
        // L'utilisateur est validé
        Cookie::update_cookie('id', $user['id']);
        Cookie::update_cookie('prenom', $user['surname']);
        Cookie::update_cookie('nom', $user['name']);
        Cookie::update_cookie('role', $user['role']);

        // On recharge la page maintenant que les cookies sont initialisés.
        header('Location: .');

    } else {

        // Mauvais utilisateur. On supprime les cookies
        Cookie::clean_cookie('id');
        Cookie::clean_cookie('prenom');
        Cookie::clean_cookie('nom');
        Cookie::clean_cookie('role');

        // Retour à la page de connection du site.
        header("Location: connexion.php");
    }

    die();

} else if (Cookie::cookieIsSet('id') &&
    Cookie::cookieIsSet('prenom') &&
    Cookie::cookieIsSet('nom') &&
    Cookie::cookieIsSet('role')) {

    // Mise à jour des cookies pour relancer les compteurs
    Cookie::update_cookie('id');
    Cookie::update_cookie('prenom');
    Cookie::update_cookie('nom');
    Cookie::update_cookie('role');

} else {

    Cookie::clean_cookie('id');
    Cookie::clean_cookie('prenom');
    Cookie::clean_cookie('nom');
    Cookie::clean_cookie('role');

    // Retour à la page de connection du site.
    header("Location: connexion.php");
    die();
}