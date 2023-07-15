<?php
function hex_encode($str)
{
    $encoded = bin2hex($str);
    $encoded = chunk_split($encoded, 2, '%');
    $encoded = '%' . substr($encoded, 0, strlen($encoded) - 1);
    return $encoded;
}
?>
<footer class="text-center">
    <div class="gmail">
        <p>Mail</p>
        <a href="mailto:<?php echo hex_encode("Lauresposito@gmail.com"); ?>">
            <i class="fa-regular fa-envelope fa-xl"></i>
            <p>Mon mail</p>
        </a>
    </div>
    <img src="../img/reverseLogo.png" alt="" class="logo">
    <div class="instagram">
        <p>instagram</p>
        <a href="https://www.instagram.com/verre_a_la_flamme/">
            <i class="fa-brands fa-instagram fa-xl"></i>
            <p>Verre_a_la_flamme</p>
        </a>
    </div>
    <img src="../img/reverseLogo.png" alt="" class="logo">
    <div class="facebook">
        <p>Facebook</p>
        <a href="https://www.facebook.com/profile.php?id=100057604652241">
            <i class="fa-brands fa-facebook fa-xl"></i>
            <p>Verre à la flamme</p>
        </a>
    </div>
    <hr>
    <p class="mb-3 text-muted">B.Raoult &copy; 2022-
        <?php echo date("Y"); ?>
    </p>
</footer>