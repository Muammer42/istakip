-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Ara 2021, 17:12:49
-- Sunucu sürümü: 10.4.19-MariaDB
-- PHP Sürümü: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `istakip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_baslik` varchar(300) DEFAULT NULL,
  `site_aciklama` varchar(300) DEFAULT NULL,
  `site_sahibi` varchar(100) DEFAULT NULL,
  `mail_onayi` int(11) DEFAULT NULL,
  `duyuru_onayi` int(11) DEFAULT NULL,
  `site_logo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_baslik`, `site_aciklama`, `site_sahibi`, `mail_onayi`, `duyuru_onayi`, `site_logo`) VALUES
(1, 'SİTE BASLİK', 'SİTE ACIKLAMA', 'Muammer', 0, 0, 'img/2372794580192161Bilgisayar-kısmı.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kul_id` int(5) NOT NULL,
  `kul_isim` varchar(200) DEFAULT NULL,
  `kul_mail` varchar(250) DEFAULT NULL,
  `kul_sifre` varchar(250) DEFAULT NULL,
  `kul_telefon` varchar(50) DEFAULT NULL,
  `kul_unvan` varchar(250) DEFAULT NULL,
  `kul_izin1` varchar(250) DEFAULT NULL,
  `kul_izin2` varchar(250) DEFAULT NULL,
  `kul_yetki` int(11) DEFAULT NULL,
  `kul_logo` varchar(250) DEFAULT NULL,
  `ip_adresi` varchar(300) DEFAULT NULL,
  `session_mail` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kul_id`, `kul_isim`, `kul_mail`, `kul_sifre`, `kul_telefon`, `kul_unvan`, `kul_izin1`, `kul_izin2`, `kul_yetki`, `kul_logo`, `ip_adresi`, `session_mail`) VALUES
(1, 'Oguzhan admin', 'admin@admin', '202cb962ac59075b964b07152d234b70', '0', 'Yazılımcı | Admin', NULL, NULL, 1, 'img/341123405580192161Bilgisayar-kısmı.png', '192.168.1.100', 'c4a133eb550f9e269f4b9cd148a741d9'),
(2, 'ogyuzbey', 'spy@gmail.com', '202cb962ac59075b964b07152d234b70', '1234123', 'Personel', '2021-12-22', '2021-12-24', 0, 'img/34112s34s05580192161Bilgisayar-kısmı.png', '::1', 'd323d1a1ee35e2893a5c75c0d785155d'),
(4, 'Oguzbey', 'zort@gmail.com', '202cb962ac59075b964b07152d234b70', '12312313', 'Personel', '2021-12-14', '2021-12-19', 0, 'img/34112s34s05580192161Bilgisayar-kısmı.png', '::1', 'e81e5cf252c3974e23610f3eabb186bf'),
(5, 'Ahmet', 'ahmetkorkmaz@gmail.com', '202cb962ac59075b964b07152d234b70', '5369421324', 'Personel', '2021-01-04', '2021-01-09', 0, 'img/34112s34s05580192161Bilgisayar-kısmı.png', '::1', '82ee4927c89185f87dc8a87311d301ee'),
(6, 'Ahmet', 'zart@gmail.com', '202cb962ac59075b964b07152d234b70', '12312313', 'personel', '2021-12-21', '2021-11-29', 1, NULL, NULL, NULL),
(7, 'ogyuzsbey', 'oz3test@gmail.com', '202cb962ac59075b964b07152d234b70', '3423424', 'zort', '2021-12-07', '2021-12-09', 0, NULL, NULL, NULL),
(8, 'YETKİLİ TEST', 'test3@gmail.com', '202cb962ac59075b964b07152d234b70', '34234234234', 'YETKİLİ TEST', '2021-12-15', '2021-12-15', 0, NULL, '::1', 'c15728299f994513653203ee8ab0e09c'),
(9, '234234', 'aksoyhlc@gmail.com', '202cb962ac59075b964b07152d234b70', '2s3s', 'PERSONEL', '2021-12-09', '2021-12-11', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mail_ayar`
--

CREATE TABLE `mail_ayar` (
  `id` int(1) NOT NULL,
  `mail_sifre` varchar(250) NOT NULL,
  `mail_ad` varchar(250) NOT NULL,
  `alici` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `mail_ayar`
--

INSERT INTO `mail_ayar` (`id`, `mail_sifre`, `mail_ad`, `alici`) VALUES
(1, 'Osho2004_', 'ahmetmail540@gmail.com', 'muammermetin42@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje`
--

CREATE TABLE `proje` (
  `proje_id` int(5) NOT NULL,
  `proje_baslik` varchar(250) DEFAULT NULL,
  `proje_detay` text DEFAULT NULL,
  `proje_teslim_tarihi` varchar(100) DEFAULT NULL,
  `proje_baslama_tarihi` datetime NOT NULL DEFAULT current_timestamp(),
  `proje_durum` varchar(100) DEFAULT NULL,
  `proje_aciliyet` varchar(100) DEFAULT NULL,
  `dosya_yolu` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `proje`
--

INSERT INTO `proje` (`proje_id`, `proje_baslik`, `proje_detay`, `proje_teslim_tarihi`, `proje_baslama_tarihi`, `proje_durum`, `proje_aciliyet`, `dosya_yolu`) VALUES
(2, 'Proje-1', '<p>Proje-1</p>\r\n', '2019-04-28', '2019-04-06 13:19:39', 'Yeni Başladı', 'Acil', 'dosyalar/Proje-1142'),
(3, 'Proje-2', '<p>Proje-2</p>\r\n', '2019-04-28', '2019-04-06 13:20:01', 'Devam Ediyor', 'Acelesi Yok', 'dosyalar/Proje-2370Adsız-tasarım-(1).png'),
(4, 'Proje-3', '<p>Proje-3</p>\r\n\r\n<p><em><strong>Aksoyhlc.net</strong></em></p>\r\n', '2019-04-18', '2019-04-06 13:20:33', 'Bitti', 'Normal', 'dosyalar/Proje-3639Logo.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `sip_id` int(5) NOT NULL,
  `musteri_isim` varchar(250) DEFAULT NULL,
  `musteri_mail` varchar(250) DEFAULT NULL,
  `musteri_telefon` varchar(50) DEFAULT NULL,
  `sip_baslik` varchar(300) DEFAULT NULL,
  `sip_teslim_tarihi` varchar(100) DEFAULT NULL,
  `sip_aciliyet` varchar(100) DEFAULT NULL,
  `sip_durum` varchar(100) DEFAULT NULL,
  `sip_detay` mediumtext DEFAULT NULL,
  `sip_ucret` varchar(100) DEFAULT NULL,
  `sip_baslama_tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `dosya_yolu` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`sip_id`, `musteri_isim`, `musteri_mail`, `musteri_telefon`, `sip_baslik`, `sip_teslim_tarihi`, `sip_aciliyet`, `sip_durum`, `sip_detay`, `sip_ucret`, `sip_baslama_tarih`, `dosya_yolu`) VALUES
(15, 'TEST', 'test3@gmail.com', '324234', 'test', '2021-12-10', 'Acil', 'Bitti', '<p><strong>TEST</strong></p>\r\n', '3', '2021-12-18 17:06:12', 'dosyalar/111b9ddf7c27869efeaf0c7751b762dd913.jpg'),
(16, 'Mehmet', 'test@gmail.com', '324234', 'YENİ G&Ouml;REV', '2021-12-09', 'Normal', 'Yeni Başladı', '<p>s</p>\r\n', '3423', '2021-12-18 18:11:47', NULL),
(18, 'Mehmet', 'test3@gmail.com', '23423424', '&Ouml;NEMSİZ G&Ouml;REV', '2021-12-09', 'Acil', 'Bitti', '<p>asd</p>\r\n', '234234', '2021-12-18 18:53:19', NULL),
(20, 'zort zort', 'test3@gmail.com', '234234', 'dasdasd', '2021-12-13', 'Acelesi Yok', 'Yeni Başladı', '<p>asdad</p>\r\n', '', '2021-12-19 00:14:20', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kul_id`),
  ADD UNIQUE KEY `kul_mail` (`kul_mail`);

--
-- Tablo için indeksler `proje`
--
ALTER TABLE `proje`
  ADD PRIMARY KEY (`proje_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`sip_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kul_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `proje`
--
ALTER TABLE `proje`
  MODIFY `proje_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `sip_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
