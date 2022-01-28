<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
    <ul class="settings-title">
        <li class="active"><a href="javascript:void(0)"><b>ÜYE İŞLEMLERİ</b></a></li>
        <?php
        if ($kullanicicek['kullanici_magaza'] != 2) { ?>
            <li><a href="magaza-basvuru.php">Mağaza Başvuru</a></li>
        <?php } ?>
        <li><a href="siparislerim.php">Siparişlerim</a></li>
        <li><a href="mesaj-gonder.php">Mesaj Gönder</a></li>
        <li><a href="gelen-mesajlar.php">Gelen Mesajlar</a></li>
        <li><a href="hesabim.php">Kişisel Bilgiler</a></li>
        <li><a href="adres-bilgileri.php">Adres Bilgilerim</a></li>
        <li><a href="sifre-guncelle.php">Şifre Güncelleme</a></li>
        <li><a href="profilfoto-guncelle.php">Profil Resmi Güncelleme</a></li>
    </ul>
    
    <?php
    if ($kullanicicek['kullanici_magaza'] == 2) { ?>
    <hr>
        <ul class="settings-title">
            <li class="active"><a href="javascript:void(0)"><b>MAĞAZA İŞLEMLERİ</b></a></li>
            <li><a href="urunlerim.php">Ürünlerim</a></li>
            <li><a href="urun-ekle.php">Ürün Ekle</a></li>
            <li><a href="yeni-siparisler.php">Yeni Siparişlerim</a></li>
            <li><a href="tamamlanan-siparisler.php">Tamamlanan Siparişler</a></li>
            <li><a href="sifre-guncelle.php">Ayarlar</a></li>
        </ul>
    <?php } ?>
</div>