-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2015 at 05:10 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12
--
-- PopojiCMS.v.1.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `popojicms`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `seotitle` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `active` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `title`, `seotitle`, `active`) VALUES
(1, 'Retro', 'retro', 'Y'),
(2, 'Vintage', 'vintage', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `seotitle` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `active` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `title`, `seotitle`, `active`) VALUES
(1, 'Indonesiaku', 'indonesiaku', 'Y'),
(2, 'Motivasi', 'motivasi', 'Y'),
(3, 'Hubungan', 'hubungan', 'Y'),
(4, 'Sukses', 'sukses', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(10) NOT NULL AUTO_INCREMENT,
  `id_post` int(10) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `comment` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `active` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `status` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_post`, `name`, `email`, `url`, `comment`, `date`, `time`, `active`, `status`) VALUES
(1, 2, 'Dwira Survivor', 'info@popojicms.org', 'www.popojicms.org', 'Manado memang terkenal dengan tempat wisata bernuansa pantai yang jernih dan enak dipandang.', '2015-01-28', '02:31:00', 'Y', 'Y'),
(2, 5, 'Chingsy Maharani', 'info@popojicms.org', 'www.popojicms.org', 'Artikelnya benar sekali, perlakukan wanita sebaik mungkin agar merasa terus dicintai dan lihat apa yang akan kamu dapatkan sebagai balasannya.', '2015-01-30', '05:29:00', 'Y', 'Y'),
(3, 6, 'Jenuar Dalapang', 'info@popojicms.org', 'www.popojicms.org', 'Bagi yang jomblo tetap semangat yaa. Mungkin jodohnya lagi ngumpet, terus mencari tapi jangan jadi jones yaa.', '2015-02-01', '12:01:00', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

DROP TABLE IF EXISTS `component`;
CREATE TABLE IF NOT EXISTS `component` (
  `id_component` int(10) NOT NULL AUTO_INCREMENT,
  `component` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  `table_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_component`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`id_component`, `component`, `date`, `table_name`) VALUES
(1, 'po-contact', '2014-08-11', 'contact'),
(2, 'po-gallery', '2014-08-11', 'gallery'),
(3, 'po-comment', '2014-08-11', 'comment');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(10) NOT NULL AUTO_INCREMENT,
  `name_contact` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email_contact` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `subjek_contact` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `message_contact` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(10) NOT NULL AUTO_INCREMENT,
  `id_album` int(10) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `picture` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_album`, `title`, `picture`) VALUES
(1, 1, 'Glasses On Macbook', 'glasses-on-macbook.jpg'),
(2, 1, 'Perfect Day With You', 'perfect-day-with-you.jpg'),
(3, 1, 'Two Dog at Stone Sea', 'two-dog-at-stone-sea.jpg'),
(4, 2, 'Morning with Coffee', 'morning-with-coffee.jpg'),
(5, 2, 'Golden Gate San Francisco', 'golden-gate-san-francisco.jpg'),
(6, 2, 'House with Window Vintage', 'house-with-window-vintage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(10) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `file_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `file_size` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_media`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `class` varchar(255) NOT NULL DEFAULT '',
  `position` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `group_id` tinyint(3) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `title`, `url`, `class`, `position`, `group_id`) VALUES
(1, 0, 'Beranda', './', '', 1, 1),
(2, 0, 'Tentang Kami', 'pages/tentang-kami', 'dropdown', 2, 1),
(3, 0, 'Indonesiaku', 'category/indonesiaku', '', 3, 1),
(4, 2, 'Layanan', 'pages/layanan', '', 1, 1),
(5, 0, 'Motivasi', 'category/motivasi', '', 4, 1),
(6, 0, 'Hubungan', 'category/hubungan', '', 5, 1),
(7, 0, 'Sukses', 'category/sukses', '', 6, 1),
(8, 0, 'Galeri', 'gallery', '', 7, 1),
(9, 0, 'Kontak', 'contact', '', 8, 1),
(10, 0, 'Home', './', '', 1, 2),
(11, 0, 'About', 'pages/tentang-kami', '', 2, 2),
(12, 0, 'Services', 'pages/layanan', '', 3, 2),
(13, 0, 'Blog', '#', 'dropdown', 4, 2),
(14, 13, 'Indonesiaku', 'category/indonesiaku', '', 1, 2),
(15, 13, 'Motivasi', 'category/motivasi', '', 2, 2),
(16, 13, 'Hubungan', 'category/hubungan', '', 3, 2),
(17, 13, 'Sukses', 'category/sukses', '', 4, 2),
(18, 0, 'Contact', 'contact', '', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu_group`
--

DROP TABLE IF EXISTS `menu_group`;
CREATE TABLE IF NOT EXISTS `menu_group` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `menu_group`
--

INSERT INTO `menu_group` (`id`, `title`) VALUES
(1, 'Main Menu Chingsy'),
(2, 'Main Menu Neon');

-- --------------------------------------------------------

--
-- Table structure for table `oauth`
--

DROP TABLE IF EXISTS `oauth`;
CREATE TABLE IF NOT EXISTS `oauth` (
  `id_oauth` int(10) NOT NULL AUTO_INCREMENT,
  `oauth_type` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `oauth_key` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `oauth_secret` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `oauth_id` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `oauth_user` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `oauth_token1` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `oauth_token2` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `oauth_fbtype` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_oauth`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `oauth`
--

INSERT INTO `oauth` (`id_oauth`, `oauth_type`, `oauth_key`, `oauth_secret`, `oauth_id`, `oauth_user`, `oauth_token1`, `oauth_token2`, `oauth_fbtype`) VALUES
(1, 'facebook', '', '', '', '', '', '', ''),
(2, 'twitter', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id_pages` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `seotitle` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `picture` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `active` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_pages`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id_pages`, `title`, `content`, `seotitle`, `picture`, `active`) VALUES
(1, 'Tentang Kami', '&lt;p&gt;PopojiCMS adalah Content Management System yang dibuat dengan konsep yang sangat menarik dan mudah untuk digunakan. PopojiCMS dibuat dengan tampilan responsive menggunakan bootstarp, selain itu juga dilengkapi dengan banyak plugin jQuery, sehingga akan terasa seperti menggunakan aplikasi desktop.&lt;br /&gt;&lt;br /&gt;PopojiCMS hanya menggunakan sebagian OOP PHP saja yaitu untuk pemprosesan data ke database. Ini bertujuan agar web developer pemula dapat dengan leluasa berkreasi mengembangkan website. Semoga PopojiCMS dapat menjawab semua kebutuhan Anda tentang web.&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;Terima kasih,&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;Jenuar Dwi Putra Dalapang a.k.a Dwira Survivor&lt;/strong&gt;&lt;/p&gt;', 'tentang-kami', 'popojicms-logo.jpg', 'Y'),
(2, 'Layanan', '&lt;p&gt;PopojiCMS telah diuji coba dan diterapkan dibeberapa website besar, itu memastikan kehandalannya tidak bisa diragukan lagi. Dengan fitur yang banyak, dukungan komunitas yang luas dan tentunya keamanan web yang handal siap Anda dapatkan.&lt;br /&gt;&lt;br /&gt;Dengan dilengkapi oleh jQuery dan bootstrap, PopojiCMS tampil lebih hidup menghadirkan fitur yang tidak terbayangkan sebelumnya.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;PopojiCMS dibuat dengan tampilan responsive sehingga bisa dibuka pada ukuran layar manapun dan kapanpun.&lt;/li&gt;\r\n&lt;li&gt;PopojiCMS didesain dengan tampilan modern yang cantik sehingga menarik pengguna web untuk selalu berkunjung.&lt;/li&gt;\r\n&lt;li&gt;PopojiCMS dibuat dengan konsep setengah OOP sehingga orang awampun bisa mengcustom dengan mudah rasa webnya.&lt;/li&gt;\r\n&lt;/ul&gt;', 'layanan', 'popojicms-logo.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(10) NOT NULL AUTO_INCREMENT,
  `id_category` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `seotitle` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tag` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `editor` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `active` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `headline` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `picture` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `id_category`, `title`, `content`, `seotitle`, `tag`, `date`, `time`, `editor`, `active`, `headline`, `picture`, `hits`) VALUES
(1, '1', 'Yuk, Berwisata ke Lombok', '&lt;p&gt;Lombok adalah destinasi wisata yang tengah hype di kalangan wisatawan, baik dari dalam negeri maupun luar negeri. Ada apa saja di Lombok? Yuk simak informasinya berikut ini.&lt;br /&gt;&lt;br /&gt;Dimulai dari wilayah Lombok Barat, di kawasan ini ladies bisa mengunjungi pura-pura tempat ibadah para penduduk Lombok yang beragama Hindu. Ada pura Lingsar, Pura Narmada, dan Pura Suranadi. Ketiga pura tersebut memiliki ciri khasnya masing-masing yang sayang untuk dilewatkan.&lt;br /&gt;&lt;br /&gt;Berpindah ke Lombok bagian timur, di wilayah ini ladies bisa menemukan banyak pusat kerajinan tembikar khas Lombok. Anda bisa membeli oleh-oleh tembikar dnegan harga miring di daerah ini.&lt;br /&gt;&lt;br /&gt;Selanjutnya, kawasan Lombok Tengah. Beberapa destinasi wisata di Lombok Tengah adalah: Pringgasela (sebuah desa yang terkenal dengan tenun ikatnya), Benang Stokel dan Benang Kelambu (air terjun dan kawasan trekking), dan Kelambu (air terjun dengan jetinggian lebih dari 40 meter).&lt;br /&gt;&lt;br /&gt;Sedangkan di selatan Lombok, destinasi wisata yang wajib dikunjungi adalah Sukarara, yaitu desa penghasil tenun ikat. Selain itu, ada pula desa Rembitan dan Sade 2 yang merupakan desa tradisional suku Sasak. Tak ketinggalan pula Kuta, yaitu kawasan wisata yang terkenal dengan pantai dan surfingnya.&lt;br /&gt;&lt;br /&gt;Yang terakhir di Lombok bagian utara, ada pantai Sira dan air terjun Sendang Gile yang tidak boleh anda lewatkan.&lt;/p&gt;', 'yuk-berwisata-ke-lombok', 'visit-indonesia,pergi-ke-lombok,berwisata-ke-lombok,lombok', '2015-01-18', '09:19:45', '1', 'Y', 'Y', 'yuk-ke-lombok.jpg', 0),
(2, '1', '13 Nirwana Tersembunyi Di Manado dan Sekitarnya yang Gak Kalah Keren dari Bunaken', '&lt;p&gt;Sulawesi Utara boleh jadi destinasi traveling yang masih asing di telingamu. Tapi kalau menyebut Bunaken, sebagian besar orang pasti tahu kalau tempat itu adalah salah satu dive spot paling cantik di dunia. Nah, sayangnya keelokan Bunaken sering membuat orang-orang lupa pada berbagai destinasi menarik yang juga layak dikunjungi di Manado dan sekitarnya.&lt;br /&gt;&lt;br /&gt;Oke, kali ini popojicms akan melewatkan Bunaken dan mulai menjamahi destinasi-destinasi wisata tersembunyi yang gak kalah keren dari Bunaken. Mana aja? Yuk, kita simak sama-sama.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;1. Bertetangga dengan Bunaken, ada Pulau Siladen di mana kamu bisa menonton kawanan lumba-lumba.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Salah satu pulau yang membentuk Taman Nasional Bunaken-Manado adalah Pulau Siladen. Pulau imut yang luasnya hanya sekitar 31 ha ini punya potensi wisata yang gak kalah dengan Pulau Bunaken, lho. Siap-siap aja terkagum-kagum dengan kehidupan bawah lautnya yang menakjubkan.&lt;br /&gt;&lt;br /&gt;Yang menarik, kamu bisa menyapa kawanan lumba-lumba yang seringkali tampak penasaran dan berenang mendekati kapal-kapal wisatawan yang lewat. Siapa tahu kamu beruntung bisa melihat lumba-lumba yang hidup bebas dari jarak dekat&amp;mdash;bukan hanya mereka yang terkurung dinding kaca di taman hiburan.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;2. Di Pulau Manado Tua, kamu bisa merasakan keberadaan gunung api bawah lautnya.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Sesosok bukit menjulang gagah sekitar 10 mil dari bibir pantai Manado. Itulah Pulau Manado Tua, satu lagi pulau yang membentuk gugusan di TN Bunaken-Manado. Tapi, kalau kamu mengira bukit yang menjulang 655 m di atas permukaan laut itu adalah gunung api, kamu keliru. Gunung apinya justru ada di bawah laut. Dengan kedalaman kurang lebih 50 m, terdapat kubah lava yang mengeluarkan gelembung udara serta karang lava yang kadang dikelilingi hiu.&lt;br /&gt;&lt;br /&gt;Pulau Manado Tua sendiri juga menarik untuk dijelajahi. Selain pantai, kamu juga bisa menjelajahi hutan lindung, makan raja-raja, serta naik ke puncak bukitnya untuk melihat panorama langit dan laut yang dipisahkan cakrawala.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;3. Ingin menyusuri sungai sambil memompa adrenalin? Rafting aja di Sawangan, Minahasa.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Buat yang menggemari kegiatan arung jeram, kamu wajib datang ke Desa Sawangan, Kecamatan Airmadidi, Minahasa. Di sini, ada tiga rute arung jeram yang bisa kamu lalui, dengan waktu tempuh 20 menit, 1 jam, serta tiga jam. Kamu akan diajak menyusuri sungai dengan tingkat kesulitan grade III yang memiliki jeram-jeram menantang sekaligus menikmati keindahan kaki Gunung Klebet.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;4. Masih di Sawangan, sempatkan juga untuk mengunjungi waruga-nya.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Waruga adalah makam leluhur masyarakat Minahasa yang terbuat dari batu. Sebenarnya, kamu bisa menemukan kompleks waruda di berbagai tempat di Minahasa, tapi yang paling direkomendasikan adalah di Sawangan. Berbeda dengan kubur batu daerah lain yang bentuknya memanjang serupa peti mati, waruga berbentuk kubus dengan tutup seperti bumbungan rumah. Jenazah dalam waruga diletakkan meringkuk seperti janin dalam kandungan.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;5. Kamu yang berkacamata, coba aja mirip-miripan sama tarsius di TN Bogani Nani Wartabone.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Kawasan Taman Nasional Bogani Nani Wartabone menjadi salah satu tempat yang layak kamu jamahi saat mengunjungi Sulawesi Utara. Tempat ini menyajikan keunikan ekologi sebagai kawasan peralihan geografi daerah Indomalayan di sebelah Barat dan Papua-Australia di sebelah Timur.&lt;br /&gt;&lt;br /&gt;Berbagai satwa eksotis menghuni kawasan ini. Salah satunya adalah tarsius, primata terkecil di dunia yang panjangnya hanya 15 cm. Dengan ukuran matanya yang besar, makhluk ini jadi kayak lagi pakai kacamata. Selain tarsius, ada juga burung maleo yang menjadi maskot taman nasional ini, kelelawar Bone, dan rangkong.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;6. Selain itu, Sulawesi Utara juga memiliki Cagar Alam Tangkoko yang gak kalah memikat.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Sama halnya dengan Taman Nasional Bogani Nani Wartabone yang disebutkan di poin sebelumnya, Cagar Alam Tangkoko juga menawarkan panorama yang gak kalah memikat. Kawasan ini terletak di wilayah Bitung, tepatnya di kaki Gunung Dua Saudara. Kamu bisa melakukan trekking menjelajahi hutan belantara sembari menikmati pemandangan bukit dan lembah yang luar biasa.&lt;br /&gt;&lt;br /&gt;Di kawasan ini, kamu juga bisa menemukan tarsius, mengamati kawanan burung endemik Sulawesi serta satwa lainnya. Ada pula Gunung Tangkoko yang tingginya 1.109 mdpl, menyajikan pemandangan Pelabuhan Bitung dan Laut Maluku di puncaknya. Gak cuma hutan dan gunung, Tangkoko juga punya pantai indah yang gak boleh kamu lewatkan.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;7. Nikmati juga pesona pantai dan laut yang memukau di Pulau Lembeh.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Pulau Lembeh yang berada di sebelah timur kota Bitung bisa kamu capai dengan menyewa perahu. Kamu akan diajak muter-muter mengitari pulau dan mampir ke beberapa spot untuk snorkeling, mancing, juga berfoto narsis di pantai berpasir putih yang sepi&amp;mdash;berasa pantai milik sendiri pokoknya. Pastinya, panorama bawah laut Pulau Lembeh gak kalah keren deh dari Bunaken, cocok banget buat kamu yang pengen snorkeling dan menyelam.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;8. Masih di Pulau Lembeh, kamu bisa bercengkerama dengan suku Sangir di Pintu Kota Kecil.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Di Kecamatan Lembeh Utara, ada sebuah kampung bernama Pintu Kota Kecil. Warga kampung ini seluruhnya adalah suku Sangir yang akan menyambutmu dengan keramahan mereka. Sebagian besar penduduk kampung ini menggantungkan hidupnya dari mencari ikan di laut. Ingin mengenal lebih jauh penduduk kampung ini? Kamu bisa menginap di rumah warga dan bercengkerama dengan kebudayaan mereka. Sebagai bonus, kamu akan disuguhi pemandangan alam yang luar biasa.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;9. Warga Sulawesi Utara menjunjung tinggi kerukunan antarumat beragama. Temukan saja buktinya di Bukit Kasih.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Di Desa Kanonang, Kabupaten Minahasa, ada tempat bernama Bukit Kasih. Eit, ini bukanlah tempat untuk memadu kasih alias pacaran, melainkan simbol keharmonisan umat beragama di Sulawesi Utara. Tempat ini dibangun pada tahun 2002 sebagai pusat spiritual untuk berkumpulnya umat dari berbagai agama.&lt;br /&gt;&lt;br /&gt;Di sini, terdapat tugu dengan segi lima serta lima rumah ibadah, yaitu sebuah gereja Katolik, gereja Kristen, Masjid, Kuil Buddha, dan candi Hindu. Kamu juga bisa menemukan salib setinggi 53 meter. Salib ini bahkan bisa terlihat dari pantai Bolevard di Manado. Kamu bisa sampai di tempat ini dengan menempuh sekitar 50 km atau 90 menit dari kota Manado.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;10. Selain Bukit Kasih, kunjungi juga Bukit Doa di Tomohon.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Kota Tomohon yang letaknya sekitar 30 menit dari Manado, dijuluki Kota Seribu Bunga karena tanahnya sangat cocok untuk membudidayakan aneka jenis bunga. Kawasannya berada di dataran tinggi, mirip seperti kawasan Puncak di Bogor atau Kaliurang di Yogyakarta. Di kota ini, sering diadakan festival bunga hias, baik lokal maupun internasional.&lt;br /&gt;&lt;br /&gt;Nah, kamu bisa mampir ke Bukit Doa. Pemandangan alamnya yang hijau dan asri akan memanjakan mata kamu. Tempat ini juga sering dijadikan lokasi foto prewedding, lho. Makanya, kamu yang hobi fotografi gak boleh melewatkan tempat ini.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;11. Tak jauh dari Bukit Doa, ada Danau Linow yang permukaannya bisa berubah warna.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Tertarik dengan panorama danau? Ada danau indah yang bisa kamu tempuh selama 50 menit dari kota Manado. Namanya Danau Linow. Danau ini terletak di Kelurahan Lahendong, Kecamatan Tomohon Selatan, sekitar 3 km ke arah barat dari pusat kota Tomohon.&lt;br /&gt;&lt;br /&gt;Yang unik, danau ini bisa berubah warna jika dilihat dari ketinggian, dari biru, hijau, ke kuning kecoklatan. Ini terjadi karena kandungan belerang di dalam danau. Selain menikmati eksotisnya panorama danau, kamu juga bisa nyebur ke pemandian air panas yang erada di sekitar danau.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;12. Jangan lewatkan pengalaman muncak ke Gunung Tumpa untuk menjamahi keindahan panoramanya.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Jika kamu ingin menikmati indahnya panorama Teluk Manado dan Pulau Bunaken di kejauhan, Gunung Tumpa bisa menjadi spot yang sempurna. Gunung Tumpa adalah gunung yang paling dekat dengan kota Manado. Meski tingginya hanya sekitar 500 mdpl, bentuknya yang kerucut menciptakan medan yang menanjak dari kaki sampai puncaknya&amp;mdash;nyaris gak ada area datar untuk beristirahat.&lt;br /&gt;&lt;br /&gt;Untuk sampai ke puncaknya, kamu mesti menerobos medan yang masih berupa semak belukar dengan kemiringan 30&amp;ndash;40 derajat. Tapi, kerja kerasmu akan terbayar begitu sampai di puncaknya. Pemandangan indah Teluk Manado dan Pulau Bunaken di kejauhan menanti untuk memanjakan matamu.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;13. Kelar menjelajah eksotisme Sulawesi Utara, tutup perjalananmu dengan bersantai di kawasan Boulevard, Manado.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Kawasan Boulevard yang menghadap laut adalah salah satu landmark kebanggaan kota Manado. Dulunya, daerah ini merupakan tempat berjualan pedagang kaki lima, tapi kini sudah dimodernisasi dengan mal dan pusat perbelanjaan. Pada sore hari, kawasan ini cocok banget untuk melihat matahari terbenam.&lt;br /&gt;&lt;br /&gt;Kamu bakal bingung mau makan apa karena sejumlah kafe dan warung tenda berderet menjajakan menu masakan khas Manado yang menggiurkan, mulai dari yang halal sampai yang haram. Cobalah menu ikan woku, ikan kembung yang diolah dengna bumbu woku berwarna kekuningan. Buat penggemar babi, jangan ragu untuk mencoba ragey, sate babi yang disajikan dengan sambal dabu-dabu iris yang khas.&lt;br /&gt;&lt;br /&gt;Sebenarnya, masih banyak lagi potensi wisata di Sulawesi Utara yang belum disebutkan di sini. Sulawesi Utara memang kaya, wajib dijelajahi sesekali oleh pecinta jalan-jalan seperti kamu. Nah, apakah kamu punya rekomendasi tempat wisata menarik lainnya di Sulut? Bagiin aja ke pembaca lewat komentar, ya.&lt;/p&gt;', '13-nirwana-tersembunyi-di-manado-dan-sekitarnya-yang-gak-kalah-keren-dari-bunaken', 'nirwana-di-manado,visit-manado,manado,bunaken,visit-indonesia', '2015-01-19', '10:07:15', '1', 'Y', 'N', '13-nirwana-manado.jpg', 0),
(3, '2', 'Alasan-Alasan Mengapa Menangis Adalah Hal yang Baik Untukmu', '&lt;p&gt;Mengalirkan air mata sering dianggap sama dengan menunjukkan kelemahan, atau malah mempertontonkan aib di depan orang lain. Orang yang menangis pun kerap kita anggap sebagai orang yang cengeng, lemah dan penakut. Padahal guys, ternyata menangis itu punya berdampak baik bagi kesehatan, perasaan, serta kehidupanmu, lho! Penasaran apa saja manfaatnya? Lihat satu per satu yuk..&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;1. Air Mata Sebenarnya Akan Membantu Indera Penglihatanmu. Kamu Pun Akan Bisa Melihat dengan Lebih Jernih.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Kamu patut bersyukur masih bisa mengeluarkan air matamu, karena air mata itu yang membuatmu bisa melihat. Beberapa fungsi air mata adalah melumasi mata kita, serta mencegahnya agar tidak kering.&lt;br /&gt;&lt;br /&gt;Ingin tahu sakitnya jika tak ada air mata di matamu? Cobalah untuk tak berkedip selama satu menit, dan katakan terus terang bagaimana rasanya. Mata yang kering itu memang tidak nyaman dan terasa pedih. Jika berkepanjangan, bahkan matamu bisa mengalami kebutaan lho!&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;2. Air Mata Sebenarnya Adalah Senjata. Senjata Perangmu Melawan Bakteri-Bakteri dalam Mata.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Sudah tahukah kamu bahwa ternyata air mata itu mengandung lysozyme, zat anti bakteri yang mampu membunuh 90 hingga 95 persen bakteri di mata hanya dalam waktu 10 menit. Jika air mata kita tidak punya lysozyme, mungkin dengan bakteri yang selama ini ada di sekitar kita kamu bisa sakit flu dan sakit perut selama 3 bulan dan nggak sembuh-sembuh lho!&lt;br /&gt;&lt;br /&gt;Hmmm, ternyata air mata kita itu keren banget ya ?!&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;3. Menangis Akan Mengeluarkan Racun Dalam Tubuhmu. Dengan Ini, Untuk Detoksifikasi Kamu Tak Perlu ke Salon Lagi&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Penelitian selama bertahun-tahun yang dilakukan oleh seorang ahli biokimia, William Frey, mengungkapkan bahwa ternyata air mata yang kita keluarkan saat kita merasa emosional seperti sedih atau stres ternyata berbeda dengan air mata yang kita titikkan saat terkena iritasi mata ringan.&lt;br /&gt;&lt;br /&gt;Bedanya? Ternyata air mata yang kita keluarkan saat sedang emosional itu mengandung racun yang tidak ditemukan pada air mata saat kita mengalami iritasi mata ringan. Ini bukan berarti air mata kita beracun lho ya?! Justru ini membuktikan bahwa air mata mampu membantu proses detoksifikasi tubuh.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;4. Dengan Menangis, Mood-mu yang Awalnya Buruk Akan Bisa Diperbaiki&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Kamu tahu nggak kalau ternyata tubuhmu itu mengandung unsur Mangan?&lt;br /&gt;&lt;br /&gt;Itu lho, unsur kimia dengan nomer 25 yang dalam kadar berlebihan ternyata berpengaruh buruk untuk tubuhmu. Pengaruh buruk ini antara lain adalah membuatmu merasa gelisah, sensitif dan gampang marah, cepat lelah dan banyak gangguan emosi lainnya. Jadi kalau kamu sedang bad-mood hari ini, bisa jadi level Mangan di tubuhmu sedang berlebihan!&lt;br /&gt;&lt;br /&gt;Terus apa hubungannya kadar Mangan tubuh dengan menangis? Nah, menangis itu adalah cara yang paling ampuh untuk menurunkan kadar Mangan yang ada di tubuhmu. Prosesnya ya dengan detoksifikasi yang telah dijabarkan di atas.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;5. Menangis Akan Membuatmu Lebih Tenang. Kamu Pun Bisa Membuat Rencana Ulang dan Melakukan Tugas dari Awal Karena Sudah Merasa Lebih Nyaman.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Mulai sekarang, tak perlu lagi menahan air matamu saat kamu sedang stres. Menangislah, keluarkan air matamu dan membaiklah. Ternyata air mata yang terbentuk saat kita menangis itu mampu menghilangkan hormon-hormon stres yang dilepaskan tubuh saat kita merasa tertekan.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;6. Menangis Membantu Mengeluarkan Perasaanmu&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Kamu pasti setuju kan bahwa hidup itu tidak bisa mulus tanpa masalah? Ya, kamu pasti akan mengalami pasang surut. Dan terkadang, yang jadi masalah adalah ketika kita tanpa sadar menyimpan energi negatif dari kedukaan dalam diri kita.&lt;br /&gt;&lt;br /&gt;Energi negatif (sedih, marah, kecewa, dsb.) ini bisa tersimpan di dalam sistem limbik otak (bagian yang berhubungan dengan memori, emosi, motivasi, dan lain-lain) serta bagian tertentu dari hati kita. Emosi ini akan mengganggu kesehatan kita jika terlalu lama tersimpan. Nah, dengan menangis kita bisa untuk mengeluarkan dan menghilangkan perasaan negatif ini, sehingga membuat kita lebih positif dan lebih bahagia dalam hidup.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;7. Orang yang Sudah Pernah Melihatmu Menangis Akan Merasa Lebih Dekat Denganmu yang Asli. Menangis Adalah Tali yang Terjalin Murni dari Emosi.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Walau terlihat gampang, menangis kadang sulit untuk dilakukan kan?! Apalagi dihadapan orang asing yang sama sekali tidak kamu kenal. Hal ini berarti bahwa kamu hanya bisa menangis di depan orang yang akrab denganmu, begitu juga sebaliknya kamu akan dapat merasa lebih dekat dengan orang yang melihatmu menangis.&lt;br /&gt;&lt;br /&gt;Hal ini juga diperkuat dengan tulisan Ashley Montagu di dalam majalah Science Digest, yang menyebutkan bahwa menangis itu tidak hanya berguna bagi kesehatanmu, tapi juga berguna untuk membangun hubungan yang lebih dekat dengan orang lain. Kamu akan merasa lebih peduli dan merasa lebih dekat dengan teman yang pernah menangis di depanmu (terutama sih, pasanganmu!).&lt;br /&gt;&lt;br /&gt;Itu dia 7 alasan kenapa menangis itu baik untuk hidupmu. Jadi, nggak ada lagi &amp;lsquo;kan alasan untuk menahan air mata dan merasa malu ketika menangis?&lt;/p&gt;', 'alasan-alasan-mengapa-menangis-adalah-hal-yang-baik-untukmu', 'alasan-menangis,menangis-kadang-baik,menangis', '2015-01-20', '12:07:45', '1', 'Y', 'Y', 'menangis-adalah-baik.jpg', 0),
(4, '2', 'Ketika Tak Tahu Ke Mana Arah Hidupmu, Teruslah Melangkah Jangan Menyerah', '&lt;p&gt;Hidup adalah sebuah perjalanan. Di tengah perjalananmu, kamu mungkin akan berada di persimpangan atau bahkan menemui jalan buntu. Ketika itu, kamu pun tak tahu lagi ke mana harus melanjutkan langkah.&lt;br /&gt;&lt;br /&gt;Nah, jika saat ini kamu sedang merasakan hal itu, mungkin kamu perlu merenungkan kembali hidupmu. Kemanakah kamu akan melanjutkan perjalanan? Apakah yang sebenarnya kamu inginkan dalam hidup?&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;Ketika kamu merasa bimbang menentukan arah hidupmu, teruslah melangkah. Jangan menyerah.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Kerja Kerasmu Belum Juga Membuahkan Hasil. Tapi Ingat, Berhenti Total Adalah Sama Dengan Terburu-buru Memvonis Diri Bahwa Kamu Sudah Gagal.&lt;br /&gt;&lt;br /&gt;Apapun yang sedang kamu kerjakan saat ini, bekerjalah dengan sebaik-baiknya. Gaji yang besar mungkin nggak kamu dapatkan dari pekerjaanmu saat ini. Sementara, usaha yang sedang kamu rintis belum menghasilkan omset yang besar pula. Di lain sisi hobimu ternyata belum bisa menghasilkan uang sama sekali.&lt;br /&gt;&lt;br /&gt;Tapi, percayalah bahwa suatu hari kamu akan memetik hasil ketekunanmu. Ini hanya bisa terjadi jika kamu bertahan dengan pekerjaanmu saat ini. Jika kamu bertekad dalam melanjutkan usaha. Jika kamu berkomitmen dalam menggeluti hobi.&lt;br /&gt;&lt;br /&gt;Apapun usahamu, tak akan ada kata &amp;lsquo;sia-sia&amp;rsquo; jika tujuannya adalah meraih sukses di masa depan. Mungkin sekarang kerja kerasmu belum juga membuahkan hasil. Tapi ingat, berhenti total adalah sama dengan terburu-buru memvonis diri sendiri bahwa kamu sudah gagal.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;Memang Menyenangkan Jika Segalanya Gampang. Namun, Kamu Akan Bahagia Jika Mampu Bertahan dalam Keterbatasan.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Memilih merintis karir menjadi seorang guru, kamu pun harus memulainya dengan mengajar di daerah pedalaman. Jauh dari rumahmu yang nyaman, kamu tinggal di sebuah desa kecil di pegunungan. Nggak ada listrik dan sinyal ponsel. Bahkan, kamu harus berjalan kaki belasan kilometer hanya untuk menemukan sebuah warung kelontong. Apa kamu menyesal?&lt;br /&gt;&lt;br /&gt;Tidak. Kamu nggak akan menyesal jika menjadi guru adalah cita-citamu. Kamu akan melakukannya dengan ikhlas, demi pengabdianmu pada dunia pendidikan. Kamu hnya ingin menjadi guru dan mencerdaskan anak bangsa. Keyakinan itulah yang membuatmu melupakan kenyamanan tinggal di rumah daerah perkotaan bersama keluarga.&lt;br /&gt;&lt;br /&gt;Jadi, ketika kamu sudah berani meninggalkan zona nyaman dan memilih hidup dalam keterbatasan, saat itu kamu mungkin sudah menemukan renjanamu. Hanya ketika kamu berada dalam situasi yang terbatas, bukan berarti kamu kehilangan arah, kok!&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;Bertemanlah Dengan Ketidakpastian. Apapun yang Akhirnya Mendatangimu, Jalani Saja Tanpa Ragu.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Apapun bisa terjadi dalam hidupmu, entah itu kemalangan atau justru berkah. Jika sekarang kamu merasa sudah cukup bahagia dengan apa yang kamu miliki, sadarilah bahwa semua itu bisa saja hilang dalam sekejap. Pekerjaan yang mapan, uang, rumah mewah, mobil pribadi, atau kebahagian lainnya bisa lenyap tanpa pernah kamu prediksi.&lt;br /&gt;&lt;br /&gt;Satu-satunya cara untuk berdamai dengan hidup yang penuh ketidakpastian adalah dengan &amp;lsquo;menjalaninya&amp;rsquo;. Kebaikan dan kemalangan yang datang harus bisa diterima dengan ikhlas. Sadarilah bahwa kamu memang nggak punya kuasa penuh untuk mengendalikan hidupmu sendiri.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;Sudah Tahu Apa Mimpimu? Lalu Kenapa Bingung? Bukankah Lebih Baik Energimu Dihabiskan Untuk Mencari Jalan Konkret Mencapai Mimpi?&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Jika saat ini kamu sudah tahu apa mimpimu, lalu kenapa harus bingung? Kini tugasmu adalah berusaha sekuat tenaga untuk meraih mimpimu itu, &amp;lsquo;kan?&lt;br /&gt;&lt;br /&gt;Katakanlah kamu ingin dapat beasiswa ke luar negeri. Apa saja yang sudah kamu lakukan? Melengkapi semua persayaratan, menulis esai, tes bahasa asing, mengirim berkas beasiswa, dan lain-lain. Bahkan, ketika kamu belum tau apa-apa dan baru akan memulai, kamu tentu harus banyak browsing. Lalu, kenapa kamu masih sibuk dengan Twitter dan Facebook?&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;Kerjakan apa yang harus kamu kerjakan sekarang. Jangan menunda-nunda pekerjaan karena itulah yang akan menunda kesuksesanmu.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Jika Masih Tak Tentu Arah, Teruslah Bertanya Pada Dirimu Sendiri: Apa yang Sebenarnya Kamu Inginkan?&lt;br /&gt;&lt;br /&gt;Ada saat dimana kamu merasa benar-benar nggak punya petunjuk sama sekali. Kamu bingung dan putus asa atas hidupmu sendiri. Tapi, apa kamu pernah mencoba merenung dan bertanya pada dirimu sendiri? Apa sih yang sebenarnya kamu inginkan?&lt;br /&gt;&lt;br /&gt;Setiap manusia seharusnya bisa mengenali dirinya sendiri. Nggak ada yang mengerti tentang dirimu kecuali dirimu sendiri. Maka, cobalah untuk merenung atau melakukan meditasi. Pikirkan tentang berbagai hal dalam hidupmu, baik itu hal besar maupun hal kecil.&lt;br /&gt;&lt;br /&gt;Tuliskan apa saja yang bisa membuatmu bahagia. Lalu, temukan pekerjaan apa yang bisa membuatmu bersemangat ketika uang bukan jadi alasan utamanya. Beranilah untuk bermimpi dan bayangkan jika suatu saat kamu berhasil menggenggam mimpimu itu.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;Berkacalah Pada Orang Lain. Toh Kita Semua Bertahan Hidup Untuk Membuat Kehidupan Satu Sama Lain Lebih Ringan.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Kadang, untuk benar-benar tau apa yang kamu inginkan, jalan satu-satunya adalah mencoba. Kamu mungkin berpikir bahwa menjadi wirausahawan adalah pilihan tepat. Ketika kamu sudah benar-benar memulai usahamu itu, kamu pun bisa menilai dirimu sendiri. Apakah kamu akan melanjutkannya atau justru berhenti dan beralih haluan?&lt;br /&gt;&lt;br /&gt;Selain itu, kamu juga perlu bertanya pada orang lain yang bisa lebih dulu meraih kesuksesannya. Misal, kamu bermimpi punya usaha kue, maka silakan bergaul dengan para pengusaha kue. Selain bisa mendengar kisah sukses mereka saat merintis karir, kamu juga bisa minta saran atau nasihat dari mereka. Nggak ada salahnya kok mencontoh atau meniru perjalanan sukses orang lain.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;Dan Jika Kamu Masih Tak Tahu Mau Mengatakan &amp;lsquo;Tidak&amp;rsquo; Atau &amp;lsquo;Ya&amp;rsquo;, Katakanlah &amp;lsquo;Ya&amp;rsquo;.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Agar bisa tau apa yang kamu inginkan sekaligus bisa membuatmu sukses, kamu harus mencoba. Lalu, bagaimana kamu bisa mencoba jika kamu nggak mengambil kesempatan yang menghampirimu?&lt;br /&gt;&lt;br /&gt;Yup, akan selalu ada kesempatan yang datang padamu. Orang yang sukses adalah mereka yang mengambil setiap kesempatan yang datang. Ketika kesempatan itu bisa dimanfaatkan dengan sebaik-baiknya, maka satu-satunya yang bisa diraih hanyalah &amp;lsquo;keberhasilan&amp;rsquo;. Jangan merasa takut atau ragu, kamu hanya perlu yakin dan percaya bahwa &amp;lsquo;kamu bisa&amp;rsquo;!&lt;br /&gt;&lt;br /&gt;Untuk tahu apa yang sebenarnya kamu inginkan dalam hidupmu nggak bisa hanya dengan berdiam diri. Kamu harus bergerak, membuat keputusan dan berani mencoba. Ketika sudah mencoba, kamu pun akan tau apakah kamu harus berhenti atau lanjut.&lt;br /&gt;&lt;br /&gt;Hidup seharusnya nggak dijalani dengan kebimbangan. Lebih baik menyesal karena sudah mencoba dan gagal, daripada menyesal karena nggak pernah berani mencoba.&lt;/p&gt;', 'ketika-tak-tahu-ke-mana-arah-hidupmu-teruslah-melangkah-jangan-menyerah', 'jangan-menyerah,kehilangan-arah,arah-hidup,kehidupan', '2015-01-21', '17:18:30', '1', 'Y', 'N', 'terus-melangkah-jangan-menyerah.jpg', 0),
(5, '3', 'Lakukan 8 Hal Ini, Maka Perempuanmu Akan Merasa Benar-Benar Dicintai', '&lt;p&gt;Dalam hubungan percintaan, meminta kasih sayang tentu hal yang wajar. Apalagi untuk para cewek, yang sekali waktu ingin dimanja. Minta diperhatikan, dilindungi, disayangi, bahkan ditemani setiap saat. Selain itu, kebanyakan cewek juga lebih nyaman berbicara dalam kode daripada blak-blakan. Akibatnya, cowok pun bingung dan mengambil sikap dan rentan keliru memperlakukan mereka.&lt;br /&gt;&lt;br /&gt;Nah, artikel dari popojicms kali ini memang sengaja memberikan sedikit &amp;ldquo;bocoran&amp;rdquo; buat para cowok. Agar pasangan kalian merasa benar-benar dicintai dan hubungan yang dijalani semakin hangat, inilah 8 hal yang bisa kalian lakukan!&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;1. Cewek Paling Suka Diberi Pujian yang Tulus. Mereka Akan Senang Ketika Kalian Berkata: &amp;ldquo;Hari Ini Kamu Cantik Banget, Sih!&amp;rdquo; &amp;mdash; Apalagi Jika Dia Sudah Berusaha&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Makna kata &amp;ldquo;cantik&amp;rdquo; bisa jadi sangat beragam. Seorang perempuan bisa dikatakan cantik jika ia punya semangat hidup dan kegigihan untuk memperjuangkan mimpinya. Predikat cantik juga bisa disematkan pada mereka yang berani tampil jadi dirinya sendiri dan bisa mandiri. Tapi, penanda kecantikan yang paling sederhana tentu saja soal tampilan fisik.&lt;br /&gt;&lt;br /&gt;Umumnya, perempuan akan berusaha tampil cantik; memilih baju yang pas, gaya rambut yang sesuai, dan riasan atau make-up yang cocok. Terlebih, saat bertemu dengan pasangan, cewek sudah pasti akan berusaha tampil maksimal agar terlihat sempurna di depan pasangannya.&lt;br /&gt;&lt;br /&gt;Nah, usaha mereka inilah yang selayaknya dihargai. Kemauan untuk berdandan atau sekadar memilih baju dan sepatu yang sesuai menunjukkan betapa dia menghargai pria yang jadi pasangannya. Baginya, berusaha tampil cantik juga jadi perwujudan rasa sayang dan cinta yang dirasakannya kepada pasangan.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;2. Walau Bisa Gengsi Menunjukkannya di Depanmu, Diam-Diam Mereka Meremang Saat Membaca Surat Cinta dengan Tulisan Tangan Kalian&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Perasaan memang tak selalu bisa diungkapkan lewat kata-kata. Bahkan, tak banyak orang yang bisa fasih mengungkapkan isi hatinya secara lugas, baik secara langsung maupun lewat tulisan. Tapi, tahukah kalian bahwa rentetan kata-kata yang dituliskan dalam sebuah surat cinta bisa membuat hati perempuan berbunga-bunga?&lt;br /&gt;&lt;br /&gt;Ya, surat cinta ibarat tanda cinta yang nyata; yang bisa dibaca berulang-ulang ketika sedang rindu pada pasangan atau saat hati tengah tak tenang. Kalimat-kalimat itulah yang akan menguatkan perempuan &amp;ndash; membuatnya lebih tenang karena merasa benar-benar dicintai dan diinginkan.&lt;br /&gt;&lt;br /&gt;Tak harus dituliskan dengan bahasa yang rumit nan puitis. Kalimat-kalimat sederhana pun asalkan ditulis dengan tulus dan jujur akan terasa bermakna saat dibaca. Jangan menulis dengan mesin ketik atau komputer karena goresan tinta lewat tulisan tangan kalianlah yang akan membuat perempuan semakin merasa dihargai.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;3. Ia Masih Muda. Jam Terbangnya di Dapur Belum Sebanyak Ibumu. Namun, Dia Pasti Senang Jika Kamu Mau Melahap Makanan yang Sudah Ia Hidangkan&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Banyak yang percaya bahwa keahlian memasak adalah salah satu yang membuat seorang perempuan layak disebut sempurna. Meski tak semuanya pandai memasak, banyak perempuan yang sengaja belajar demi bisa punya keahlian yang satu ini. Minta diajari oleh ibunya, membeli buku kumpulan resep masakan, hingga belajar dari video tutorial memasak yang ada di YouTube.&lt;br /&gt;&lt;br /&gt;Kadang, keinginan untuk belajar memasak semata-mata hanya demi bisa membuat makanan kesukaanmu. Ya, betapa dia benar-benar berusaha agar bisa menghidangkan semangkuk sayur bayam dengan lauk perkedel kentang dan tumis teri saat kamu berkunjung ke rumahnya. Nah, jika dia sudah demikian berusaha, bukankah menandaskan nasi di piringmu jadi cara sederhana untuk menghargai usahanya. Karena bagi dia, melihatmu makan dengan lahap dan kekenyangan setelahnya adalah kemewahan.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;4. Kesempatan Bisa Intim Berdua Adalah Momen Berharga. Mereka Akan Bahagia Jika Kalian Mengajaknya Liburan Bersama&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Tidak semua pasangan bisa sering-sering bersama. Bagi mereka yang sama- sama disibukkan dengan rutinitas kuliah atau pekerjaan, momen pertemuan bisa jadi akan sangat berharga. Momen sederhana seperti saat duduk berdua, mengobrol, sambil menikmati secangkir kopi bisa terasa begitu menyenangkan dan menenangkan.&lt;br /&gt;&lt;br /&gt;Jadi, tak ada salahnya jika kamu berusaha meluangkan waktu di sela-sela rutinitasmu. Misalnya, kamu dan pasanganmu bisa mengambil libur atau cuti di waktu yang sama dan pergi liburan berdua. Menyambangi pantai, mendaki gunung, atau sekadar jalan-jalan ke kota yang belum pernah dikunjungi. Selama liburan akan banyak momen yang bisa kalian bagi berdua; yang sudah pasti membuat hubungan kalian makin hangat.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;5. Saat Tubuhnya Terbaring Lemah Lantaran Diserang Demam, Kehadiran Kalian Ibarat Obat yang Paling Mujarab Bagi Mereka&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Wajar jika setiap pasangan akan berusaha untuk saling peduli. Saat salah satu jatuh sakit misalnya, pasangan biasanya merasa khawatir dan berusaha memberikan perhatian ekstra. Kamu jadi rajin menelepon pasanganmu untuk menanyakan kondisinya, atau rajin mengirim SMS demi mengingatkan makan dan minum obat. Namun, tahukah kalian bahwa yang benar-benar para cewek butuhkan adalah kehadiran kalian sebagai pasangannya?&lt;br /&gt;&lt;br /&gt;Tak cukup sekadar telepon atau SMS, cewek akan lebih bahagia ketika kalian mau datang menjenguk mereka yang sedang terbaring lemah karena demam. Sambil membawa sekeranjang buah atau sekotak kue, kehadiran kalian ibarat obat paling mujarab bagi mereka. Datang untuk menjenguk adalah wujud perhatian yang nyata, karenanya dia akan merasa benar-benar dicintai.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;6. Dia Paling Suka Saat Kamu Menatap Matanya Dalam-Dalam. Tatapan Matamu Menegaskan Bahwa Dialah yang Paling Berharga&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Sederhana memang, tapi tatapan mata yang tulus dan dalam-dalam dari pasangan bisa membuat perempuan merasa &amp;ldquo;lemah&amp;rdquo;. Ya, tatapan mata yang tulus seakan menjelaskan betapa kalian sangat menghargai mereka. Tatapan mata itu pula yang seakan bicara bahwa dialah satu-satunya yang kamu cintai dengan segenap perasaan yang kamu punya.&lt;br /&gt;&lt;br /&gt;Saat kamu bisa menatap pasanganmu dalam-dalam, berarti kamu merasakan dirinya berharga. Tatapan matamu bukan berarti curiga, tapi itulah pertanda kamu dan dia sama-sama nyaman saat bersama. Kadang, membuatnya yakin akan hubungannya denganmu adalah semudah menjaga kontak matamu dengannya.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;7. Momen Perkenalan dengan Keluarga Membuatnya Merasa Bangga. Inilah yang Meyakinkannya Bahwa Hubungan Kalian Punya Masa Depan&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Hubungan cinta tak hanya melibatkan sepasang laki-laki dan perempuan saja. Ada teman-teman dan keluarga yang juga akan terlibat di dalamnya. Sebuah hubungan akan semakin bahagia dan langgeng jika sudah mendapat restu dari orang-orang terdekat, terutama keluarga.&lt;br /&gt;&lt;br /&gt;Atas alasan itulah, perempuan akan merasa senang dan bangga ketika dikenalkan pada orang tua atau bahkan keluarga besar. Dikenalkan sebagai pasangan akan membuatnya merasa dianggap dan dihargai. Saat orang tua dan keluarga besarmu bisa menanggapi kehadirannya dengan baik, dia pun akan merasa nyaman melanjutkan hubungan denganmu &amp;ndash; yang tentu saja mengarah ke masa depan.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;8. Kadang, Kamu Tak Harus Melakukan Apa-Apa. Bersamamu Saja Membuatnya Merasa Cukup dan Tak Perlu Banyak Meminta.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Perasaan yang dalam seringkali mengajarkan kita jadi pribadi yang mau menerima dan tak banyak meminta. Begitu pula dengan perempuan, saat berhadapan dengan pria yang sangat dicintai, mereka bisa jadi sangat sabar dan tak mau banyak meminta.&lt;br /&gt;&lt;br /&gt;Bagi dia, pendampinganmu bisa jadi sudah lebih dari cukup. Tanpa perlu ditemani setiap hari, diajak pergi liburan, atau dibelikan hadiah-hadiah mahal. Selama kamu bisa jadi pasangan yang setia dan menggenapkan, mereka tak lagi perlu meminta apa-apa karena keberadaanmu membuatnya merasa tercukupi dan tak butuh selainnya.&lt;br /&gt;&lt;br /&gt;Nah, apakah kalian para cowok sudah melakukan hal-hal di atas? Buat para cewek, apakah pasangan kalian sudah melakukan hal-hal yang sama?&lt;br /&gt;&lt;br /&gt;Yang pasti, pasangan yang sekarang ada di sampingmu memang sepantasnya dihargai dan cara-cara di atas adalah sedikit yang bisa kamu lakukan untuknya.&lt;/p&gt;', 'lakukan-8-hal-ini-maka-perempuanmu-akan-merasa-benar-benar-dicintai', 'menyenangkan-wanita,cintai-wanita,wanita', '2015-01-22', '19:33:15', '1', 'Y', 'Y', 'membuat-perempuan-dicintai.jpg', 0),
(6, '3', 'Kamu Jomblo Jangan Sedih', '&lt;p&gt;Kata siapa jadi jomblo itu ngenes? Akhir-akhir ini sepertinya para jomblowan dan jomblowati seringkali jadi sasaran empuk buat digencet dan jadi bahan ketawaan. Eits, jangan keburu seneng dulu udah bisa ngetawain temen-temen kamu yang masih jomblo.&lt;br /&gt;&lt;br /&gt;Dalam beberapa hal, orang-orang yang masih jomblo bisa ngetawain balik dan bikin kamu-kamu yang udah punya pasangan pada sirik sama mereka. Kalau kamu yang udah nggak single bisa pamer pacar kamu, orang jomblo juga bisa pamer kebahagian mereka loh.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;1. Nggak ada yang namanya stres karena cinta&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Gimana mau stress karena cinta? Punya pacar aja enggak. Yang namanya pacaran, pasti dong beberapa kali ngalamin yang namanya konflik sama pacar. Nah, karena nggak punya pacar, nggak ada yang namanya berantem-berantem sama pacar, stress atau galau karena mikirin masalah pacaran. Yang dipikirin ya hidupnya sendiri, bukan orang lain.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;2. Bebas mau ngapain aja&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Orang-orang jomblo pastinya bebas mau ngapain aja sesuka hati mereka. Mereka bebas ngelakuin hal-hal apa aja tanpa harus memikirkan dan mengedepankan orang lain.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;3. Kalau mau pergi nggak perlu pake ijin&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Kalau yang satu ini, udah pasti mutlak nggak akan bisa dilakuin sama orang yang udah punya pasangan. Sekalinya pergi tanpa ijin dari sang pacar, udah pasti hati was-was dan pusing tujuh keliling nyari alesan buat nanti ngejelasin ke pacar. Kalau yang masih jomblo, mau pergi kemana aja juga santai.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;4. Nggak perlu repot-repot laporan&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Kalau lagi hang out sama temen-temen, nggak perlu banget yang namanya wajib lapor sama pacar. Nggak perlu repot-repot ngabarin pergi sama siapa aja, ke mana, naik apa, sampai jam berapa atau pulang jam berapa.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;5. Kalau handphone lowbat, nggak bingung cari colokan&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Orang-orang yang belum punya pasangan, nggak akan khawatir sama sekali kalau handphone miliknya habis baterai. Mereka nggak harus setiap saat rajin ngecek handphone. Beda kalau yang udah punya pacar. Kalau baterai udah tinggal 10%, kebanyakan mereka akan buru-buru nyari stop kontak buat nge-charge. Kalau handphone sampai mati, bisa-bisa kena omel sang pacar tuh.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;6. Nggak ada yang ngatur atau ngelarang&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Kalau udah punya pacar, sedikit banyak pasti ada semacam perjanjian dan aturan-aturan yang udah disepakati bersama. Sebebas-bebasnya orang pacaran, nggak akan bisa sebebas orang yang masih menjomblo. Mereka bisa ikutan kegiatan apapun yang disukai, bisa ngelakuin apa aja tanpa ada syarat apapun.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;7. Bisa fokus sama diri sendiri&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Orang jomblo bisa fokus penuh pada dirinya sendiri. Mereka punya banyak waktu hanya untuk dirinya sendiri, dan nggak harus ikut memikirkan kehidupan seseorang yang selalu ada di sampingnya.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;8. Nggak ada yang ganggu jadwal&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Nggak ada yang bisa tiba-tiba ngeganggu jadwal main, olahraga atau lainnya hanya karena tiba-tiba disuruh nganterin dan ngejemput pacar, apalagi kalau pacarnya yang kelewat manja. Yang ada, jadwal seringkali jadi berantakan.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;9. Bebas dari tuntutan&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Kalau udah sepakat komitmen sama pacar, pasti deh ada yang namanya sebuah tuntutan. Ada kan, pacar yang suka nuntut untuk selalu perhatianlah, nuntut untuk jadi seperti ini itulah, ada yang selalu nuntut traktir makan dan jalan-jalan lah. Nah, beruntunglah buat yang masih jomblo, karena nggak ada yang berani nuntut kamu untuk begini begitu.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;10. Terserah mau main sama siapa aja&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Orang yang masih single, itu bebas banget mau main sama siapa aja. Mereka nggak perlu khawatir untuk dibatesin main sama sahabat-sahabat kamu. Nggak ada yang jealous kalau lagi main sama sahabat deket yang beda jenis kelamin.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;11. Bisa jalan-jalan kemana dan kapan aja sesuka hati&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Hal yang paling membahagiakan dari orang yang nggak punya pacar adalah kebebasan. Orang yang masih single itu bisa travelling kemana dan kapan aja. Bisa bebas jalan-jalan menikmati hidup tanpa terusik dengan kewajiban-kewajiban yang harus dilakukan sebagai seorang pacar. Mau pergi jalan-jalan selama apapun juga, orang jomblo nggak akan takut bakal diancem putus.&lt;br /&gt;&lt;br /&gt;Tuh, jadi jomblo itu juga banyak enaknya kok! Nggak se-ngenes dan se-suram yang orang-orang tudingkan. Orang-orang yang masih single memang punya hidup yang sangat menyenangkan, karena mereka bebas bisa ngelakuin apapun yang mereka mau. Ya, mau jomblo atau udah pacaran, semuanya ada plus dan minusnya. Meskipun orang jomblo belum punya seseorang yang menempati hati mereka, mereka masih bisa bilang I&amp;rsquo;m single and very happy!&lt;br /&gt;&lt;br /&gt;Jadi, setelah baca artikel ini,&amp;nbsp; masih mau pacaran atau mau jomblo nih guys?&lt;/p&gt;', 'kamu-jomblo-jangan-sedih', 'jomblo-siapa-takut,jomblo-bahagia,jomblo-jangan-sedih,jomblo', '2015-01-23', '06:12:00', '1', 'Y', 'N', 'jomblo-jangan-sedih.jpg', 0);
INSERT INTO `post` (`id_post`, `id_category`, `title`, `content`, `seotitle`, `tag`, `date`, `time`, `editor`, `active`, `headline`, `picture`, `hits`) VALUES
(7, '4', 'Hal-Hal yang Akan Kamu Hadapi Sebagai Fresh Graduate yang Baru Jadi Karyawan', '&lt;p&gt;Kata orang, kehidupan nyata itu baru dimulai ketika kamu meninggalkan bangku kuliah dan benar-benar menginjak dunia kerja. Kamu mulai diberi tanggung jawab yang lebih besar, dan dituntut untuk lebih profesional. Transisi ini bisa membuatmu disergap berbagai kecemasan. Di lain pihak, ada juga hal-hal yang akan bisa membuatmu senang.&lt;br /&gt;&lt;br /&gt;Nah, apa aja sih sebenarnya suka-duka yang bakal kamu rasakan sebagai fresh graduate yang baru saja dapat pekerjaan pertama?&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;1. Kamu akan merasa seperti dilepas ke sekolah baru. Berbagai kekhawatiran menyelimutimu, mulai dari pakaian hingga eyeliner yang belepotan.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Di hari-hari pertamamu di kantor, kamu ingin menunjukkan kalau kamu pantas mendapatkan pekerjaan itu &amp;mdash; termasuk dengan mengeluarkan penampilan terbaikmu. Masalahnya, setelah bertahun-tahun terbiasa santai di kampus kamu perlu waktu lama untuk menjadi pekerja kantoran yang rapi dan necis.&lt;br /&gt;&lt;br /&gt;Kamu harus mengikhlaskan kebiasaan memakai kaos oblong ala mahasiswa. Kamu juga mulai belajar berdandan yang lebih niat. Kalau dulu kamu cukup pergi ke kampus dengan bedak bayi dan lipgloss, sekarang kamu akan menyempatkan diri menata rambut dan mengulas lipstik. Nggak jarang, tiap pagi kamu dihadapkan pada kebingungan semacam &amp;ldquo;pakai baju apa ya?&amp;rdquo; atau &amp;ldquo;Aduh, ini gimana caranya supaya eyeliner-ku nggak luber-luber?!?&amp;rdquo;&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;2. Begadang tak lagi semenyenangkan saat masih mahasiswa. Kamu tak lagi bisa menanggung risiko bangun terlambat esok paginya.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Mungkin kebiasaanmu begadang waktu mahasiswa masih sulit dilepaskan. Padahal sekarang, risiko bangun terlambat lebih besar: terjebak macet, telat datang ke kantor, dan ditegur bos.&lt;br /&gt;&lt;br /&gt;Ketakutan-ketakutan semacam ini bisa membuatmu memilih tidak tidur sama sekali ketika sudah telanjur begadang. Atau sebaliknya, ketakutan ini malah membuatmu memaksa diri mengatur jam biologismu, sehingga kamu bisa jadi yang paling tepat waktu di kantor.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;3. Tak ketinggalan adalah kekhawatiranmu pada suasana kantor sendiri. Bukan hanya bos, teman-teman sesama karyawan akan kamu perlakukan dengan hati-hati.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Yang pertama kali terlintas di otakmu saat kamu tahu kamu diterima di perusahaan itu: &amp;ldquo;Bosnya gimana ya?&amp;rdquo; Kamu khawatir kalau bosmu adalah orang yang kaku dan galak. Kamu pun khawatir kalau kamu melakukan kesalahan fatal yang bisa membuatnya menilaimu negatif.&lt;br /&gt;&lt;br /&gt;Kamu juga mencemaskan pembawaan rekan-rekan kerjamu. Kamu takut mendapat perlakuan tidak adil hanya karena kamu masih junior, atau karena ada teman kantor yang rese. Kamu pun akan mengkhawatirkan apa yang sebaiknya kamu obrolkan dengan teman kantormu. Mau ramah, takut dibilang kepo. Mau kalem, takut dikira nggak komunikatif. Kamu kudu piyee?&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;4. Tugas-tugas pertama kamu hadapi dengan jantung berdegup kencang. Gagal masa probation atau bahkan pemecatan selalu jadi bayang-bayang.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Sebagai anak baru, kamu pasti takut tidak bisa menyelesaikan segala tugas yang diberikan ke kamu. Ketika kamu diterima bekerja di bank, kamu akan dihadapkan dengan laporan-laporan keuangan yang harus kamu cek setiap harinya. Kamu takut akan membuat kesalahan, sehingga menyebabkan pekerjaan orang lain berantakan.&lt;br /&gt;&lt;br /&gt;Saking ingin maksimalnya bekerja, kadang kamu harus lembur di hari-hari awal. Akibatnya, cap sebagai &amp;ldquo;anak lembur&amp;rdquo; pun menempel di kamu.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;5. Rutinitas jadi hal yang tak terhindarkan. Tanpa jam-jam tertentu untuk melakukan sesuatu, kamu tak akan bisa bertahan.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Waktu masih jadi mahasiswa dulu, kamu terbiasa melakukan apapun kapanpun. Mau bangun pukul berapa, terserah; mau tidur pukul berapa, terserah; mau makan siang kapan, terserah; mau menghabiskan sehari semalam buat skripsi, terserah; mau nggak ngapa-ngapain? Terserah!&lt;br /&gt;&lt;br /&gt;Di dunia kerja, kamu akan dihadapkan dengan jam kerja yang rutin dan &amp;ldquo;saklek&amp;rdquo;. Kamu harus sudah ada di kantor pukul 8 atau 9 pagi. Punya waktu untuk makan siang dari jam 12.30 sampai jam 1 siang. Tidak boleh pulang sebelum jam 7 sore. Begitu seterusnya, sampai akhir pekan tiba.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;6.&amp;nbsp; Ketika harus pulang duluan, kamu akan segan untuk berpamitan&amp;hellip; Apalagi kalau bosmu belum pulang.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Jam pulang kerja menjadi hal yang membuatmu segan. Kalau kamu pulang kantor lebih dulu dari pegawai yang lain, kamu takut dicap malas atau nggak mau berusaha maksimal.&lt;br /&gt;&lt;br /&gt;Kamu pun takut kalau kamu dicap sebagai anak baru yang tidak tahu hormat, karena pulang duluan dari kantor. Terkadang, kamu harus menunggu rekan kerja lain pulang duluan. Barulah kamu &amp;ldquo;ngikut&amp;rdquo;. Hehee.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;7. Ketika rutinitas itu sudah mengendap jadi agenda, barulah kamu mengerti pentingnya weekend dan cuti. Kamu ingin kabur: ke mana saja, asal bukan ke kantor ini.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Ketika sudah beberapa minggu bekerja di kantor baru, rasa excited yang dulu sempat menghampirimu kini hilang. Kamu telah dihadapkan pada realita yang sebenarnya. Pekerjaan di kantor menyita sebagian besar waktumu. Kamu berkutat dengan rekan-rekan yang itu-itu saja. Kamu pun mulai jengah pada tugas yang diberikan bosmu, serta laporan-laporan rutin yang harus kamu buat.&lt;br /&gt;&lt;br /&gt;Kamu pun mulai bermimpi di siang bolong tentang cuti. Bulan depan ke Karimun Jawa, dua bulan lagi ke Yogya, minggu depan pulang ke rumah orang tua: pokoknya kamu ingin kabur, kemana saja.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;8. Di lain sisi, punya uang sendiri masih menjadi hal yang sangat asing bagimu. Berbagai produk terbaru memenuhi imajinasimu.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Sebagai orang yang hidupnya selama ini tergantung pada uang bulanan, memikirkan gaji pertama pasti akan membuatmu bersemangat dan senang. Kamu mulai bermimpi untuk memberikan ke orang tua, atau menyisihkan sebagiannya untuk mentraktir sahabatmu. Dengan ini, kamu akhirnya bisa menunjukkan kalau kamu bisa mandiri.&lt;br /&gt;&lt;br /&gt;Di sisi lain, ada puluhan barang yang ingin kamu beli: HP baru, baju yang lebih oke, spare part motor&amp;hellip;kamu pun bingung harus menghabiskan gaji pertamamu untuk apa.&lt;br /&gt;&lt;br /&gt;Untuk kamu yang sedang menunggu gaji pertama, selamat menunggu! Pergunakan gajinya sebaik mungkin, ya.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;9. Nongkrong mulai menjadi hal yang absurd bagimu. Teman-teman yang dulu akrab mulai lepas, meniti jalan mereka sendiri satu-satu.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Waktu kamu masih jadi mahasiswa, kamu bisa nongkrong hampir setiap malam (kalau kamu mau). Tapi sebagai pekerja, bahkan akhir pekan pun rasanya sayang untuk dihabiskan di luar rumah. Kadang, kamu hanya ingin sendirian &amp;mdash; nonton TV atau internetan.&lt;br /&gt;&lt;br /&gt;Rutinitas kerja membuat waktu yang bisa kamu habiskan dengan sahabatmu jauh berkurang. Hingga hampir larut malam, kamu masih dituntut untuk fokus dengan pekerjaanmu. Tak jarang, ini membuat hubunganmu dengan teman-teman menjadi lebih renggang.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;10. Ada rasa lelah, tak percaya, dan bosan yang kamu lalui sebagai karyawan. Namun, kamu siap menaklukkannya demi masa depan yang lebih mapan.&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Sebagai fresh graduate yang baru punya pekerjaan pertama, pikiran-pikiran ini mungkin masih mendominasi kepalamu:&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;&amp;ldquo;Seriusan nih gue kerja?&amp;rdquo;&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;&amp;ldquo;Besok aku kerja loh. KERJA!&amp;rdquo;&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Sebelumnya, kamu hanya seorang mahasiswa biasa yang doyan ke perpustakaan atau nongkrong di depan 7-11. Sekarang, kamu sudah harus lebih bertanggung jawab. Kalau dulu kamu berani meminta uang jajan ke orang tua, kali ini kamu akan bangga bisa menolaknya.&lt;br /&gt;&lt;br /&gt;Tapi, bekerja bukan hanya soal menghasilkan uang sendiri. Bekerja adalah caramu membuktikan bahwa ada makna yang bisa kamu berikan ke orang lain. Ilmumu, hatimu, dan kerja kerasmu sebagai individu: semuanya terpakai. Menyadari hal itu, kamu harus bangga.&lt;br /&gt;&lt;br /&gt;Transisi dari menjadi mahasiswa ke pekerja kantor tidak selalu mulus. Ada hal-hal yang menyenangkan, memang, tapi ada juga rasa cemas dan ketakutan. Tenang: kalau kita sabar menghadapinya, ketakutan-ketakutan itu akan sirna. Saat kamu memulai hari pertamamu di kantor, tersenyumlah. Perlahan tapi pasti, kamu akan menyadari bahwa ada banyak yang bisa kamu lakukan di dunia ini.&lt;/p&gt;', 'hal-hal-yang-akan-kamu-hadapi-sebagai-fresh-graduate-yang-baru-jadi-karyawan', 'sukses-jadi-pekerja,fresh-graduate,cari-kerja,karyawan', '2015-01-24', '15:15:00', '1', 'Y', 'Y', 'dilema-fresh-graduate.jpg', 0),
(8, '4', 'Kalau Mau Kaya Tanpa Jadi Pengusaha, Belajar Coding Bisa Jadi Jawabannya', '&lt;p&gt;Mengapa jadi programmer? Bukankan menulis kode di depan komputer adalah pekerjaan yang gak keren? Barangkali bagimu pekerjaan ini terlihat membosankan, tapi tunggu sampai kamu tahu berapa pendapatan seorang programmer dalam satu bulan.&lt;br /&gt;&lt;br /&gt;Seorang entry-level programmer (pemula) di Jakarta bisa memperoleh gaji sebesar 4 juta Rupiah sebulannya. Sementara analyst programmer di perusahaan top bisa meraup gaji sebesar 28,5 juta Rupiah per bulan. Jika itu belum cukup menggiurkan buat kamu, lihatlah programmer di Amerika yang rata-rata bisa membawa pulang gaji USD 66,000/bulan atau kurang lebih senilai dengan 64 juta Rupiah/bulan.&lt;br /&gt;&lt;br /&gt;Dan jangan lupa, para pendiri Google, Facebook atau Twitter semuanya adalah programmer. Lihat kesuksesan mereka sekarang.&lt;br /&gt;&lt;br /&gt;Forbes memproyeksikan gaji yang diterima dari pekerjaan tulis-menulis kode seperti web developer, software developer, programmer dan lain-lain akan meningkat hingga 8% per tahun.&lt;br /&gt;&lt;br /&gt;Walaupun begitu, mempelajari kode komputer masih terlihat menyeramkan bagi orang awam. Tapi kamu gak perlu takut lagi, berkat banyaknya situs gratis yang menawarkan pelajaran menulis kode. Kamu gak akan kekurangan sumber dan belajar menulis kode gak pernah semudah ini sebelumnya. Bahkan kalau kamu serius, kamu bisa menciptakan sebuah purwarupa web atau software dalam dua bulan. Yuk kita belajar sama-sama!&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;1. Pertama, Pahamilah Istilah-Istilah Pemrograman&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Keberadaan terminologi aneh dan membingungkan dalam dunia programming barangkali jadi alasan kenapa selama ini kamu menjauh. Ada baiknya kalau kamu mulai dari mempelajari istilah sederhana lebih dulu. Kenali istilah komputer yang sering kamu simak namun entah apa maksudnya seperti PHP, HTML, Java atau API.&lt;br /&gt;&lt;br /&gt;Pahami juga perbedaan antara Server dengan Web Server. Dari situs ini kamu bisa mempelajari istilah-istilah penting dalam pemrograman yang dijelaskan dengan bahasa yang mudah dipahami. Dalam 10 menit kamu udah bisa memahaminya.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;2. Bulatkan Tekad; Berkenalanlah Dengan Teknik Dasar Programming dan&amp;hellip; Python&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Python adalah bahasa pemrograman level tinggi yang sangat lumrah digunakan untuk belajar menulis kode. Python bebas digunakan dan bisa di didapatkan secara gratis di sini. Untuk mempelajari Python, ada dua situs yang bisa menjadi tempat &amp;lsquo;kursus&amp;rsquo; kamu:&lt;br /&gt;&lt;br /&gt;&lt;em&gt;Learn Python The Hard Way, walau nama situsnya seram, mempelajari dasar-dasar Phyton lebih mudah dalam situs ini. Sangat cocok buat pemula.&lt;/em&gt;&lt;br /&gt;&lt;em&gt;Google&amp;rsquo;s Python Class, kalau kamu lebih familiar dengan tampilan antar-muka Google, maka inilah situs pilihan kamu. Kelebihannya, Google menyediakan video tutorial dan latihan untuk mengetes sejauh mana kemampuan kamu.&lt;/em&gt;&lt;br /&gt;&lt;br /&gt;Kedua sumber di atas cukup lengkap dan saling menutupi kekurangan masing-masing. Coba aja kedua-duanya lalu seiring waktu kamu akan tahu situs mana yang paling cocok buat kamu. Jangan lupa terus mencoba dan berlatih.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;3. Ikuti Kelas Pengantar Django&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Django adalah web frameworks yang ditulis dalam bahasa Python. Peran web frameworks sangat penting dalam jalur pertukaran data melalui internet. Frameworks bertanggung jawab menerima dan mengolah request dari pengguna internet lalu mengirimkan kembali respond yang tepat ke browser pengguna.&lt;br /&gt;&lt;br /&gt;Jadi alurnya begini: ketika kamu membuka laman Facebook kamu langsung diarahkan ke laman &amp;lsquo;Home&amp;rsquo;, ketika kamu klik akun seorang teman, request itu dikirim browser ke server Facebook yang menyimpan data teman tersebut. Tapi karena browser tiap orang beda-beda, di sinilah peran Django bermain. Frameworks ini menerjemahkan dan mengirim data si teman kembali ke komputer kamu sebagi respon.&lt;br /&gt;&lt;br /&gt;Ikuti petunjuk dan instruksi dari tutorial Django. Setelah tutorial selesai, hapus semua kode yang sudah kamu tulis. Kemudian tulislah ulang kode-kode itu tanpa mengintip tutorial. Dengan cara itu kamu bisa lebih paham soal Django.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;4. Perdalam Lagi Pemahaman Kamu Soal Python. Caranya, Putarlah Video Berkualitas dari Kelas Komputer Udacity&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Saatnya meningkatkan level kamu dalam penulisan kode. Dalam 2-4 minggu kamu harus step up dan mendapat pemahaman yang lebih dalam soal bahasa Python dan konsep-konsep programming. Kamu bisa memanfaatkan kelas ilmu komputer dari Udacity, kelas ini terdiri dari 7 sesi dengan durasi 2-3 jam tiap sesi. Materi disampaikan melalui video berkualitas.&lt;br /&gt;&lt;br /&gt;Massachusetts Institute of Technology juga menawarkan kelas terbuka yang bisa kamu hadiri secara vitual. Materi ini disampaikan dengan gaya kuliah anak-anak MIT. Lumayan, jadi tahu rasanya kuliah di sana &amp;lsquo;kan?&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;5. Waktunya Praktik! Mulai Bangun Sebuah Situs Sederhana dengan Tema Apa Saja&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Mulailah membangun sebuah situs sederhana dalam 1 minggu, temanya apa aja asal gak melanggar UU ITE dan gak mengandung unsur SARA.&lt;br /&gt;&lt;br /&gt;Amannya kamu mulai dengan membuat web yang isinya cuma data pribadi, foto, atau lagu kesukaan. Jangan malu dibilang terlalu sederhana, namanya juga belajar. Kalau kamu masih butuh contoh gunakan bantuan dari Django by Example ini.&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;6. Buatlah Purwarupa dan Berpikirlah Untuk Mendirikan Start-Up&lt;/strong&gt;&lt;br /&gt;&lt;br /&gt;Setelah coba-coba dengan situs sederhana tadi, waktunya kamu lebih serius. Kalau kamu punya ide yang brilian dan teman-teman yang sepaham, ajak mereka mendirikan perusahaan startup.&lt;br /&gt;&lt;br /&gt;Dropbox, Air Bnb, Twitter, Evernote, LinkedIn dan macam-macam situs lain di mulai dari kegigihan pendirinya membangun startup. Satu-satunya cara agar bisa meraih penghasilan dari perusahaan startup-mu, kamu harus segera membuat prototype.&lt;br /&gt;&lt;br /&gt;Kalau pada akhirnya startups kamu kandas, prototype produk yang sudah kamu kerjakan masih bisa dijadikan contoh karya atau portofolio yang sangat berguna ketika melamar perkerjaan. Dan seperti yang diungkap di awal artikel tadi, pekerjaan tulis menulis kode ini bergaji puluhan juta rupiah!&lt;/p&gt;', 'kalau-mau-kaya-tanpa-jadi-pengusaha-belajar-coding-bisa-jadi-jawabannya', 'coding-bikin-kaya,kaya-dari-teknologi,jadi-kaya,kaya', '2015-01-25', '03:22:45', '1', 'Y', 'N', 'jadi-programmer-kaya.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id_setting` int(5) NOT NULL AUTO_INCREMENT,
  `website_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `website_url` varchar(100) CHARACTER SET latin1 NOT NULL,
  `website_email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `meta_description` varchar(250) CHARACTER SET latin1 NOT NULL,
  `meta_keyword` varchar(250) CHARACTER SET latin1 NOT NULL,
  `favicon` varchar(50) CHARACTER SET latin1 NOT NULL,
  `timezone` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `website_maintenance` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `website_maintenance_tgl` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `website_cache` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `website_cache_time` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `member_register` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id_setting`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE IF NOT EXISTS `subscribe` (
  `id_subscribe` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_subscribe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int(5) NOT NULL AUTO_INCREMENT,
  `tag_title` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `tag_title`, `tag_seo`, `count`) VALUES
(1, 'lombok', 'lombok', 2),
(2, 'berwisata ke lombok', 'berwisata-ke-lombok', 2),
(3, 'pergi ke lombok', 'pergi-ke-lombok', 2),
(4, 'visit indonesia', 'visit-indonesia', 4),
(5, 'bunaken', 'bunaken', 2),
(6, 'manado', 'manado', 2),
(7, 'visit manado', 'visit-manado', 2),
(8, 'nirwana di manado', 'nirwana-di-manado', 2),
(9, 'menangis', 'menangis', 2),
(10, 'menangis kadang baik', 'menangis-kadang-baik', 2),
(11, 'alasan menangis', 'alasan-menangis', 2),
(12, 'kehidupan', 'kehidupan', 2),
(13, 'arah hidup', 'arah-hidup', 2),
(14, 'kehilangan arah', 'kehilangan-arah', 2),
(15, 'jangan menyerah', 'jangan-menyerah', 2),
(16, 'wanita', 'wanita', 2),
(17, 'cintai wanita', 'cintai-wanita', 2),
(18, 'menyenangkan wanita', 'menyenangkan-wanita', 2),
(19, 'jomblo', 'jomblo', 2),
(20, 'jomblo jangan sedih', 'jomblo-jangan-sedih', 2),
(21, 'jomblo bahagia', 'jomblo-bahagia', 2),
(22, 'jomblo siapa takut', 'jomblo-siapa-takut', 2),
(23, 'karyawan', 'karyawan', 2),
(24, 'cari kerja', 'cari-kerja', 2),
(25, 'fresh graduate', 'fresh-graduate', 2),
(26, 'sukses jadi pekerja', 'sukses-jadi-pekerja', 2),
(27, 'kaya', 'kaya', 2),
(28, 'jadi kaya', 'jadi-kaya', 2),
(29, 'kaya dari teknologi', 'kaya-dari-teknologi', 2),
(30, 'coding bikin kaya', 'coding-bikin-kaya', 2);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id_theme` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `author` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `active` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_theme`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id_theme`, `title`, `author`, `folder`, `active`) VALUES
(1, 'New Chingsy Theme', 'Dwira Survivor', 'newchingsy', 'Y'),
(2, 'Neon Theme', 'Dwira Survivor', 'neon', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `traffic`
--

DROP TABLE IF EXISTS `traffic`;
CREATE TABLE IF NOT EXISTS `traffic` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `bio` text COLLATE latin1_general_ci NOT NULL,
  `userpicture` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '2',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_daftar` date NOT NULL,
  `forget_key` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `locktype` varchar(1) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

DROP TABLE IF EXISTS `user_level`;
CREATE TABLE IF NOT EXISTS `user_level` (
  `id_level` int(10) NOT NULL AUTO_INCREMENT,
  `level` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id_role` int(10) NOT NULL AUTO_INCREMENT,
  `id_level` int(10) NOT NULL,
  `module` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `read_access` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `write_access` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `modify_access` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `delete_access` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `id_level`, `module`, `read_access`, `write_access`, `modify_access`, `delete_access`) VALUES
(1, 1, 'post', 'Y', 'Y', 'Y', 'Y'),
(2, 1, 'category', 'Y', 'Y', 'Y', 'Y'),
(3, 1, 'tag', 'Y', 'Y', 'Y', 'Y'),
(4, 1, 'pages', 'Y', 'Y', 'Y', 'Y'),
(5, 1, 'library', 'Y', 'Y', 'Y', 'Y'),
(6, 1, 'setting', 'Y', 'Y', 'Y', 'Y'),
(7, 1, 'theme', 'Y', 'Y', 'Y', 'Y'),
(8, 1, 'menumanager', 'Y', 'Y', 'Y', 'Y'),
(9, 1, 'component', 'Y', 'Y', 'Y', 'Y'),
(10, 1, 'user', 'Y', 'Y', 'Y', 'Y'),
(11, 1, 'comment', 'Y', 'Y', 'Y', 'Y'),
(12, 1, 'gallery', 'Y', 'Y', 'Y', 'Y'),
(13, 1, 'contact', 'Y', 'Y', 'Y', 'Y'),
(14, 1, 'cogen', 'Y', 'Y', 'Y', 'Y'),
(15, 2, 'post', 'Y', 'Y', 'Y', 'Y'),
(16, 2, 'category', 'Y', 'Y', 'Y', 'Y'),
(17, 2, 'tag', 'Y', 'Y', 'Y', 'Y'),
(18, 2, 'pages', 'Y', 'Y', 'Y', 'Y'),
(19, 2, 'library', 'Y', 'Y', 'Y', 'Y'),
(20, 2, 'setting', 'N', 'N', 'N', 'N'),
(21, 2, 'theme', 'N', 'N', 'N', 'N'),
(22, 2, 'menumanager', 'N', 'N', 'N', 'N'),
(23, 2, 'component', 'Y', 'N', 'N', 'N'),
(24, 2, 'user', 'Y', 'N', 'Y', 'N'),
(25, 2, 'comment', 'Y', 'Y', 'Y', 'Y'),
(26, 2, 'gallery', 'Y', 'Y', 'Y', 'Y'),
(27, 2, 'contact', 'Y', 'Y', 'Y', 'Y'),
(28, 2, 'cogen', 'Y', 'Y', 'Y', 'Y'),
(29, 3, 'post', 'Y', 'Y', 'Y', 'Y'),
(30, 3, 'category', 'Y', 'Y', 'Y', 'Y'),
(31, 3, 'tag', 'Y', 'Y', 'Y', 'Y'),
(32, 3, 'pages', 'N', 'N', 'N', 'N'),
(33, 3, 'library', 'N', 'N', 'N', 'N'),
(34, 3, 'setting', 'N', 'N', 'N', 'N'),
(35, 3, 'theme', 'N', 'N', 'N', 'N'),
(36, 3, 'menumanager', 'N', 'N', 'N', 'N'),
(37, 3, 'component', 'N', 'N', 'N', 'N'),
(38, 3, 'user', 'Y', 'N', 'Y', 'N'),
(39, 3, 'comment', 'N', 'N', 'N', 'N'),
(40, 3, 'gallery', 'N', 'N', 'N', 'N'),
(41, 3, 'contact', 'N', 'N', 'N', 'N'),
(42, 3, 'cogen', 'N', 'N', 'N', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
