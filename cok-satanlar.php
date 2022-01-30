<?php 
//dosyanın dışsardan görünmesini engelleme
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    exit("Bu sayfaya erişim yasak");
}

?>
<div class="trending-products-area section-space-default">
    <div class="container">
        <h2 class="title-default">Çok Satanlar</h2>
    </div>
    <div class="container=fluid">
        <div class="fox-carousel dot-control-textPrimary" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="true" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="true" data-r-small="2" data-r-small-nav="false" data-r-small-dots="true" data-r-medium="3" data-r-medium-nav="false" data-r-medium-dots="true" data-r-large="4" data-r-large-nav="false" data-r-large-dots="true">

            <?php
            $urunsor = $db->prepare("SELECT 
            COUNT(siparis_detay.urun_id) AS urunsay,
            urun.*,kullanici.*,kategori.*,siparis_detay.*
            FROM urun 
            INNER JOIN kategori 
            ON urun.kategori_id=kategori.kategori_id 
            INNER JOIN kullanici 
            ON urun.kullanici_id=kullanici.kullanici_id 
            INNER JOIN siparis_detay
            ON siparis_detay.urun_id=urun.urun_id
            WHERE urun_durum=:durum
            GROUP BY siparis_detay.urun_id
            ORDER BY urunsay DESC 
            LIMIT 8 
            ");

            $urunsor->execute(array(
                'durum' => 1
            ));

            while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img style="height:252px; width:451px;" src="<?php echo $uruncek['urunfoto_resimyol']; ?>" alt="product" class="img-responsive">
                        <div class="trending-sign" data-tips="Trending"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                    </div>
                    <div class="item-content">
                        <div class="item-info">
                            <h3><a href="urun-<?= seo($uruncek['urun_ad']) . "-" . $uruncek['urun_id']; ?>"><?php echo $uruncek['urun_ad']; ?></a></h3>
                            <span><a href="kategori-<?= seo($uruncek['kategori_ad']) . "-" . $uruncek['kategori_id']; ?>"><?php echo $uruncek['kategori_ad']; ?></a></span>
                            <div class="price"><?php echo $uruncek['urun_fiyat']; ?>TL</div>
                        </div>
                        <div class="item-profile">
                            <div class="profile-title">
                                <div class="img-wrapper">
                                    <img src="<?php echo $uruncek['kullanici_magazafoto']; ?>" style="width:36px;" alt="profile" class="img-responsive img-circle">
                                </div>
                                <span><a href="magaza-<?= seo($uruncek['kullanici_ad'] . "-" . $uruncek['kullanici_soyad']) . "-" . $uruncek['kullanici_id']; ?>"><?php echo $uruncek['kullanici_ad']; ?></a></span>
                            </div>
                            <div class="profile-rating">
                            <?php
                    $puansay = $db->prepare("SELECT 
                                    COUNT(yorum.yorum_puan) AS say,
                                    SUM(yorum.yorum_puan) AS topla,
                                    yorum.*,urun.* FROM yorum 
                                    INNER JOIN urun
                                    ON yorum.urun_id=urun.urun_id
                                    WHERE urun.kullanici_id=:id
                                    ");

                    $puansay->execute(array(
                        'id' => $uruncek['kullanici_id']
                    ));
                    $saycek = $puansay->fetch(PDO::FETCH_ASSOC);

                    $puan = $saycek['topla'];
                    $kisi = $saycek['say'];
                    $ortalama = round($puan / $kisi);

                    switch ($ortalama) {
                        case '5': ?>
                            <ul class="default-rating">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span><?php echo $ortalama; ?></span> )</li>
                            </ul><?php
                                    break;
                                case '4': ?>
                            <ul class="default-rating">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span><?php echo $ortalama;; ?></span> )</li>
                            </ul><?php
                                    break;
                                case '3': ?>
                            <ul class="default-rating">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span><?php echo $ortalama;; ?></span> )</li>
                            </ul><?php
                                    break;
                                case '2': ?>
                            <ul class="default-rating">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span><?php echo $ortalama;; ?></span> )</li>
                            </ul><?php
                                    break;
                                case '1': ?>
                            <ul class="default-rating">
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span><?php echo $ortalama; ?></span> )</li>
                            </ul><?php
                                    break;
                                case '0': ?>
                            <ul class="default-rating">
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i style="color:gray;" class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span><?php echo $ortalama; ?></span> )</li>
                            </ul><?php
                                    break;
                            }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>