<?php
require_once "header.php";

izinsizerisimkontrol();

?>

<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
            <!-- <ul>
                 <li><a href="index.htm">Home</a><span> -</span></li>
                 <li>Settings</li>
             </ul> -->
        </div>
    </div>
</div>
<div class="settings-page-area bg-secondary section-space-bottom">
    <div class="container">
        <div class="row settings-wrapper">
            <!-- Ayarlar sidebar start -->
            <?php require_once "hesap-sidebar.php"; ?>
            <!-- Ayarlar sidebar finish -->
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <?php
                if ($_GET['durum'] == 'eksiksifre') { ?>
                    <div class="alert alert-danger">
                        <strong>HATA!</strong> Eksik şifre girdiniz lütfen en az 6 karakterli şifre belirleyiniz
                    </div>
                <?php } else if ($_GET['durum'] == 'ok') { ?>
                    <div class="alert alert-success">
                        <strong>Bilgi!</strong> Şifre değiştirme işlemi başarılı
                    </div>
                <?php } else if ($_GET['durum'] == 'eskisifrehatali') { ?>
                    <div class="alert alert-danger">
                        <strong>Hata!!</strong> Eski Şifrenizi Yanlış Girdiniz
                    </div>
                <?php } else if ($_GET['durum'] == 'uyumsuzsifre') { ?>
                    <div class="alert alert-danger">
                        <strong>Hata!</strong> Girdiğiniz şifreler birbiriyle eşleşmiyor 
                    </div>
                <?php } ?>
                <form class="form-horizontal" action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">
                    <div class="settings-details tab-content">
                        <div class="tab-pane fade active in" id="Personal">
                            <h2 class="title-section">Parola Güncelle</h2>
                            <div class="personal-info inner-page-padding">
                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Eski Parola</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="kullanici_eskipassword" placeholder="Eski şifrenizi giriniz" type="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Yeni Parola</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="kullanici_passwordone" placeholder="Yeni şifrenizi giriniz" type="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Yeni Parola Tekrar</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="kullanici_passwordtwo" placeholder="Eski şifrenizi tekrar giriniz" type="password">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12" align="right">
                                        <button type="submit" name="musterisifreguncelle" class="btn update-btn" id="email-setting-save">Bilgileri Güncelle</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Settings Page End Here -->
<?php require_once "footer.php"; ?>