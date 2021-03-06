<?php

require_once "header.php";

izinsizerisimkontrol();

$siparissor = $db->prepare("SELECT siparis.*,siparis_detay.*,kullanici.*,urun.*
FROM siparis 
INNER JOIN siparis_detay 
ON siparis.siparis_id=siparis_detay.siparis_id 
INNER JOIN kullanici
ON kullanici.kullanici_id = siparis_detay.kullanici_id
INNER JOIN urun
ON urun.urun_id=siparis_detay.urun_id
WHERE siparis.kullanici_idsatici=:satici_id 
AND siparisdetay_onay=:onay
OR siparisdetay_onay=:onays
ORDER BY siparis_zaman ASC");

$siparissor->execute(array(
    'satici_id' => $_SESSION['userkullanici_id'],
    'onay' => 1,
    'onays' => 0
));

// $siparissor=$db->prepare("SELECT siparis.*,siparis.kullanici_idsatici as satici,siparis_detay.*,kullanici.*,urun.* FROM siparis 
//                     INNER JOIN siparis_detay 
//                     ON siparis.siparis_id=siparis_detay.siparis_id 
//                     INNER JOIN kullanici 
//                     ON kullanici.kullanici_id=siparis_detay.kullanici_id 
//                     INNER JOIN urun 
//                     ON urun.urun_id=siparis_detay.urun_id 
//                     where siparis.kullanici_idsatici=:satici
//                     and siparis_detay.siparisdetay_onay=:onay 
//                     or siparis_detay.siparisdetay_onay=:onays)                 
//                     order by siparis_zaman DESC
//                     ");
 
//                   $siparissor->execute(array(
//                     'satici' => $_SESSION['userkullanici_id'],
//                     'onay' => 0,
//                     'onays' => 1
//                   ));

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
                <div class="settings-details tab-content">
                    <div class="tab-pane fade active in" id="Personal">
                        <h2 class="title-section">Yeni Sipari??lerim</h2>
                        <div class="personal-info inner-page-padding">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Sipari?? Tarih</th>
                                        <th scope="col">Sipari?? No</th>
                                        <th scope="col">??r??n Ad</th>
                                        <th scope="col">??r??n Fiyat</th>
                                        <th scope="col">Kullanici Ad</th>
                                        <th scope="col">Durum</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $sayi = 0;
                                    while ($sipariscek = $siparissor->fetch(PDO::FETCH_ASSOC)) {
                                        $sayi++; ?>
                                        <tr>
                                            <th scope="row"><?php echo $sayi; ?></th>
                                            <td><?php echo $sipariscek['siparis_zaman']; ?></td>
                                            <td><?php echo $sipariscek['siparis_id']; ?></td>
                                            <td><?php echo $sipariscek['urun_ad']; ?></td>
                                            <td><?php echo $sipariscek['urun_fiyat']; ?></td>
                                            <td><?php echo $sipariscek['kullanici_ad'] . " ". $sipariscek['kullanici_soyad'] ?></td>
                                            
                                            <td>
                                                <?php
                                                if ($sipariscek['siparisdetay_onay'] == 0) { ?>

                                                    <a href="nedmin/netting/kullanici.php?urunteslim=ok&siparis_id=<?php echo $sipariscek['siparis_id']; ?>&siparisdetay_id=<?php echo $sipariscek['siparisdetay_id']; ?>"><button class="btn btn-warning btn-xs">Teslim Et</button></a>

                                                <?php } else if ($sipariscek['siparisdetay_onay'] == 1) { ?>

                                                    <button class="btn btn-success btn-xs"> Al??c??dan Onay Bekliyor</button>

                                                <?php } 
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Settings Page End Here -->
<?php require_once "footer.php"; ?>