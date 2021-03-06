<?php
ob_start();
session_start();
date_default_timezone_set('Europe/Istanbul');


include "baglan.php";
include "../production/fonksiyon.php";


if (isset($_POST["musterikaydet"])) {

	$kullanici_ad = htmlspecialchars($_POST['kullanici_ad']);
	$kullanici_soyad = htmlspecialchars($_POST['kullanici_soyad']);
	$kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);

	$kullanici_passwordone = htmlspecialchars($_POST['kullanici_passwordone']);
	$kullanici_passwordtwo = htmlspecialchars($_POST['kullanici_passwordtwo']);

	if ($kullanici_passwordone == $kullanici_passwordtwo) {

		if (strlen($kullanici_passwordone) >= 6) {

			$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
			));

			$say = $kullanicisor->rowCount();

			if ($say == 0) {

				$password = md5($kullanici_passwordone);
				$kullanici_yetki = 1;

				$kullanicikaydet = $db->prepare("INSERT INTO kullanici SET
					kullanici_ad=:kullanici_ad,
					kullanici_soyad=:kullanici_soyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki
					");

				$insert = $kullanicikaydet->execute(array(
					'kullanici_ad' => $kullanici_ad,
					'kullanici_soyad' => $kullanici_soyad,
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $password,
					'kullanici_yetki' => $kullanici_yetki
				));

				if ($insert) {

					Header("Location:../../login.php?durum=kayitbasarili");
					exit;
				} else {

					Header("Location:../../register.php?durum=basarisiz");
					exit;
				}
			} else {

				Header("Location:../../register.php?durum=mukerrerkayit");
				exit;
			}
		} else {

			Header("Location:../../register.php?durum=eksiksifre");
			exit;
		}
	} else {

		Header("Location:../../register.php?durum=farklisifre");
		exit;
	}
}


if (isset($_POST['musterigiris'])) {

	require_once '../../securimage/securimage.php';
	$securimage = new Securimage();

	if ($securimage->check($_POST['captcha_code']) == false) {

		Header("Location:../../login.php?durum=captchahata");
		exit;

	}

	$kullanici_mail = htmlspecialchars($_POST["kullanici_mail"]);
	$kullanicipassword = htmlspecialchars($_POST["kullanici_password"]);

	$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail AND kullanici_password=:pass AND kullanici_yetki=:yetki AND kullanici_durum=:durum");

	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'pass' => md5($kullanicipassword),
		'yetki' => 1,
		'durum' => 1
	));

	$say = $kullanicisor->rowCount();

	if ($say == 1) {
		$kullanici_ip = $_SERVER['REMOTE_ADDR']; //Siteye giren kullan??n??c??n??n ip adresini al??r

		$zamanguncelle = $db->prepare("UPDATE kullanici SET
			kullanici_sonzaman=:sonzaman,
			kullanici_ip=:ip
			WHERE kullanici_mail = '$kullanici_mail'
			");

		$kontrol = $zamanguncelle->execute(array(
			'sonzaman' => date("Y-m-d H:i:s"),
			'ip' => $kullanici_ip
		));

		$_SESSION["userkullanici_sonzaman"] = strtotime(date("Y-m-d H:i:s"));
		$_SESSION["userkullanici_mail"] = $kullanici_mail;

		Header("Location:../../index.php?durum=girisbasarili");
		exit;

	} else {

		Header("Location:../../login.php?durum=hata");
		exit;

	}
}


if (isset($_POST["admingiris"])) {
	$kullanicimail = $_POST["kullanici_mail"];
	$kullanicipassword = ($_POST["kullanici_password"]);

	$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail AND kullanici_password=:pass AND kullanici_yetki=:yetki");

	$kullanicisor->execute(array(
		'mail' => $kullanicimail,
		'pass' => md5($kullanicipassword),
		'yetki' => 5
	));

	$say = $kullanicisor->rowCount();

	if ($say == 1) {

		$_SESSION["kullanici_mail"] = $kullanicimail;
		Header("Location:../production/index.php");
		exit;
	} else {

		Header("Location:../production/login.php?durum=no");
		exit;
	}
}


if (isset($_POST['musteribilgiguncelle'])) {

	$kullanici_id = $_SESSION['userkullanici_id'];

	$kullaniciguncelle = $db->prepare("UPDATE kullanici SET
		kullanici_ad=:ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_tc=:tc,
		kullanici_gsm=:gsm
		WHERE kullanici_id = $kullanici_id
		");

	$kontrol = $kullaniciguncelle->execute(array(
		'ad' => htmlspecialchars($_POST['kullanici_ad']),
		'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
		'tc' => htmlspecialchars($_POST['kullanici_tc']),
		'gsm' => htmlspecialchars($_POST['kullanici_gsm'])
	));

	if ($kontrol) {

		Header("Location:../../hesabim.php?durum=ok");
	} else {

		Header("Location:../../hesabim.php?durum=no");
	}
}


if (isset($_POST['adresbilgiguncelle'])) {

	$kullanici_id = $_SESSION['userkullanici_id'];

	$kullaniciguncelle = $db->prepare("UPDATE kullanici SET
		kullanici_tip=:tip,
		kullanici_tc=:tc,
		kullanici_unvan=:unvan,
		kullanici_il=:il,
		kullanici_ilce=:ilce,
		kullanici_adres=:adres,
		kullanici_vno=:vno,
		kullanici_vdaire=:vdaire
		WHERE kullanici_id = $kullanici_id
		");

	$kontrol = $kullaniciguncelle->execute(array(
		'tip' => htmlspecialchars($_POST['kullanici_tip']),
		'tc' => htmlspecialchars($_POST['kullanici_tc']),
		'unvan' => htmlspecialchars($_POST['kullanici_unvan']),
		'il' => htmlspecialchars($_POST['kullanici_il']),
		'ilce' => htmlspecialchars($_POST['kullanici_ilce']),
		'adres' => htmlspecialchars($_POST['kullanici_adres']),
		'vno' => htmlspecialchars($_POST['kullanici_vno']),
		'vdaire' => htmlspecialchars($_POST['kullanici_vdaire']),
	));

	if ($kontrol) {

		Header("Location:../../adres-bilgileri.php?durum=ok");
	} else {

		Header("Location:../../adres-bilgileri.php?durum=no");
	}
}


if (isset($_POST['musterisifreguncelle'])) {

	$eski_sifre = md5($_POST['kullanici_eskipassword']);
	$kullanici_passwordone = $_POST['kullanici_passwordone'];
	$kullanici_passwordtwo = $_POST['kullanici_passwordtwo'];

	$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_password=:pass");
	$kullanicisor->execute(array(
		'pass' => $eski_sifre
	));

	$kontrol = $kullanicisor->rowCount();

	if ($kontrol == 0) {
		Header("Location:../../sifre-guncelle.php?durum=eskisifrehatali");
		exit;
	}

	if ($kullanici_passwordone == $kullanici_passwordtwo) {

		if (strlen($kullanici_passwordone) >= 6) {

			$yenisifre = md5($kullanici_passwordone);
			$kullanici_id = $_SESSION['userkullanici_id'];

			$kullaniciguncelle = $db->prepare("UPDATE kullanici SET
			kullanici_password=:pass		
			WHERE kullanici_id = $kullanici_id
			");

			$kontrol = $kullaniciguncelle->execute(array(
				'pass' => htmlspecialchars($yenisifre)
			));

			if ($kontrol) {

				Header("Location:../../sifre-guncelle.php?durum=ok");
			} else {

				Header("Location:../../sifre-guncelle.php?durum=no");
			}
		} else {

			Header("Location:../../sifre-guncelle.php?durum=eksiksifre");
		}
	} else {

		Header("Location:../../sifre-guncelle.php?durum=uyumsuzsifre");
	}
}


if (isset($_POST['profilresimguncelle'])) {

	if ($_FILES['ayar_logo']['size'] > 171400) { //dosya bi??imi sorgulama
		echo "Dosya boyutu ??ok b??y??k";
		Header("Location:../production/genel-ayar.php?durum=dosyacokbuyuk");
		exit;
	}

	$iziniuzantilar = array('jpeg', 'png', 'jpg');
	$ext = strtolower(substr($_FILES['kullanici_magazafoto']["name"], strpos($_FILES['kullanici_magazafoto']["name"], '.') + 1));

	if (in_array($ext, $iziniuzantilar) === false) {
		echo "Dosya bi??imi tan??ms??z";
		Header("Location:../../profilfoto-guncelle.php?durum=uzant??kabuledilmiyor");
		exit;
	}

	@$tmp_name = $_FILES['kullanici_magazafoto']["tmp_name"];
	@$name = seo($_FILES['kullanici_magazafoto']["name"]);

	//image resize i??lemleri
	include "simpleimage.php";
	$image = new SimpleImage();
	$image->load($tmp_name);
	$image->resize(128, 128);
	$image->save($tmp_name);


	$uploads_dir = '../../dimg/userimage';



	$uniq = uniqid();
	$refimgyol = substr($uploads_dir, 6) . "/" . $uniq . "." . $ext;

	@move_uploaded_file($tmp_name, "$uploads_dir/$uniq.$ext");


	$duzenle = $db->prepare("UPDATE kullanici SET
	kullanici_magazafoto=:foto
	WHERE kullanici_id={$_POST['kullanici_id']}");
	$update = $duzenle->execute(array(
		'foto' => $refimgyol
	));

	if ($update) {

		$resimsilunlink = $_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../../profilfoto-guncelle.php?durum=ok");
	} else {

		Header("Location:../../profil-guncelle.php?durum=no");
	}
}


if (isset($_POST['musterimagazabasvuru'])) {

	$kullanici_id = $_SESSION['userkullanici_id'];

	$kullaniciguncelle = $db->prepare("UPDATE kullanici SET
		kullanici_tip=:tip,
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
		'tip' => htmlspecialchars($_POST['kullanici_tip']),
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
		'magaza' => 1
	));

	if ($kontrol) {

		Header("Location:../../magaza-basvuru.php");
	} else {

		Header("Location:../../magaza-basvuru.php?durum=no");
	}
}


if (isset($_POST['urunekle'])) {

	if ($_FILES['urunfoto_resimyol']['size'] > 171400) { //dosya bi??imi sorgulama
		echo "Dosya boyutu ??ok b??y??k";
		Header("Location:../production/urun-ekle.php?durum=dosyacokbuyuk");
		exit;
	}

	$iziniuzantilar = array('jpeg', 'png', 'jpg');
	$ext = strtolower(substr($_FILES['urunfoto_resimyol']["name"], strpos($_FILES['urunfoto_resimyol']["name"], '.') + 1));

	if (in_array($ext, $iziniuzantilar) === false) {
		echo "Dosya bi??imi tan??ms??z";
		Header("Location:../../urun-ekle.php?durum=uzant??kabuledilmiyor");
		exit;
	}

	@$tmp_name = $_FILES['urunfoto_resimyol']["tmp_name"];
	@$name = seo($_FILES['urunfoto_resimyol']["name"]);

	//image resize i??lemleri
	include "simpleimage.php";
	$image = new SimpleImage();
	$image->load($tmp_name);
	$image->resize(829, 422);
	$image->save($tmp_name);


	$uploads_dir = '../../dimg/urunfoto';



	$uniq = uniqid();
	$refimgyol = substr($uploads_dir, 6) . "/" . $uniq . "." . $ext;

	@move_uploaded_file($tmp_name, "$uploads_dir/$uniq.$ext");


	$kaydet = $db->prepare("INSERT INTO urun SET
	kategori_id=:kategori,
	kullanici_id=:kullanici,
	urunfoto_resimyol=:foto,
	urun_ad=:ad,
	urun_detay=:detay,
	urun_fiyat=:fiyat,
	urun_durum=:durum
	");

	$insert = $kaydet->execute(array(
		'foto' => $refimgyol,
		'ad' => htmlspecialchars($_POST['urun_ad']),
		'detay' => htmlspecialchars($_POST['urun_detay']),
		'fiyat' => htmlspecialchars($_POST['urun_fiyat']),
		'kategori' => htmlspecialchars($_POST['kategori_id']),
		'kullanici' => $_SESSION['userkullanici_id'],
		'durum' => 0
	));

	if ($insert) {
		Header("Location:../../urunlerim.php?durum=ok");
	} else {

		Header("Location:../../urun-ekle.php?durum=no");
	}
}


if (isset($_POST['urunduzenle'])) {

	if ($_FILES['urunfoto_resimyol']['size'] > 0) {
		//Foto??raf varsa yap??lcak i??lemler

		if ($_FILES['urunfoto_resimyol']['size'] > 171400) { //dosya bi??imi sorgulama
			echo "Dosya boyutu ??ok b??y??k";
			Header("Location:../../urun-duzenle.php?durum=dosyacokbuyuk&urun_id=$urun_id");
			exit;
		}

		$izinliuzantilar = array('jpeg', 'png', 'jpg');
		$ext = strtolower(substr($_FILES['urunfoto_resimyol']["name"], strpos($_FILES['urunfoto_resimyol']["name"], '.') + 1));

		if (in_array($ext, $izinliuzantilar) === false) {
			echo "Dosya bi??imi tan??ms??z";
			Header("Location:../../urun-duzenle.php?urun_id=$urun_id&durum=uzant??kabuledilmiyor");
			exit;
		}

		@$tmp_name = $_FILES['urunfoto_resimyol']["tmp_name"];
		@$name = seo($_FILES['urunfoto_resimyol']["name"]);

		//image resize i??lemleri
		include "simpleimage.php";
		$image = new SimpleImage();
		$image->load($tmp_name);
		$image->resize(829, 422);
		$image->save($tmp_name);

		$uploads_dir = '../../dimg/urunfoto';

		$uniq = uniqid();
		$refimgyol = substr($uploads_dir, 6) . "/" . $uniq . "." . $ext;

		@move_uploaded_file($tmp_name, "$uploads_dir/$uniq.$ext");

		$urun_id = $_POST['urun_id'];

		$duzenle = $db->prepare("UPDATE urun SET
			kategori_id=:kategori,
			urunfoto_resimyol=:foto,
			urun_ad=:ad,
			urun_detay=:detay,
			urun_fiyat=:fiyat
		WHERE urun_id= $urun_id
		");

		$update = $duzenle->execute(array(
			'foto' => $refimgyol,
			'ad' => htmlspecialchars($_POST['urun_ad']),
			'detay' => htmlspecialchars($_POST['urun_detay']),
			'fiyat' => htmlspecialchars($_POST['urun_fiyat']),
			'kategori' => htmlspecialchars($_POST['kategori_id'])
		));

		if ($update) {

			$resimsilunlink = $_POST['eski_yol'];
			unlink("../../$resimsilunlink");

			Header("Location:../../urun-duzenle.php?urun_id=$urun_id&durum=ok");
		} else {

			Header("Location:../../urun-duzenle.php?urun_id=$urun_id&durum=no");
		}
	} else {
		//foto??rf g??ncelleme olmadan yap??lacak i??lemler
		$urun_id = $_POST['urun_id'];

		$duzenle = $db->prepare("UPDATE urun SET
			kategori_id=:kategori,
			urun_ad=:ad,
			urun_detay=:detay,
			urun_fiyat=:fiyat
		WHERE urun_id=$urun_id
		");

		$update = $duzenle->execute(array(
			'ad' => htmlspecialchars($_POST['urun_ad']),
			'detay' => htmlspecialchars($_POST['urun_detay']),
			'fiyat' => htmlspecialchars($_POST['urun_fiyat']),
			'kategori' => htmlspecialchars($_POST['kategori_id'])
		));

		if ($update) {

			Header("Location:../../urun-duzenle.php?urun_id=$urun_id&durum=ok");
		} else {

			Header("Location:../../urun-duzenle.php?urun_id=$urun_id&durum=no");
		}
	}
}

if ($_GET['urunsil'] == 'ok') {

	$urun_id = $_GET['urun_id'];

	$sil = $db->prepare("DELETE FROM urun WHERE urun_id=:id");
	$kontrol = $sil->execute(array(
		'id' => $urun_id
	));

	if ($kontrol) {

		$resimsilunlink = $_GET['urunfoto_resimyol'];
		unlink("../../$resimsilunlink");

		Header("Location:../../urunlerim.php?sil=ok");
	} else {

		Header("Location:../../urunlerim.php?sil=hata");
	}
}


if (isset($_POST['sipariskaydet'])) {

	$kaydet = $db->prepare("INSERT INTO siparis SET
		kullanici_id=:id,
		kullanici_idsatici=:saticiid
	");

	$insert = $kaydet->execute(array(
		'id' => htmlspecialchars($_SESSION['userkullanici_id']),
		'saticiid' => $_POST['kullanici_idsatici']
	));

	if ($insert) {

		$siparis_id = $db->lastInsertId();

		$sipariskaydet = $db->prepare("INSERT INTO siparis_detay SET
		siparis_id=:siparisid,
		kullanici_id=:id,
		kullanici_idsatici=:saticiid,
		urun_id=:urun_id,
		urun_fiyat=:fiyat
		");

		$insert = $sipariskaydet->execute(array(
			'siparisid' => $siparis_id,
			'id' => htmlspecialchars($_SESSION['userkullanici_id']),
			'saticiid' => htmlspecialchars($_POST['kullanici_idsatici']),
			'urun_id' => htmlspecialchars($_POST['urun_id']),
			'fiyat' => htmlspecialchars($_POST['urun_fiyat'])
		));

		if ($insert) {

			Header("Location:../../siparislerim.php?durum=ok");
		} else {

			Header("Location:../../siparislerim.php?durum=basarisiz");
		}
	} else {

		Header("Location:../../404.php");
	}
}


if ($_GET['urunonay'] == 'ok') {
	$siparis_id = $_GET['siparis_id'];
	$siparisdetay_id = $_GET['siparisdetay_id'];

	$siparisdetayguncelle = $db->prepare("UPDATE siparis_detay SET
	siparisdetay_onay=:onay
	WHERE siparisdetay_id = {$siparisdetay_id}
	");

	$update = $siparisdetayguncelle->execute(array(
		'onay' => 2
	));

	if ($update) {

		Header("Location:../../siparis-detay.php?siparis_id=$siparis_id&durum=ok");
	} else {

		Header("Location:../../siparis-detay?siparis_id=$siparis_id&durum=no");
	}
}


if ($_GET['urunteslim'] == 'ok') {
	$siparis_id = $_GET['siparis_id'];
	$siparisdetay_id = $_GET['siparisdetay_id'];

	$siparisdetayguncelle = $db->prepare("UPDATE siparis_detay SET
	siparisdetay_onay=:onay
	WHERE siparisdetay_id = {$siparisdetay_id}
	");

	$update = $siparisdetayguncelle->execute(array(
		'onay' => 1
	));

	if ($update) {

		Header("Location:../../yeni-siparisler.php?siparis_id=$siparis_id&durum=ok");
	} else {

		Header("Location:../../yeni-siparisler?siparis_id=$siparis_id&durum=no");
	}
}


if (isset($_POST['yorumkaydet'])) {
	$siparis_id = $_POST['siparis_id'];

	$kaydet = $db->prepare("INSERT INTO yorum SET
		kullanici_id=:id,
		urun_id=:urun_id,
		yorum_detay=:yorum,
		yorum_puan=:puan
	");

	$insert = $kaydet->execute(array(
		'id' => $_SESSION['userkullanici_id'],
		'urun_id' => $_POST['urun_id'],
		'yorum' => htmlspecialchars($_POST['yorum_detay']),
		'puan' => htmlspecialchars($_POST['yorum_puan'])
	));

	if ($insert) {
		$siparisdetayguncelle = $db->prepare("UPDATE siparis_detay SET
			siparisdetay_yorum=:yorum
			WHERE siparis_id = {$siparis_id}
			");

		$update = $siparisdetayguncelle->execute(array(
			'yorum' => 1
		));

		if (!$update) {
			Header("Location:../../siparis-detay.php?siparis_id=$siparis_id&durum=yorumbasarisiz");
		}

		Header("Location:../../siparis-detay.php?siparis_id=$siparis_id&durum=ok");
	} else {

		Header("Location:../../siparis-detay.php?siparis_id=$siparis_id&durum=no");
	}
}


if (isset($_POST['mesajgonder'])) {
	echo $kullanici_gelen = $_POST['kullanici_gelen'];

	$kaydet = $db->prepare("INSERT INTO mesaj SET
		kullanici_gelen=:gelen,
		kullanici_gonderen=:gonderen,
		mesaj_detay=:mesaj
	");

	$insert = $kaydet->execute(array(
		'gelen' => $kullanici_gelen,
		'gonderen' => $_SESSION['userkullanici_id'],
		'mesaj' => $_POST['mesaj_detay']
	));

	if ($insert) {

		Header("Location:../../mesaj-gonder.php?kullanici_gelen=$kullanici_gelen&durum=ok");
	} else {

		Header("Location:../../mesaj-gonder.php?kullanici_gelen=$kullanici_gelen&durum=no");
	}
}


if (isset($_POST['mesajcevap'])) {
	echo $kullanici_gelen = $_POST['kullanici_gelen'];

	$kaydet = $db->prepare("INSERT INTO mesaj SET
		kullanici_gelen=:gelen,
		kullanici_gonderen=:gonderen,
		mesaj_detay=:mesaj
	");

	$insert = $kaydet->execute(array(
		'gelen' => $kullanici_gelen,
		'gonderen' => $_SESSION['userkullanici_id'],
		'mesaj' => $_POST['mesaj_detay']
	));

	if ($insert) {

		Header("Location:../../gelen-mesajlar.php?durum=ok");
	} else {

		Header("Location:../../gelen-mesajlar.php?durum=no");
	}
}


if ($_GET['gelenmesajsil'] == 'ok') {

	$mesaj_id = $_GET['mesaj_id'];

	$sil = $db->prepare("DELETE FROM mesaj WHERE mesaj_id=:id");
	$kontrol = $sil->execute(array(
		'id' => $mesaj_id
	));

	if ($kontrol) {

		Header("Location:../../gelen-mesajlar.php?sil=ok");
	} else {

		Header("Location:../../gelen-mesajlar.php?sil=hata");
	}
}


if ($_GET['gidenmesajsil'] == 'ok') {

	$mesaj_id = $_GET['mesaj_id'];

	$sil = $db->prepare("DELETE FROM mesaj WHERE mesaj_id=:id");
	$kontrol = $sil->execute(array(
		'id' => $mesaj_id
	));

	if ($kontrol) {

		Header("Location:../../giden-mesajlar.php?sil=ok");
	} else {

		Header("Location:../../giden-mesajlar.php?sil=hata");
	}
}
