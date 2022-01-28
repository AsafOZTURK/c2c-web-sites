<?php
require_once "header.php";

$kullanici_id =  $_GET['kullanici_id'];
$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_id=:id AND kullanici_magaza=:magaza");
$kullanicisor->execute(array(
    'id' => $kullanici_id,
    'magaza' => 2
));

$say = $kullanicisor->rowCount();
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

if ($say == 0) {
    Header("Location:404.php");
}

?>
<!-- Profile Page Start Here -->
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
<div class="profile-page-area bg-secondary section-space-bottom">
    <div class="container">
        <div class="row">
            <!-- KULLANICI ÜST BANNER -->
            <?php require_once "user-header.php"; ?>
            <!-- KULLANICI ÜST BANNER -->
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 col-lg-pull-9 col-md-pull-8 col-sm-pull-8">
                <div class="fox-sidebar">
                    <div class="sidebar-item">
                        <div class="sidebar-item-inner">
                            <h3 class="sidebar-item-title">Satıcı</h3>
                            <div class="sidebar-author-info">
                                <div class="sidebar-author-img">
                                    <img src="<?php echo $kullanicicek['kullanici_magazafoto']; ?>" alt="product" class="img-responsive">
                                </div>
                                <div class="sidebar-author-content">
                                    <h3><?php echo $kullanicicek['kullanici_ad'] . " " . $kullanicicek['kullanici_soyad'] ?></h3>
                                    <a href="#" class="view-profile"><i class="fa fa-circle" aria-hidden="true"></i>Online</a>
                                </div>
                            </div>
                            <ul class="sidebar-badges-item">
                                <li><img src="img\profile\badges1.png" alt="badges" class="img-responsive"></li>
                                <li><img src="img\profile\badges2.png" alt="badges" class="img-responsive"></li>
                                <li><img src="img\profile\badges3.png" alt="badges" class="img-responsive"></li>
                                <li><img src="img\profile\badges4.png" alt="badges" class="img-responsive"></li>
                                <li><img src="img\profile\badges5.png" alt="badges" class="img-responsive"></li>
                            </ul>
                        </div>
                    </div>

                    <ul class="sidebar-product-btn">

                        <?php
                        if ($_SESSION['userkullanici_id'] != $_GET['kullanici_id']) { ?>

                            <li><a href="mesaj-gonder.php?kullanici_gelen=<?php echo $_GET['kullanici_id']; ?>" class="buy-now-btn" id="buy-button"><i class="fa fa-envelope-o" aria-hidden="true"></i> Mesaj Gönder</a></li>

                        <?php } else { ?>

                            <li><button disabled="" class="buy-now-btn" id="buy-button"><i class="fa fa-ban" aria-hidden="true"></i> Mesaj Gönder</button></li>

                        <?php }
                        ?>

                    </ul>
                    <br>

                </div>
            </div>
        </div>
        <div class="row profile-wrapper">
            <!-- KULLANICI SİDEBAR -->
            <?php require_once "user-sidebar.php"; ?>
            <!-- KULLANICI SİDEBAR -->

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
                <div class="tab-content">
                    <div class="tab-pane fade  active in" id="Products">
                        <h3 class="title-inner-section">Ürünler</h3>
                        <div class="inner-page-main-body">
                            <div class="row more-product-item-wrapper">
                                <?php
                                $urunlersor = $db->prepare("SELECT urun.*,kategori.* FROM urun INNER JOIN kategori ON urun.kategori_id=kategori.kategori_id WHERE urun.kullanici_id=:id");
                                $urunlersor->execute(array(
                                    'id' => $kullanicicek['kullanici_id']
                                ));

                                while ($urunlercek = $urunlersor->fetch(PDO::FETCH_ASSOC)) {  ?>

                                    <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6">
                                        <div class="more-product-item">

                                            <div class="more-product-item-details">
                                                <h4><a href="urun-<?= seo($urunlercek['urun_ad']) . "-" . $urunlercek['urun_id']; ?>"><?php echo mb_substr($urunlercek['urun_ad'], 0, 33, "UTF-8"); ?></a></h4>
                                                <div class="p-title"><a href="kategori-<?= seo($urunlercek['kategori_ad']) . "-" . $urunlercek['kategori_id']; ?>"><?php echo $urunlercek['kategori_ad']; ?></a></div>
                                                <div class="p-price"><?php echo $urunlercek['urun_fiyat']; ?>TL</div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Profile Page End Here -->
<?php require_once "footer.php"; ?>