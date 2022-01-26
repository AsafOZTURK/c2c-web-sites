<?php

require_once "header.php";

izinsizerisimkontrol();

$siparissor = $db->prepare("SELECT * FROM siparis WHERE kullanici_id=:kullanici_id ORDER BY siparis_zaman ASC");

$siparissor->execute(array(
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
                                        <th scope="col">Sipariş Tarih</th>
                                        <th scope="col">Sipariş No</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    $sayi = 0;
                                    while ($sipariscek = $siparissor->fetch(PDO::FETCH_ASSOC)) { $sayi++; ?>
                                        <tr>
                                            <th scope="row"><?php echo $sayi; ?></th>
                                            <td><?php echo $sipariscek['siparis_zaman']; ?></td>
                                            <td><?php echo $sipariscek['siparis_id']; ?></td>
                                            <td><a href="siparis-detay.php?siparis_id=<?php echo $sipariscek['siparis_id']; ?>"><button class="btn btn-primary btn-xs">Detay</button></a></td>
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