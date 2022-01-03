<?php
include "header.php";
?>

<div class="container">  
    <div class="title-bg">
        <div class="title">Sipariş Bilgilerim</div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered chart">
            <thead>
                <tr>
                    <th>Sipariş No</th>
                    <th>Tarih</th>
                    <th>Tutar</th>
                    <th>Tip</th>
                    <th>Durum</th>
                    <th></th>

                </tr>
            </thead>
            <?php
            $kullanici_id = $kullanicicek['kullanici_id'];

            $siparissor = $db->prepare("SELECT * FROM siparis WHERE kullanici_id=:id");
            $siparissor->execute(array(
                'id' => $kullanici_id
            ));

            while ($sipariscek = $siparissor->fetch(PDO::FETCH_ASSOC)) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $sipariscek['siparis_id']; ?></td>
                        <td><?php echo $sipariscek['siparis_zaman']; ?></td>
                        <td><?php echo $sipariscek['siparis_toplam']; ?> TL</td>
                        <td><?php echo $sipariscek['siparis_tip']; ?></td>
                        <td><?php
                            if ($sipariscek["siparis_durum"] == 1) { ?>
                                <button class="btn btn-success btn-xs">Ödeme Tamamlandı</button>
                            <?php } else { ?>
                                <button class="btn btn-danger btn-xs">Ödeme Yapılamadı</button>
                            <?php } ?>
                        </td>
                        <td><a href="siparis-detay.php?siparis_id=<?php echo $sipariscek['siparis_id']; ?>"><button type="submit" class="btn btn-primary btn-xs">Detaylar</button></a></td>
                    </tr>
                </tbody>
            <?php } ?>

        </table>
    </div>
    <div class="spacer"></div>
</div>

<?php include "footer.php"; ?>