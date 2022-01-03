<!-- 
    register sayfasını kopyala
    giriş yapmış kullanıcının bilgilerinin yazdır 
    ve bilgilerini düzenlemesini sağla
    islem.php
    KİŞİ KULLANICI ADINI YANİ MAİLİ DÜZENLEYEMİYECEK

 --><?php

include "header.php";

?>
<div class="container">
    <form class="form-horizontal checkout" action="nedmin/netting/islem.php" method="post" role="form">
        <div class="row">
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">Şifre Güncelle</div>
                </div>

                <?php
                    if ($_GET['durum']=='eskisifrehata') { ?>
                        <div class="alert alert-danger">
                            <strong>HATA!</strong> Eski Şifrenizi Yanlış Girdiniz
                        </div>
                    <?php } else if ($_GET['durum']=='sifredegisti') { ?>
                        <div class="alert alert-success">
                            <strong></strong> Şifre Başarıyla Değişti
                        </div>
                    <?php } else if ($_GET['durum']=='sifreleruyusmuyor') { ?>
                        <div class="alert alert-danger">
                            <strong></strong> Girdiğiniz Şifreler Uyuşmuyor
                        </div>
                    <?php } else if ($_GET['durum']=='eksiksifre') { ?>
                        <div class="alert alert-danger">
                            <strong></strong> En az 6 haneli Şifre Girin
                        </div>
                    <?php }
                ?>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Eski Şifre<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="first-name" name="kullanici_password" value="" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şifre<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="first-name" name="kullanici_passwordone" placeholder="Yeni Şifre Giriniz" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Şifreyi Tekrar<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="first-name" name="kullanici_passwordtwo" placeholder="Yeni Şifrenizi Tekrar    Giriniz" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>" >
                <center><button type="submit" name="sifreguncelle" class="btn btn-default btn-success">Şifremi Güncelle</button></center>
            </div>
            <div class="col-md-6">
                <div class="title-bg">
                    
                </div>
                <center><img width="460" src="https://iasbh.tmgrup.com.tr/09120d/650/344/0/8/865/462?u=https://isbh.tmgrup.com.tr/sbh/2020/08/30/internet-sifresi-degistirme-turk-telekom-ttnet-modem-internet-sifresi-nasil-degistirilir-tk1-1598775757827.jpg"></center>

        </div>
    </form>
    </div>
    <div class="spacer"></div>
</div>

<?php include "footer.php"; ?>