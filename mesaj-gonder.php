<?php
require_once "header.php";

izinsizerisimkontrol();


$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
$kullanicisor->execute(array(
  'id' => $_GET['kullanici_gelen']
));

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);



?>
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
       
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
                        <strong>HATA!</strong> Mesaj gönderme işlemi başarısız
                    </div>
                <?php } else if ($_GET['durum'] == 'ok') { ?>
                    <div class="alert alert-success">
                        <strong>Bilgi!</strong> Mesajınız başarıyla gönderildi
                    </div>
                    <?php }?>
                <form class="form-horizontal" action="nedmin/netting/kullanici.php" method="POST"  id="personal-info-form">
                    <div class="settings-details tab-content">
                        <div class="tab-pane fade active in" id="Personal">
                            <h2 class="title-section">Mesaj Gönder</h2>
                            <div class="personal-info inner-page-padding">      
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Gönderilen Kişi</label>
                                    <div class="col-sm-9">
                                        <input disabled class="form-control"  value="<?php echo $kullanicicek['kullanici_ad'] ." " . $kullanicicek['kullanici_soyad'];?>" type="text">
                                    </div>
                                </div>
                                <!-- Ck Editör Başlangıç -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="first-name">Mesaj</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <textarea class="ckeditor" id="editor1" placholder="Lütfen mesajınızı buraya giriniz" name="mesaj_detay"></textarea>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    CKEDITOR.replace('editor1', {
                                        filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
                                        filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',
                                        filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',
                                        filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                        filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                        filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                        forcePasteAsPlainText: true
                                    });
                                </script>
                                <!-- Ck Editör Bitiş -->
                                <input type="hidden" name="kullanici_gelen" value="<?php echo $_GET['kullanici_gelen'] ?>">
                                <div class="form-group">
                                    <div class="col-sm-12" align="right">
                                        <button type="submit" name="mesajgonder" class="btn update-btn" id="email-setting-save">Gönder</button>
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
