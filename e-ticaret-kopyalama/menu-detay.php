<?php
include "header.php";

$menusor = $db->prepare("SELECT * FROM menu WHERE menu_seourl=:sef");
$menusor->execute(array(
    'sef' => $_GET['sef']
));
$menucek = $menusor->fetch(PDO::FETCH_ASSOC);

?>
<head>
    <title><?php echo $menucek['menu_ad']; ?> - Mehmet Asaf ÖZTÜRK</title>
</head>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <!--Main content-->
            <div class="title-bg">
                <div class="title"><?php echo $menucek["menu_ad"]; ?></div>
            </div>
            <div class="page-content">
                <?php echo $menucek["menu_detay"]; ?>
            </div>
        </div>
            <!-- BURAYA SİDEBAR GELECEK -->
            <?php include "sidebar.php"; ?>
        </div>
        <div class="spacer"></div>
    </div>

<?php include "footer.php"; ?>