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
        $email     = $_POST['mail'];
        $password  = $_POST['mot_de_passe'];
        $connexion = $bdd->utilisateur($email, $password);
    }
}
if (isset($_POST['created_connection'])) {
    $email    = $_POST['mail'];
    $password = $_POST['mot_de_passe'];
    $bdd->ajouterUtilisateur($email, $password);
}

if (isset($_POST['error'])) {
    $erreur = $_POST['error'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/connexion.css">
    <title>Connexion</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post" action="controle_identification.php">
                <h1>Créer un compte</h1>
                <div class="social-container">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <label for="floatingInput">Adresse mail</label>
                <input type="email" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com"
                    required>
                <label for="floatingPassword">Mot de passe</label>
                <input type="password" name="mot_de_passe" class="form-control" id="floatingPassword"
                    placeholder="mot_de_passe" required>
                <input class="submit" type="submit" name="created_connection" value="Se connecter">
            </form>
        </div>
        <div class="form-container login-container">
            <form method="post" action="controle_identification.php">
                <h1>Se connecter</h1>
                <div class="social-container">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <label for="floatingInput">Adresse mail</label>
                <input type="email" name="mail" class="form-control" id="floatingInput" placeholder="name@example.com"
                    required>

                <label for="floatingPassword">Mot de passe</label>
                <input type="password" name="mot_de_passe" class="form-control" id="floatingPassword"
                    placeholder="mot_de_passe" required>
                <input class="submit" type="submit" name="valid_connection" value="Se connecter">
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Vous n'avez pas de compte ?</h1>
                    <p>Veuillez remplir ce formulaire afin de vous créer un compte.</p>
                    <h1>Vous avez un compte ?</h1>
                    <p>Dans ce cas cliquez sur ce bouton afin de vous connecter.</p>
                    <button class="ghost" id="login">Se connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Vous avez un compte ?</h1>
                    <p>Dans ce cas remplissez ce formulaire afin de vous connecter.</p>
                    <h1>Pas de compte ?</h1>
                    <p>Dans ce cas cliquez sur ce bouton afin de vous en créer un.</p>
                    <button class="ghost" id="signup">Créer un compte</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/84f57e19ad.js" crossorigin="anonymous"></script>
    <script src="JavaScript/login-sign-up.js"></script>
</body>

</html>