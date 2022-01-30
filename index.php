<?php
require_once "header.php";

?>
<!-- Header Area End Here -->
<!-- Main Banner 1 Area Start Here -->
<div class="main-banner2-area">
    <div class="container">
        <div class="main-banner2-wrapper">
            <h1>AlışverişGO Sitesine Hoşgeldiniz</h1>
            <p><?php echo $ayarcek['ayar_description']; ?></p>
            <form action="arama-detay.php" method="post">
                <div class="banner-search-area input-group">
                    <input class="form-control" name="searchkeyword" minlength="3" required placeholder="Aradığınız ürünü girin . . ." type="text">
                    <span class="input-group-addon">
                        <button type="submit" name="search">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Main Banner 1 Area End Here -->
<?php require_once "cok-satanlar.php"; ?>
<!-- Newest Products Area Start Here -->
<div class="newest-products-area bg-secondary section-space-default">
    <div class="container">
        <h2 class="title-default">Öne Çıkan Ürünler</h2>
    </div>
    <div class="container-fluid" id="isotope-container">
        <div class="isotope-classes-tab isotop-box-btn-white">
            <!-- <a href="#" data-filter=".onecikan">Öne Çıkanlar</a>   Uğraştrıcı Gerek yok
            <a href="#" data-filter=".yenigelen">Yeni Gelenler</a>
            <a href="#" data-filter=".coksatan">Çok Satanlar</a> -->
        </div>
        <div class="row featuredContainer">
            <!-- ÜRÜN ANASAYFA LİSTELEME -->

            <?php
            // urun.*, kategori.*, kullanici.*     daha kısa kullanımı ama verimlilik açısından aşağısı daha iyi
            $urunsor = $db->prepare("SELECT urun.urun_ad, urun.urun_id, urun.kategori_id, urun.urun_fiyat, urun.urunfoto_resimyol, urun.kullanici_id, urun.urun_durum, urun.urun_onecikar, kategori.kategori_id, kategori.kategori_ad, kullanici.kullanici_ad, kullanici.kullanici_soyad, kullanici.kullanici_id, kullanici.kullanici_magazafoto FROM urun INNER JOIN kategori ON urun.kategori_id=kategori.kategori_id INNER JOIN kullanici ON urun.kullanici_id=kullanici.kullanici_id WHERE urun_onecikar=:onecikar AND urun_durum=:durum
            ORDER BY  urun_zaman DESC LIMIT 8 ");
            $urunsor->execute(array(
                'onecikar' => 1,
                'durum' => 1
            ));

            while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 onecikan plugins component">
                    <div class="single-item-grid">
                        <div class="item-img">
                            <a href="urun-<?= seo($uruncek['urun_ad']) . "-" . $uruncek['urun_id']; ?>"><img style="height:252px; width:451px;" src="<?php echo $uruncek['urunfoto_resimyol']; ?>" alt="product" class="img-responsive"></a>
                            <div class="trending-sign" data-tips="Öne çıkan ürün"><i class="fa fa-bolt" aria-hidden="true"></i></div>
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

                                    <!-- <ul>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                        <li>(<span> 05</span> )</li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
        <div class="container">
            <!-- <ul class="btn-area">  Tümünü görüntüle butonu kullanmak istsersek
                <li class="hvr-bounce-to-right"><a href="#">Tüm Ürünler</a></li>
                <li class="hvr-bounce-to-left"><a href="#">Popüler Ürünler</a></li>
            </ul> -->
        </div>
    </div>
</div>
<!-- Newest Products Area End Here -->
<!-- Trending Products Area Start Here -->

<!-- Trending Products Area End Here -->
<!-- Why Choose Area Start Here -->
<div class="why-choose-area bg-primaryText section-space-default">
    <div class="container">
        <h2 class="title-textPrimary">Why You Choose Foxtar Market Place?</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="why-choose-box">
                    <a href="#"><i class="fa fa-gift" aria-hidden="true"></i></a>
                    <h3><a href="#">Easily Buy & Sell </a></h3>
                    <p>Dorem Ipsum is simply dummy text of the pring and typesetting industry. Lorem Ipsum has been the industry's standaum.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="why-choose-box">
                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                    <h3><a href="#">Quality Products</a></h3>
                    <p>Dorem Ipsum is simply dummy text of the pring and typesetting industry. Lorem Ipsum has been the industry's standaum.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="why-choose-box">
                    <a href="#"><i class="fa fa-lock" aria-hidden="true"></i></a>
                    <h3><a href="#">100% Secure Payment</a></h3>
                    <p>Dorem Ipsum is simply dummy text of the pring and typesetting industry. Lorem Ipsum has been the industry's standaum.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Why Choose Area End Here -->

<!-- Author Banner Area Start Here -->
<div class="author-banner-area">
    <div class="author-banner-wrapper">
        <div id="ri-grid" class="author-banner-bg ri-grid header text-center">
            <ul class="ri-grid-list">
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\4.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\4.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
            </ul>
        </div>
        <div class="author-banner-content">
            <ul>
                <li>
                    <p>Over <span> 20,000</span> Author Are Involved Here!</p>
                </li>
                <li><a href="#" class="btn-fill-textPrimary">Become A Author</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Author Banner Area End Here -->

<?php require_once "footer.php"; ?>