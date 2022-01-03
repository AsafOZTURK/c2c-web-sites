<?php
include 'header.php';

$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE 
    kullanici_mail=:kullanici_mail"
);

$kullanicisor->execute(array(
    'kullanici_mail' => $_SESSION['userkullanici_mail']
));

$kullanıcisor = $kullanıcisor->rowCount();

if ($kullanıcisor == "0") {
    echo "Yetkisiz erişim";
}

?>

<div class="container">
    <div class="clearfix"></div>
    <div class="lines"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
    <div class="title-bg">
        <div class="title">Sipariş Detay</div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered chart">
            <thead>
                <tr>
                    <th>Ürün ad</th>
                    <th>Ürün Kodu</th>
                    <th>Adet</th>
                    <th>Toplam Fiyat</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $siparis_id = $_GET['siparis_id'];
                $kullanici_id = $kullanicicek['kullanici_id'];

                $siparisdetaysor = $db->prepare("SELECT * FROM siparis where siparis_id=:siparis_id and kullanici_id=:kullanici_id");
                $siparisdetaysor->execute(array(
                    'siparis_id' => $siparis_id,
                    'kullanici_id' => $kullanici_id
                ));

                $siparisdetaycek = $siparisdetaysor->fetch(PDO::FETCH_ASSOC);

                $siparis_id = $siparisdetaycek['siparis_id'];

                $urundetaysor = $db->prepare("SELECT * FROM siparis_detay where siparis_id=:siparis_id");
                $urundetaysor->execute(array(
                    'siparis_id' => $siparis_id
                ));

                while ($sepetdetaycek = $urundetaysor->fetch(PDO::FETCH_ASSOC)) {
                    $urun_id = $sepetdetaycek['urun_id'];

                    $urunsor = $db->prepare("SELECT * FROM urun where urun_id=:urun_id");
                    $urunsor->execute(array(
                        'urun_id' => $urun_id
                    ));

                    $uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

                    $toplam_fiyat += $uruncek['urun_fiyat'] * $sepetdetaycek['urun_adet'];

                ?>
                    <tr>
                        <td style="text-align: left"><?php echo $uruncek['urun_ad'] ?></td>
                        <td><?php echo $uruncek['urun_id'] ?></td>
                        <td>
                            <form><?php echo $sepetdetaycek['urun_adet'] ?></form>
                        </td>
                        <td><?php echo $uruncek['urun_fiyat'] ?></td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="col-md-3 col-md-offset-3">
            <div class="subtotal-wrap">
                <div class="total">Toplam Fiyat : <span class="bigprice"><?php echo $toplam_fiyat ?> TL</span></div>
                <div class="clearfix"></div>
                <!-- <a href="" class="btn btn-default btn-yellow">Ödeme Sayfası</a> -->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="spacer"></div>
</div>

<?php include 'footer.php' ?>