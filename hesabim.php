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
                if ($_GET['durum'] == 'no') { ?>
                    <div class="alert alert-danger">
                        <strong>HATA!</strong> güncelleme işlemi başarısız
                    </div>
                <?php } else if ($_GET['durum'] == 'ok') { ?>
                    <div class="alert alert-success">
                        <strong>Bilgi!</strong> Güncelleme İşlemi Başarılı
                    </div>
                <?php } ?>
                <form class="form-horizontal" action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">
                    <div class="settings-details tab-content">
                        <div class="tab-pane fade active in" id="Personal">
                            <h2 class="title-section">Kişisel Bilgileri Düzenle</h2>
                            <div class="personal-info inner-page-padding">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı Mail</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="kullanici_mail" disabled value="<?php echo $kullanicicek['kullanici_mail']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı İsim</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı Soyisim</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="kullanici_soyad" value="<?php echo $kullanicicek['kullanici_soyad']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı TC</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı GSM</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm']; ?>" type="text">
                                    </div>
                                </div>
                                <!-- <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">  GÜVENLİK SEBEBİYLE KULLANMIYORUZ -->
                                <div class="form-group">
                                    <div class="col-sm-12" align="right">
                                        <button type="submit" name="musteribilgiguncelle" class="btn update-btn" id="email-setting-save">Bilgileri Güncelle</button>
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