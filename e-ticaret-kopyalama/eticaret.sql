-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 02 Oca 2022, 18:28:55
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_url` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_title` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_description` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_keywords` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_author` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_faks` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_ilce` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_il` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_mesai` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_maps` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_analystic` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_zopim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_facebook` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_twitter` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_google` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_youtube` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtphost` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpuser` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtppassword` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_smtpport` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ayar_bakim` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_url`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_faks`, `ayar_mail`, `ayar_ilce`, `ayar_il`, `ayar_adres`, `ayar_mesai`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_facebook`, `ayar_twitter`, `ayar_google`, `ayar_youtube`, `ayar_smtphost`, `ayar_smtpuser`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakim`) VALUES
(0, 'dimg/20380Udemy_logo.jpeg', 'http://localhost/e-ticaret', 'E-Ticaret Scripti', 'Php Eğitim Serisi', 'php,mysql', 'Mehmet Asaf ÖZTÜRK', '0880 880 80 80', '0880 880 80 80', '0880 880 80 80', 'eticaret@eticaret.com', 'Tepebaşı', 'Eskişehir', 'Şirintepe Mahallesi No/50', '7/24 Kullanılabilir', 'haritalar api kodu', 'analistik kodu', 'zopim kodu', 'www.facebook.com', 'www.twitter.com', 'www.google.com', 'www.youtube.com', 'mail@alanadi.com', 'username', 'password', '587', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banka`
--

CREATE TABLE `banka` (
  `banka_id` int(11) NOT NULL,
  `banka_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `banka_iban` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `banka_hesapadsoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `banka_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `banka`
--

INSERT INTO `banka` (`banka_id`, `banka_ad`, `banka_iban`, `banka_hesapadsoyad`, `banka_durum`) VALUES
(1, 'Halkbank', '5656 5656 5656 5656', 'Mehmet Asaf ÖZTÜRK', '1'),
(2, 'Ziraat Bankası', '4343 4343 4343 4343', 'Asaf OZTURK', '1'),
(3, 'Garanti Bankası', '2727 2727 2727 2727', 'Mehmet OZTURK', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(1) NOT NULL,
  `hakkimizda_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_video` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_vizyon` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_misyon` varchar(500) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_video`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(0, 'HAKKIMIZDA ', 'Lorem Ipsum Nedir? Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.  Neden Kullanırız? Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli \'buraya metin gelecek, buraya metin gelecek\' yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda birçok masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında \'lorem ipsum\' anahtar sözcükleri ile arama yapıldığında henüz tasarım aşamasında olan çok sayıda site listelenir. Yıllar içinde, bazen kazara, bazen bilinçli olarak (örneğin mizah katılarak), çeşitli sürümleri geliştirilmiştir.', 'https://www.youtube.com/watch?v=sAlaEQjpUks&ab_channel=ModArtPC', 'Vizyonumuz ... ', 'Misyonumuz...');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(2) NOT NULL,
  `kategori_ad` varchar(50) COLLATE utf8_bin NOT NULL,
  `kategori_ust` int(2) NOT NULL,
  `kategori_seourl` varchar(250) COLLATE utf8_bin NOT NULL,
  `kategori_sira` int(2) NOT NULL,
  `kategori_durum` enum('0','1') COLLATE utf8_bin DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`, `kategori_ust`, `kategori_seourl`, `kategori_sira`, `kategori_durum`) VALUES
(1, 'Ayakkabı', 0, 'ayakkabi', 1, '1'),
(2, 'Mont', 0, 'mont', 2, '1'),
(3, 'Gömlek', 0, 'gomlek', 3, '1'),
(4, 'Kazak', 0, 'kazak', 4, '1'),
(5, 'Bot', 1, 'bot', 5, '1'),
(7, 'Şapkalar', 0, 'sapkalar', 7, '1'),
(8, 'Takılar', 0, 'takilar', 8, '1'),
(9, 'Telefon', 0, 'telefon', 1, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kullanici_resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_tc` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_soyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gsm` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_il` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_unvan` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_resim`, `kullanici_tc`, `kullanici_ad`, `kullanici_soyad`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_unvan`, `kullanici_yetki`, `kullanici_durum`) VALUES
(1, '2021-12-15 23:07:07', 'https://www.technopat.net/sosyal/eklenti/dc-jpg.664852/', '11111111118', 'Mehmet Asaf ', 'ÖZTÜRK', 'giris', '0850850850', '202cb962ac59075b964b07152d234b70', 'Asaf ÖZTÜRK', 'Örnek Adres metni', 'Eskişehir', 'Tepebaşı', 'Yazılım Uzmanı', '5', 1),
(10, '2021-12-22 20:36:41', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFei8aiOkiDND7cWvCN-La_4atnrRChhjD2fSLl-J7hemTf4AsoTjO8OrbbeKsEITn8yA&usqp=CAU', '99999999999999', 'Mehmet Asaf', ' ÖZTÜRK', 'giris@giris.com', '0953 646 46 46', 'e10adc3949ba59abbe56e057f20f883e', 'Asaf ÖZTÜRK', 'Anadolu Üniversitesi', 'Eskişehir', 'Tepebaşı', 'Yok', '1', 1),
(11, '2021-12-24 19:05:04', '', '', '', '', 'irem@irem.com', '', 'e86fdc2283aff4717103f2d44d0610f7', 'İrem öZENİR', '', '', '', '', '1', 1),
(12, '2021-12-25 01:25:31', '', '', '', '', 'ısımsız@mail.com', '', 'e86fdc2283aff4717103f2d44d0610f7', 'İsimsiz Kahraman', '', '', '', '', '1', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `menu_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `menu_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `menu_url` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `menu_sira` int(2) NOT NULL,
  `menu_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `menu_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_seourl`) VALUES
(1, '0', 'Hakkımızda', '<p>Men&uuml; Detayları Buraya gelecek</p>\r\n', 'hakkimizda.php', 1, '1', 'hakkimizda'),
(2, '0', 'İletişim', '<p>detayy</p>\r\n', 'iletisim.php', 3, '1', 'iletisim'),
(11, '', 'Kategoriler', '<p>detay gelecek</p>\r\n', 'kategoriler.php', 3, '1', 'kategoriler'),
(12, '', 'Gizlilik Koşulları', '<p>MediaCat Gizlilik Politikası</p>\r\n\r\n<p>İşbu Gizlilik Politikası&rsquo;nda kullanılan &ldquo;Kişisel Bilgiler&rdquo; terimi sizi tanımlayabilecek isminiz, doğum tarihiniz, e-posta adresiniz veya posta adresiniz dahil fakat bunlarla sınırlı olmamak kaydıyla kredi kartı bilgileriniz, kimlik bilgileriniz gibi bilgileri ifade etmektedir.</p>\r\n\r\n<p>MediaCat olarak, t&uuml;m okurlarımızın gizliliğine değer vermekte olup, bizimle paylaşılan kişisel bilgilerin gizliliği ve bilgilerin g&uuml;venliğini ile ilgili okurlarımızın kaygılarını saygıyla karşılamaktayız. Gizlilik Politikası gizliliğinizi korumak ve bilgi temininde g&uuml;venli bir deneyim sunmak i&ccedil;in tasarlamış olup, okurların onayı olmadan kişisel bilgilerini kullanmamayı ve Kişisel Bilgilerin kullanılmasında, &nbsp;uluslararası alanda kabul edilen mahremiyet koruma standartlarına uymayı taahh&uuml;t etmektedir.</p>\r\n\r\n<p>MediaCat olarak, platformu kullanmadan veya Kişisel Bilgilerinizi bize iletmeden &ouml;nce mevcut Gizlilik Politikası&rsquo;nı okumanızı rica ediyoruz. MediaCat, Gizlilik Politikası&rsquo;nı bildirimde bulunmaksızın zaman zaman değiştirebilir veyahut da eklemelerde bulunabilir. Bu durumda Gizlilik Politikası&rsquo;nın s&ouml;z konusu değişiklikleri yansıtan g&uuml;ncellenmiş halini y&uuml;kleyecektir. İşbu sebeple g&uuml;ncellenen Gizlilik Politikası hakkında okurların bilgi sahibi olduklarını periyodik olarak g&ouml;zden ge&ccedil;irmesini &ouml;neririz.</p>\r\n\r\n<p>MediaCat, okurlarının izniyle Kişisel Bilgileri aşağıdaki ama&ccedil;lar i&ccedil;in kullanacaktır, hi&ccedil;bir durumda &ouml;ng&ouml;r&uuml;len amacın dışında kullanmayacaktır.</p>\r\n\r\n<p>Elektronik yayınlar g&ouml;ndermek</p>\r\n\r\n<p>Elektronik posta ile b&uuml;lten g&ouml;ndermek ya da bildirimler de bulunmak</p>\r\n\r\n<p>Satın alınan &uuml;r&uuml;nleri teslim etmek</p>\r\n\r\n<p>Sorularınızı cevaplamak ve etkin bir m&uuml;şteri hizmeti sunmak</p>\r\n\r\n<p>Bu ama&ccedil; i&ccedil;in elde edilen bilgiler, tamamen sizin &ouml;zg&uuml;r iradenizle tarafımıza sağlanmaktadır. Bu Kişisel Bilgileri bize verip vermemekte okurlar serbesttir. Ancak, okurlarımıza daha &ccedil;abuk ve kaliteli hizmet sunabilmemiz i&ccedil;in, işbu platformda okurlardan talep edilen bilgilerin tamamını vermelerini &ouml;nermekteyiz. Ayrıca, talep edilen hizmetin gerektirdiği zorunlu bilgilerin verilmemesi durumunda talebin yerine getirilmesinin m&uuml;mk&uuml;n olamayacağını dikkatlerinize sunarız. Okurlar tarafından verilen bilgilerin doğru ve eksiksiz olması okurların sorumluluğundadır. Yanlış, yanıltıcı veya eksik bilgi verilmemesi rica olunur. B&ouml;yle bir durumda MediaCat hi&ccedil;bir sorumluluk kabul etmeyecektir. Yanlış, yanıltıcı veya eksik bilgi verilmesi nedeniyle MediaCat&rsquo;in bir zarara uğraması halinde bu zararı tazmin y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml; okura aittir.</p>\r\n\r\n<p>Kişisel Bilgilere ek olarak platform okurlar tarafından ziyaret edildiğinde okurlar hakkında başkaca bilgiler de toplanabilir, derlenebilir. Otomatik olarak derlenen teşhis edebilirlik niteliğine sahip olmayan bu bilgiler, cookies adı verilen &ccedil;eşitli teknolojiler ile derlenmektedir. Cookies, web sitesinden bilgisayarların sabit diskine aktarılan k&uuml;&ccedil;&uuml;k &ccedil;aplı metin dosyalarıdır. Bu bilgileri sitemizi, ilgilendiğiniz ve ihtiya&ccedil; duyduğunuz &uuml;r&uuml;nlerimizi değiştirebilmek i&ccedil;in toplamaktayız. Tercihen &ldquo;cookies&rdquo; reddetmek veya &ldquo;cookie&rdquo; g&ouml;nderildiğinde ikaz edilmek a&ccedil;ısından okurlar kendi web gezginlerini ayarlayabilirler.</p>\r\n\r\n<p>Girilen sitede &ldquo;cookie&rdquo;leri reddetmek, sitenin bazı alanlarını gezmeyi veya site ziyaret edildiğinde kişiselleştirilmiş bilgilerin alınmasını engelleyebilir.</p>\r\n\r\n<p>MediaCat toplanan, işlenen ve aktarılan t&uuml;m Kişisel Bilgileri korumak i&ccedil;in gerekli teknolojik ve kurumsal &ouml;nlemleri alır ve bu &ouml;nlemler teknolojik gelişmeye g&ouml;re s&uuml;rekli g&uuml;ncellenir ve uyarlanır. İnternet &uuml;zerinden iletilen Kişisel Bilgiler&rsquo;in gizliliği konusunda mutlak bir garanti verilmesinin s&ouml;z konusu olmadığını hatırlatır, okurlarımıza internet &uuml;zerinde Kişisel Bilgiler&rsquo;ini iletilirken m&uuml;mk&uuml;n olan en &uuml;st d&uuml;zey tedbirleri almalarını tavsiye ediyoruz.</p>\r\n\r\n<p>Temin edilen Kişiler Bilgiler servisin hizmet amacına y&ouml;nelik olup, ilke olarak, &uuml;&ccedil;&uuml;nc&uuml; kişilere satılmaz, kiralanmaz ya da başka şekilde kullandırılmaz ve okurlar bizzat aksini talep etmediği s&uuml;rece &uuml;&ccedil;&uuml;nc&uuml; kişilerle hi&ccedil;bir suretle paylaşılmaz. Şu kadar ki, MediaCat y&uuml;r&uuml;rl&uuml;kteki mevzuat uyarınca yetkili, idari ve resmi makamlardan usul&uuml;ne uygun olarak talep gelmesi halinde okurların kendisinde bulunan bilgilerini ilgili yetkili makamlarla paylaşacaktır.</p>\r\n\r\n<p>MediaCat vereceğiniz destek ile Kişisel Bilgilerinizi daima g&uuml;ncel ve doğru şekilde tutacaktır. Ancak Kişisel Bilgilerinizin silinmesi, değiştirilmesi veyahut da g&uuml;ncellenmesinin gerektirdiği hallerde bizimle irtibata ge&ccedil;menizi ve isteklerinizi iletmenizi rica ederiz.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 5, '1', 'gizlilik-kosullari'),
(13, '', 'Mesafeli Satış Sözleşmesi', '<p>Bu sayfada yer alan mesafeli satış s&ouml;zleşmesi tamamen &ouml;rnek olması i&ccedil;in eklenmiştir. Maddeler sekt&ouml;re g&ouml;re değişiklik g&ouml;sterilebilir. Mesafeli satış S&ouml;zleşmesi i&ccedil;eriğini firmanıza g&ouml;re d&uuml;zenleyerek sitenize eklemelisiniz. &Ouml;rnek s&ouml;zleşme i&ccedil;eriğinden site sahibi sorumludur, Firmamızın &ouml;rnek s&ouml;zleşmelerin eklenmesinden kaynaklı herhangi bir y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml; bulunmamaktadır.<br />\r\nS&ouml;zleşmeleri &nbsp;İ&ccedil;erik Y&ouml;netimi &nbsp;&gt;&gt; &nbsp;Sayfalar b&ouml;l&uuml;m&uuml;nden d&uuml;zenleyebilirsiniz. Sayfalar b&ouml;l&uuml;m&uuml; ile ilgili hazırladığımız yardım sayfası i&ccedil;in&nbsp;buraya tıklayınız.</p>\r\n\r\n<p>**&Ouml;RNEKTİR. KULLANMADAN &Ouml;NCE KENDİ SİTENİZE UYGUN BİR ŞEKİLDE D&Uuml;ZENLEYİNİZ**</p>\r\n\r\n<p>MESAFELİ SATIŞ S&Ouml;ZLEŞMESİ</p>\r\n\r\n<p>1.TARAFLAR</p>\r\n\r\n<p>İşbu S&ouml;zleşme aşağıdaki taraflar arasında aşağıda belirtilen h&uuml;k&uuml;m ve şartlar &ccedil;er&ccedil;evesinde imzalanmıştır.</p>\r\n\r\n<p>&lsquo;ALICI&rsquo; ; (s&ouml;zleşmede bundan sonra &quot;ALICI&quot; olarak anılacaktır)</p>\r\n\r\n<p>AD- SOYAD:<br />\r\nADRES:</p>\r\n\r\n<p>&lsquo;SATICI&rsquo; ; (s&ouml;zleşmede bundan sonra &quot;SATICI&quot; olarak anılacaktır)</p>\r\n\r\n<p>AD- SOYAD:<br />\r\nADRES:</p>\r\n\r\n<p>İş bu s&ouml;zleşmeyi kabul etmekle ALICI, s&ouml;zleşme konusu siparişi onayladığı takdirde sipariş konusu bedeli ve varsa kargo &uuml;creti, vergi gibi belirtilen ek &uuml;cretleri &ouml;deme y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml; altına gireceğini ve bu konuda bilgilendirildiğini peşinen kabul eder.</p>\r\n\r\n<p>2.TANIMLAR</p>\r\n\r\n<p>İşbu s&ouml;zleşmenin uygulanmasında ve yorumlanmasında aşağıda yazılı terimler karşılarındaki yazılı a&ccedil;ıklamaları ifade edeceklerdir.</p>\r\n\r\n<p>BAKAN : G&uuml;mr&uuml;k ve Ticaret Bakanı&rsquo;nı,</p>\r\n\r\n<p>BAKANLIK : G&uuml;mr&uuml;k ve Ticaret Bakanlığı&rsquo;nı,</p>\r\n\r\n<p>KANUN : 6502 sayılı T&uuml;keticinin Korunması Hakkında Kanun&rsquo;u,</p>\r\n\r\n<p>Y&Ouml;NETMELİK : Mesafeli S&ouml;zleşmeler Y&ouml;netmeliği&rsquo;ni (RG:27.11.2014/29188)</p>\r\n\r\n<p>HİZMET : Bir &uuml;cret veya menfaat karşılığında yapılan ya da yapılması taahh&uuml;t edilen mal sağlama dışındaki her t&uuml;rl&uuml; t&uuml;ketici işleminin konusunu ,</p>\r\n\r\n<p>SATICI : Ticari veya mesleki faaliyetleri kapsamında t&uuml;keticiye mal sunan veya mal sunan adına veya hesabına hareket eden şirketi,</p>\r\n\r\n<p>ALICI : Bir mal veya hizmeti ticari veya mesleki olmayan ama&ccedil;larla edinen, kullanan veya yararlanan ger&ccedil;ek ya da t&uuml;zel kişiyi,</p>\r\n\r\n<p>SİTE : SATICI&rsquo;ya ait internet sitesini,</p>\r\n\r\n<p>SİPARİŞ VEREN: Bir mal veya hizmeti SATICI&rsquo;ya ait internet sitesi &uuml;zerinden talep eden ger&ccedil;ek ya da t&uuml;zel kişiyi,</p>\r\n\r\n<p>TARAFLAR : SATICI ve ALICI&rsquo;yı,</p>\r\n\r\n<p>S&Ouml;ZLEŞME : SATICI ve ALICI arasında akdedilen işbu s&ouml;zleşmeyi,</p>\r\n\r\n<p>MAL : Alışverişe konu olan taşınır eşyayı ve elektronik ortamda kullanılmak &uuml;zere hazırlanan yazılım, ses, g&ouml;r&uuml;nt&uuml; ve benzeri gayri maddi malları ifade eder.</p>\r\n\r\n<p>3.KONU</p>\r\n\r\n<p>İşbu S&ouml;zleşme, ALICI&rsquo;nın, SATICI&rsquo;ya ait internet sitesi &uuml;zerinden elektronik ortamda siparişini verdiği aşağıda nitelikleri ve satış fiyatı belirtilen &uuml;r&uuml;n&uuml;n satışı ve teslimi ile ilgili olarak 6502 sayılı T&uuml;keticinin Korunması Hakkında Kanun ve Mesafeli S&ouml;zleşmelere Dair Y&ouml;netmelik h&uuml;k&uuml;mleri gereğince tarafların hak ve y&uuml;k&uuml;ml&uuml;l&uuml;klerini d&uuml;zenler.</p>\r\n\r\n<p>Listelenen ve sitede ilan edilen fiyatlar satış fiyatıdır. İlan edilen fiyatlar ve vaatler g&uuml;ncelleme yapılana ve değiştirilene kadar ge&ccedil;erlidir. S&uuml;reli olarak ilan edilen fiyatlar ise belirtilen s&uuml;re sonuna kadar ge&ccedil;erlidir.</p>\r\n\r\n<p>7. S&Ouml;ZLEŞME KONUSU &Uuml;R&Uuml;N/&Uuml;R&Uuml;NLER BİLGİLERİ</p>\r\n\r\n<p>1.&nbsp;Malın /&Uuml;r&uuml;n/&Uuml;r&uuml;nlerin/ Hizmetin temel &ouml;zelliklerini (t&uuml;r&uuml;, miktarı, marka/modeli, rengi, adedi) SATICI&rsquo;ya ait internet sitesinde yayınlanmaktadır. Satıcı tarafından kampanya d&uuml;zenlenmiş ise ilgili &uuml;r&uuml;n&uuml;n temel &ouml;zelliklerini kampanya s&uuml;resince inceleyebilirsiniz. Kampanya tarihine kadar ge&ccedil;erlidir.</p>\r\n\r\n<p>7.2.&nbsp;Listelenen ve sitede ilan edilen fiyatlar satış fiyatıdır. İlan edilen fiyatlar ve vaatler g&uuml;ncelleme yapılana ve değiştirilene kadar ge&ccedil;erlidir. S&uuml;reli olarak ilan edilen fiyatlar ise belirtilen s&uuml;re sonuna kadar ge&ccedil;erlidir.</p>\r\n\r\n<p>7.3.&nbsp;S&ouml;zleşme konusu mal ya da hizmetin t&uuml;m vergiler d&acirc;hil satış fiyatı aşağıda g&ouml;sterilmiştir.</p>\r\n\r\n<p>7.4.&nbsp; &Uuml;r&uuml;n sevkiyat masrafı olan kargo &uuml;creti ALICI tarafından &ouml;denecektir.</p>\r\n\r\n<p>10. CAYMA HAKKI</p>\r\n\r\n<p>10.1.&nbsp;ALICI; mesafeli s&ouml;zleşmenin mal satışına ilişkin olması durumunda, &uuml;r&uuml;n&uuml;n kendisine veya g&ouml;sterdiği adresteki kişi/kuruluşa teslim tarihinden itibaren 14 (on d&ouml;rt) g&uuml;n i&ccedil;erisinde, SATICI&rsquo;ya bildirmek şartıyla hi&ccedil;bir hukuki ve cezai sorumluluk &uuml;stlenmeksizin ve hi&ccedil;bir gerek&ccedil;e g&ouml;stermeksizin malı reddederek s&ouml;zleşmeden cayma hakkını kullanabilir. Hizmet sunumuna ilişkin mesafeli s&ouml;zleşmelerde ise, bu s&uuml;re s&ouml;zleşmenin imzalandığı tarihten itibaren başlar. Cayma hakkı s&uuml;resi sona ermeden &ouml;nce, t&uuml;keticinin onayı ile hizmetin ifasına başlanan hizmet s&ouml;zleşmelerinde cayma hakkı kullanılamaz. Cayma hakkının kullanımından kaynaklanan masraflar SATICI&rsquo; ya aittir.&nbsp;ALICI, iş bu s&ouml;zleşmeyi kabul etmekle, cayma hakkı konusunda bilgilendirildiğini peşinen kabul eder.</p>\r\n\r\n<p>10.2.&nbsp;Cayma hakkının kullanılması i&ccedil;in 14 (ond&ouml;rt) g&uuml;nl&uuml;k s&uuml;re i&ccedil;inde SATICI&#39; ya iadeli taahh&uuml;tl&uuml; posta, faks veya eposta ile yazılı bildirimde bulunulması ve &uuml;r&uuml;n&uuml;n işbu s&ouml;zleşmede d&uuml;zenlenen &quot;Cayma Hakkı Kullanılamayacak &Uuml;r&uuml;nler&quot; h&uuml;k&uuml;mleri &ccedil;er&ccedil;evesinde kullanılmamış olması şarttır. Bu hakkın kullanılması halinde,&nbsp;</p>\r\n\r\n<p>a)&nbsp;3. kişiye veya ALICI&rsquo; ya teslim edilen &uuml;r&uuml;n&uuml;n faturası, (İade edilmek istenen &uuml;r&uuml;n&uuml;n faturası kurumsal ise, iade ederken kurumun d&uuml;zenlemiş olduğu iade faturası ile birlikte g&ouml;nderilmesi gerekmektedir. Faturası kurumlar adına d&uuml;zenlenen sipariş iadeleri İADE FATURASI kesilmediği takdirde tamamlanamayacaktır.)</p>\r\n\r\n<p>b)&nbsp;İade formu,</p>\r\n\r\n<p>c)&nbsp;İade edilecek &uuml;r&uuml;nlerin kutusu, ambalajı, varsa standart aksesuarları ile birlikte eksiksiz ve hasarsız olarak teslim edilmesi gerekmektedir.</p>\r\n\r\n<p>d)&nbsp;SATICI, cayma bildiriminin kendisine ulaşmasından itibaren en ge&ccedil; 10 g&uuml;nl&uuml;k s&uuml;re i&ccedil;erisinde toplam bedeli ve ALICI&rsquo;yı bor&ccedil; altına sokan belgeleri ALICI&rsquo; ya iade etmek ve 20 g&uuml;nl&uuml;k s&uuml;re i&ccedil;erisinde malı iade almakla y&uuml;k&uuml;ml&uuml;d&uuml;r.</p>\r\n\r\n<p>e)&nbsp;ALICI&rsquo; nın kusurundan kaynaklanan bir nedenle malın değerinde bir azalma olursa veya iade imk&acirc;nsızlaşırsa ALICI kusuru oranında SATICI&rsquo; nın zararlarını tazmin etmekle y&uuml;k&uuml;ml&uuml;d&uuml;r. Ancak cayma hakkı s&uuml;resi i&ccedil;inde malın veya &uuml;r&uuml;n&uuml;n usul&uuml;ne uygun kullanılması sebebiyle meydana gelen değişiklik ve bozulmalardan ALICI sorumlu değildir.&nbsp;</p>\r\n\r\n<p>f)&nbsp;Cayma hakkının kullanılması nedeniyle SATICI tarafından d&uuml;zenlenen kampanya limit tutarının altına d&uuml;ş&uuml;lmesi halinde kampanya kapsamında faydalanılan indirim miktarı iptal edilir.</p>\r\n\r\n<p>11. CAYMA HAKKI KULLANILAMAYACAK &Uuml;R&Uuml;NLER</p>\r\n\r\n<p>ALICI&rsquo;nın isteği veya a&ccedil;ık&ccedil;a kişisel ihtiya&ccedil;ları doğrultusunda hazırlanan ve geri g&ouml;nderilmeye m&uuml;sait olmayan, i&ccedil; giyim alt par&ccedil;aları, mayo ve bikini altları, makyaj malzemeleri, tek kullanımlık &uuml;r&uuml;nler, &ccedil;abuk bozulma tehlikesi olan veya son kullanma tarihi ge&ccedil;me ihtimali olan mallar, ALICI&rsquo;ya teslim edilmesinin ardından ALICI tarafından ambalajı a&ccedil;ıldığı takdirde iade edilmesi sağlık ve hijyen a&ccedil;ısından uygun olmayan &uuml;r&uuml;nler, teslim edildikten sonra başka &uuml;r&uuml;nlerle karışan vedoğası gereği ayrıştırılması m&uuml;mk&uuml;n olmayan &uuml;r&uuml;nler, Abonelik s&ouml;zleşmesi kapsamında sağlananlar dışında, gazete ve dergi gibi s&uuml;reli yayınlara ilişkin mallar, Elektronik ortamda anında ifa edilen hizmetler veya t&uuml;keticiye anında teslim edilen&nbsp;gayrimaddi&nbsp;mallar,ile ses veya g&ouml;r&uuml;nt&uuml; kayıtlarının, kitap, dijital i&ccedil;erik, yazılım programlarının, veri kaydedebilme ve veri depolama cihazlarının, bilgisayar sarf malzemelerinin, ambalajının ALICI tarafından a&ccedil;ılmış olması halinde iadesi Y&ouml;netmelik gereği m&uuml;mk&uuml;n değildir. Ayrıca Cayma hakkı s&uuml;resi sona ermeden &ouml;nce, t&uuml;keticinin onayı ile ifasına başlanan hizmetlere ilişkin cayma hakkının kullanılması daY&ouml;netmelik gereği m&uuml;mk&uuml;n değildir.</p>\r\n\r\n<p>Kozmetik ve kişisel bakım &uuml;r&uuml;nleri, i&ccedil; giyim &uuml;r&uuml;nleri, mayo, bikini, kitap, kopyalanabilir yazılım ve programlar, DVD, VCD, CD ve kasetler ile kırtasiye sarf malzemeleri (toner, kartuş, şerit vb.) iade edilebilmesi i&ccedil;in ambalajlarının a&ccedil;ılmamış, denenmemiş, bozulmamış ve kullanılmamış olmaları gerekir.</p>\r\n\r\n<p>12. TEMERR&Uuml;T HALİ VE HUKUKİ SONU&Ccedil;LARI</p>\r\n\r\n<p>ALICI, &ouml;deme işlemlerini kredi kartı ile yaptığı durumda temerr&uuml;de d&uuml;şt&uuml;ğ&uuml; takdirde, kart sahibi banka ile arasındaki kredi kartı s&ouml;zleşmesi &ccedil;er&ccedil;evesinde faiz &ouml;deyeceğini ve bankaya karşı sorumlu olacağını kabul, beyan ve taahh&uuml;t eder. Bu durumda ilgili banka hukuki yollara başvurabilir; doğacak masrafları ve vek&acirc;let &uuml;cretini ALICI&rsquo;dan talep edebilir ve her koşulda ALICI&rsquo;nın borcundan dolayı temerr&uuml;de d&uuml;şmesi halinde, ALICI, borcun gecikmeli ifasından dolayı SATICI&rsquo;nın uğradığı zarar ve ziyanını &ouml;deyeceğini kabul, beyan ve taahh&uuml;t eder</p>\r\n\r\n<p>13. YETKİLİ MAHKEME</p>\r\n\r\n<p>İşbu s&ouml;zleşmeden doğan uyuşmazlıklarda şikayet ve itirazlar,&nbsp;aşağıdaki kanunda belirtilen parasal sınırlar d&acirc;hilinde t&uuml;keticinin yerleşim yerinin bulunduğu veya t&uuml;ketici işleminin yapıldığı yerdeki t&uuml;ketici sorunları hakem heyetine veya t&uuml;ketici mahkemesine yapılacaktır. Parasal sınıra ilişkin bilgiler aşağıdadır:&nbsp;</p>\r\n\r\n<p>28/05/2014 tarihinden itibaren ge&ccedil;erli olmak &uuml;zere:</p>\r\n\r\n<p>a)&nbsp;6502 sayılı T&uuml;keticinin Korunması Hakkında Kanun&rsquo;un 68. Maddesi gereği değeri 2.000,00 (ikibin) TL&rsquo;nin altında olan uyuşmazlıklarda il&ccedil;e t&uuml;ketici hakem heyetlerine,</p>\r\n\r\n<p>b) Değeri 3.000,00(&uuml;&ccedil;bin)TL&rsquo; nin altında bulunan uyuşmazlıklarda il t&uuml;ketici hakem heyetlerine,</p>\r\n\r\n<p>c) B&uuml;y&uuml;kşehir stat&uuml;s&uuml;nde bulunan illerde ise değeri 2.000,00 (ikibin) TL ile 3.000,00(&uuml;&ccedil;bin)TL&rsquo; arasındaki uyuşmazlıklarda il t&uuml;ketici hakem heyetlerine başvuru yapılmaktadır.<br />\r\nİşbu S&ouml;zleşme ticari ama&ccedil;larla yapılmaktadır.</p>\r\n\r\n<p>14. Y&Uuml;R&Uuml;RL&Uuml;K</p>\r\n\r\n<p>ALICI, Site &uuml;zerinden verdiği siparişe ait &ouml;demeyi ger&ccedil;ekleştirdiğinde işbu s&ouml;zleşmenin t&uuml;m şartlarını kabul etmiş sayılır. SATICI, siparişin ger&ccedil;ekleşmesi &ouml;ncesinde işbu s&ouml;zleşmenin sitede ALICI tarafından okunup kabul edildiğine dair onay alacak şekilde gerekli yazılımsal d&uuml;zenlemeleri yapmakla y&uuml;k&uuml;ml&uuml;d&uuml;r.</p>\r\n\r\n<p>SATICI:</p>\r\n\r\n<p>ALICI:</p>\r\n\r\n<p>TARİH:</p>\r\n', '', 6, '1', 'mesafeli-satis-sozlesmesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `sepet_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adet` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `siparis_no` int(11) DEFAULT NULL,
  `kullanici_id` int(11) NOT NULL,
  `siparis_toplam` float NOT NULL,
  `siparis_tip` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `siparis_banka` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `siparis_odeme` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparis_id`, `siparis_zaman`, `siparis_no`, `kullanici_id`, `siparis_toplam`, `siparis_tip`, `siparis_banka`, `siparis_odeme`) VALUES
(5825, '2022-01-02 13:51:08', NULL, 10, 8815, 'Banka Havalesi', 'Halkbank', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisdetay`
--

CREATE TABLE `siparisdetay` (
  `siparisdetay_id` int(11) NOT NULL,
  `siparis_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_adet` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparisdetay`
--

INSERT INTO `siparisdetay` (`siparisdetay_id`, `siparis_id`, `urun_id`, `urun_fiyat`, `urun_adet`) VALUES
(5, 5825, 23, 2650.00, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `slider_resimyol` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1',
  `slider_link` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_resimyol`, `slider_sira`, `slider_durum`, `slider_link`) VALUES
(8, 'Kot Ceket', 'dimg/slider/30551310072876627327', 1, '1', ''),
(9, 'Kırmızı Ceket', 'dimg/slider/28375229452865925716', 2, '1', ''),
(10, 'Ayakkabı', 'dimg/slider/20975200072756923627', 3, '1', ''),
(11, 'Takılar', 'dimg/slider/25045267702930224560', 4, '1', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `urun_ad` varchar(100) COLLATE utf8_bin NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `urun_seourl` varchar(250) COLLATE utf8_bin NOT NULL,
  `urun_detay` text COLLATE utf8_bin NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_video` varchar(250) COLLATE utf8_bin NOT NULL,
  `urun_keyword` varchar(250) COLLATE utf8_bin NOT NULL,
  `urun_stok` int(11) NOT NULL,
  `urun_durum` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '1',
  `urun_onecikar` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `kategori_id`, `urun_ad`, `urun_zaman`, `urun_seourl`, `urun_detay`, `urun_fiyat`, `urun_video`, `urun_keyword`, `urun_stok`, `urun_durum`, `urun_onecikar`) VALUES
(1, 3, 'Ekose Gömlek', '2021-12-30 18:06:22', 'ekose-gomlek', '<p>&Ccedil;ok iyi g&ouml;mlek</p>\r\n', 50.00, 'yok', 'gömlek,ekose', 200, '1', '1'),
(11, 1, 'Ayakkabi 1', '2021-12-30 18:06:22', 'ayakkabi-1', '<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n\r\n<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n\r\n<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n', 150.00, 'https://www.youtube.com/watch?v=gs-MtItyOFc&list=RDgs-MtItyOFc&start_radio=1&ab_channel=tameimpalaVEVO', 'ayakkabı,bir', 100, '1', '0'),
(12, 1, 'Ayakkabi 2', '2021-12-30 18:06:22', 'ayakkabi-2', '<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n\r\n<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n\r\n<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n', 650.00, 'https://www.youtube.com/watch?v=gs-MtItyOFc&list=RDgs-MtItyOFc&start_radio=1&ab_channel=tameimpalaVEVO', 'bilmem,ayakkabi', 250, '1', '0'),
(13, 1, 'Ayakkabi 3', '2021-12-30 18:06:22', 'ayakkabi-3', '', 65.00, 'https://www.youtube.com/watch?v=gs-MtItyOFc&list=RDgs-MtItyOFc&start_radio=1&ab_channel=tameimpalaVEVO', 'ayakkabı,uc', 9000, '1', '0'),
(14, 7, 'Şapka 1', '2021-12-30 18:06:22', 'sapka-1', '<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n\r\n<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n\r\n<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n', 12.00, 'https://www.youtube.com/watch?v=gs-MtItyOFc&list=RDgs-MtItyOFc&start_radio=1&ab_channel=tameimpalaVEVO', 'a,b,c', 36, '1', '0'),
(15, 7, 'Şapka 2', '2021-12-30 18:06:22', 'sapka-2', '<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n\r\n<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n\r\n<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n', 500.00, 'https://www.youtube.com/watch?v=gs-MtItyOFc&list=RDgs-MtItyOFc&start_radio=1&ab_channel=tameimpalaVEVO', 'a,b,c', 8, '1', '0'),
(16, 7, 'Şapka 3', '2021-12-30 18:06:22', 'sapka-3', '<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n', 6.00, 'https://www.youtube.com/watch?v=gs-MtItyOFc&list=RDgs-MtItyOFc&start_radio=1&ab_channel=tameimpalaVEVO', 'a,b,c', 985, '1', '0'),
(17, 8, 'Takı 1', '2021-12-30 18:06:22', 'taki-1', '<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak ş</p>\r\n\r\n<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.ablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n', 11.00, 'https://www.youtube.com/watch?v=gs-MtItyOFc&list=RDgs-MtItyOFc&start_radio=1&ab_channel=tameimpalaVEVO', 'a,b,c', 23, '1', '0'),
(18, 8, 'Takı 2', '2021-12-30 18:06:22', 'taki-2', '<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n\r\n<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n', 566.00, 'https://www.youtube.com/watch?v=gs-MtItyOFc&list=RDgs-MtItyOFc&start_radio=1&ab_channel=tameimpalaVEVO', 'a,b,c', 100, '1', '0'),
(19, 8, 'Takı 3', '2022-01-02 11:33:40', 'taki-3', '<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n', 10.00, 'https://www.youtube.com/watch?v=gs-MtItyOFc&list=RDgs-MtItyOFc&start_radio=1&ab_channel=tameimpalaVEVO', 'a,b,c', 2, '1', '0'),
(20, 4, 'Kazak 1', '2021-12-30 18:06:22', 'kazak-1', '<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n', 233.00, 'https://www.youtube.com/watch?v=gs-MtItyOFc&list=RDgs-MtItyOFc&start_radio=1&ab_channel=tameimpalaVEVO', 'a,b,c', 500, '1', '1'),
(21, 4, 'Kazak 2', '2021-12-30 18:06:22', 'kazak-2', '<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n', 20.00, 'https://www.youtube.com/watch?v=gs-MtItyOFc&list=RDgs-MtItyOFc&start_radio=1&ab_channel=tameimpalaVEVO', 'a,b,c', 45, '1', '1'),
(22, 2, 'mONT1', '2021-12-30 18:06:22', 'mont1', '<p>Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.Lorem Ipsum, masa&uuml;st&uuml; yayıncılık ve basın yayın sekt&ouml;r&uuml;nde kullanılan taklit yazı bloğu olarak tanımlanır. Lipsum, oluşturulacak şablon ve taslaklarda i&ccedil;erik yerine ge&ccedil;erek yazı bloğunu doldurmak i&ccedil;in kullanılır.</p>\r\n', 100.00, 'https://www.youtube.com/watch?v=gs-MtItyOFc&list=RDgs-MtItyOFc&start_radio=1&ab_channel=tameimpalaVEVO', 'a,b,c', 1950, '1', '0'),
(23, 9, 'Trident A23 Max 64GB Siyah Akıllı Telefon', '2022-01-02 11:33:28', 'trident-a23-max-64gb-siyah-akilli-telefon', '<p>&Ccedil;ok iyi telefon</p>\r\n', 2650.00, '', 'telefon,akıllı', 999, '1', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunfoto`
--

CREATE TABLE `urunfoto` (
  `urunfoto_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urunfoto_resimyol` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `urunfoto_sira` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunfoto`
--

INSERT INTO `urunfoto` (`urunfoto_id`, `urun_id`, `urunfoto_resimyol`, `urunfoto_sira`) VALUES
(27, 1, 'dimg/urun/20177290962094723132a1.jpg', 1),
(28, 1, 'dimg/urun/30889319022905828177a2.jpg', 2),
(29, 1, 'dimg/urun/31879304713177124827a3.jpg', 3),
(30, 14, 'dimg/urun/25308258952059722076s1.jpg', 0),
(31, 14, 'dimg/urun/22213296562339630305s2.jpg', 0),
(32, 14, 'dimg/urun/30811248112179620523s3.jpg', 0),
(33, 14, 'dimg/urun/25305210842446222616a2.jpg', 0),
(34, 19, 'dimg/urun/27606233013018222492t1.jpg', 1),
(35, 19, 'dimg/urun/29095282542838822713t2.jpg', 2),
(36, 19, 'dimg/urun/30878248722415828395t3.jpg', 3),
(37, 19, 'dimg/urun/29475317892372020085t4.jpg', 4),
(38, 20, 'dimg/urun/23370254952535428459k2.jpg', 2),
(39, 20, 'dimg/urun/26891201473192429618k1.jpeg', 1),
(40, 20, 'dimg/urun/31366223762080424227k4.jpg', 3),
(41, 20, 'dimg/urun/29242211182644924688t1.jpg', 4),
(42, 21, 'dimg/urun/31936218032370223984k2.jpg', 1),
(43, 21, 'dimg/urun/23344285672698330013k1.jpeg', 2),
(44, 21, 'dimg/urun/22030248532645424079k4.jpg', 3),
(45, 21, 'dimg/urun/31129285592749429730s1.jpg', 4),
(46, 23, 'dimg/urun/24016231252940022360113144_small.jpg', 0),
(47, 23, 'dimg/urun/25341201702339521426telefon.png', 0),
(48, 23, 'dimg/urun/30185299432729029734trident-a23-siyah_po6c1y_500.jpg', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE `yorum` (
  `yorum_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `yorum_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yorum_onay` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorum`
--

INSERT INTO `yorum` (`yorum_id`, `kullanici_id`, `urun_id`, `yorum_detay`, `yorum_zaman`, `yorum_onay`) VALUES
(8, 10, 11, '<p>terterterertterterterertterterterertterterterertterterterertterterterertterterterertterterterertterterterertterterterertterterterertterterterert</p>\r\n', '2021-12-24 16:05:20', '1'),
(9, 11, 11, 'aaaaaaaaaaa', '2021-12-24 16:06:45', '1'),
(13, 10, 18, '\r\ndenemeekofjsodıpgjpadıohgpıadhgpıaddhpboıadfhbpoıadfjpbıochjğboc\r\ndenemeekofjsodıpgjpadıohgpıadhgpıaddhpboıadfhbpoıadfjpbıochjğbocdenemeekofjsodıpgjpadıohgpıadhgpıaddhpboıadfhbpoıadfjpbıochjğbocdenemeekofjsodıpgjpadıohgpıadhgpıaddhpboıadfhbpoıadfjpbıochjğbocdenemeekofjsodıpgjpadıohgpıadhgpıaddhpboıadfhbpoıadfjpbıochjğboc', '2021-12-24 18:33:35', '0'),
(14, 12, 16, '<p>D&uuml;zg&uuml;n bir yorum satırı</p>\r\n', '2021-12-24 22:25:56', '1'),
(15, 10, 11, '534345', '2021-12-28 08:44:31', '0'),
(16, 10, 11, '', '2021-12-28 08:44:37', '1'),
(17, 10, 11, 'FSDHFIPHFPOIDHFPDSD', '2021-12-28 08:44:50', '1'),
(18, 10, 19, 'rewrewrw', '2021-12-30 12:06:55', '0'),
(19, 10, 19, 'rwerewrewrqer', '2021-12-30 12:07:10', '0');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `banka`
--
ALTER TABLE `banka`
  ADD PRIMARY KEY (`banka_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`sepet_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `siparisdetay`
--
ALTER TABLE `siparisdetay`
  ADD PRIMARY KEY (`siparisdetay_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `urunfoto`
--
ALTER TABLE `urunfoto`
  ADD PRIMARY KEY (`urunfoto_id`);

--
-- Tablo için indeksler `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `banka`
--
ALTER TABLE `banka`
  MODIFY `banka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `sepet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5826;
--
-- Tablo için AUTO_INCREMENT değeri `siparisdetay`
--
ALTER TABLE `siparisdetay`
  MODIFY `siparisdetay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Tablo için AUTO_INCREMENT değeri `urunfoto`
--
ALTER TABLE `urunfoto`
  MODIFY `urunfoto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- Tablo için AUTO_INCREMENT değeri `yorum`
--
ALTER TABLE `yorum`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
