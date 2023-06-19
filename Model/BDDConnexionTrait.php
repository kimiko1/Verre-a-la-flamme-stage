<?php

namespace Model;

use PDO;

trait BDDConnexionTrait
{
    public function ajouterUtilisateur($mail, $motDePasse)
    {
        $motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);

        // Construction de la requête SQL
        $stmt = $this->bdd->prepare("INSERT INTO Users (user_mail, user_password) VALUES (:mail, :motDePasse)");
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':motDePasse', $motDePasse);
        // On exécute la requête
        $stmt->execute();

    }
    /**
     * Fonction permettant de vérifier la connexion de l'utilisateur.
     */
    public function utilisateur($mail, $motDePasse)
    {
        // Construction de la requête SQL
        $stmt = $this->bdd->prepare("SELECT * from Users where user_mail=:email");
        // Envoi de la requête SQL
        $stmt->bindParam(':email', $mail);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // On vérifie si le mot de passe est correct
        if (password_verify($motDePasse, $res['user_password'])) {
            // On retourne les informations de l'utilisateur
            return $res;
        }
        return false;

    }
    /**
     * Fonction permettant d'initialisiser les sessions
     */
    public function init_php_session(): bool
    {
        if (!session_id()) {
            session_start();
            session_regenerate_id();
            return true;
        }
        return false;
    }

    /**
     * Fonction permettant de détruire les sessions
     */
    public function clean_php_session(): void
    {
        session_unset();
        session_destroy();
    }

    /**
     * Fonction permettant d'initialisiser les sessions
     */
    public function is_logged(): bool
    {
        return true;
    }

    public function is_admin(): bool
    {
        return true;
    }
}
?>