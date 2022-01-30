<?php 
//dosyanın dışsardan görünmesini engelleme
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    exit("Bu sayfaya erişim yasak");
}

?>
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 col-lg-pull-9 col-md-pull-8 col-sm-pull-8">
    <div class="fox-sidebar">
        <div class="sidebar-item">
            <div class="sidebar-item-inner">
                <h3 class="sidebar-item-title">Kategoriler</h3>
                <ul class="sidebar-categories-list">

                    <?php
                    $kategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_durum=:durum");
                    $kategorisor->execute(array(
                        'durum' => 1
                    ));
                    while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) {
                        $kategori_id = $kategoricek['kategori_id'];
                    ?>

                        <li><a href="kategori-<?= seo($kategoricek['kategori_ad']) . "-" . $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?><span>(
                            <?php
                            $urunsay = $db->prepare("SELECT COUNT(kategori_id) AS say FROM urun WHERE kategori_id=:id");
                            $urunsay->execute(array('id' => $kategori_id));
                            $saycek = $urunsay->fetch(PDO::FETCH_ASSOC);

                            echo $saycek['say'];
                            ?>)</span></a></li>
                    <?php }
                    ?>

                </ul>
            </div>
        </div>
        <div class="sidebar-item">
            <div class="sidebar-item-inner">
                <h3 class="sidebar-item-title">Fiyat Aralığı</h3>
                <div id="price-range-wrapper" class="price-range-wrapper">
                    <div id="price-range-filter"></div>
                    <div class="price-range-select">
                        <div class="price-range" id="price-range-min"></div>
                        <div class="price-range" id="price-range-max"></div>
                    </div>
                    <button class="sidebar-full-width-btn disabled" type="submit" value="Login"><i class="fa fa-search" aria-hidden="true"></i>Listele</button>
                </div>
            </div>
        </div>
        <!-- <div class="sidebar-item">
            <div class="sidebar-item-inner">
                <h3 class="sidebar-item-title">Top 10 Sellers</h3>
                <div class="sidebar-single-item-grid">
                    <div class="item-img">
                        <img src="img\product\sidebar1.jpg" alt="product" class="img-responsive">
                    </div>
                    <div class="item-content">
                        <div class="item-info">
                            <h3><a href="#">Team Component Pro</a></h3>
                            <span>Joomla Component</span>
                            <div class="price">$15</div>
                        </div>
                        <div class="item-profile">
                            <div class="profile-title">
                                <div class="img-wrapper"><img src="img\profile\1.jpg" alt="profile" class="img-responsive img-circle"></div>
                                <span>PsdBosS</span>
                            </div>
                            <div class="profile-rating">
                                <ul>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> -->
    </div>
</div>