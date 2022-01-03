<?php
include "header.php";

$kullanicisor = $db->prepare("SELECT * FROM kullanici");
$kullanicisor->execute();


?>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Kullanici Listeleme<small>

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
                                                <th>Kayıt Tarihi</th>
                                                <th>Ad Soyad</th>
                                                <th>Mail Adresi</th>
                                                <th>Yetki</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            while ($kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                    <td width="100"><?php echo $kullanicicek["kullanici_zaman"]; ?></td>
                                                    <td><?php echo $kullanicicek["kullanici_adsoyad"]; ?></td>
                                                    <td><?php echo $kullanicicek["kullanici_mail"]; ?></td>
                                                    <td>

                                                        <?php 
                                                        if ($kullanicicek["kullanici_yetki"] == 1) { ?>
                                                            <center><button class="btn btn-success btn-xs">Kullanıcı</button></center>
                                                        <?php } else if ($kullanicicek["kullanici_yetki"] == 5) { ?>
                                                            <center><button class="btn btn-danger btn-xs">Admin</button></center>
                                                        <?php } 
                                                        ?>

                                                    </td>
                                                    <td align="center"><a href="kullanici-duzenle.php?kullanici_id=<?php echo $kullanicicek["kullanici_id"]; ?>"><button class="btn-primary btn-xs">Düzenle</button></a></td>
                                                    <td align="center"><a href="../netting/islem.php?kullanici_id=<?php echo $kullanicicek["kullanici_id"]; ?>&kullanicisil=ok"><button class="btn-danger btn-xs">Sil</button></a></td>
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