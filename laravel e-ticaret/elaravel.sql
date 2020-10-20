-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Tem 2019, 15:19:01
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `elaravel`
--
CREATE DATABASE IF NOT EXISTS `elaravel` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `elaravel`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_06_18_213249_create_tbl_admin_table', 1),
(2, '2019_06_19_213811_create_tbl_category_table', 2),
(3, '2019_06_20_192848_create_manufacture_table', 3),
(4, '2019_06_20_202526_create_tbl_products_table', 4),
(5, '2019_06_21_172526_create_tbl_slider_table', 5),
(6, '2019_06_23_211210_create_tbl_customer_table', 6),
(7, '2019_06_24_181306_create_tbl_shopping_table', 7),
(8, '2019_06_26_212639_create_tbl_payment_table', 8),
(9, '2019_06_26_225220_create_tbl_payment_details_table', 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'ynskrc82@gmail.com', '168efc366c449fab9c2843e9b54e2a18', 'Yunus Karaca', '5073145687', NULL, NULL),
(2, 'krc_emre_46@hotmail.com', '168efc366c449fab9c2843e9b54e2a18', 'Emre Karaca', '5061703376', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Telefon', 'En kalite ve uygun fiyat', 1, '2019-07-02 12:17:38', '2019-07-02 12:17:38'),
(2, 'Bilgisayar', 'En kaliteli ve uygun fiyat', 1, '2019-07-02 12:18:10', '2019-07-02 12:18:10'),
(3, 'Beyaz Eşya', 'En kaliteli ve uygun fiyat', 1, '2019-07-02 12:18:27', '2019-07-02 12:18:27'),
(4, 'Giyim', 'En kaliteli ve uygun fiyat', 1, '2019-07-02 12:18:46', '2019-07-02 12:18:46'),
(5, 'Mühendislik', 'En kaliteli ve uygun fiyat', 1, '2019-07-02 12:19:24', '2019-07-02 12:19:24'),
(6, 'Lojistik', 'En kaliteli ve uygun fiyat', 1, '2019-07-02 12:20:01', '2019-07-02 12:20:01'),
(7, 'Kırtasiye', 'En kaliteli ve uygun fiyat', 1, '2019-07-02 12:20:29', '2019-07-02 12:20:29'),
(8, 'Cilt Bakım', 'En kaliteli ve uygun fiyat', 1, '2019-07-02 12:21:01', '2019-07-02 12:21:01'),
(9, 'Kuru Gıda', 'En kaliteli ve uygun fiyat', 1, '2019-07-02 12:21:13', '2019-07-02 12:21:13'),
(10, 'İçeçekler', 'En kaliteli ve uygun fiyat', 1, '2019-07-02 12:21:25', '2019-07-02 12:21:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_mobile`, `created_at`, `updated_at`) VALUES
(1, 'Emre Karaca', 'krc_emre_46@hotmail.com', '8282', '5061703376', '2019-07-02 13:09:22', '2019-07-02 13:09:22');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_manufacture`
--

DROP TABLE IF EXISTS `tbl_manufacture`;
CREATE TABLE IF NOT EXISTS `tbl_manufacture` (
  `manufacture_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `manufacture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`manufacture_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tbl_manufacture`
--

INSERT INTO `tbl_manufacture` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Huawei', 'Çin markalı ürün', 1, '2019-07-02 12:23:05', '2019-07-02 12:23:05'),
(2, 'Apple', 'Amerikalı telefon firması', 1, '2019-07-02 12:23:50', '2019-07-02 12:23:50'),
(3, 'Acer', 'Kore firmalı ürün', 1, '2019-07-02 12:24:26', '2019-07-02 12:24:26'),
(4, 'LcWakik', 'Giyim markası', 1, '2019-07-02 12:24:44', '2019-07-02 12:24:44'),
(5, 'Hatemoglu', 'Türk giyim firması', 1, '2019-07-02 12:25:16', '2019-07-02 12:25:16'),
(6, 'Dogalgaz', 'çok degerli', 1, '2019-07-02 12:25:48', '2019-07-02 12:25:48'),
(7, 'Nohut', 'çok para etmiyor adam intahar etmiş', 1, '2019-07-02 12:26:44', '2019-07-02 12:26:44'),
(8, 'Pirinç', 'Sulu tarım', 1, '2019-07-02 12:27:04', '2019-07-02 12:27:04'),
(9, 'Pastel Boya', 'güzel ürün', 1, '2019-07-02 12:28:03', '2019-07-02 12:28:03'),
(10, 'Cilit bakım ürünleri', 'bakım lazım', 1, '2019-07-02 12:28:28', '2019-07-02 12:28:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_payment`
--

DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_customer_id` int(11) NOT NULL,
  `payment_shopping_id` int(11) NOT NULL,
  `payment_details_id` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_payment_details`
--

DROP TABLE IF EXISTS `tbl_payment_details`;
CREATE TABLE IF NOT EXISTS `tbl_payment_details` (
  `payment_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `payment_details_product_id` int(11) NOT NULL,
  `payment_details_product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_details_product_quantity` int(11) NOT NULL,
  `payment_details_product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `product_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `category_id`, `manufacture_id`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'İphone 8 Plus', 1, 2, 'Aplle markalı iphone güzel marka', 'iphone 8 plus güzel cihaz', 8500.00, 'public/upload/product//XSOQaZ9Xbfj0JujBabmihBWRE0mHggQFmBeBCGuY.png', '6.5 in', 'White', 1, '2019-07-02 09:32:15', '2019-07-02 09:32:15'),
(2, 'Huawei Y6', 1, 1, 'Çin piyasanın güzel ürün', '6.15 inç ekran büyüklüğüne ve Full HD+ çözünürlüğe sahip olan Huawei P30 Lite, Kirin 710 işlemcisinden gücünü alıyor. P30 serisinin düşük seviye telefonu olmasına rağmen oldukça iyi özellikler barındıran telefonda, 4 GB RAM ve 128 GB depolama alanı bulunuyor.', 2470.00, 'public/upload/product//k7NKTGTi9oNw3g67gTjemXxfTdkjmcF6ARg741U5.png', '4.7 in', 'Blue', 1, '2019-07-02 09:34:34', '2019-07-02 09:34:34'),
(3, 'Acer E15', 2, 3, 'Kore Piyasını güzide cihazı', 'İşlemci: Intel® Core ™ i5-8250U processor (up to 3.40 GHz with Intel Turbo Boost Technology 2.0 , 6 MB of Intel® Smart Cache) \r\nEkran kartı: Nvidia MX150 \r\nSabit disk kapasitesi: 1000 GB \r\nEkran Boyutu: - / 15.6 inç Çözünürlük: 1366 x 768 Pixel Ekran Boyutu (inç): 15.6 inç Görüntü Oranı: 16:09', 4999.00, 'public/upload/product//WyiiRyRiwtXaT870v2jj0TdQzfoXvRqDV2lWa5Xa.jpeg', '15.6 inç', 'Black', 1, '2019-07-02 09:37:27', '2019-07-02 09:37:27'),
(4, 'Erkek Gömlek', 4, 5, 'Erkek Gömlek', 'Çizgili Kısa Kol Slim Fit Gömlek', 59.00, 'public/upload/product//Cf4n0kCznsLiWojBUNwKn5Gm2ycGT2mY1uKmdSUF.jpeg', 'Small', 'Lacivert', 1, '2019-07-02 09:39:17', '2019-07-02 09:39:17'),
(5, 'Bayan Etek', 4, 4, 'Bayan kısa etek', 'Göğüs: 84 cm Bel: 62 cm Basen: 89 cm Boy: 177 cm \r\nManken M beden ürün giyiyor.', 89.00, 'public/upload/product//dZrvfWyF4sy2vbkuGApUPUEbdsKFzW4z9TW5glAS.jpeg', 'long dar kesim', 'Turkaza', 1, '2019-07-02 09:42:40', '2019-07-02 09:42:40'),
(6, 'Buderus kombi', 5, 6, 'Dogalgaz tesısat hizmetlerimiz', 'dogalgaz sıhhı tesısat  ,proje çizim', 5799.00, 'public/upload/product//rNYBgv4BfEiNRJIYp2I9SlXqRWrb6a3zXJzYh49s.jpeg', 'Yok', 'White', 1, '2019-07-02 09:45:22', '2019-07-02 09:45:22'),
(7, 'Faber-Castel', 7, 9, 'Pastel boya', 'Çanta aşağıdaki ürünlerden oluşmaktaıdır.\r\nBoya kalemi 12 renk \r\nSuluboya 8 renk \r\nPastel boya 8 renk \r\nKeçeli kalem 6 renk \r\nCandy silgi', 39.00, 'public/upload/product//IXZMcTlnOyv8hTXEbDcLoZUhDXoj3KkfIHjmlw48.jpeg', 'orta boy', 'orange', 1, '2019-07-02 09:47:53', '2019-07-02 09:47:53'),
(8, 'Reis', 9, 8, 'reis 5kg pirinç', '\"Reis Gönen Baldo Pirinç 2,5 kg\r\nİri ve tombul taneleri ile en çok tercih edilen pirinç türlerinden biri olan Reis Gönen Baldo Pirinç, CarrefourSA pirinç reyonunda sizleri bekliyor.\r\n\r\nİtalyan kökenli bir pirinç olan ve Balıkesir’in Gönen ilçesinde üretilen ürün, kalitesi ve lezzeti ile öne çıkar. Uzun ve iri taneleri ile parlak beyaz renge sahip olduğu için yemeklere lezzet ve hoş bir görünüm katar. Özellikle su çekme kapasitesi yüksek olduğu için taneleri tombullaşır ve pilav yapımı için ideal bir kullanım sunar. Farklı yemek tariflerinde Jasmine pirinci yerine kullanılır ve dolmalarda veya etli sulu yemeklere katılır. Haşlayarak salata tariflerine ekleyebilir, pirinç topları hazırlayarak sofralarınıza hafif ve sağlıklı sunumlar katabilirsiniz.\r\n\r\nYemeklerde kullanılmadan önce suda bekletilmesi tavsiye edilen ürün, aynı zamanda nişasta ve mineraller açısında da zengin bir besin olduğu için günlük enerji ihtiyacınızı karşılamaya yardımcı olur. 2, 5 kiloluk paketler halinde satılan ve uzun dönem kullanım için ideal olan ürünü evde kolayca muhafaza edebilirsiniz. Çok yönlü kullanımı ile Türk yemeklerinin vazgeçilmezi olan baldo pirinci hemen sepetinize ekleyerek satın alabilirsiniz.', 38.90, 'public/upload/product//NIVU9kDoQqPE2iFDgGHCvM8A1WlcDCV8smMyinZt.jpeg', '5kg', 'wihte', 1, '2019-07-02 09:50:43', '2019-07-02 09:50:43'),
(9, 'Nohut', 9, 7, 'reis nohut', '\"Nohut 8 mm\"', 6.95, 'public/upload/product//sveKp0kzkz0mjt2kOrk1YrjUzIgNCKzCm3cTTTiI.png', '1 kg', 'White', 1, '2019-07-02 09:53:08', '2019-07-02 09:53:08'),
(10, 'Garnier Saf & Temiz 3\'ü 1', 8, 10, 'Garnier Saf & Temiz 3\'ü 1', 'Garnier Saf & Temiz 3\'ü 1 Arada Yağlanma ve Pürüzlere Karşı Temiz', 12.99, 'public/upload/product//QRAmlQ3WHnihFRgADRvxYBkj5ohDs6zyWca23Xgv.jpeg', 'kısa boy', 'blues', 1, '2019-07-02 09:54:53', '2019-07-02 09:54:53'),
(11, 'Sinoz Yüz Bakım Maskesi', 8, 10, 'Sinoz Yüz Bakım Maskesi', 'Sinoz Yüz Bakım Maskesi', 69.99, 'public/upload/product//IMs4lCN5aP8yVWqryfyM0S0s2CS6tF9L7xApys8B.jpeg', 'büyük boy', 'dark', 1, '2019-07-02 09:56:15', '2019-07-02 09:56:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_shopping`
--

DROP TABLE IF EXISTS `tbl_shopping`;
CREATE TABLE IF NOT EXISTS `tbl_shopping` (
  `shopping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shopping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopping_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopping_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopping_adres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopping_mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopping_ctiy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`shopping_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'public/upload/slider//bJcW8pmRVNrQBt8BmkmsKcEs6riKLZ2JSCxX997G.jpeg', 1, '2019-07-02 09:56:58', '2019-07-02 09:56:58'),
(2, 'public/upload/slider//7lbf5moYh0GNcV1oFIr0zonfKYhVJr2VvTY8Vhew.jpeg', 1, '2019-07-02 09:57:07', '2019-07-02 09:57:07'),
(3, 'public/upload/slider//YaSbIPnbLx71C5YrD92r3X1LTZ0a8LrQcbceJDoH.jpeg', 1, '2019-07-02 09:57:16', '2019-07-02 09:57:16'),
(4, 'public/upload/slider//aNcOcKOue9bN1SdydZwuM48lvM9nrw7hG2HRWgmk.jpeg', 1, '2019-07-02 09:57:24', '2019-07-02 09:57:24'),
(5, 'public/upload/slider//H4IdJYdm36UbG9sI15ePRb01ZIOMjpFSCJWW8rYC.jpeg', 1, '2019-07-02 09:57:32', '2019-07-02 09:57:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
