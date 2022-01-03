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
    <div class="row">
        <div class="col-md-12">
            <div class="page-title-wrap">
                <div class="page-title-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bigtitle">Hesap Bilgierim</div>
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
                    <div class="title">Kişisel Bilgiler</div>
                </div>

                <?php
                    if ($_GET['durum']=='farklisifre') { ?>
                        <div class="alert alert-danger">
                            <strong>HATA!</strong> Girdiğiniz Şifreler Eşleşmiyor
                        </div>
                    <?php } 
                ?>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Görsel<span class="required">*</span>
                    </label><br>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_resim" value="<?php echo $kullanicicek['kullanici_resim']; ?>" required class="form-control col-md-7 col-xs-12">
                    </div><br>
                    <div style="margin-left:36%;margin-top:3%;" class="col-md-6 col-sm-6 col-xs-12">
                        <img width="100" src="<?php echo $kullanicicek['kullanici_resim']; ?>" alt="userpp">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı TC<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc']; ?>" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adı<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Soyadı<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_soyad" value="<?php echo $kullanicicek['kullanici_soyad']; ?>" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Mail<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_mail" value="<?php echo $kullanicicek['kullanici_mail']; ?>" readonly class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Nick<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_adsoyad" value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Numara<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm']; ?>" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adres<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_adres" value="<?php echo $kullanicicek['kullanici_adres']; ?>" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı İl<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_il" value="<?php echo $kullanicicek['kullanici_il']; ?>" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı İlçe<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce']; ?>" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Ünvan<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="first-name" name="kullanici_unvan" value="<?php echo $kullanicicek['kullanici_unvan']; ?>" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Durum<span class="required">*</span>
                    </label>
                    <div >
                        <select id="heard" name="kullanici_durum" required class="form-control">

                            <option value="1" <?php echo $kullanicicek["kullanici_durum"]== '1' ? 'selected""': ''; ?>>Aktif</option>

                            <option value="0" <?php if ($kullanicicek["kullanici_durum"]== 0) { echo 'selected=""'; } ?>>Pasif</option>

                        </select>
                    </div>
                    </div>
                    <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                <center><button type="submit" name="userupdate" class="btn btn-default btn-success">Bilgilerimi Güncelle</button></center>
            </div>
            <div class="col-md-6">
                <div class="title-bg">
                    <div class="title">Şifremi Unuttum</div>
                </div>
                <center><a href="sifre-guncelle.php"><img width="460" src="https://iasbh.tmgrup.com.tr/09120d/650/344/0/8/865/462?u=https://isbh.tmgrup.com.tr/sbh/2020/08/30/internet-sifresi-degistirme-turk-telekom-ttnet-modem-internet-sifresi-nasil-degistirilir-tk1-1598775757827.jpg"></a></center>
            </div>
        </form>
    <div class="spacer"></div>
</div>

<?php include "footer.php"; ?>