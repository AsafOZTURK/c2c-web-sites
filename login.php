<?php

require_once "header.php";

?>

<!-- Main Banner 1 Area Start Here -->
<div class="inner-banner-area">

    <div class="container">
        <div class="inner-banner-wrapper">
            <!-- <p>Premium WordPress Themes, Web Templates and Many More ...</p> -->
            <!-- <div class="banner-search-area input-group">
                            <input class="form-control" placeholder="Search Your Keywords . . ." type="text">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span> -->
        </div>
    </div>
</div>

</div>
<!-- Main Banner 1 Area End Here -->
<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
            <!-- <ul>
                            <li><a href="index.htm">Home</a><span> -</span></li>
                            <li>Registration</li>
                        </ul> -->
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Registration Page Area Start Here -->
<div class="registration-page-area bg-secondary section-space-bottom">
    <div class="container">
        <h2 class="title-section">Giriş Sayfası</h2>
        <div class="registration-details-area inner-page-padding">
            <?php
            if ($_GET['durum'] == 'hata') { ?>
                <div class="alert alert-danger">
                    <strong>HATA!</strong> Kullanıcı adı yada parolanız hatalı lütfen tekrar deneyiniz
                </div>
            <?php } else if ($_GET['durum'] == 'exit') { ?>
                <div class="alert alert-success">
                    <strong>Bilgi!</strong> Başarıyla çıkış yaptınız
                </div>
            <?php } else if ($_GET['durum'] == 'kayıtbasarili') { ?>
                <div class="alert alert-success">
                    <strong>Bilgi!</strong> Kayıt İşlemi Başarılı Giriş Yapabilirsiniz.
                </div>
            <?php } else if ($_GET['durum'] == 'captchahata') { ?>
                <div class="alert alert-danger">
                    <strong>Bilgi!</strong> Güvenlik Kodunu Yanlış Girdiniz Lütfen Tekrar Deneyin
                </div>
            <?php } ?>

            <form action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="first-name">Kullanıcı Adı *</label>
                            <input type="text" name="kullanici_mail" placeholder="Kullancı adınızı giriniz" required class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="last-name">Parola *</label>
                            <input type="password" name="kullanici_password" placeholder="Şifrenizi giriniz" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group" align="right">
                            <label class="control-label" for="first-name">Captcha Kodu</label>
                            <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" /><br>
                            <a class="btn btn-danger btn-xs" href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false">[ Resmi Değiştir ]</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="last-name">Güvenlik Kodunu Giriniz</label>
                            <input type="text" name="captcha_code" placeholder="Güvenlik Kodunu Giriniz" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="pLace-order">
                            <button class="update-btn disabled" name="musterigiris" type="submit" value="Login">Giriş Yap</button>
                            <button type="button" style="background-color:red;border-color:red;" class="update-btn disabled" data-toggle="modal" data-target="#sifremiunuttum" data-whatever="@mdo">Şifremi Unuttum</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Kodları -->
<div class="modal fade" id="sifremiunuttum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Şifre Sıfırlama</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="mailphp/sifremi-unuttum.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mail Adresiniz:</label>
                        <input type="email" placeholder="Sisteme kayıtlı mail adresinizi giriniz yoksa şifreniz size ulaşmaz" class="form-control" name="kullanici_mail" id="recipient-name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    <button type="submit" name="sifremiunuttum" class="btn btn-primary">Yeni Şifre Talep Et</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Kodları -->
<!-- Registration Page Area End Here -->

<?php require_once "footer.php"; ?>