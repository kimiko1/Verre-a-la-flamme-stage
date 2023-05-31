<?php

require './Model/Cookie.php';

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
    
</body>
</html>