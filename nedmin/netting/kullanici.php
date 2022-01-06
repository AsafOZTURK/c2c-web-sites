<?php
ob_start();
session_start();

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

	$kullanicimail = htmlspecialchars($_POST["kullanici_mail"]);
	$kullanicipassword = htmlspecialchars($_POST["kullanici_password"]);

	$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail AND kullanici_password=:pass AND kullanici_yetki=:yetki AND kullanici_durum=:durum");

	$kullanicisor->execute(array(
		'mail' => $kullanicimail,
		'pass' => md5($kullanicipassword),
		'yetki' => 1,
		'durum' => 1
	));

	$say = $kullanicisor->rowCount();

	if ($say == 1) {

		$_SESSION["userkullanici_mail"] = $kullanicimail;
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

	$kullanicisor = $db ->prepare("SELECT * FROM kullanici WHERE kullanici_password=:pass");
	$kullanicisor -> execute(array(
		'pass' => $eski_sifre
	));

	$kontrol = $kullanicisor -> rowCount();

	if ($kontrol == 0 ) {
		Header("Location:../../sifre-guncelle.php?durum=eskisifrehatali");
		exit;
	}

	if ($kullanici_passwordone == $kullanici_passwordtwo) {

		if (strlen($kullanici_passwordone) >= 6  ) {

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
