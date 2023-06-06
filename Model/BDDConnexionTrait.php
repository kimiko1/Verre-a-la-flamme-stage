<?php

namespace Model;

use PDO;

trait BDDConnexionTrait
{
    /**
     * Fonction permettant de vérifier la connexion de l'utilisateur.
     */
    public function getUser($mail, $motDePasse)
    {
        // Construction de la requête SQL
        $req = $this->bdd->prepare("select * from Users where mail =:email");
        // Envoi de la requête SQL
        $req->bindParam(':email', $mail);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);

        // On vérifie si le mot de passe est correct
        if (password_verify($motDePasse, $res['mdp'])) {
            // On retourne les informations de l'utilisateur
            return $res;
        }

    }
}
?>