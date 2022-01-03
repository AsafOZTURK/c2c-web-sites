<?php

include 'header.php';

if (isset($_POST['arama'])) {

    $kelime = $_POST['aranan'];

	$urunsor=$db->prepare("SELECT * FROM urun WHERE urun_ad LIKE ?");
	$urunsor->execute(array("%$kelime%"));

    $say=$urunsor->rowCount();

} else {
    Header("Location:index.php?durum=bos");
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <div class="title-bg">
                <div class="title">Arama Sonuçları</div>
            </div>
            <div class="row prdct">
                <!--Products-->

                <?php
                if ($say==0) {
                    echo "Aradığınız kelimeye uygun ürün bulunamadı";
                }

                while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) { 
                    $urun_id = $uruncek['urun_id'];

                    $urunfotosor = $db->prepare("SELECT * FROM urunfoto WHERE urun_id=:urun_id ORDER BY urunfoto_sira ASC LIMIT 1");
                    $urunfotosor->execute(array(
                    'urun_id' => $urun_id,
                    ));

                    $urunfotocek = $urunfotosor->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <div class="col-md-4">
                        <div class="productwrap">
                            <div class="pr-img">
                                <div class="hot"></div>
                                <a href="urun-<?= seo($uruncek["urun_ad"]) . '-' . $uruncek["urun_id"] ?>"><img src="<?php echo $urunfotocek['urunfoto_resimyol']; ?>" alt="" class="img-responsive"></a>
                                <div class="pricetag on-sale">
                                    <div class="inner on-sale"><span class="onsale"><span class="oldprice"></span><?php echo $uruncek['urun_fiyat']; ?>TL</span></div>
                                </div>
                            </div>
                            <span class="smalltitle"><a href="#"><?php echo $uruncek['urun_ad']; ?></a></span>
                            <span class="smalldesc">Stok Sayısı: <?php echo $uruncek['urun_stok']; ?></span>
                        </div>
                    </div>
                <?php }

                ?>
            </div>
            <!--Products-->
            <ul class="pagination shop-pag">
                <!--pagination
                <li><a href="#"><i class="fa fa-caret-left"></i></a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
            </ul>
            pagination-->
        </div>
        <?php include "sidebar.php"; ?>
    </div>
    <div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>