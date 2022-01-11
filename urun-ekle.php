<?php
require_once "header.php";

izinsizerisimkontrol();
$kategorisor = $db->prepare("SELECT * FROM kategori");
$kategorisor->execute();


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
                        <strong>HATA!</strong> Ürün ekleme işlemi başarısız
                    </div>
                <?php }  ?>
                <form class="form-horizontal" action="nedmin/netting/kullanici.php" method="POST" enctype="multipart/form-data" id="personal-info-form">
                    <div class="settings-details tab-content">
                        <div class="tab-pane fade active in" id="Personal">
                            <h2 class="title-section">Ürün Ekleme</h2>
                            <div class="personal-info inner-page-padding">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Ürün Resim</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="urunfoto_resimyol" type="file">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <div class="custom-select">
                                            <?php $kategori_id = $kullanicicek['kategori_id']; ?>
                                            <select name="kategori_id" class='select2'>
                                                <?php
                                                while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>

                                                    <option value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Ürün Adı</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="urun_ad" placeholder="Ürün adını giriniz" type="text">
                                    </div>
                                </div>
                                <!-- Ck Editör Başlangıç -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="first-name">Ürün Detay</label>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <textarea class="ckeditor" id="editor1" placholder="Ürün açıklamamızı buraya giriyoruz" name="urun_detay"></textarea>
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
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Ürün Fiyat</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="urun_fiyat" min="0" placeholder="Ürün fiyatını giriniz" type="number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12" align="right">
                                        <button type="submit" name="urunekle" class="btn update-btn" id="email-setting-save">Ürün Ekle</button>
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

<script type="text/javascript">
    $(document).ready(function() {

        $("#kullanici_tip").change(function() {

            var tip = $("#kullanici_tip").val();

            if (tip == "PERSONAL") {

                $("#kurumsal").hide();
                $("#tc").show();

            } else if (tip == "PRIVATE_COMPANY") {

                $("#tc").hide();
                $("#kurumsal").show();

            }
        }).change();
    });
</script>