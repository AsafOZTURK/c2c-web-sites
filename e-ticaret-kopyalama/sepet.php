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
        <div class="title">Alışveriş Sepetim</div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered chart">
            <thead>
                <tr>

                    <th>Remove</th>
                    <th>Ürün Kodu</th>
                    <th>Ürün Görsel</th>
                    <th>Ürün Adı</th>
                    <th>Ürün Fiyatı</th>
                    <th>Ürün Adeti</th>
                    <th>Toplam</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $toplam= 0;
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
                    <tr>
                        <td>
                            <form><input type="checkbox"></form>
                        </td>
                        <td width="40"><?php echo $b = $uruncek['urun_id']; ?></td>
                        <td><img src="images\demo-img.jpg" width="60"></td>
                        <td width="400"><?php echo $uruncek['urun_ad']; ?></td>
                        <td><?php echo $b = $uruncek['urun_fiyat']; ?>TL </td>
                        <td><form><?php echo $sepetcek['urun_adet']; ?></form></td>
                        <td><?php echo $c; ?>TL</td>
                    </tr>
                <?php }

                ?>

            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-3 col-md-offset-3">
            <div class="subtotal-wrap">
                <div class="total">Toplam Fiyat: <span class="bigprice"><?php echo $toplam; ?> TL</span></div>
                <div class="clearfix"></div>
                <a href="odeme.php" class="btn btn-default btn-yellow">Alışverişi Tamamla</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="spacer"></div>
</div>
<?php include "footer.php"; ?>