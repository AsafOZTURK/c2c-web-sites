<?php
include "header.php";

$slidersor = $db->prepare("SELECT * FROM slider");
$slidersor->execute();

?>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Slider Listeleme<small>

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
                                    <h2>Sliderler <small></small></h2>
                                    <div class="clearfix"></div>
                                    <div align="right">
                                        <a href="slider-ekle.php"><button class="btn btn-success">Yeni Ekle</button></a>
                                    </div>
                                </div>
                                <div class="x_content">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="20">Slider İD</th>
                                                <th>Slider Görsel</th>
                                                <th>Slider Adı</th>
                                                <th>Slider Sıra</th>
                                                <th>Slider Link</th>
                                                <th>Slider Durum</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            while ($slidercek = $slidersor->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                    <td><?php echo $slidercek["slider_id"]; ?></td>
                                                    <td><center><img src="../../<?php echo $slidercek["slider_resimyol"]; ?>" width="200" alt="slider"></center></td>
                                                    <td><?php echo $slidercek["slider_ad"]; ?></td>
                                                    <td><?php echo $slidercek["slider_sira"]; ?></td>
                                                    <td><?php echo $slidercek["slider_link"]; ?></td>
                                                    <td align="center">
                                                        <?php
                                                        if ($slidercek["slider_durum"] == 1) { ?>
                                                            <button class="btn btn-success btn-xs">Aktif</button>
                                                        <?php } else { ?>
                                                            <button class="btn btn-danger">Pasif</button>
                                                        <?php } ?>
                                                    </td>
                                                    <td align="center"><a href="slider-duzenle.php?slider_id=<?php echo $slidercek["slider_id"]; ?>"><button class="btn-primary btn-xs">Düzenle</button></a></td>
                                                    <td align="center"><a href="../netting/islem.php?slider_id=<?php echo $slidercek["slider_id"]; ?>&slidersil=ok"><button class="btn-danger btn-xs">Sil</button></a></td>
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