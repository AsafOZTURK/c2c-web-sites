<?php
include "header.php";

$kategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_id=:id");
$kategorisor->execute(array(
    'id' => $_GET["kategori_id"]
));
$kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC);

?>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kategori Ekleme<small>
                                <?php
                                if ($_GET['durum'] == 'ok') { ?>
                                    <b style="color:green;">İşlem Başarılı..</b>
                                <?php } elseif ($_GET['durum'] == 'no') { ?>
                                    <b style="color:red;">İşlem Başarısız!..</b>
                                <?php } ?>
                            </small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Adı<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="kategori_ad"  required class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seo Url<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="kategori_seourl" readonly class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Sıra<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="kategori_sira"  required class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Durum<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="heard" name="kategori_durum" required class="form-control">

                                        <option value="1" <?php echo $kategoricek["kategori_durum"] == '1' ? 'selected""' : ''; ?>>Aktif</option>

                                        <option value="0" <?php if ($kategoricek["kategori_durum"] == 0) {
                                                                echo 'selected=""';
                                                            } ?>>Pasif</option>

                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="kategori_id" value="<?php echo $kategoricek["kategori_id"]; ?>">
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="kategoriekle" class="btn btn-success">Güncelle</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>