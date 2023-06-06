<?php
ob_start();
// Contrôle automatiquement si l'utilisateur est bien connecté dans l'admin.
require ('controle-identification.php');

// Inclusion des models
require('../model/BDD.php');

// Inclusion des espaces de nommage utilisés dans notre code
use Model\BDD;

// On récupère les horaires de la base de données.
$bdd = BDD::instance();
$horaire = $bdd->getHoraires();

var_dump($_COOKIE)
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
    <title>Accueil</title>
</head>

<body>
    <div class="content">
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
                        <p>Bienvenue sur le site de Laure Esposito créatrice de bijoux en perles de verre filés.</p>
                    </div>
                    <div class="horaire">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th colspan="2" style="text-align: center;">Les horaires jusqu'à fin Juin 2023 :</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($horaire as $hor) :?>
                                <tr>
                                    <td>Lundi : </td>
                                    <td><?= $hor['Lundi'];?></td>
                                </tr>
                                <tr>
                                    <td>Mardi : </td>
                                    <td><?= $hor['Mardi'];?></td>
                                </tr>
                                <tr>
                                    <td>Mercredi : </td>
                                    <td><?= $hor['Mercredi'];?></td>
                                </tr>
                                <tr>
                                    <td>Jeudi : </td>
                                    <td><?= $hor['Jeudi'];?></td>
                                </tr>
                                <tr>
                                    <td>Vendredi : </td>
                                    <td><?= $hor['Vendredi'];?></td>
                                </tr>
                                <tr>
                                    <td>Samedi : </td>
                                    <td><?= $hor['Samedi'];?></td>
                                </tr>
                                <?php endforeach;?>
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
    <script src="https://kit.fontawesome.com/84f57e19ad.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="JavaScript/index.js"></script>
    <?php require 'footer.php' ?>
</body>

</html>