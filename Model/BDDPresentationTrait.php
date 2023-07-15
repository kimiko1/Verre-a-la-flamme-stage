<?php

namespace Model;

use PDO;

trait BDDPresentationTrait
{
    /**
     * Fonction permettant d'obtenir le texte de présentation.
     */
    public function getPresentation()
    {
        // Construction de la requête SQL
        $requete = "SELECT * FROM Presentation;";

        // Envoi de la requête SQL
        $resultats = $this->bdd->query($requete);

        // Création d'un tableau vide
        $text = array();

        // La requête a renvoyé des éléments ?
        if ($resultats) {
            // Récupération des lignes de la table
            while ($res = $resultats->fetch(PDO::FETCH_ASSOC)) {
                // Chaque enregistrement vient enrichir le tableau.
                $text[] = $res;
            }
        }

        return $text;
    }

    /**
     * Fonction permettant de modifier le texte de présentation.
     */
    public function updatePresentation($text)
    {

        // Construction de la requête SQL
        $requete = "UPDATE Presentation set text=? where id=1;";

        // Préparation de la requête SQL
        $resultats = $this->bdd->prepare($requete);

        // Envoi de la requête SQL
        $resultats->execute([$text]);

    }

    /**
     * Fonction permettant d'obtenir les images de présentation.
     */
    public function getImgPresentation()
    {
        // Construction de la requête SQL
        $requete = "SELECT * FROM imgPresentation ORDER BY position;";

        // Envoi de la requête SQL
        $resultats = $this->bdd->query($requete);

        // Création d'un tableau vide
        $img = array();

        // La requête a renvoyé des éléments ?
        if ($resultats) {
            // Récupération des lignes de la table
            while ($res = $resultats->fetch(PDO::FETCH_ASSOC)) {
                // Chaque enregistrement vient enrichir le tableau.
                $img[] = $res;
            }
        }

        return $img;
    }

    /**
     * Fonction permettant de modifier la source de l'image de présentation séléctionné par l'id.
     */
    public function updateImgPresentation($src, $id)
    {
        // Construction de la requête SQL
        $requete = "UPDATE imgPresentation set src='$src' where id=$id;";

        // Préparation de la requête SQL
        $resultats = $this->bdd->prepare($requete);

        // Envoi de la requête SQL
        $resultats->execute();

    }

    public function updateImgPresentationPosition($position, $finalPosition)
    {
        $tempPosition = $position;
        $tempFinalPosition = $finalPosition;

        // On enregistre dans $requete ce que l'on veut faire.
        $requete = 
        "UPDATE imgPresentation SET position = 0 WHERE position = $tempFinalPosition; 
        UPDATE imgPresentation SET position = $finalPosition WHERE position = $position;
        UPDATE imgPresentation SET position = $tempPosition WHERE position = 0;";

        // Exécution de la requête SQL
        $this->bdd->exec($requete);
    }
    /**
     * Fonction permettant de supprimer l'image de présentation par l'id.
     */
    public function AddImgPresentation($haut, $src, $position)
    {

        // Construction de la requête SQL
        $requete = "INSERT INTO img_presentation('haut', 'src', 'position') VALUE($haut, '$src', $position);";

        // Préparation de la requête SQL
        $resultats = $this->bdd->prepare($requete);

        // Envoi de la requête SQL
        $resultats->execute($requete);

    }
    /**
     * Fonction permettant de supprimer l'image de présentation par l'id.
     */
    public function deleteImgPresentation($id)
    {

        // On prépare la requête
        $requete = $this->bdd->prepare("DELETE FROM imgPresentation WHERE id=$id;");

        // On exécute la requête
        $requete->execute();
    }

    /**
     * Fonction permettant de récupérer le nombre maximum d'image de présentation
     */
    public function getMaxImagePresentation()
    {
        // Construction de la requête SQL
        $requete = "SELECT count(max(*)) FROM imgPresentation;";

        // Envoi de la requête SQL
        $resultats = $this->bdd->query($requete);

        $res = $resultats->execute();

        return $res;
    }
}
?>