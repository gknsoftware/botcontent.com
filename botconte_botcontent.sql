-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 May 2024, 01:54:44
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `botconte_botcontent`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `content`
--

CREATE TABLE `content` (
  `content_id` bigint(20) NOT NULL,
  `content_title` tinytext COLLATE utf8_turkish_ci NOT NULL,
  `content_entry` longtext COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `groups`
--

CREATE TABLE `groups` (
  `group_id` tinyint(2) NOT NULL,
  `group_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`) VALUES
(1, 'supervisor'),
(2, 'editor');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `member_group` tinyint(2) NOT NULL,
  `member_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `member_surname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `member_email` varchar(175) COLLATE utf8_turkish_ci NOT NULL,
  `member_password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `member_verify` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `member_pic` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `member_register_date` datetime NOT NULL,
  `premium` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `site_plan_ordered` datetime NOT NULL,
  `site_plan_purchased` datetime NOT NULL,
  `site_plan_expired` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members_site`
--

CREATE TABLE `members_site` (
  `site_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `site_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_url` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `site_script` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `site_category` varchar(30) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `members_site`
--

INSERT INTO `members_site` (`site_id`, `member_id`, `site_name`, `site_url`, `site_script`, `site_category`) VALUES
(11, 6, 'Weboti', 'http://www.weboti.com', 'WordPress', 'Oyun'),
(2, 6, 'Kilo Veriyoruz', 'http://www.kiloveriyor.us', 'WordPress', 'Video'),
(3, 6, 'Güncel İçerikler', 'http://www.guncelicerikler.com', 'WordPress', 'Dizi - Film'),
(4, 6, 'Sporcu Bilgileri', 'http://www.sporcu.info', 'Özel', 'Dizi - Film'),
(5, 6, 'Gknsoftware', 'http://www.gknsoftware.com', 'Özel', 'Blog'),
(7, 6, 'VidyoZap', 'http://www.vidyozap.com', 'WordPress', 'Vİdeo'),
(8, 7, 'Facebook', 'http://www.facebook.com', 'Özel', 'Sosyal Medya'),
(9, 7, 'Haberin İçinden', 'http://www.haber465.com', 'Özel', 'Haber');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `relationship`
--

CREATE TABLE `relationship` (
  `rel_id` bigint(20) NOT NULL,
  `content_id` bigint(20) NOT NULL,
  `site_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `repository`
--

CREATE TABLE `repository` (
  `repository_id` bigint(20) NOT NULL,
  `member_id` bigint(20) NOT NULL,
  `content_title` tinytext NOT NULL,
  `content_full` longtext NOT NULL,
  `content_tag` tinytext NOT NULL,
  `content_category` int(11) NOT NULL,
  `content_author` int(11) NOT NULL,
  `content_status` tinyint(4) NOT NULL,
  `content_timing` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sector`
--

CREATE TABLE `sector` (
  `sector_id` int(3) NOT NULL,
  `sector_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sector_desc` tinytext COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sector`
--

INSERT INTO `sector` (`sector_id`, `sector_name`, `sector_desc`) VALUES
(1, 'Arabalar ve Ulaşım', ''),
(3, 'Bilgisayar ve Uygulamalar', ''),
(4, 'Finans ve Hukuk', ''),
(5, 'Dans', ''),
(6, 'Etkinlik Düzenleme', ''),
(7, 'Giyim ve Aksesuar', ''),
(8, 'Tasarım Şirketi', ''),
(9, 'Portföy', ''),
(13, 'İş Dünyası', ''),
(11, 'Sanal Mağaza', ''),
(12, 'Kişisel', ''),
(14, 'Seyehat', ''),
(15, 'Otel', ''),
(16, 'Sanatçı', ''),
(17, 'Yazar', ''),
(18, 'El Sanatları', ''),
(19, 'Elektronik', ''),
(20, 'Kıyafet', ''),
(21, 'Saç ve Güzellik', ''),
(22, 'Stilist', ''),
(23, 'Din ve Dernekler', ''),
(24, 'Eğitim ve Topluluk', ''),
(25, 'Veteriner ve Hayvanlar', ''),
(26, 'Gayrimenkul ve Emlak', ''),
(27, 'dasdas', 'dsasd'),
(28, 'xaxzxc', 'sadasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `templates`
--

CREATE TABLE `templates` (
  `tpl_id` int(11) NOT NULL,
  `tpl_sector` int(11) NOT NULL,
  `tpl_slug` varchar(75) COLLATE utf8_turkish_ci NOT NULL,
  `tpl_name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `tpl_desc` tinytext COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` bigint(20) NOT NULL,
  `response_id` tinyint(1) NOT NULL,
  `member_id` int(11) NOT NULL,
  `department_id` tinyint(2) NOT NULL,
  `ticket_subject` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ticket_content` text COLLATE utf8_turkish_ci NOT NULL,
  `ticket_date` datetime NOT NULL,
  `ticket_priority` tinyint(1) NOT NULL,
  `ticket_status` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `response_id`, `member_id`, `department_id`, `ticket_subject`, `ticket_content`, `ticket_date`, `ticket_priority`, `ticket_status`, `read`) VALUES
(8, 0, 6, 2, 'Ödeme yaptım fakat onaylanmadı', 'Bugün 54 tl lik bir ödeme yaptım ve ödeme bildirim formunu doldurdum fakat halen onaylanmadı.', '2015-07-13 16:26:36', 1, 0, 0),
(7, 0, 6, 1, 'Websitenizde bir sorun olduğunu düşünüyorum', 'Bu destek talebidir', '2015-07-13 11:33:52', 1, 0, 0),
(13, 0, 6, 4, 'Alan adımı sizin sunucularınıza taşımak istiyorum', 'gknsoftware.com alan adımı sizin sunucunuza taşımak istiyorum bunu nasıl yapabilirim?', '2015-07-14 10:04:26', 3, 0, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticket_department`
--

CREATE TABLE `ticket_department` (
  `department_id` tinyint(2) NOT NULL,
  `department_name` varchar(40) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ticket_department`
--

INSERT INTO `ticket_department` (`department_id`, `department_name`) VALUES
(1, 'Teknik Destek'),
(2, 'Satış ve Pazarlama'),
(3, 'Ödeme Bildirimi'),
(4, 'Alan Adı (Domain)'),
(5, 'Öneri, Sorun ve Şikayet');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ticket_relationship`
--

CREATE TABLE `ticket_relationship` (
  `rel_id` bigint(20) NOT NULL,
  `ticket_id` bigint(20) NOT NULL,
  `response_id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Tablo için indeksler `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Tablo için indeksler `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Tablo için indeksler `members_site`
--
ALTER TABLE `members_site`
  ADD PRIMARY KEY (`site_id`);

--
-- Tablo için indeksler `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`repository_id`);

--
-- Tablo için indeksler `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`sector_id`);

--
-- Tablo için indeksler `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`tpl_id`);

--
-- Tablo için indeksler `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Tablo için indeksler `ticket_department`
--
ALTER TABLE `ticket_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Tablo için indeksler `ticket_relationship`
--
ALTER TABLE `ticket_relationship`
  ADD PRIMARY KEY (`rel_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `content`
--
ALTER TABLE `content`
  MODIFY `content_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `members_site`
--
ALTER TABLE `members_site`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `repository`
--
ALTER TABLE `repository`
  MODIFY `repository_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sector`
--
ALTER TABLE `sector`
  MODIFY `sector_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Tablo için AUTO_INCREMENT değeri `templates`
--
ALTER TABLE `templates`
  MODIFY `tpl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `ticket_department`
--
ALTER TABLE `ticket_department`
  MODIFY `department_id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `ticket_relationship`
--
ALTER TABLE `ticket_relationship`
  MODIFY `rel_id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
