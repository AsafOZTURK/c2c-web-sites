<?php
include "header.php";

$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_magaza=:magaza");
$kullanicisor->execute(array(
    'magaza' => 2
));


?>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Mağazalar<small>

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
                                                <th>Firma Adı</th>
                                                <th>Ad</th>
                                                <th>Soyad</th>
                                                <th>Mail Adresi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            while ($kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                    <td width="100"><?php echo $kullanicicek["kullanici_zaman"]; ?></td>
                                                    <td><?php echo $kullanicicek["kullanici_unvan"]; ?></td>
                                                    <td width="200"><?php echo $kullanicicek["kullanici_ad"]; ?></td>
                                                    <td width="200"><?php echo $kullanicicek["kullanici_soyad"]; ?></td>
                                                    <td><?php echo $kullanicicek["kullanici_mail"]; ?></td>
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