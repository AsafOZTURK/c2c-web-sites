<?php

include "header.php";

$urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id=:id");
$urunsor->execute(array(
    'id' => $_GET["urun_id"]
));
$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

if ($urunsor->rowCount() == 0) {
    Header("Location:index.php?durum=izinsizmudahele");
    exit;
}


?>
<head>
    <title><?php echo $uruncek['urun_ad']; ?> - Mehmet Asaf ÖZTÜRK</title>
</head>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <div class="title-bg">
                <div class="title"><?php echo $uruncek['urun_ad']; ?></div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <?php
                    $urun_id = $uruncek['urun_id'];

                    $urunfotosor = $db->prepare("SELECT * FROM urunfoto WHERE urun_id=:urun_id ORDER BY urunfoto_sira ASC LIMIT 1");
                    $urunfotosor->execute(array(
                        'urun_id' => $urun_id,
                    ));

                    $urunfotocek = $urunfotosor->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="dt-img">
                        <div class="detpricetag">
                            <div class="inner"><?php echo $uruncek['urun_fiyat']; ?></div>
                        </div>
                        <a class="fancybox" href="" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="<?php echo $urunfotocek['urunfoto_resimyol']; ?>" alt="" class="img-responsive"></a>
                    </div>

                    <?php
                    $urunfotosor = $db->prepare("SELECT * FROM urunfoto WHERE urun_id=:urun_id ORDER BY urunfoto_sira ASC LIMIT 1,3");
                    $urunfotosor->execute(array(
                        'urun_id' => $urun_id,
                    ));

                    while ($urunfotocek = $urunfotosor->fetch(PDO::FETCH_ASSOC)) { ?>

                        <div class="thumb-img">
                            <a class="fancybox" href="" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="<?php echo $urunfotocek['urunfoto_resimyol']; ?>" alt="" class="img-responsive"></a>
                        </div>

                    <?php } ?>

                </div>
                <div class="col-md-6 det-desc">
                    <div class="productdata">
                        <div class="infospan">Ürün Kodu <span><?php echo $uruncek['urun_id']; ?></span></div>
                        <div class="infospan">Stok Sayısı<span>

                                <?php
                                if ($uruncek['urun_stok'] > 0) {
                                    echo $uruncek['urun_stok'];
                                } else {
                                    echo "Ürün Kalmadı";
                                }
                                ?>
                        </div>
                        <div class="average">
                        </div>
                        <form class="form-horizontal ava" action="nedmin/netting/islem.php" method="POST" role="form">

                            <div class="clearfix"></div>

                            <div class="form-group">
                                <label for="qty" class="col-sm-2 control-label">Adet</label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" name="urun_adet" value="1">
                                </div>
                                <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">
                                <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                                <div class="col-sm-4">
                                    <?php
                                    if (isset($_SESSION['userkullanici_mail'])) {?>

                                        <button type="submit" name="sepeteekle" class="btn btn-default btn-red btn-sm"><span class="addchart">Sepete Ekle </span></button>

                                    <?php } else {?>

                                        <button type="submit" disabled name="sepeteekle" class="btn btn-default btn-red btn-sm"><span class="addchart">Giriş Yapın</span></button>

                                    <?php } ?>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </form>

                        <div class="sharing">
                            <div class="avatock"><span></span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-review">
                <?php
                $urun_id = $uruncek['urun_id'];
                $kullanici_id = $kullanicicek['kullanici_id'];

                $yorumsor = $db->prepare("SELECT * FROM yorum WHERE urun_id=:urun_id AND yorum_onay=:onay");
                $yorumsor->execute(array(
                    'urun_id' => $urun_id,
                    'onay' => 1
                ));

                $sayii = $yorumsor->rowCount();
                ?>

                <ul id="myTab" class="nav nav-tabs shop-tab">
                    <li <?php if ($_GET['durum'] != 'ok') { ?> class="active" <?php } ?>><a href="#desc" data-toggle="tab">Ürün Detay</a></li>
                    <li <?php if ($_GET['durum'] == 'ok') { ?> class="active" <?php } ?>><a href="#rev" data-toggle="tab">Yorumlar(<?php echo $sayii; ?>)</a></li>

                    <li class=""><a href="#vid" data-toggle="tab">Ürün Video</a></li>
                </ul>
                <div id="myTabContent" class="tab-content shop-tab-ct">
                    <div class="tab-pane fade <?php if ($_GET['durum'] != 'ok') { ?> active in <?php } ?>" id="desc">
                        <p>
                            <?php echo $uruncek['urun_detay']; ?>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="vid">
                        <p>

                            <?php

                            if (strlen($uruncek['urun_video']) > 0) { ?>
                                <iframe width="500" height="250" src="<?php echo $uruncek['urun_video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php } else {
                                echo "Bu ürüne video eklenmemiş";
                            }
                            ?>

                        </p>
                    </div>
                    <div class="tab-pane fade <?php if ($_GET['durum'] == 'ok') { ?> active in <?php } ?>" id="rev">

                        <?php
                        if ($_GET['durum'] == 'ok') { ?>
                            <script>
                                alert("Yorum başarıyla eklendi! Yayınlanması için site yöneticisi tarafından onaylanmasını beklemeniz gerekiyor");
                            </script>

                        <?php }
                        while ($yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC)) {

                            $ykullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_id=:id");
                            $ykullanicisor->execute(array(
                                'id' => $yorumcek['kullanici_id']
                            ));
                            $ykullanicicek = $ykullanicisor->fetch(PDO::FETCH_ASSOC);

                            $ykullanici_ad = $ykullanicicek['kullanici_adsoyad'];
                        ?>
                            <p class="dash">
                                <span><?php echo $ykullanici_ad; ?> </span>(<?php echo $yorumcek['yorum_zaman']; ?>) <br><br>
                                <?php echo substr($yorumcek['yorum_detay'], 0, 100); ?>
                            </p>

                        <?php }
                        ?>

                        <h4>Yorum Yaz</h4>
                        <?php
                        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

                        if (isset($_SESSION['userkullanici_mail'])) { ?>

                            <form role="form" method="POST" action="nedmin/netting/islem.php">
                                <div class="form-group">
                                    <textarea placeholder="Lütfen yorumunuzu yazınız" name="yorum_detay" class="form-control" id="text"></textarea>
                                </div>
                                <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                                <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">
                                <input type="hidden" name="sayfa_url" value="<?php echo 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] ?>">
                                <button type="submit" name="yorumyap" class="btn btn-default btn-red btn-sm">Gönder</button>
                            </form>

                        <?php } else { ?>
                            Yorum yapmak için <a href="register.php">kayıt</a> olmalı yada giriş yapmalısınız.
                        <?php }
                        ?>

                    </div>
                </div>
            </div>

            <div id="title-bg">
                <div class="title">Benzer Ürünler</div>
            </div>
            <div class="row prdct">
                <!--Products-->
                <?php
                $kategori_id = $uruncek['kategori_id'];

                $urunsor = $db->prepare("SELECT * FROM urun WHERE kategori_id=:kategori_id ORDER BY RAND()  LIMIT 3");
                $urunsor->execute(array(
                    'kategori_id' => $kategori_id
                ));

                while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) { ?>

                    <div class="col-md-4">
                        <div class="productwrap">
                            <div class="pr-img">
                                <div class="hot"></div>
                                <a href="product.htm"><img src="images\sample-4.jpg" alt="" class="img-responsive"></a>
                                <div class="pricetag on-sale">
                                    <div class="inner on-sale"><span class="onsale"><span class="oldprice"></span><?php echo $uruncek['urun_fiyat']; ?></span></div>
                                </div>
                            </div>
                            <span class="smalltitle"><a href="product.htm"><?php echo $uruncek['urun_ad']; ?></a></span>
                            <span class="smalldesc">Stok Sayısı: <?php echo $uruncek['urun_stok ']; ?></span>
                        </div>
                    </div>

                <?php }
                ?>

            </div>
            <!--Products-->
            <div class="spacer"></div>
        </div>
        <!--Main content-->
        <?php include "sidebar.php"; ?>
    </div>
</div>

<?php include "footer.php"; ?>