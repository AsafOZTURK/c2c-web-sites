<?php
ob_start();
session_start();

include "baglan.php";
include "../production/fonksiyon.php";

// htmlspecialchars() girilebilecek zararlı kodları etkisiz hale getirir
// strip_tags() girilen zararlı kodlardan html taglarını siler ve zarasız hale getiri
// boş klasörlere Header("Location:../index.php"); yazılı php dosyası eklersek izinsiz erişimlerin önüne geçebiliriz
// veritabanımıza herhangi bir dosya yüklerken boyutunu ve dosya biçimini uygun olarak kısıtlmalıyız
// veritabanı işlemlerine dışardan erişimi engellemek için session kontrol fonksiyonu kullanabiliriz

//Animate.css
//as4f.zopim.com
//ck editör
















if ($_GET["kullanicisil"] == 'ok') {
	$sil = $db->prepare("DELETE FROM kullanici WHERE kullanici_id=:id");
	$kontrol = $sil->execute(array(
		'id' => $_GET["kullanici_id"]
	));

	if ($kontrol) {
		Header("Location:../production/kullanici.php?sil=ok");
	} else {
		Header("Location:../production/kullanici.php?sil=no");
	}
}


if (isset($_POST['sifreguncelle'])) {

	echo $kullanici_eskipassword = trim($_POST['kullanici_password']);
	echo "<br>";
	echo $kullanici_passwordone = trim($_POST['kullanici_passwordone']);
	echo "<br>";
	echo $kullanici_passwordtwo = trim($_POST['kullanici_passwordtwo']);
	echo "<br>";

	$kullanici_password = md5($kullanici_eskipassword);

	$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_password=:pass");
	$kullanicisor->execute(array(
		'pass' => $kullanici_password
	));

	$say = $kullanicisor->rowCount();

	if ($say == 0) {

		Header("Location:../../sifre-guncelle?durum=eskisifrehata");
	} else {

		if ($kullanici_passwordone == $kullanici_passwordtwo) {

			if (strlen($kullanici_passwordone) >= 6) {

				$password = md5($kullanici_passwordone);
				$kullanici_yetki = 1;

				$kullanicikaydet = $db->prepare("UPDATE kullanici SET
					kullanici_password=:kullanici_password
					WHERE kullanici_id={$_POST['kullanici_id']}");

				$insert = $kullanicikaydet->execute(array(
					'kullanici_password' => $password
				));

				if ($insert) {

					Header("Location:../../sifre-guncelle.php?durum=sifredegisti");
				} else {

					Header("Location:../../sifre-guncelle.php?durum=no");
				}
			} else {

				Header("Location:../../sifre-guncelle.php?durum=eksiksifre");
			}
		} else {

			Header("Location:../../sifre-guncelle?durum=sifreleruyusmuyor");
			exit;
		}
	}
	exit;

	if ($update) {

		Header("Location:../../sifre-guncelle?durum=ok");
	} else {

		Header("Location:../../sifre-guncelle?durum=no");
	}
}


if (isset($_POST['userupdate'])) {

	$kullanici_id = $_POST['kullanici_id'];

	$ayarkaydet = $db->prepare("UPDATE kullanici SET
		kullanici_resim=:kullanici_resim,
		kullanici_tc=:kullanici_tc,
		kullanici_ad=:kullanici_ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_adsoyad=:kullanici_adsoyad,
        kullanici_gsm=:kullanici_gsm,
		kullanici_adres=:kullanici_adres,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce,
		kullanici_unvan=:kullanici_unvan,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id= $kullanici_id
		");

	$update = $ayarkaydet->execute(array(
		'kullanici_resim' => $_POST['kullanici_resim'],
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_ad' => $_POST['kullanici_ad'],
		'kullanici_soyad' => $_POST['kullanici_soyad'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_gsm' => $_POST['kullanici_gsm'],
		'kullanici_adres' => $_POST['kullanici_adres'],
		'kullanici_il' => $_POST['kullanici_il'],
		'kullanici_ilce' => $_POST['kullanici_ilce'],
		'kullanici_unvan' => $_POST['kullanici_unvan'],
		'kullanici_durum' => $_POST['kullanici_durum']
	));


	if ($update) {

		Header("Location:../../hesabim.php?kullanici_id=$kullanici_id&durum=ok");
	} else {

		Header("Location:../../hesabim.php?kullanici_id=$kullanici_id&durum=no");
	}
}


if (isset($_POST['sepeteekle'])) {

	$ekle = $db->prepare("INSERT INTO sepet SET 
		urun_adet=:urun_adet,
		urun_id=:urun_id,
		kullanici_id=:kullanici_id"
		);

	$insert = $ekle->execute(array(
		'urun_adet' => $_POST['urun_adet'],
		'urun_id' => $_POST['urun_id'],
		'kullanici_id' => $_POST['kullanici_id']
	));

	if ($insert) {

		Header("Location:../../sepet.php?durum=ok");
	} else {

		Header("Location:../../sepet.php?durum=no");
	}
}


if (isset($_POST['kategoriekle'])) {

	$kategori_seourl = seo($_POST['kategori_ad']);

	$kategoriekle = $db->prepare("INSERT INTO kategori SET
		kategori_ad=:kategori_ad,
		kategori_sira=:kategori_sira,
        kategori_seourl=:kategori_seourl,
        kategori_durum=:kategori_durum
		");

	$insert = $kategoriekle->execute(array(
		'kategori_ad' => $_POST['kategori_ad'],
		'kategori_sira' => $_POST['kategori_sira'],
		'kategori_seourl' => $kategori_seourl,
		'kategori_durum' => $_POST['kategori_durum'],
	));

	if ($insert) {

		Header("Location:../production/kategori.php?durum=ok");
		exit;
	} else {

		Header("Location:../production/kategori.php?durum=no");
		exit;
	}
}




if ($_GET['kategorisil'] == 'ok') {

	$sil = $db->prepare("DELETE FROM kategori WHERE kategori_id=:id");
	$kontrol = $sil->execute(array(
		'id' => $_GET["kategori_id"]
	));

	if ($kontrol) {
		Header("Location:../production/kategori.php?sil=ok");
	} else {
		Header("Location:../production/kategoriphp?sil=no");
	}
}


if (isset($_POST['sliderekle'])) {

	$uploads_dir = '../../dimg/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resim_yol']["name"];

	$benzersizsayi1 = rand(20000, 32000);
	$benzersizsayi2 = rand(20000, 32000);
	$benzersizsayi3 = rand(20000, 32000);
	$benzersizsayi4 = rand(20000, 32000);
	$benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;

	$refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

	$kaydet = $db->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
        slider_sira=:slider_sira,
        slider_link=:slider_link,
        slider_resimyol=:slider_resimyol
        ");

	$insert = $kaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_link' => $_POST['slider_link'],
		'slider_resimyol' => $refimgyol
	));

	if ($insert) {

		$resimsilunlink = $_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/slider.php?durum=ok");
	} else {

		Header("Location:../production/slider.php?durum=no");
	}
}


if (isset($_POST['sliderduzenle'])) {

	if ($_FILES['slider_resimyol']["size"] > 0) {

		$uploads_dir = '../../dimg/slider';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];

		$benzersizsayi1 = rand(20000, 32000);
		$benzersizsayi2 = rand(20000, 32000);
		$benzersizsayi3 = rand(20000, 32000);
		$benzersizsayi4 = rand(20000, 32000);
		$benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;

		$refimgyol = substr($uploads_dir, 6) . "/" . $benzersizad . $name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$slider_id = $_POST['slider_id'];

		$duzenle = $db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum,
			slider_resimyol=:resimyol	
			WHERE slider_id={$_POST['slider_id']}
            ");

		$update = $duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum'],
			'resimyol' => $refimgyol,
		));

		if ($update) {

			$resimsilunlink = $_POST['slider_resimyol'];
			unlink("../../$resimsilunlink");  //resimleri fizii olaraktan klasörden silmeye yarıyor

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}
	} else {

		$duzenle = $db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum		
			WHERE slider_id={$_POST['slider_id']}");

		$update = $duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum']
		));

		$slider_id = $_POST['slider_id'];

		if ($update) {

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}
	}
}


if ($_GET['slidersil'] == "ok") {

	islemkontrol();  //izinsiz erişimi engellemek için

	$sil = $db->prepare("DELETE FROM slider WHERE slider_id=:slider_id");
	$kontrol = $sil->execute(array(
		'slider_id' => $_GET['slider_id']
	));

	if ($kontrol) {

		$resimsilunlink = $_GET['slider_resimyol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/slider.php?durum=ok");
	} else {

		Header("Location:../production/slider.php?durum=no");
	}
}


if (isset($_POST['menuekle'])) {

	$menu_seourl = seo($_POST['menu_ad']);

	$menuekle = $db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
        menu_url=:menu_url,
		menu_sira=:menu_sira,
        menu_seourl=:menu_seourl,
        menu_durum=:menu_durum
		");

	$insert = $menuekle->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum'],
	));

	if ($insert) {

		Header("Location:../production/menu.php?durum=ok");
		exit;
	} else {

		Header("Location:../production/menu.php?durum=no");
		exit;
	}
}


if (isset($_POST['menuduzenle'])) {

	$menu_id = $_POST['menu_id'];
	$menu_seourl = seo($_POST["menu_ad"]);

	$ayarkaydet = $db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
        menu_detay=:menu_detay,
		menu_url=:menu_url,
        menu_sira=:menu_sira,
        menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		WHERE menu_id={$_POST['menu_id']}");

	$update = $ayarkaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
	));


	if ($update) {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");
	} else {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
	}
}


if ($_GET["menusil"] == 'ok') {

	islemkontrol();

	$sil = $db->prepare("DELETE FROM menu WHERE menu_id=:id");
	$kontrol = $sil->execute(array(
		'id' => $_GET["menu_id"]
	));

	if ($kontrol) {
		Header("Location:../production/menu.php?sil=ok");
	} else {
		Header("Location:../production/menuphp?sil=no");
	}
}


if (isset($_POST['urunekle'])) {

	$urun_seourl = seo($_POST['urun_ad']);

	$kaydet = $db->prepare("INSERT INTO urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_keyword=:urun_keyword,
		urun_durum=:urun_durum,
		urun_onecikar=:urun_onecikar,
		urun_stok=:urun_stok,	
		urun_seourl=:seourl		
		");
	$insert = $kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_detay' => $_POST['urun_detay'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_video' => $_POST['urun_video'],
		'urun_keyword' => $_POST['urun_keyword'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_onecikar' => $_POST['urun_onecikar'],
		'urun_stok' => $_POST['urun_stok'],
		'seourl' => $urun_seourl

	));

	if ($insert) {

		Header("Location:../production/urun.php?durum=ok");
	} else {

		Header("Location:../production/urun.php?durum=no");
	}
}


if (isset($_POST['urunduzenle'])) {

	$urun_id = $_POST['urun_id'];
	$urun_seourl = seo($_POST['urun_ad']);

	$kaydet = $db->prepare("UPDATE urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_keyword=:urun_keyword,
		urun_durum=:urun_durum,
		urun_onecikar=:urun_onecikar,
		urun_stok=:urun_stok,	
		urun_seourl=:seourl		
		WHERE urun_id={$_POST['urun_id']}");

	$update = $kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_detay' => $_POST['urun_detay'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_video' => $_POST['urun_video'],
		'urun_keyword' => $_POST['urun_keyword'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_onecikar' => $_POST['urun_onecikar'],
		'urun_stok' => $_POST['urun_stok'],
		'seourl' => $urun_seourl
	));

	if ($update) {
		Header("Location:../production/urun-duzenle.php?durum=ok&urun_id=$urun_id");
	} else {
		Header("Location:../production/urun-duzenle.php?durum=no&urun_id=$urun_id");
	}
}


if ($_GET['urunsil'] == 'ok') {

	$sil = $db->prepare("DELETE FROM urun WHERE urun_id=:id");
	$kontrol = $sil->execute(array(
		'id' => $_GET["urun_id"]
	));

	if ($kontrol) {
		Header("Location:../production/urun.php?sil=ok");
	} else {
		Header("Location:../production/urun.php?sil=no");
	}
}


if ($_GET['urun_onecikar'] == "ok") {

	$duzenle = $db->prepare("UPDATE urun SET urun_onecikar=:urun_onecikar WHERE urun_id={$_GET['urun_id']}");

	$update = $duzenle->execute(array(
		'urun_onecikar' => $_GET['urun_one']
	));

	if ($update) {
		Header("Location:../production/urun.php?durum=ok");
	} else {
		Header("Location:../production/urun.php?durum=no");
	}
}

if (isset($_POST['urunfotosil'])) {

	$urun_id = $_POST['urun_id'];
	$chechklist = $_POST['urunfotosec'];

	foreach ($chechklist as $list) {
		$sil = $db->prepare("DELETE FROM urunfoto WHERE urunfoto_id=:fotoid");
		$kontrol = $sil->execute(array(
			'fotoid' => $list
		));
	}

	if ($kontrol) {
		Header("Location:../production/urun-galeri.php?urun_id=$urun_id?durum=ok");
	} else {
		Header("Location:../production/urun-galeri.php?urun_id=$urun_id?durum=no");
	}
}


if (isset($_POST['yorumyap'])) {

	$url = $_POST['sayfa_url'];
	$kullanici_id = $_POST['kullanici_id'];

	$yorum = $db->prepare("INSERT INTO yorum SET 
		kullanici_id=:kullanici_id,
		urun_id=:urun_id,
		yorum_detay=:yorum_detay");

	$insert = $yorum->execute(array(
		'kullanici_id' => $kullanici_id,
		'yorum_detay' => $_POST['yorum_detay'],
		'urun_id' => $_POST['urun_id']
	));

	if ($insert) {

		Header("Location:$url?durum=ok");
	} else {

		Header("Location:$url?durum=no");
	}
}


if ($_GET['yorumsil'] == 'ok') {

	$sil = $db->prepare("DELETE FROM yorum WHERE yorum_id=:id");
	$kontrol = $sil->execute(array(
		'id' => $_GET["yorum_id"]
	));

	if ($kontrol) {
		Header("Location:../production/yorum.php?sil=ok");
	} else {
		Header("Location:../production/yorum.php?sil=no");
	}
}


if ($_GET['yorum_onay'] == "ok") {

	$duzenle = $db->prepare("UPDATE yorum SET 
	yorum_onay=:yorum_onay 
	WHERE yorum_id={$_GET['yorum_id']}");

	$update = $duzenle->execute(array(
		'yorum_onay' => $_GET['yorum_one']
	));

	if ($update) {
		Header("Location:../production/yorum.php?durum=ok");
	} else {
		Header("Location:../production/yorum.php?durum=no");
	}
}


if (isset($_POST['yorumduzenle'])) {

	$yorum_id = $_POST['yorum_id'];

	$ayarkaydet = $db->prepare("UPDATE yorum SET
		yorum_detay=:yorum_detay
		WHERE yorum_id={$_POST['yorum_id']}");

	$update = $ayarkaydet->execute(array(
		'yorum_detay' => $_POST['yorum_detay']
	));

	if ($update) {

		Header("Location:../production/yorum-duzenle.php?yorum_id=$yorum_id&durum=ok");
	} else {

		Header("Location:../production/yorum-duzenle.php?yorum_id=$yorum_id&durum=no");
	}
}


if (isset($_POST['bankaekle'])) {

	$bankaekle = $db->prepare("INSERT INTO banka SET
		banka_ad=:banka_ad,
		banka_iban=:banka_iban,
        banka_hesapadsoyad=:banka_hesapadsoyad,
        banka_durum=:banka_durum
		");

	$insert = $bankaekle->execute(array(
		'banka_ad' => $_POST['banka_ad'],
		'banka_iban' => $_POST['banka_iban'],
		'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
		'banka_durum' => $_POST['banka_durum'],
	));

	if ($insert) {

		Header("Location:../production/banka.php?durum=ok");
		exit;
	} else {

		Header("Location:../production/banka.php?durum=no");
		exit;
	}
}


if (isset($_POST['bankaduzenle'])) {

	$banka_id = $_POST['banka_id'];

	$ayarkaydet = $db->prepare("UPDATE banka SET
		banka_ad=:banka_ad,
        banka_iban=:banka_iban,
        banka_hesapadsoyad=:banka_hesapadsoyad,
		banka_durum=:banka_durum
		WHERE banka_id={$_POST['banka_id']}");

	$update = $ayarkaydet->execute(array(
		'banka_ad' => $_POST['banka_ad'],
		'banka_iban' => $_POST['banka_iban'],
		'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
		'banka_durum' => $_POST['banka_durum']
	));


	if ($update) {

		Header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=ok");
	} else {

		Header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=no");
	}
}


if ($_GET["bankasil"] == 'ok') {
	$sil = $db->prepare("DELETE FROM banka WHERE banka_id=:id");
	$kontrol = $sil->execute(array(
		'id' => $_GET["banka_id"]
	));

	if ($kontrol) {
		Header("Location:../production/banka.php?sil=ok");
	} else {
		Header("Location:../production/banka.php?sil=no");
	}
}


if (isset($_POST['siparisekle'])) {

	$siparistip = "Banka Havalesi";

	$kaydet = $db->prepare("INSERT INTO siparis SET
		kullanici_id=:kullanici_id,
		siparis_tip=:siparis_tip,
		siparis_banka=:siparis_banka,
		siparis_toplam=:siparis_toplam
		");

	$insert = $kaydet->execute(array(
		'kullanici_id' => $_POST['kullanici_id'],
		'siparis_toplam' => $_POST['siparis_toplam'],
		'siparis_banka' => $_POST['siparis_banka'],
		'siparis_tip' => $siparistip
	));

	if ($insert) {

		$siparis_id = $db->lastInsertId();
		$kullanici_id = $_POST['kullanici_id'];

		$sepetsor = $db->prepare("SELECT * FROM sepet WHERE kullanici_id=:id");
		$sepetsor->execute(array(
			'id' => $kullanici_id
		));

		while ($sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC)) {

			$urun_id = $sepetcek['urun_id'];
			$urun_adet = $sepetcek['urun_adet'];

			$urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id=:id");
			$urunsor->execute(array(
				'id' => $urun_id
			));

			$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);

			$urun_fiyat = $uruncek['urun_fiyat'];

			$kaydet = $db->prepare("INSERT INTO siparisdetay SET
					siparis_id=:siparis_id,
					urun_id=:urun_id,
					urun_fiyat=:urun_fiyat,
					urun_adet=:urun_adet
					");

			$insert = $kaydet->execute(array(
				'siparis_id' => $siparis_id,
				'urun_id' => $urun_id,
				'urun_fiyat' => $urun_fiyat,
				'urun_adet' => $urun_adet
			));

			if ($insert) {
				// İşlem başarılıysa sepetteki ürünlerimini sileriz
				$sil = $db->prepare("DELETE FROM sepet WHERE kullanici_id=:kullanici_id");
				
				$kontrol = $sil->execute(array(
					'kullanici_id' => $kullanici_id
				));

				Header("Location:../../siparislerim.php?durum=ok");
				exit;
			}
		}
	} else {
		Header("Location:../siparislerim.php?durum=no");
	}
}


if (isset($_POST["genelayarkaydet"])) {
	$ayarkaydet = $db->prepare("UPDATE ayar SET 
    ayar_title=:ayar_title,
    ayar_description=:ayar_description,
    ayar_keywords=:ayar_keywords,
    ayar_author=:ayar_author
    WHERE ayar_id=0");

	$update = $ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
	));

	if ($update) {
		//echo "Güncelleme Başarılı!";
		Header("Location:../production/genel-ayar.php?durum=ok");
	} else {
		//echo "Güncelleme Başarısız...";
		Header("Location:../production/genel-ayar.php?durum=no");
	}
}


if (isset($_POST['iletisimayarkaydet'])) {
	$ayarkaydet = $db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
		WHERE ayar_id=0");

	$update = $ayarkaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_gsm' => $_POST['ayar_gsm'],
		'ayar_faks' => $_POST['ayar_faks'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_ilce' => $_POST['ayar_ilce'],
		'ayar_il' => $_POST['ayar_il'],
		'ayar_adres' => $_POST['ayar_adres'],
		'ayar_mesai' => $_POST['ayar_mesai']
	));

	if ($update) {
		header("Location:../production/iletisim-ayarlar.php?durum=ok");
	} else {
		header("Location:../production/iletisim-ayarlar.php?durum=no");
	}
}


if (isset($_POST['apiayarkaydet'])) {
	$ayarkaydet = $db->prepare("UPDATE ayar SET
		ayar_maps=:ayar_maps,
		ayar_analystic=:ayar_analystic,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=0");

	$update = $ayarkaydet->execute(array(
		'ayar_maps' => $_POST['ayar_maps'],
		'ayar_analystic' => $_POST['ayar_analystic'],
		'ayar_zopim' => $_POST['ayar_zopim']
	));

	if ($update) {
		header("Location:../production/api-ayarlar.php?durum=ok");
	} else {
		header("Location:../production/api-ayarlar.php?durum=no");
	}
}


if (isset($_POST["mailayarkaydet"])) {
	$ayarkaydet = $db->prepare("UPDATE ayar SET 
    ayar_smtphost=:ayar_smtphost,
    ayar_smtpuser=:ayar_smtpuser,
    ayar_smtppassword=:ayar_smtppassword,
    ayar_smtpport=:ayar_smtpport
    WHERE ayar_id=0");

	$update = $ayarkaydet->execute(array(
		'ayar_smtphost' => $_POST['ayar_smtphost'],
		'ayar_smtpuser' => $_POST['ayar_smtpuser'],
		'ayar_smtppassword' => $_POST['ayar_smtppassword'],
		'ayar_smtpport' => $_POST['ayar_smtpport']
	));

	if ($update) {
		//echo "Güncelleme Başarılı!";
		Header("Location:../production/mail-ayarlar.php?durum=ok");
	} else {
		//echo "Güncelleme Başarısız...";
		Header("Location:../production/mail-ayarlar.php?durum=no");
	}
}


if (isset($_POST["sosyalayarkaydet"])) {
	$ayarkaydet = $db->prepare("UPDATE ayar SET 
    ayar_facebook=:ayar_facebook,
    ayar_twitter=:ayar_twitter,
    ayar_google=:ayar_google,
    ayar_youtube=:ayar_youtube
    WHERE ayar_id=0");

	$update = $ayarkaydet->execute(array(
		'ayar_facebook' => $_POST['ayar_facebook'],
		'ayar_twitter' => $_POST['ayar_twitter'],
		'ayar_google' => $_POST['ayar_google'],
		'ayar_youtube' => $_POST['ayar_youtube']
	));

	if ($update) {
		//echo "Güncelleme Başarılı!";
		Header("Location:../production/sosyal-ayarlar.php?durum=ok");
	} else {
		//echo "Güncelleme Başarısız...";
		Header("Location:../production/sosyal-ayarlar.php?durum=no");
	}
}


if (isset($_POST["hakkimizdakaydet"])) {
	$ayarkaydet = $db->prepare("UPDATE hakkimizda SET 
    hakkimizda_baslik=:hakkimizda_baslik,
    hakkimizda_icerik=:hakkimizda_icerik,
    hakkimizda_video=:hakkimizda_video,
    hakkimizda_vizyon=:hakkimizda_vizyon,
    hakkimizda_misyon=:hakkimizda_misyon
    WHERE hakkimizda_id=0");

	$update = $ayarkaydet->execute(array(
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
		'hakkimizda_video' => $_POST['hakkimizda_video'],
		'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
	));

	if ($update) {
		//echo "Güncelleme Başarılı!";
		Header("Location:../production/hakkimizda.php?durum=ok");
	} else {
		//echo "Güncelleme Başarısız...";
		Header("Location:../production/hakkimizda.php?durum=no");
	}
}
