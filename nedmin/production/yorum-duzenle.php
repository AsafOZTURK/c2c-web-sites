<?php
include "header.php";

$menusor = $db->prepare("SELECT * FROM menu WHERE menu_id=:id");
$menusor->execute(array(
    'id' => $_GET["menu_id"]
));
$menucek = $menusor->fetch(PDO::FETCH_ASSOC);


$yorumsor = $db->prepare("SELECT * FROM yorum WHERE yorum_id=:id");
$yorumsor->execute(array(
    'id' => $_GET['yorum_id']
));
$yorumcek = $yorumsor->fetch(PDO::FETCH_ASSOC);

?>
<head>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
</head>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Yorum Düzenleme<small>
                                <?php
                                if ($_GET['durum'] == 'ok') { ?>
                                    <b style="color:green;">İşlem Başarılı..</b>
                                <?php } elseif ($_GET['durum'] == 'no') { ?>
                                    <b style="color:red;">İşlem Başarısız!..</b>
                                <?php } ?>
                            </small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum İD<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="text" id="first-name" name="yorum_id" readonly value="<?php echo $yorumcek["yorum_id"]; ?>" class="form-control col-md-7 col-xs-12">                                </div>
                            </div>
                            <!-- Ck Editör Başlangıç -->

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yorum Detay <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea class="ckeditor" id="editor1" name="yorum_detay"><?php echo $yorumcek['yorum_detay']; ?></textarea>
                                </div>
                            </div>

                            <script type="text/javascript">
                                CKEDITOR.replace('editor1',

                                    {

                                        filebrowserBrowseUrl: 'ckfinder/ckfinder.html',

                                        filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',

                                        filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',

                                        filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                                        filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                                        filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                                        forcePasteAsPlainText: true

                                    }

                                );
                            </script>

                            <!-- Ck Editör Bitiş -->
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="yorumduzenle" class="btn btn-success">Güncelle</button>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>