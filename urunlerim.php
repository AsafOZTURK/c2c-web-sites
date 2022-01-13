<?php

require_once "header.php";

izinsizerisimkontrol();

$urunsor = $db->prepare("SELECT * FROM urun WHERE kullanici_id=:kullanici_id ORDER BY urun_zaman ");
$urunsor->execute(array(
    'kullanici_id' => $_SESSION['userkullanici_id']
));


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
                        <h2 class="title-section">Ürünlerim</h2>
                        <div class="personal-info inner-page-padding">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Ürün Tarih</th>
                                        <th scope="col">Ürün Adı</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    $sayi = 0;
                                    while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) { $sayi++; ?>
                                        <tr>
                                            <th scope="row"><?php echo $sayi; ?></th>
                                            <td><?php echo $uruncek['urun_zaman']; ?></td>
                                            <td><?php echo $uruncek['urun_ad']; ?></td>
                                            <td><a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></td>
                                            <?php
                                            if ($uruncek["urun_durum"] == 0) { ?>

                                                <td align="center"><button class="btn btn-warning btn-xs">Onay Bekliyor</button></td>

                                            <?php } else if ($uruncek["urun_durum"] == 1) { ?>

                                            <td align="center"><a onclick="return confirm('Bu ürünü silmek istiyor musunuz?')" href="nedmin/netting/kullanici.php?urunsil=ok&urunfoto_resimyol=<?php echo $uruncek['urunfoto_resimyol'];?>&urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-danger btn-xs">Sil</button></a></td>
                                            <?php } ?>
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