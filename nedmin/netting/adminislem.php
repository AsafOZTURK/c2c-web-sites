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


if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id = $_POST['kullanici_id'];

	$ayarkaydet = $db->prepare("UPDATE kullanici SET
		kullanici_tc=:kullanici_tc,
		kullanici_ad=:kullanici_ad,
		kullanici_soyad=:kullanici_soyad,
        kullanici_gsm=:kullanici_gsm,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce,
		kullanici_adres=:kullanici_adres,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update = $ayarkaydet->execute(array(
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_ad' => $_POST['kullanici_ad'],
		'kullanici_soyad' => $_POST['kullanici_soyad'],
		'kullanici_gsm' => $_POST['kullanici_gsm'],
		'kullanici_il' => $_POST['kullanici_il'],
		'kullanici_ilce' => $_POST['kullanici_ilce'],
		'kullanici_adres' => $_POST['kullanici_adres'],
		'kullanici_durum' => $_POST['kullanici_durum']
	));


	if ($update) {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
	} else {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}
}


if ($_GET['magazaonay'] == 'red') {

	$kullaniciguncelle = $db -> prepare("UPDATE kullanici SET
	kullanici_magaza=:magaza
	WHERE kullanici_id = {$_GET['kullanici_id']}
	");

	$update = $kullaniciguncelle -> execute(array(
		'magaza' => 0
	));

	if ($update) {

		Header("Location:../production/magazalar.php?durum=ok");

	} else {
		
		Header("Location:../production/magazalar.php?durum=ok");

	}
}


if (isset($_POST['magazabasvuruonay'])) {

	$kullanici_id = $_POST['userkullanici_id'];

	$kullaniciguncelle = $db->prepare("UPDATE kullanici SET
		kullanici_ad=:ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_tc=:tc,
		kullanici_gsm=:gsm,
		kullanici_banka=:banka,
		kullanici_iban=:iban,
		kullanici_unvan=:unvan,
		kullanici_il=:il,
		kullanici_ilce=:ilce,
		kullanici_adres=:adres,
		kullanici_vno=:vno,
		kullanici_vdaire=:vdaire,
		kullanici_magaza=:magaza
		WHERE kullanici_id = $kullanici_id
		");

    $kontrol = $kullaniciguncelle->execute(array(
		'ad' => htmlspecialchars($_POST['kullanici_ad']), 
		'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
		'gsm' => htmlspecialchars($_POST['kullanici_gsm']),
		'banka' => htmlspecialchars($_POST['kullanici_banka']),
		'iban' => htmlspecialchars($_POST['kullanici_iban']),
		'tc' => htmlspecialchars($_POST['kullanici_tc']),
		'unvan' => htmlspecialchars($_POST['kullanici_unvan']),
        'il' => htmlspecialchars($_POST['kullanici_il']), 
		'ilce' => htmlspecialchars($_POST['kullanici_ilce']),
		'adres' => htmlspecialchars($_POST['kullanici_adres']),
		'vno' => htmlspecialchars($_POST['kullanici_vno']),
		'vdaire' => htmlspecialchars($_POST['kullanici_vdaire']),
		'magaza' => 2
    ));

	if ($kontrol) {

		Header("Location:../production/magazalar.php?durum=ok");

	} else {

		Header("Location:../production/magazalar.php?durum=no");
	}
}