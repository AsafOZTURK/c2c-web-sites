<?php

include "header.php";

$kullanici_id = $kullanicicek['kullanici_id'];

$sepetsor = $db->prepare("SELECT * FROM sepet WHERE kullanici_id=:id");
$sepetsor->execute(array(
    'id' => $kullanici_id
));
$sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC);


?>

<div class="container">
    <div class="title-bg">
        <div class="title">Ödeme Sayfası</div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered chart">
            <thead>
                <tr>
                    <th>Ürün Kodu</th>
                    <th>Ürün Görsel</th>
                    <th>Ürün Adı</th>
                    <th>Ürün Fiyatı</th>
                    <th>Ürün Adeti</th>
                    <th>Toplam</th>
                </tr>
            </thead>

            <form action="nedmin/netting/islem.php" method="POST">
                <tbody>
                    <?php
                    $toplam = 0;
                    while ($sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC)) {
                        $urun_id = $sepetcek['urun_id'];

                        $urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id=:id");
                        $urunsor->execute(array(
                            'id' => $urun_id
                        ));

                        $uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);


                        $a = $sepetcek['urun_adet'];
                        $b = $uruncek['urun_fiyat'];
                        $c = $a * $b;

                        $toplam += $c;
                    ?>
                        <!-- <input type="hidden" name="urun_id[]" value="<?php echo $uruncek['urun_id'] ?>"> -->
                        <tr>
                            <td width="40"><?php echo $b = $uruncek['urun_id']; ?></td>
                            <td><img src="images\demo-img.jpg" width="60"></td>
                            <td width="400"><?php echo $uruncek['urun_ad']; ?></td>
                            <td><?php echo $b = $uruncek['urun_fiyat']; ?>TL </td>
                            <td>
                                <input type="text" value="<?php echo $sepetcek['urun_adet']; ?>" class="form-control quantity">
                            </td>
                            <td><?php echo $c; ?>TL</td>
                        </tr>
                    <?php } ?>
                </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-3 col-md-offset-3">
            <div class="subtotal-wrap">
                <div class="total">Toplam Fiyat : <span class="bigprice"><?php echo $toplam ?> TL</span></div>
                <div class="clearfix"></div>
                <!-- <a href="" class="btn btn-default btn-yellow">Ödeme Sayfası</a> -->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="tab-review">
        <ul id="myTab" class="nav nav-tabs shop-tab">
            <li class="active"><a href="#desc" data-toggle="tab">Kredi Kartı</a></li>
            <li><a href="#rev" data-toggle="tab">Banka Havalesi </a></li>
        </ul>
        <div id="myTabContent" class="tab-content shop-tab-ct">

            <div class="tab-pane fade active in" id="desc">
                <div class="row">
                    <?php include "iyzico/buyer.php"; ?>
                    <div id="iyzipay-checkout-form" class="responsive"></div>
                </div>
            </div>
            
            <div class="tab-pane fade " id="rev">
                <p>Ödeme yapacağınız hesap numarasını seçerek işlemi tamamlayınız.</p>

                <?php
                $bankasor = $db->prepare("SELECT * FROM banka order by banka_id ASC");
                $bankasor->execute();

                while ($bankacek = $bankasor->fetch(PDO::FETCH_ASSOC)) { ?>
                    <input type="radio" name="siparis_banka" value="<?php echo $bankacek['banka_ad'] ?>">
                    <?php echo $bankacek['banka_ad']; ?>
                    <?php echo $bankacek['banka_iban'];?>
                    <br>
                <?php } ?>

                <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                <input type="hidden" name="siparis_toplam" value="<?php echo $toplam ?>">
                <hr>
                <button class="btn btn-success" type="submit" name="siparisekle">Sipariş Ver</button>
                </form>
            </div>
        </div>
    </div>
    <div class="spacer"></div>
</div>

<?php include "footer.php"; ?>