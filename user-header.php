<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 col-lg-push-3 col-md-push-4 col-sm-push-4">
    <div class="inner-page-main-body">
        <div class="single-banner">
            <img src="img\banner\1.jpg" alt="product" class="img-responsive">
        </div>
        <div class="author-summery">
            <div class="single-item">
                <div class="item-title">Şehir:</div>
                <div class="item-details"><?php echo $kullanicicek['kullanici_il']; ?></div>
            </div>
            <div class="single-item">
                <div class="item-title">Üyelik Tarihi:</div>
                <div class="item-details"><?php echo $kullanicicek['kullanici_zaman']; ?></div>
            </div>
            <div class="single-item">
                <div class="item-title">Kullanıcı Güvenilirlik:</div>
                <div class="item-details">

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
                        'id' => $_GET['kullanici_id']
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
            <div align="center" class="single-item">
                <div class="item-title">Toplam Satış:</div>
                <?php
                $urunsay = $db->prepare("SELECT COUNT(kullanici_idsatici) AS say FROM siparis_detay WHERE kullanici_idsatici=:id");
                $urunsay->execute(array(
                    'id' => $_GET['kullanici_id']
                ));
                $saycek = $urunsay->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="item-name"><?php echo $saycek['say']; ?></div>
            </div>
        </div>
    </div>
</div>