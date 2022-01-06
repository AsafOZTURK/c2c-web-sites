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
                            <h2 class="title-section">Adres Bilgilerimi Düzenle</h2>
                            <div class="personal-info inner-page-padding">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Hesap Türü</label>
                                    <div class="col-sm-9">
                                        <div class="custom-select">
                                            <?php $kullanici_tip = $kullanicicek['kullanici_tip']; ?>
                                            <select id="kullanici_tip" name="kullanici_tip" class='select2'>
                                                <option <?php if ($kullanici_tip == "PERSONAL") {
                                                            echo "selected";
                                                        } ?> value="PERSONAL">Bireysel</option>
                                                <option <?php if ($kullanici_tip == "PRIVATE_COMPANY") {
                                                            echo "selected";
                                                        } ?> value="PRIVATE_COMPANY">Kurumsal</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="tc">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Kullanıcı Tc</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="first-name" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc']; ?>" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div id="kurumsal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Firma Ünvan</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="first-name" name="kullanici_unvan" value="<?php echo $kullanicicek['kullanici_unvan']; ?>" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Firma Vergi No</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="first-name" name="kullanici_vno" value="<?php echo $kullanicicek['kullanici_vno']; ?>" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Firma Vergi Dairesi</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="first-name" name="kullanici_vdaire" value="<?php echo $kullanicicek['kullanici_vdaire']; ?>" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı İl</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="kullanici_il" value="<?php echo $kullanicicek['kullanici_il']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı İlçe</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı Adres</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" name="kullanici_adres" value="<?php echo $kullanicicek['kullanici_adres']; ?>" type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12" align="right">
                                        <button type="submit" name="adresbilgiguncelle" class="btn update-btn" id="email-setting-save">Bilgileri Güncelle</button>
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