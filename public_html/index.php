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

// On récupère les horaires de la base de données.
$horaire = $bdd->getHoraires();

// On récupère le Mois
$Mois = $bdd->getMois();

// On récupère le texte de presentation
$presentation = $bdd->getPresentation();

// On récupère les images de presentation
$imgPresentation = $bdd->getImgPresentation();
?>
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <title>Accueil</title>
</head>

<body>
    <nav>
        <a href="#Presentation">Présentation</a>
    </nav>
    <div class="Accueil" id="Accueil">
        <div class="title">

            <img src="img/img-index/batons2.png" alt="" class="batons">

            <div class="title-h1">
                <h1 class="verre_a_la">Verre à la</h1>
                <h1 class="flamme">flamme</h1>
            </div>
            <div class="subtitle">
                <h2><b>Création de bijoux en perle de verre filé</b></h2>
                <h2><b>Artisan-Hautes Alpes</b></h2>
            </div>
        </div>
        <div class="presentation">
            <div class="img">
                <img src="img/img-index/bijou.JPG" alt="" class="bijou">
                <div class="desc-horaire">
                    <div class="desc">
                        <p>Bienvenue sur le site de Laure Esposito créatrice de bijoux en perles de verre filées.</p>
                    </div>
                    <div class="horaire">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th colspan="2" style="text-align: center;">Les horaires jusqu'à fin
                                        <?= $Mois[0]['Mois']; ?> :
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($horaire as $hor): ?>
                                    <tr>
                                        <td>
                                            <?= $hor['Jours'] ?>
                                        </td>
                                        <td>
                                            <?= $hor['horaire'] ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <hr>
                        <p class="variable"><b>Horaires variables selon saison.</b></p>
                    </div>
                </div>
                <img src="img/img-index/Présentation.JPG" alt="" class="flyer">
            </div>
        </div>
    </div>
    <div class="presentation" id="Presentation">
        <h1 class="title">Présentation</h1>
        <div class="description">
            <?php foreach ($presentation as $pres): ?>
                <p class="desc">
                    <?= $pres['text'] ?>
                </p>
            <?php endforeach; ?>
        </div>
        <div class="swipe">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($imgPresentation as $img): ?>
                        <?php if ($img['haut'] == 0): ?>
                            <div class="swiper-slide"><img src="<?= $img['src'] ?>" alt=""></div>
                        <?php elseif ($img['haut'] == 1): ?>
                            <div class="swiper-slide"><img class="haut" src="<?= $img['src'] ?>" alt=""></div>
                        <?php endif ?>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
    <a href="#Accueil">Revenir à l'Accueil</a>
    </div>
    <script src="https://kit.fontawesome.com/84f57e19ad.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="JavaScript/index.js"></script>
    <?php require 'footer.php' ?>
</body>

</html>