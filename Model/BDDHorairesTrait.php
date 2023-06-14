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
        $requete = "SELECT * FROM horaires;";

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
    public function updateHoraires($jour, $horaire)
    {

        // Construction de la requête SQL
        $requete = "UPDATE horaires set horaire=? where Jours = ?;";

        // Préparation de la requête SQL
        $resultats = $this->bdd->prepare($requete);
        
        // Envoi de la requête SQL
        $resultats->execute([$horaire, $jour]);

    }
    public function getMois()
    {
        // Construction de la requête SQL
        $requete = $this->bdd->prepare("SELECT Mois FROM horaires where Jours='Lundi';");

        // Envoi de la requête SQL
        $requete->execute();

        $result = $requete->fetchAll();
        return $result;
    }
    public function updateMois($Mois)
    {

        // Construction de la requête SQL
        $requete = "UPDATE horaires set Mois=?;";

        // Préparation de la requête SQL
        $resultats = $this->bdd->prepare($requete);
        
        // Envoi de la requête SQL
        $resultats->execute([$Mois]);
        
    }
}
?>