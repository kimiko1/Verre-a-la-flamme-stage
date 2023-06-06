<?php
require('../model/Cookie.php');

use Model\Cookie;

if( isset($_GET['noexpiration'])) {
    // On désactive l'expiration des cookies (expire dans 10 ans)...
    Cookie::set_expiration_delay(10 * 365 * 24 * 60 * 60);
}
else
{
    // Les cookies expirent au bout de 5 minutes...
    Cookie::set_expiration_delay(300);
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
    <form action="index.php" method="post">
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

        <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>

    </form>
    <?php var_dump($_POST)?>
</main>

</body>

</html>