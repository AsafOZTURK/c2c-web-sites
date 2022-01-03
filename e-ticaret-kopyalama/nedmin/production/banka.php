<?php
include "header.php";

$bankasor = $db->prepare("SELECT * FROM banka");
$bankasor->execute();

?>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Bankalar<small>

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
                                        <a href="banka-ekle.php"><button class="btn btn-success">Yeni Ekle</button></a>
                                    </div>
                                </div>
                                <div class="x_content">
                                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="20">Banka İD</th>
                                                <th>Banka Adı</th>
                                                <th>Banka IBAN</th>
                                                <th>Banka Hesap Ad Soyad</th>
                                                <th>Banka Durum</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            while ($bankacek = $bankasor->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                                    <td><?php echo $bankacek["banka_id"]; ?></td>
                                                    <td><?php echo $bankacek["banka_ad"]; ?></td>
                                                    <td><?php echo $bankacek["banka_iban"]; ?></td>
                                                    <td><?php echo $bankacek["banka_hesapadsoyad"]; ?></td>
                                                    <td align="center">
                                                        <?php
                                                        if ($bankacek["banka_durum"] == 1) { ?>
                                                            <button class="btn btn-success btn-xs">Aktif</button>
                                                        <?php } else { ?>
                                                            <button class="btn btn-danger btn-xs">Pasif</button>
                                                        <?php } ?>
                                                    </td>
                                                    <td align="center"><a href="banka-duzenle.php?banka_id=<?php echo $bankacek["banka_id"]; ?>"><button class="btn-primary btn-xs">Düzenle</button></a></td>
                                                    <td align="center"><a href="../netting/islem.php?banka_id=<?php echo $bankacek["banka_id"]; ?>&bankasil=ok"><button class="btn-danger btn-xs">Sil</button></a></td>
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