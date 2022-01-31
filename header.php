<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');

include "nedmin/netting/baglan.php";
include "nedmin/production/fonksiyon.php";

//dosyanın dışsardan görünmesini engelleme
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    exit("Bu sayfaya erişim yasak");
}

//date zaman düzenleme server saat ayarlama


if (isset($_SESSION['userkullanici_mail'])) {

    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail");
    $kullanicisor->execute(array(
        'mail' => $_SESSION['userkullanici_mail']
    ));
    $kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

    if (!isset($_SESSION['userkullanici_id'])) {

        $_SESSION['userkullanici_id'] = $kullanicicek['kullanici_id'];
    }
}

$ayarsor = $db->prepare("SELECT * FROM ayar WHERE ayar_id=:id");
$ayarsor->execute(array(
    'id' => 0
));
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

if ($ayarcek['ayar_bakim'] == 1) {
    exit("Şuan bakımdayız.");
}

///////////////////////// ONLİNE GÜNCELLEME  ///////////////////////////////////////

$userkullanici_sonzaman = strtotime($_SESSION['userkullanici_sonzaman']);
$simdi = time();

$fark = ($simdi - $userkullanici_sonzaman);

if ($fark >= 100) {

    $zamanguncelle = $db->prepare("UPDATE kullanici SET
        kullanici_sonzaman=:sonzaman
        WHERE kullanici_id = {$_SESSION['userkullanici_id']}
        ");

    $kontrol = $zamanguncelle->execute(array(
        'sonzaman' => date("Y-m-d H:i:s")
    ));

    $userkullanici_sonzaman = $_SESSION["userkullanici_sonzaman"] = strtotime(date("Y-m-d H:i:s"));
}

?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>
        <?php
        if (empty($title)) {
            echo $ayarcek['ayar_title'];
        } else {
            echo $title;
        }
        ?>
    </title>
    <meta name="author" author="<?php echo $ayarcek['ayar_description']; ?>">
    <meta name="keywords" author="<?php echo $ayarcek['ayar_keywords']; ?>">
    <meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img\favicon.png">

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="css\normalize.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="css\main.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css\bootstrap.min.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="css\animate.min.css">

    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="css\font-awesome.min.css">

    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="vendor\OwlCarousel\owl.carousel.min.css">
    <link rel="stylesheet" href="vendor\OwlCarousel\owl.theme.default.min.css">

    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="css\meanmenu.min.css">

    <!-- Datetime Picker Style CSS -->
    <link rel="stylesheet" href="css\jquery.datetimepicker.css">

    <!-- ReImageGrid CSS -->
    <link rel="stylesheet" href="css\reImageGrid.css">

    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="css\hover-min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="css\select2.min.css">

    <!-- jquery-->
    <script src="js\jquery-2.2.4.min.js" type="text/javascript"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- jquery.counterup js -->
    <script src="js\jquery.counterup.min.js"></script>
    <script src="js\waypoints.min.js"></script>

    <!-- Modernizr Js -->
    <script src="js\modernizr-2.8.3.min.js"></script>

    <!-- Nouislider Style CSS -->
    <link rel="stylesheet" href="vendor\noUiSlider\nouislider.min.css">

    <!-- Ck EDİTÖR -->
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <!-- Add your site or application content here -->
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Main Body Area Start Here -->
    <div id="wrapper">
        <!-- Header Area Start Here -->
        <header>
            <div id="header2" class="header2-area right-nav-mobile">
                <div class="header-top-bar">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
                                <div class="logo-area">
                                    <a href="index.php"><img width="100" class="img-responsive" src="<?php echo $ayarcek['ayar_logo']; ?>" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                <ul class="profile-notification">
                                    <!-- <li>
                                            <div class="notify-contact"><span>Need help?</span> Talk to an expert: +61 3 8376 6284</div>
                                        </li> -->
                                    <?php
                                    if (isset($_SESSION['userkullanici_mail'])) { ?>

                                        <!-- <li> Bildirime gerek yok o yüzden kullanmıyorum
                                            <div class="notify-notification">
                                                <a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i><span>8</span></a>
                                                <ul>

                                                    <li>
                                                        <div class="notify-notification-img">
                                                            <img class="img-responsive" src="img\profile\1.png" alt="profile">
                                                        </div>
                                                        <div class="notify-notification-info">
                                                            <div class="notify-notification-subject">Need WP Help!</div>
                                                            <div class="notify-notification-date">01 Dec, 2016</div>
                                                        </div>
                                                        <div class="notify-notification-sign">
                                                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </li> -->

                                        <li>
                                            <div class="notify-message">
                                                <?php
                                                $mesajsay = $db->prepare("SELECT 
                                                 COUNT(mesaj_okunma) AS say 
                                                 FROM mesaj 
                                                 WHERE mesaj_okunma=:id
                                                 AND kullanici_gelen=:kullanici_id
                                                 ");
                                                $mesajsay->execute(array(
                                                    'id' => 0,
                                                    'kullanici_id' => $_SESSION['userkullanici_id']
                                                ));
                                                $saycek = $mesajsay->fetch(PDO::FETCH_ASSOC);

                                                ?>
                                                <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><span><?php echo $saycek['say']; ?></span></a>
                                                <ul>
                                                    <?php
                                                    $mesajsor = $db->prepare("SELECT
                                                        mesaj.*,kullanici.*
                                                        FROM mesaj
                                                        INNER JOIN kullanici
                                                        ON mesaj.kullanici_gonderen=kullanici.kullanici_id
                                                        WHERE mesaj.kullanici_gelen=:id
                                                        AND mesaj_okunma=:okunma
                                                        ORDER BY mesaj_okunma,mesaj_zaman DESC
                                                        LIMIT 5
                                                        ");

                                                    $mesajsor->execute(array(
                                                        'id' => $_SESSION['userkullanici_id'],
                                                        'okunma' => 0
                                                    ));

                                                    if ($mesajsor->rowCount() == 0) { ?>
                                                        <li>
                                                            <div class="notify-message-info">
                                                                <div style="color:red !important; font-weight:bold;" class="notify-message-subject">Yeni Mesaj Yok</div>
                                                            </div>
                                                        </li>
                                                    <?php }
                                                    ?>
                                                    <?php
                                                    while ($mesajcek = $mesajsor->fetch(PDO::FETCH_ASSOC)) {
                                                        $a = $mesajcek['kullanici_gonderen'];
                                                    ?>
                                                        <li>
                                                            <div class="notify-message-img">
                                                                <img class="img-responsive" src="<?php echo $mesajcek['kullanici_magazafoto']; ?>" alt="profile">
                                                            </div>
                                                            <div class="notify-message-info">
                                                                <div class="notify-message-sender"><?php echo $mesajcek['kullanici_ad'] . " " . $mesajcek['kullanici_soyad']; ?></div>
                                                                <a href="mesaj-detay.php?mesaj_id=<?php echo $mesajcek['mesaj_id']; ?>&kullanici_gonderen=<?php echo $a; ?>">
                                                                    <div class="notify-message-subject" style="font-size:10px;">Mesajı Oku</div>
                                                                </a>
                                                                <div class="notify-message-date"><?php echo $mesajcek['mesaj_zaman']; ?></div>
                                                            </div>
                                                            <div class="notify-message-sign">
                                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="user-account-info">
                                                <div class="user-account-info-controler">
                                                    <div class="user-account-img">
                                                        <img style="border-radius:30px;" width="32" height="32" class="img-responsive" src="<?php echo $kullanicicek['kullanici_magazafoto']; ?>" alt="profile">
                                                    </div>
                                                    <div class="user-account-title">
                                                        <div class="user-account-name"><?php echo $kullanicicek['kullanici_ad']; ?></div>
                                                        <div class="user-account-balance">

                                                            <?php
                                                            $siparissor = $db->prepare("SELECT SUM(urun_fiyat) AS toplam FROM siparis_detay WHERE kullanici_idsatici=:kullanici_id");
                                                            $siparissor->execute(array(
                                                                'kullanici_id' => $_SESSION['userkullanici_id']
                                                            ));
                                                            $sipariscek = $siparissor->fetch(PDO::FETCH_ASSOC);

                                                            if (isset($sipariscek['toplam'])) {
                                                                echo $sipariscek['toplam'];
                                                            } else {
                                                                echo "0.00";
                                                            }
                                                            ?>TL

                                                        </div>
                                                    </div>
                                                    <div class="user-account-dropdown">
                                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li><a href="hesabim.php">Ayarlar</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a class="apply-now-btn" href="logout.php" id="logout-button">Çıkış Yap</a></li>
                                    <?php } else { ?>
                                        <li>
                                            <div class="apply-btn-area">
                                                <a class="apply-now-btn" href="login.php">Giriş Yap</a>
                                                <!-- 
                                                    id="login-button"<div class="login-form" id="login-form" style="display: none;">
                                                    <h2>Login</h2>
                                                   <form>
                                                        <input class="form-control" type="text" placeholder="Name">
                                                        <input class="form-control" type="password" placeholder="Password">
                                                        <button class="btn-login" type="submit" value="Login">Login</button>
                                                        <a class="btn-login" href="registration.htm">Registration</a>
                                                        <div class="remember-lost">
                                                            <div class="checkbox">
                                                                <label><input type="checkbox"> Remember me</label>
                                                            </div>
                                                            <a class="lost-password" href="#">Lost Your Password?</a>
                                                        </div>
                                                        <button class="cross-btn form-cancel" type="submit" value=""><i class="fa fa-times" aria-hidden="true"></i></button>
                                                    </form>
                                                </div> -->
                                            </div>
                                        </li>
                                        <li><a class="apply-now-btn-color hidden-on-mobile" href="register.php">Kayıt Ol</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-menu-area bg-primaryText" id="sticker">
                    <div class="container">
                        <nav id="desktop-nav">
                            <ul>
                                <li class="actiVe"><a href="index.php">ANASAYFA</a></li>
                                <li><a href="kategoriler.php">Kategoriler</a></li>
                                <?php
                                $kategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_onecikar=:onecikar ORDER BY kategori_sira ASC");
                                $kategorisor->execute(array(
                                    'onecikar' => 1
                                ));

                                while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <li><a href="kategori-<?= seo($kategoricek['kategori_ad']) . "-" . $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></a></li>

                                <?php }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area Start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li class="actiVe"><a href="index.php">ANASAYFA</a></li>
                                        <li class="actiVe"><a href="login.php">Üye Giriş</a></li>
                                        <li class="actiVe"><a href="register.php">Üye Kayıt</a></li>
                                        <?php
                                        $kategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_onecikar=:onecikar ORDER BY kategori_sira ASC");
                                        $kategorisor->execute(array(
                                            'onecikar' => 1
                                        ));

                                        while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <li><a href="kategori-<?= seo($kategoricek['kategori_ad']) . "-" . $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></a></li>
                                        <?php }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area End -->
        </header>