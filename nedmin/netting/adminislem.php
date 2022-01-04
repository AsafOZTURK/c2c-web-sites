<?php
include "baglan.php";
include "../production/fonksiyon.php";

if (isset($_POST['logoduzenle'])) {

	if ($_FILES['ayar_logo']['size'] > 171400) { //dosya biçimi sorgulama
		echo "Dosya boyutu çok büyük";
		Header("Location:../production/genel-ayar.php?durum=dosyacokbuyuk");
		exit;
	}

	$iziniuzantilar = array('jpeg','png','jpg');
	$ext = strtolower(substr($_FILES['ayar_logo']["name"],strpos($_FILES['ayar_logo']["name"],'.')+1));

	if (in_array($ext, $iziniuzantilar)=== false) {
		echo "Dosya biçimi tanımsız";
		Header("Location:../production/genel-ayar.php?durum=uzantıkabuledilmiyor");
		exit;
	}

	
	$uploads_dir = '../../dimg';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4 = rand(20000, 32000);
	$refimgyol = substr($uploads_dir, 6) . "/" . $benzersizsayi4 . $name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");


	$duzenle = $db->prepare("UPDATE ayar SET
	ayar_logo=:logo
	WHERE ayar_id=0");
	$update = $duzenle->execute(array(
		'logo' => $refimgyol
	));

	if ($update) {

		$resimsilunlink = $_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?durum=ok");
	} else {

		Header("Location:../production/genel-ayar.php?durum=no");
	}
}





?>
