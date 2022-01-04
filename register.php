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
        <h2 class="title-section">Üye Kayıt Formu</h2>
        <div class="registration-details-area inner-page-padding">
            <?php
            if ($_GET['durum'] == 'farklisifre') { ?>
                <div class="alert alert-danger">
                    <strong>HATA!</strong> Girdiğiniz Şifreler Eşleşmiyor
                </div>
            <?php } elseif ($_GET['durum'] == 'eksiksifre') { ?>
                <div class="alert alert-danger">
                    <strong>HATA!</strong> Eksik Şifre Girdiniz En Az 6 Karakter Olmalı
                </div>
            <?php } elseif ($_GET['durum'] == 'mukerrerkayit') { ?>
                <div class="alert alert-danger">
                    <strong>HATA!</strong> Bu Kullanıcı Zaten Kayıtlı
                </div>
            <?php } elseif ($_GET['durum'] == 'basarisiz') { ?>
                <div class="alert alert-danger">
                    <strong>HATA!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız
                </div>
            <?php }
            ?>
            
            <form action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="email">Mail Adresi *</label>
                            <input type="text" id="first-name" name="kullanici_mail" placeholder="Mail adresiniz giriniz (Kullanıcı adınız olacak!)" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="first-name">İsim *</label>
                            <input type="text" name="kullanici_ad" placeholder="İsminizi giriniz" required class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="last-name">Soyisim *</label>
                            <input type="text" name="kullanici_soyad" placeholder="Soyisminizi giriniz" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="email">Şifre *</label>
                            <input type="password" name="kullanici_passwordone" placeholder="Şifre belirleyiniz" required class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="email">Şifre Tekrar *</label>
                            <input type="password" name="kullanici_passwordtwo" placeholder="Belirlediğiniz şifreyi tekrar giriniz" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="country">Ülke</label>
                            <div class="custom-select">
                                <select id="country" class='select2'>
                                    <option value="0">Seçiniz
                                    <option value="1">Türkiye
                                    <option value="2">Spain
                                    <option value="3">Belgium
                                    <option value="3">Ecuador
                                    <option value="3">Ghana
                                    <option value="3">South Africa
                                    <option value="3">India
                                    <option value="3">Pakistan
                                    <option value="3">Thailand
                                    <option value="3">Malaysia
                                    <option value="3">Italy
                                    <option value="3">Japan
                                    <option value="4">Germany
                                    <option value="5">USA
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="town-city">Şehir</label>
                            <input type="text" name="kullanici_i" class="form-control">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="postcode">Posta Kodu</label>
                            <input type="text" name="kullanici_postakodu" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="phone">Telefon Numarası</label>
                            <input type="text" anme="kullanici_gsm" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label class="control-label">Adres</label>
                            <input type="text" name="kullanici_adres" class="form-control">

                        </div>
                    </div> -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="pLace-order">
                            <button class="update-btn disabled" name="musterikaydet" type="submit" value="Login">Gönder</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Registration Page Area End Here -->

<?php require_once "footer.php"; ?>