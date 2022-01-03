<?php
include "header.php";

$urunsor = $db->prepare("SELECT * FROM urun");
$urunsor->execute();

?>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>ÜRÜNLER<small>

                                <?php
                                if ($_GET['sil'] == 'ok') { ?>

                                    <b style="color:green;">İşlem Başarılı..</b>

                                <?php } elseif ($_GET['sil'] == 'no') { ?>

                                    <b style="color:red;">İşlem Başarısız!..</b>
                                <?php } ?>

                            </small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><small></small></h2>
                                    <div class="clearfix"></div>
                                    <div align="right">
                                        <a href="urun-ekle.php"><button class="btn btn-success">Yeni Ekle</button></a>
                                    </div>
                                </div>
                                <div class="x_content">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Ürün Kodu</th>
                                                <th>Ürün Adı</th>
                                                <th>Ürün Fiyat</th>
                                                <th>Ürün Stok</th>
                                                <th></th>
                                                <th>Ürün Durum</th>
                                                <th>Öne Çıkarma</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                    <td width="20"><?php echo $uruncek["urun_id"]; ?></td>
                                                    <td><?php echo $uruncek["urun_ad"]; ?></td>
                                                    <td><?php echo $uruncek["urun_fiyat"]; ?></td>
                                                    <td><?php echo $uruncek["urun_stok"]; ?></td>
                                                    <td><a href="urun-galeri.php?urun_id=<?php echo $uruncek['urun_id'];?>"><center><button class="btn btn-succes btn-xs">Fotoğraf İşlemleri</button></center></a></td>
                                                    <td align="center">

                                                        <?php
                                                        if ($uruncek["urun_durum"] == 1) { ?>
                                                            <button class="btn btn-success btn-xs">Aktif</button>
                                                        <?php } else { ?>
                                                            <button class="btn btn-danger btn-xs">Pasif</button>
                                                        <?php } ?>

                                                    </td>
                                                    <td>
                                                        <center>
                                                            <?php
                                                            if ($uruncek['urun_onecikar'] == 0) { ?>
                                                                <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_one=1&urun_onecikar=ok"><button class="btn btn-success btn-xs">Ön Çıkar</button></a>
                                                            <?php } elseif ($uruncek['urun_onecikar'] == 1) { ?>
                                                                <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_one=0&urun_onecikar=ok"><button class="btn btn-warning btn-xs">Kaldır</button></a>
                                                            <?php }
                                                            ?>
                                                        </center>

                                                    </td>
                                                    <td align="center"><a href="urun-duzenle.php?urun_id=<?php echo $uruncek["urun_id"]; ?>"><button class="btn-primary btn-xs">Düzenle</button></a></td>
                                                    <td align="center"><a href="../netting/islem.php?urun_id=<?php echo $uruncek["urun_id"]; ?>&urunsil=ok"><button class="btn-danger btn-xs">Sil</button></a></td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>