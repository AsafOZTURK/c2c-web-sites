<?php

require_once "header.php";

izinsizerisimkontrol();

$mesajsor = $db->prepare("SELECT 
mesaj.*,kullanici.*
FROM mesaj 
INNER JOIN kullanici
ON mesaj.kullanici_gonderen=kullanici.kullanici_id
WHERE mesaj.kullanici_gelen=:id
ORDER BY mesaj_zaman DESC
");

$mesajsor->execute(array(
    'id' => $_SESSION['userkullanici_id']
));


?>
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
            <!-- <ul>
                 <li><a href="index.htm">Home</a><span> -</span></li>
                 <li>Settings</li>
             </ul> -->
        </div>
    </div>
</div>
<div class="settings-page-area bg-secondary section-space-bottom">
    <div class="container">
        <div class="row settings-wrapper">
            <!-- Ayarlar sidebar start -->
            <?php require_once "hesap-sidebar.php"; ?>
            <!-- Ayarlar sidebar finish -->
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="settings-details tab-content">
                    <div class="tab-pane fade active in" id="Personal">
                        <h2 class="title-section">Mesajlarım</h2>
                        <div class="personal-info inner-page-padding">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Mesaj Tarih</th>
                                        <th scope="col">Gönderen</th>
                                        <th scope="col">Durum</th>
                                        <th scope="col">Detay</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $sayi = 0;
                                    while ($mesajcek = $mesajsor->fetch(PDO::FETCH_ASSOC)) {
                                        $sayi++;
                                        $a = $mesajcek['kullanici_gonderen'];
                                        
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $sayi; ?></th>
                                            <td><?php echo $mesajcek['mesaj_zaman']; ?></td>
                                            <td><?php echo $mesajcek['kullanici_ad']; ?></td>
                                            <td>

                                                <?php
                                                if ($mesajcek['mesaj_okunma'] == 0) { ?>

                                                <i style="margin-left:20px; color:green;"class="fa fa-circle" aria-hidden="true"></i>

                                                <?php } else if ($mesajcek['mesaj_okunma'] == 1) { ?>
                                                    
                                                    <i class="fa fa-circle" aria-hidden="true"></i>

                                                <?php }
                                                ?>

                                            </td>
                                            <td><a href="mesaj-detay.php?mesaj_id=<?php echo $mesajcek['mesaj_id']; ?>&kullanici_gonderen=<?php echo $a; ?>"><button class="btn btn-primary btn-xs">Oku</button></a></td>
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
<!-- Settings Page End Here -->
<?php require_once "footer.php"; ?>