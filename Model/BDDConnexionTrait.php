<?php

namespace Model;

use PDO;

trait BDDConnexionTrait
{
    /**
     * Fonction permettant de vérifier la connexion de l'utilisateur.
     */
    public function getUser(){
        // // Construction de la requête SQL
        // $requete = "SELECT * FROM users";

        // // Envoi de la requête SQL
        // $resultats = $this->bdd->query($requete);

        // // Création d'un tableau vide
        // $devoirs = array();

        // // La requête a renvoyé des éléments ?
        // if ($resultats) {
        //     // Récupération des lignes de la table
        //     while ($res = $resultats->fetch(PDO::FETCH_ASSOC)) {
        //         // Chaque enregistrement vient enrichir le tableau.
        //         $devoirs[] = $res;
        //     }
        // }

        // return $devoirs;
        // A modifier pour récupérer la saisie dans le formulaire de connexion afin de pour connecter l'utilisateur.
    }
}
?>