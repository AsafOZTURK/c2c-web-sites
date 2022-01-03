<?php
ob_start();
session_start();

include "baglan.php";

if (!empty($_FILES)) {

    $uploads_dir = "../../dimg/urun";

    @$tmpname = $_FILES['file']['tmp_name'];
    @$name = $_FILES['file']['name'];

    $benzersizsayi1 = rand(20000,32000);
    $benzersizsayi2 = rand(20000,32000);
    $benzersizsayi3 = rand(20000,32000);
    $benzersizsayi4 = rand(20000,32000);

    $benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $refimgyol = substr($uploads_dir, 6) ."/". $benzersizad.$name;

    @move_uploaded_file($tmpname, "$uploads_dir/$benzersizad$name");

    $urun_id = $_POST['urun_id'];

    $kaydet = $db -> prepare("INSERT INTO urunfoto SET
        urunfoto_resimyol=:resimyol,
        urun_id=:urun_id
        ");

    $insert = $kaydet -> execute(array(
        'urun_id' => $urun_id,
        'resimyol' => $refimgyol
    ));
}
?>

<!-- if ($_FILES['slider_resimyol']['size'] > 1000) resim boyunu şartlandırmak için -->