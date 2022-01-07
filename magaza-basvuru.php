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
                            <h2 class="title-section">Adres Bilgilerimi Düzenle</h2>
                            <div class="personal-info inner-page-padding">
                                <p>Başvuru işlemini tamamlamak için tüm bilgilerinizin eksiksiz olması gerekmektedir</p>
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
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı İsim</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" required name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı Soyisim</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" required name="kullanici_soyad" value="<?php echo $kullanicicek['kullanici_soyad']; ?>" type="text">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı GSM</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" required name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm']; ?>" type="text">
                                    </div>
                                </div>
                                <div id="tc">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Kullanıcı Tc</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="first-name" required name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc']; ?>" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div id="kurumsal">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Firma Ünvan</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="first-name" required name="kullanici_unvan" value="<?php echo $kullanicicek['kullanici_unvan']; ?>" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Firma Vergi No</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="first-name" required name="kullanici_vno" value="<?php echo $kullanicicek['kullanici_vno']; ?>" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Firma Vergi Dairesi</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="first-name" required name="kullanici_vdaire" value="<?php echo $kullanicicek['kullanici_vdaire']; ?>" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı İl</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" required name="kullanici_il" value="<?php echo $kullanicicek['kullanici_il']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı İlçe</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="first-name" required name="kullanici_ilce" value="<?php echo $kullanicicek['kullanici_ilce']; ?>" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Kullanıcı Adres</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="first-name" required name="kullanici_adres" value="<?php echo $kullanicicek['kullanici_adres']; ?>"><?php echo $kullanicicek['kullanici_adres']; ?></textarea>
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