<?php

namespace Model;

use PDO;

trait BDDHoraireTrait
{
    /**
     * Fonction permettant d'obtenir les horaires.
     */
    public function getHoraires()
    {
        // Construction de la requête SQL
        $requete = "SELECT * FROM horaires";

        // Envoi de la requête SQL
        $resultats = $this->bdd->query($requete);

        // Création d'un tableau vide
        $horaires = array();

        // La requête a renvoyé des éléments ?
        if ($resultats) {
            // Récupération des lignes de la table
            while ($res = $resultats->fetch(PDO::FETCH_ASSOC)) {
                // Chaque enregistrement vient enrichir le tableau.
                $horaires[] = $res;
            }
        }

        return $horaires;
    }
}
?>