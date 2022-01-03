<?php

include "header.php";

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bigtitle">Kullanıcı kaydı</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form class="form-horizontal checkout" action="nedmin/netting/islem.php" method="post" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">Kayıt Ol</div>
                </div>

                <?php
                    if ($_GET['durum']=='farklisifre') { ?>
                        <div class="alert alert-danger">
                            <strong>HATA!</strong> Girdiğiniz Şifreler Eşleşmiyor
                        </div>
                    <?php } elseif ($_GET['durum']=='eksiksifre') { ?>
                        <div class="alert alert-danger">
                            <strong>HATA!</strong> Eksik Şifre Girdiniz En Az 6 Karakter Olmalı
                        </div>
                    <?php } elseif ($_GET['durum']=='mukerrerkayit') { ?>
                        <div class="alert alert-danger">
                            <strong>HATA!</strong> Bu Kullanıcı Zaten Kayıtlı
                        </div>
                    <?php } elseif ($_GET['durum']=='basarisiz') { ?>
                        <div class="alert alert-danger">
                            <strong>HATA!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız
                        </div>
                    <?php } 
                ?>

                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="name" name="kullanici_adsoyad" required placeholder="İsim Soyisim Giriniz">
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="mail" class="form-control" id="email" name="kullanici_mail" required placeholder="Mail Adresinizi Giriniz(Giriş yaparken kullanacaksınız!)">
                    </div>
                </div>
                <div class="form-group dob">
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="pass" name="kullanici_passwordone" required placeholder="Şifrenizi Giriniz">
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="conpass" name="kullanici_passwordtwo" required placeholder="Şifrenizi Tekrar Giriniz">
                    </div>
                </div>
                <button type="submit" name="kullanicikaydet" class="btn btn-default btn-red">Kayıt İşlemini Yap</button>
            </div>
            <form action="" method="post">
                <div class="col-md-6">
                    <div class="title-bg">
                        <div class="title">Şifremi Unuttum</div>
                    </div>
                </div>
            </form>
        </div>
    </form>
    <div class="spacer"></div>
</div>

<?php include "footer.php"; ?>