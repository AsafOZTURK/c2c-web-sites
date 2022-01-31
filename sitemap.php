<?php
Header('Content-type: application/xml; charset="UTF-8"', true);

?>

<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:example="http://www.example.com/schemas/example_schema">

    <?php
    include "nedmin/production/fonksiyon.php";
    include "nedmin/netting/baglan.php"

    ?>
<!-- TEKLİ LİNKLER -->
    <url>
        <loc>http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>/kategoriler</loc>
        <lastmod><?php echo date("Y-m-d"); ?></lastmod>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>


<!-- Ürünlerin LİNKLER -->

    <?php
    $urunsor = $db->prepare("SELECT * FROM urun WHERE urun_durum=:durum");
    $urunsor->execute(array(
        'durum' => 1
    ));

    while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) { ?>
        <url>
            <loc>http://<?php echo $_SERVER['HTTP_HOST']; ?>/urun-<?php echo seo($uruncek['urun_ad']); ?>-<?php echo $uruncek['urun_id']; ?></loc>
            <lastmod><?php echo date("Y-m-d"); ?></lastmod>  <!-- Son güncelleme tarihi gelebilir -->
            <changefreq>daily</changefreq> <!-- güncelleme periyodu ürünü günlük güncelle diyoruz -->
            <priority>1.00</priority> <!-- öncelik sıralaması 0-1 arası değer alır -->
        </url>

    <?php }
    ?>


</urlset>
<!--  -->