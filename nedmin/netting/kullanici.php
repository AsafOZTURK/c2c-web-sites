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


?>