-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Oca 2024, 21:12:54
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hastane`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appointment`
--

CREATE TABLE `appointment` (
  `app_id` int(10) NOT NULL,
  `app_tarih` date NOT NULL,
  `app_saat` varchar(200) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `appointment`
--

INSERT INTO `appointment` (`app_id`, `app_tarih`, `app_saat`, `doctor_id`, `department_id`, `patient_id`, `status`) VALUES
(1, '2024-01-03', '1', 1, 4, 1, 0),
(2, '2024-01-11', '7', 5, 6, 7, 1),
(3, '2024-01-13', '6', 12, 14, 1, 0),
(4, '2024-01-22', '2', 1, 4, 1, 1),
(5, '2024-01-24', '7', 1, 4, 1, 1),
(6, '2024-01-22', '3', 4, 5, 1, 1),
(7, '2024-01-31', '1', 8, 10, 1, 1),
(8, '2024-02-08', '4', 11, 13, 4, 0),
(10, '2024-02-01', '1', 13, 1, 4, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blood_bank`
--

CREATE TABLE `blood_bank` (
  `blood_group_id` int(11) NOT NULL,
  `blood_group` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `blood_bank`
--

INSERT INTO `blood_bank` (`blood_group_id`, `blood_group`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, '0+'),
(8, '0-');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `department`
--

INSERT INTO `department` (`department_id`, `name`) VALUES
(1, 'Anestezi'),
(2, 'Bakteriyoloji Laboratuvarı'),
(3, 'Psikiyatri'),
(4, 'Estetik Cerrahi'),
(5, 'Nöroloji'),
(6, 'Dermatoloji'),
(7, 'Kardiyoloji'),
(8, 'Dahiliye'),
(9, 'Genel Cerrahi'),
(10, 'Çocuk Hastalıkları'),
(11, 'Endokrin'),
(12, 'Onkoloji'),
(13, 'Kulak Burun Boğaz'),
(14, 'Ortopedi'),
(15, 'Göz Hastalıkarı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `sicil` varchar(100) NOT NULL,
  `fname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `sicil`, `fname`, `lname`, `email`, `password`, `address`, `phone`, `department_id`, `status`) VALUES
(1, '12312334', 'Hasan', 'İnce', 'hasan_ince2@gmail.com', '123456', 'Ankara Çankaya', '3240006965', 4, 1),
(2, '45434323', 'Özge', 'Gölge', 'özge_gölge@gmail.com', '123456', '65 Bloomfield Way', '7777777777', 3, 1),
(3, '56543454', 'Didem', 'Akbaş', 'didem_akbaş@gmail.com', '1234', '15 C Street', '4589998888', 15, 1),
(4, '87676766', 'Ayşe', 'Öncel', 'ayşe_öncel@gmail.com', '123er', '17 Wayback Lane', '3545557777', 5, 1),
(5, '12323434', 'Hüseyin', 'Dalyan', 'hüseyin_dalyan@gmail.com', '34567', '23 Allison Avenue', '8888885547', 6, 1),
(6, '54536789', 'Nezaket', 'Çakır', 'nezaket_çakır@gmail.com', '324234', '24 James Martin Circle', '1458745877', 8, 1),
(7, '98675466', 'Sefa', 'Yüzer', 'sefa_yüzer@gmail.com', 'password34', '19 Ritter Avenue', '7458966666', 9, 0),
(8, '45434567', 'Berra', 'Pehlivanlı', 'berra_pehlivanlı@gmail.com', 'password123', '61 Mudlick Road', '7774445877', 10, 1),
(9, '23454345', 'Erdinç', 'Usta', 'erdinç_usta@gmail.com', 'password', '15 Tator Patch Road', '7415554470', 11, 1),
(10, '67643467', 'Zeynep Ezgi', 'Topçuoğlu', 'zeynep_ezgi@gmail.com', '3453', '28 Harry Place', '4445552210', 12, 0),
(11, '76755789', 'Özlem', 'Durmuş', 'özlem_durmuş@gmail.com', 'password', '79 Wildwood Street', '7850000010', 13, 1),
(12, '55345678', 'Timuçin', 'Gezer', 'timuçin_gezer@gmail.com', '12345', '34 Johnson Street', '7458887777', 14, 1),
(13, '98645678', 'Muzaffer', 'Çetinkor', 'muzaffer_çetinkor@gmail.com', 'password434', '19 Layman Avenue', '7458888888', 1, 1),
(14, '12312332', 'Ali', 'İnce', 'ali_ince@gmail.com', '123', 'Ankara', '5654343377', 1, 1),
(15, '12312339', 'Selin', 'Emir', 'selin_emir@gmail.com', '123', 'Ankara', '5654343350', 14, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `medicine_category_id` int(11) NOT NULL,
  `price` longtext NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `name`, `medicine_category_id`, `price`, `stok`) VALUES
(1, 'Aber C 500', 2, '32', 120),
(2, 'Parol', 3, '44', 68),
(3, 'Arveles', 3, '27', 100),
(7, 'Zinco', 2, '30', 21),
(8, 'Merhem', 1, '25', 57);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `medicine_category`
--

CREATE TABLE `medicine_category` (
  `medicine_category_id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `medicine_category`
--

INSERT INTO `medicine_category` (`medicine_category_id`, `name`, `description`) VALUES
(1, 'Alerji İlaçları', 'Alerji İlaçları'),
(2, 'Vitamin', 'Vitamin Tabletleri'),
(3, 'Ağrı Kesici', 'Ağrı Kesici Tabletleri'),
(4, 'Solunum Yolları İlaçları', 'Solunum hastaları için tablet ilaç veya hava takviyesi'),
(5, 'Dermatolojik İlaçlar', 'Dermatolojik rahatsızlıklar için krem veya tablet ilaçlar '),
(6, 'Onkoloji İlaçları', 'Onkoloji hastaları için ilaçlar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `nurse`
--

CREATE TABLE `nurse` (
  `nurse_id` int(11) NOT NULL,
  `fname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(200) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `nurse`
--

INSERT INTO `nurse` (`nurse_id`, `fname`, `lname`, `email`, `password`, `address`, `phone`, `department_id`, `status`) VALUES
(1, 'Berrak', 'Sarısoy', 'berrak_sarısoy@gmail.com', 'nurse6990', 'Ankara', '3698741258', 1, 1),
(2, 'Ceylan', 'Akhun', 'ceylan_akhun@gmail.com', 'password', '4 Hornor Avenue', '7896547855', 5, 1),
(3, 'Nuray', 'Çiğdem', 'nuray_cigdem@gmail.com', 'password', '84 Elmwood Avenue', '7852221140', 10, 1),
(4, 'Mehmet', 'Uğur', 'mehmet_ugur@gmail.com', 'password', '39 Arron Smith Drive', '4589999980', 5, 0),
(5, 'Derya Pınar', 'Yaylı', 'derya_yaylı@gmail.com', 'password', '32 Jerry Toth Drive', '4587770010', 7, 1),
(6, 'Abdullah', 'Özaslan', 'abdullah_özaslan@gmail.com', 'password', '9 Prospect Street', '7414445870', 12, 1),
(7, 'Aleyna', 'Aktay', 'aleyna_aktay@gmail.com', 'password', '94 Lewis Street', '7896665470', 9, 1),
(18, 'Nuray', 'Tozlu', 'nuray_tozlu@gmailcom', '123', 'Kırıkkale', '5654389353', 11, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `TC` varchar(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` longtext NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birth_date` date NOT NULL,
  `age` int(11) DEFAULT NULL,
  `blood_group` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `patient`
--

INSERT INTO `patient` (`patient_id`, `TC`, `fname`, `lname`, `email`, `password`, `address`, `phone`, `gender`, `birth_date`, `age`, `blood_group`, `status`) VALUES
(1, '16187835380', 'Rana', 'Güldamla', 'rana_güldamla3@gmail.com', '12345', '44 Burton Avenueeee', '2354547878', 'Kadın', '1990-02-10', 34, '1', 1),
(3, '64887440922', 'Ahmet', 'Kayacan', 'ahmet_karacan@gmail.com', '1234', '7775 Alac Avenue', '7450002650', 'Erkek', '1992-02-14', 32, '2', 1),
(4, '93349123004', 'Asuman', 'Tezel', 'asuman_tezel@gmail.com', '1234', '114 Test', '7774441144', 'Kadın', '1997-09-08', 27, '1', 1),
(5, '87720538426', 'Meltem', 'Kankılıç', 'meltem_kanlılıç@gmail.com', '12345', '33 Williams Avenue', '2365554500', 'Kadın', '1996-05-12', 28, '8', 0),
(6, '70985837434', 'Ebru', 'Saltürk', 'ebru_salturk@gmail.com', '123qw', '54 West Drive', '3332221450', 'Kadın', '2001-09-18', 23, '5', 0),
(7, '53855734224', 'Yahya', 'Aktay', 'yahya_aktay@gmail.com', '12qwe3', '54 Tori Lane', '4521216996', 'Erkek', '1992-03-25', 32, '1', 1),
(8, '77881969566', 'Rasim', 'Demirci', 'rasim_demirci@gmail.com', 'password12eds', '2 Webster Street', '3214569999', 'Erkek', '1992-10-27', 32, '3', 1),
(9, '61583651690', 'Sena', 'Başar', 'sena_basar@gmail.com', 'erds23', '94 Stewart Street', '3458887777', 'Kadın', '1993-11-09', 31, '5', 1),
(10, '44801831548', 'Hacı Ömer', 'Berent', 'omer_berent@gmail.com', 'password1234', '10 Twin Oaks Drive', '7850002222', 'Erkek', '2000-10-09', 24, '1', 1),
(11, '95866850692', 'Berkay', 'Yahut', 'berkay_yahut@gmail.com', '123ert', '74 Ruckman Road', '3560001450', 'Erkek', '2003-12-29', 21, '8', 1),
(12, '91028744410', 'Berrin', 'Obay', 'berrin_obay@gmail.com', 'pass1234', '25 Locust Court', '3450001010', 'Kadın', '2000-04-18', 24, '4', 0),
(13, '80452585164', 'Abdulkadir', 'Egehan', 'kadir_egehan@gmail.com', 'password123yugh', '73 Eagles Nest Drive', '7850012457', 'Erkek', '1982-06-23', 42, '3', 1),
(14, '58352408364', 'Nadide', 'Aktürk', 'nadide_akturk@gmail.com', 'pass', '55 Lyndon Street', '32566666660', 'Kadın', '1978-02-15', 46, '1', 1),
(15, '58785095568', 'Bilal', 'Saldıray', 'bilal_saldıray@gmail.com', 'password23', '21 Spinnaker Lane', '4445550012', 'Erkek', '1970-07-07', 54, '8', 1),
(16, '76675838538', 'Baki', 'Sekin', 'baki_sekin@gmail.com', 'password123', '709 Froe Street', '7896547800', 'Erkek', '1989-12-05', 35, '2', 0),
(17, '46171626561', 'Gizem', 'Demir', 'gizem_demir@gmail.com', '1234', 'Kırıkkale', '5443233434', 'Kadın', '1996-10-01', 28, '1', 1),
(18, '12345678912', 'Ayşe Nur', 'İncek', 'ayse_nur@gmail.com', '123', 'Kırıkkale', '5443293430', 'Kadın', '2000-07-13', 24, '3', 1),
(19, '94813018970', 'Selin', 'Akça', 'selin_akca@gmail.com', '123', 'Ankara Çankaya', '5346557612', 'Kadın', '2000-11-15', 24, '6', 1);

--
-- Tetikleyiciler `patient`
--
DELIMITER $$
CREATE TRIGGER `add_age` BEFORE INSERT ON `patient` FOR EACH ROW BEGIN
  DECLARE birth_date DATE;
  DECLARE age INT(11);
  SET age = YEAR(CURRENT_DATE()) - YEAR(birth_date);
  SET NEW.age = age;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

CREATE TABLE `personel` (
  `personel_id` int(11) NOT NULL,
  `sicil` varchar(100) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`personel_id`, `sicil`, `fname`, `lname`, `email`, `password`, `status`) VALUES
(1, '98766543', 'Zehra', 'Tınaz', 'zehra_tınaz2@gmail.com', '123', 1),
(2, '98766534', 'Turgay', 'Pekcan', 'turgay_pekcan@gmail.com', '123', 1),
(3, '23256787', 'Ayça', 'Uçan', 'ayca_ucan@gmail.com', '1234', 1),
(4, '45469098', 'Kerim', 'Sönmez', 'kerim_sönmez@gmail.com', '123', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `recete`
--

CREATE TABLE `recete` (
  `recete_id` int(10) NOT NULL,
  `medicine_category_id` int(10) NOT NULL,
  `medicine_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `description` text NOT NULL,
  `app_id` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `recete`
--

INSERT INTO `recete` (`recete_id`, `medicine_category_id`, `medicine_id`, `patient_id`, `doctor_id`, `description`, `app_id`, `status`) VALUES
(17, 2, 7, 1, 1, 'vitamin eksikliği', 1, 1),
(18, 3, 2, 1, 12, 'eklem ağrısı', 3, 0),
(28, 3, 2, 4, 11, 'nezle', 8, 1);

--
-- Tetikleyiciler `recete`
--
DELIMITER $$
CREATE TRIGGER `MedicineStokAzalt` AFTER INSERT ON `recete` FOR EACH ROW UPDATE medicine SET stok = stok - 1 where medicine_id = NEW.medicine_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ReceteyiPasifeCek` AFTER INSERT ON `recete` FOR EACH ROW UPDATE appointment SET status = 0 where app_id = NEW.app_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `saatler`
--

CREATE TABLE `saatler` (
  `saat_id` int(10) NOT NULL,
  `saat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `saatler`
--

INSERT INTO `saatler` (`saat_id`, `saat`) VALUES
(1, '09:00-10:00'),
(2, '10:00-11:00'),
(3, '11:00-12:00'),
(4, '13:00-14:00'),
(5, '14:00-15:00'),
(6, '15:00-16:00'),
(7, '16:00-17:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_id`);

--
-- Tablo için indeksler `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`blood_group_id`);

--
-- Tablo için indeksler `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Tablo için indeksler `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Tablo için indeksler `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Tablo için indeksler `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`medicine_category_id`);

--
-- Tablo için indeksler `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nurse_id`);

--
-- Tablo için indeksler `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Tablo için indeksler `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`personel_id`);

--
-- Tablo için indeksler `recete`
--
ALTER TABLE `recete`
  ADD PRIMARY KEY (`recete_id`);

--
-- Tablo için indeksler `saatler`
--
ALTER TABLE `saatler`
  ADD PRIMARY KEY (`saat_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `blood_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tablo için AUTO_INCREMENT değeri `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `medicine_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `nurse`
--
ALTER TABLE `nurse`
  MODIFY `nurse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `personel`
--
ALTER TABLE `personel`
  MODIFY `personel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `recete`
--
ALTER TABLE `recete`
  MODIFY `recete_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `saatler`
--
ALTER TABLE `saatler`
  MODIFY `saat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
