<?php
include "header.php";

$hakkimizdasor = $db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=:id");
$hakkimizdasor->execute(array(
    'id' => 0
));
$hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>
<head>
    <title>
        Hakkımızda Sayfası
    </title>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <div class="title-bg">
                <div class="title"><?php echo $hakkimizdacek["hakkimizda_baslik"]; ?></div>
            </div>
            <div class="page-content">
                <?php echo $hakkimizdacek["hakkimizda_icerik"]; ?>
            </div>
            <div class="title-bg">
                <div class="title">Tanıtım Videosu</div>
            </div>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $hakkimizdacek["hakkimizda_video"]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="title-bg">
                <div class="title">Vizyon</div>
            </div>
            <div class="page-content">
                <?php echo $hakkimizdacek["hakkimizda_vizyon"]; ?>
            </div>
            <div class="title-bg">
                <div class="title">Misyon</div>
            </div>
            <div class="page-content">
                <?php echo $hakkimizdacek["hakkimizda_misyon"]; ?>
            </div>
        </div>
            <!-- BURAYA SİDEBAR GELECEK -->
            <?php include "sidebar.php"; ?>
        </div>
        <div class="spacer"></div>
    </div>

<?php include "footer.php"; ?>