<?php
require_once "header.php";

izinsizerisimkontrol();

$siparissor = $db->prepare("SELECT * FROM siparis WHERE kullanici_id=:kullanici_id ORDER BY siparis_zaman ASC");
$siparissor->execute(array(
    'kullanici_id' => $_SESSION['userkullanici_id']
));
$sipariscek = $siparissor->fetch(PDO::FETCH_ASSOC);


?>

<head>
    <style>
        input {
            margin-left: 20px !important;
        }
    </style>
</head>
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
                <div class="settings-details tab-content">
                    <div class="tab-pane fade active in" id="Personal">
                        <h2 class="title-section"><?php echo $sipariscek['siparis_id']; ?> Numaralı Sipariş</h2>
                        <div class="personal-info inner-page-padding">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Ürün Adı</th>
                                        <th scope="col">Ürün Fiyatı</th>
                                        <th scope="col">Satıcı Adı</th>
                                        <th scope="col">Durum</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $siparisdetay = $db->prepare("SELECT 
                                    urun.*,kullanici.*,siparis.*,siparis_detay.* 
                                    FROM siparis 
                                    INNER JOIN siparis_detay 
                                    ON siparis.siparis_id=siparis_detay.siparis_id 
                                    INNER JOIN urun
                                    ON urun.urun_id=siparis_detay.urun_id
                                    INNER JOIN kullanici
                                    ON kullanici.kullanici_id=siparis_detay.kullanici_idsatici
                                    WHERE siparis.siparis_id=:siparisdetay_id
                                    ");

                                    $siparisdetay->execute(array(
                                        'siparisdetay_id' => $_GET['siparis_id']
                                    ));

                                    $detaycek = $siparisdetay->fetch(PDO::FETCH_ASSOC);
                                    ?>

                                    <tr>
                                        <th scope="row">#</th>
                                        <td><?php echo $detaycek['urun_ad']; ?></td>
                                        <td><?php echo $detaycek['urun_fiyat']; ?></td>
                                        <td><?php echo $detaycek['kullanici_ad'] . " " . $detaycek['kullanici_soyad'] ?></td>
                                        <td>
                                            <?php
                                            if ($detaycek['siparisdetay_onay'] == 1) { ?>

                                                <a href="nedmin/netting/kullanici.php?urunonay=ok&siparis_id=<?php echo $detaycek['siparis_id']; ?>&siparisdetay_id=<?php echo $detaycek['siparisdetay_id']; ?>"><button class="btn btn-warning btn-xs">Onay Ver</button></a>

                                            <?php } else if ($detaycek['siparisdetay_onay'] == 2) { ?>

                                                <button class="btn btn-success btn-xs">Onaylandı</button>

                                            <?php } else if ($detaycek['siparisdetay_onay'] == 0) { ?>

                                                <button class="btn btn-success btn-xs">Teslim Edilmesi Bekleniyor</button>

                                            <?php }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                            if ($detaycek['siparisdetay_onay'] == 2 & $detaycek['siparisdetay_yorum'] == 0) { ?>

                                <form class="form-horizontal" action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">
                                    <div class="settings-details tab-content">
                                        <div class="tab-pane fade active in" id="Personal">
                                            <h2 class="title-section">Deneyiminizi Yorumlayın ve Puanlayın</h2>
                                            <div class="personal-info inner-page-padding">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Puan</label>
                                                    <div class="col-sm-9">
                                                        <input type="radio" name="yorum_puan" value="1"> 1
                                                        <input type="radio" name="yorum_puan" value="2"> 2
                                                        <input type="radio" name="yorum_puan" value="3"> 3
                                                        <input type="radio" name="yorum_puan" value="4"> 4
                                                        <input type="radio" name="yorum_puan" value="5"> 5
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Yorumunuz</label>
                                                    <div class="col-sm-9">
                                                        <textarea style="height:150px;" class="form-control" required name="yorum_detay" placeholder="Yorumunuzu giriniz"></textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="urun_id" value="<?php echo $detaycek['urun_id']; ?>">
                                                <input type="hidden" name="siparis_id" value="<?php echo $_GET['siparis_id']; ?>">

                                                <div class="form-group">
                                                    <div class="col-sm-12" align="right">
                                                        <button type="submit" name="yorumkaydet" class="btn update-btn">Gönder</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php } else if ($detaycek['siparisdetay_yorum'] == 1) { ?>
                                <div class="alert alert-success">
                                    <strong>Bilgi!</strong> Yorumunuz onaylandıktan sonra yayınlanacaktır. Teşekkür Ederiz
                                </div>
                            <?php }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Settings Page End Here -->
<?php require_once "footer.php"; ?>