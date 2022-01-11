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
                        <strong>HATA!</strong> İşlem Başarısız
                    </div>
                <?php } else if ($_GET['durum'] == 'ok') { ?>
                    <div class="alert alert-success">
                        <strong>Bilgi!</strong> Fotoğraf değiştirme işlemi başarılı
                    </div>
                <?php } ?>
                <form class="form-horizontal" action="nedmin/netting/kullanici.php" method="POST" enctype="multipart/form-data" id="personal-info-form">
                    <div class="settings-details tab-content">
                        <div class="tab-pane fade active in" id="Personal">
                            <h2 class="title-section">Profil Fotoğrafı Güncelle</h2>
                            <div class="personal-info inner-page-padding">
                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Mevcut Resim</label>
                                    <div class="col-sm-9">
                                       <img src="<?php echo $kullanicicek['kullanici_magazafoto'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Yeni Resim Seçiniz</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" required id="first-name" name="kullanici_magazafoto"  type="file">
                                    </div>
                                </div>
                                <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                                <div class="form-group">
                                    <div class="col-sm-12" align="right">
                                        <button type="submit" name="profilresimguncelle" class="btn update-btn" id="email-setting-save">Güncelle</button>
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