<?php
/******************************************************************************
 *
 *                        C L A S S E    C O O K I E
 *
 */

// La classe fait partie de l'espace de nommage Model du paradigme MVC
namespace Model;

/**
 * Cette classe sert d'interface d'encapsulation pour les accès aux cookies.
 *
 * On pourrait ainsi aisément la modifier pour basculer sur des sessions côté
 * serveur si dans le respect du RGPD, si l'utilisateur refuse les cookies sur
 * sa machine...
 */
class Cookie
{
    static public function set_expiration_delay($value)
    {
        Cookie::update_cookie('cookie_expiration_delay',$value,false);
    }

    static public function get_expiration_delay()
    {
        if (Cookie::cookieIsSet('cookie_expiration_delay')) {
            return Cookie::cookie('cookie_expiration_delay');
        } else {
            return 300;
        }
    }

    /**
     * Méthode permettant de savoir si une cookie est initialisé.
     *
     * @param $name
     * @return bool
     */
    static public function cookieIsSet($name)
    {
        return isset($_COOKIE[$name]);
    }

    /**
     * Méthode permettant de récupérer le contenu d'un cookie.
     *
     * @param $name
     * @return mixed
     */
    static public function cookie($name)
    {
        return @$_COOKIE[$name];
    }

    /**
     * Méthode permettant de mettre à jour un cookie.
     *
     * @param $name
     * @param $value
     * @param $expiration
     * @return void
     */
    static public function update_cookie($name, $value = null, $expiration = true)
    {
        // Si aucune valeur en paramètre d'entrée, on utilise celle du
        // cookie s'il existe déjà.
        if ($value == null && isset($_COOKIE[$name])) {
            $value = $_COOKIE[$name];
        }

        if ($expiration)
            setcookie($name, $value, time() + Cookie::get_expiration_delay());
        else
            setcookie($name, $value, time() + time() + (10 * 365 * 24 * 60 * 60)); // Délai de 10 ans...
    }

    /**
     * Méthode permettant de détruire un cookie.
     *
     * @param $cookie_name
     * @return void
     */
    static public function clean_cookie($cookie_name)
    {
        if (isset($_COOKIE[$cookie_name])) {
            unset($_COOKIE[$cookie_name]);
            setcookie($cookie_name, '', time() - 3600, '/');
        }
    }
}