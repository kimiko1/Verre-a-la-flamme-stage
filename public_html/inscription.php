<?php
ob_start();
// Inclusion des models
require('../model/BDD.php');

// Inclusion des espaces de nommage utilisés dans notre code
use Model\BDD;

// Initialisation d'une variable bdd permettant de nous connecter à la base de données
$bdd = BDD::instance();

// Initialisation des sessions
$bdd->init_php_session();

if (isset($_POST['valid_connection'])) {
    
    if (
        isset($_POST['mail']) && !empty($_POST['mail']) &&
        isset($_POST['mot_de_passe']) && !empty($_POST['mot_de_passe'])
        ) {
            $email = $_POST['mail'];
            $password = $_POST['mot_de_passe'];
            $connexion = $bdd->ajouterUtilisateur($email, $password);
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <main class="form-signin w-100 m-sm-auto">
        <form method="post">
            <img class="mb-4" src="./img/sio-gap.png" alt="">
            <h1 class="h3 mb-3 fw-normal">Veuillez vous identifier</h1>

            <div class="form-floating">
                <input type="email" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com"
                    required>
                <label for="floatingInput">Adresse mail</label>
            </div>

            <div class="form-floating">
                <input type="password" name="mot_de_passe" class="form-control" id="floatingPassword"
                    placeholder="mot_de_passe" required>
                <label for="floatingPassword">Mot de passe</label>
            </div>

            <input type="submit" name="valid_connection" value="Se connecter">

        </form>
    </main>

</body>

</html>