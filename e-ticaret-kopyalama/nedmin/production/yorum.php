<?php
include "header.php";

$yorumsor = $db->prepare("SELECT * FROM yorum");
$yorumsor->execute();

?>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Yorumlar<small>

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
                                </div>
                                <div class="x_content">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sıra No</th>
                                                <th>Yorum Zaman</th>
                                                <th>Kullanici Adı</th>
                                                <th>Ürün Adı</th>
                                                <th>Yorum</th>
                                                <th>Onay</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $a;
                                            while ($yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC)) {
                                                $a++; ?>
                                                <tr>
                                                    <td width="10"><?php echo $a; ?></td>

                                                    <?php
                                                    $ykullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_id=:id");
                                                    $ykullanicisor->execute(array(
                                                        'id' => $yorumcek['kullanici_id']
                                                    ));
                                                    $ykullanicicek = $ykullanicisor->fetch(PDO::FETCH_ASSOC);

                                                    $ykullanici_ad = $ykullanicicek['kullanici_adsoyad'];

                                                    $urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id=:id");
                                                    $urunsor->execute(array(
                                                        'id' => $yorumcek['urun_id']
                                                    ));
                                                    $uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

                                                    $urun_ad = $uruncek['urun_ad'];

                                                    ?>

                                                    <td align="center"><?php echo $ykullanici_ad ?></td>
                                                    <td><?php echo $yorumcek["yorum_zaman"]; ?></td>
                                                    <td><?php echo $urun_ad; ?></td>
                                                    <td width="600" style=""><?php echo substr($yorumcek["yorum_detay"],0,80); ?></td>
                                                    <td>
                                                        <center>
                                                            <?php
                                                            if ($yorumcek['yorum_onay'] == 0) { ?>
                                                                <a href="../netting/islem.php?yorum_id=<?php echo $yorumcek['yorum_id'] ?>&yorum_one=1&yorum_onay=ok"><button class="btn btn-success btn-xs">Onayla</button></a>
                                                            <?php } elseif ($yorumcek['yorum_onay'] == 1) { ?>
                                                                <a href="../netting/islem.php?yorum_id=<?php echo $yorumcek['yorum_id'] ?>&yorum_one=0&yorum_onay=ok"><button class="btn btn-warning btn-xs">Kaldır</button></a>
                                                            <?php }
                                                            ?>
                                                        </center>

                                                    </td>

                                                    <td align="center"><a href="yorum-duzenle.php?yorum_id=<?php echo $yorumcek["yorum_id"]; ?>"><button class="btn-primary btn-xs">Düzenle</button></a></td>

                                                    <td align="center"><a href="../netting/islem.php?yorum_id=<?php echo $yorumcek["yorum_id"]; ?>&yorumsil=ok"><button class="btn-danger btn-xs">Sil</button></a></td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                    <a href=""><button class="btn btn-danger">Hepsini Sil</button></a>
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