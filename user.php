 <?php
    require_once "header.php";

    $kullanici_id =  $_GET['kullanici_id'];
    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_id=:id AND kullanici_magaza=:magaza");
    $kullanicisor->execute(array(
        'id' => $kullanici_id,
        'magaza' => 2
    ));

    $say = $kullanicisor -> rowCount();
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
                                 <ul class="default-rating">
                                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                     <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                     <li>(<span> 05</span> )</li>
                                 </ul>
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
                             <!-- <ul class="sidebar-badges-item">
                                 <li><img src="img\profile\badges1.png" alt="badges" class="img-responsive"></li>
                                 <li><img src="img\profile\badges2.png" alt="badges" class="img-responsive"></li>
                                 <li><img src="img\profile\badges3.png" alt="badges" class="img-responsive"></li>
                                 <li><img src="img\profile\badges4.png" alt="badges" class="img-responsive"></li>
                                 <li><img src="img\profile\badges5.png" alt="badges" class="img-responsive"></li>
                             </ul> -->
                         </div>
                     </div>

                     <ul class="sidebar-product-btn">
                         <li><a href="contact.htm" class="buy-now-btn" id="buy-button"><i class="fa fa-envelope-o" aria-hidden="true"></i> Mesaj Gönder</a></li>
                     </ul>
                     <br>

                 </div>
             </div>
         </div>
         <div class="row profile-wrapper">
             <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                 <ul class="profile-title">
                     <li class="active"><a href="#Products" data-toggle="tab" aria-expanded="false"><i class="fa fa-cart-plus" aria-hidden="true"></i> Ürünler (

                             <?php
                                $urunsay = $db->prepare("SELECT COUNT(urun_id) AS say FROM urun WHERE kullanici_id=:id");
                                $urunsay->execute(array(
                                    'id' => $kullanicicek['kullanici_id']
                                ));
                                $saycek = $urunsay->fetch(PDO::FETCH_ASSOC);

                                echo $saycek['say'];
                                ?>
                             )</span></a></li>
                 </ul>
             </div>
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
                                                 <h4><a href="urun-<?= seo($urunlercek['urun_ad']) . "-" . $urunlercek['urun_id']; ?>"><?php echo mb_substr($urunlercek['urun_ad'],0,33,"UTF-8"); ?></a></h4>
                                                 <div class="p-title"><a href="kategori-<?= seo($urunlercek['kategori_ad']). "-" . $urunlercek['kategori_id']; ?>"><?php echo $urunlercek['kategori_ad']; ?></a></div>
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