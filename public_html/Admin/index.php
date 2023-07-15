<?php
ob_start();

// Inclusion des models
require('../../model/BDD.php');

// Inclusion des espaces de nommage utilisés dans notre code
use Model\BDD;

// Initialisation d'une variable bdd permettant de nous connecter à la base de données
$bdd = BDD::instance();

// Initialisation des sessions
$bdd->init_php_session();


if (isset($_SESSION['email']) and $_SESSION['admin']) {
    $_POST['etat_connexion'] = 'connected';
} else {
    header('Location: ../connexion.php');
}

// On récupère les horaires de la base de données.
$horaire = $bdd->getHoraires();

// On récupère le Mois
$Mois = $bdd->getMois();

// On récupère le texte de presentation
$presentation = $bdd->getPresentation();

// On récupère les images de presentation
$imgPresentation = $bdd->getImgPresentation();

$nom_du_fichier = 'Fileuse_de_verre';

//$test = $bdd->getMaxImagePresentation();
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
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
    <title>Accueil</title>
</head>

<body>
    <div class="Accueil" id="Accueil">
        <div class="title">

            <img src="../img/img-index/batons2.png" alt="" class="batons">

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
                <img src="../img/img-index/bijou.JPG" alt="" class="bijou">
                <div class="desc-horaire">
                    <div class="desc">
                        <p>Bienvenue sur le site de Laure Esposito créatrice de bijoux en perles de verre filés.</p>
                    </div>
                    <div class="horaire">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th colspan="2" style="text-align: center;">Les horaires jusqu'à fin
                                        <form action="updateMois.php" method="post">
                                            <input type="text" name="Mois" value="<?= $Mois[0]['Mois']; ?>" size="9"> :
                                            <input type="submit" value="Modifier">
                                        </form>
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
                                            <form action="updateHoraire.php" method="post">
                                                <input type="text" value="<?= $hor['horaire']; ?>" size="25" name="horaire">
                                                <input type="hidden" name="jour" value="<?= $hor['Jours'] ?>">
                                                <input type="submit" value="Modifier">
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                        <hr>
                        <p class="variable"><b>Horaires variables selon saison.</b></p>
                    </div>
                </div>
                <img src="../img/img-index/Présentation.JPG" alt="" class="flyer">
            </div>
        </div>
    </div>
    <div class="presentation" id="Presentation">
        <h1 class="title">Présentation</h1>
        <div class="description">
            <?php foreach ($presentation as $pres): ?>
                <form action="updatePresentation.php" method="post">
                    <textarea class="desc" name="text" cols="80" rows="10"><?= $pres['text'] ?></textarea>
                    <p class="desc"></p>
                    <input type="submit" value="Modifier">
                </form>
            <?php endforeach; ?>
        </div>
        <div class="swipe">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($imgPresentation as $img): ?>
                        <?php if ($img['haut'] == 0): ?>
                            <div class="swiper-slide"><img src="../<?= $img['src'] ?>" alt="">
                                <div class="inputImg">
                                    <form action="televersementImg.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-sm-1">
                                            <input class="form-control form-control-sm" type="file" name="fileToUpload"
                                                id="files">
                                        </div>
                                        <div class="mb-sm-1">
                                            <input type="submit" class="btn btn-primary btn-sm" value="Changer l'image"
                                                name="submit">
                                        </div>
                                        <input type="hidden" value="<?= $img['id'] ?>" name="id">
                                        <input type="hidden" value="<?= $nom_du_fichier . '_' . $img['id'] ?>"
                                            name="nom_du_fichier">

                                    </form>
                                    <form action="changePosition.php" method="post" enctype="multipart/form-data">
                                        <input class="position" type="number" name="finalPosition" id="" size="2"
                                            value="<?= $img['position'] ?>">
                                        <input type="hidden" value="<?= $img['position'] ?>" name="position">
                                        <input type="submit" value="Changer la position">
                                    </form>
                                    <form action="deleteImgPresentation.php" method="post">
                                        <input type="hidden" name="id" value="<?= $img['id']; ?>">
                                        <input type="submit" value="Supprimer l'image">
                                    </form>
                                </div>
                            </div>
                        <?php elseif ($img['haut'] == 1): ?>
                            <div class="swiper-slide"><img class="haut" src="../<?= $img['src'] ?>" alt="">
                                <div class="inputImg">
                                    <form action="televersementImg.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-sm-1">
                                            <input class="form-control form-control-sm" type="file" name="fileToUpload"
                                                id="files">
                                        </div>
                                        <div class="mb-sm-1">
                                            <input type="submit" class="btn btn-primary btn-sm" value="Changer l'image"
                                                name="submit">
                                        </div>
                                        <div class="mb-sm-1">
                                        </div>
                                        <input type="hidden" value="<?= $img['id'] ?>" name="id">
                                        <input type="hidden" value="<?= $nom_du_fichier . '_' . $img['id'] ?>"
                                            name="nom_du_fichier">

                                    </form>
                                    <form action="changePosition.php" method="post" enctype="multipart/form-data">
                                        <input class="position" type="number" name="finalPosition" id="" size="2"
                                            value="<?= $img['position'] ?>">
                                        <input type="hidden" value="<?= $img['position'] ?>" name="position">
                                        <input type="submit" value="Changer la position">
                                    </form>
                                    <form action="deleteImgPresentation.php" method="post">
                                        <input type="hidden" name="id" value="<?= $img['id']; ?>">
                                        <input type="submit" value="Supprimer l'image">
                                    </form>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
    <a href="#Accueil">Revenir à l'Accueil</a>
    <div>

    </div>
    <script src="https://kit.fontawesome.com/84f57e19ad.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="../JavaScript/index.js"></script>
    <?php require '../footer.php' ?>
</body>

</html>