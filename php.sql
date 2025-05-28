-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: 28 مايو 2025 الساعة 19:41
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php`
--

-- --------------------------------------------------------

--
-- بنية الجدول `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(11) NOT NULL,
  `BookingName` varchar(30) NOT NULL,
  `BookingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `BookingTime` time NOT NULL,
  `BookingDetail` text NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `ServicesID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BookingState` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `booking`
--

INSERT INTO `booking` (`BookingID`, `BookingName`, `BookingDate`, `BookingTime`, `BookingDetail`, `DoctorID`, `ServicesID`, `UserID`, `BookingState`) VALUES
(71, 'عز', '2025-05-23 21:00:00', '03:02:00', 'لا  يوجد', 7, 20, 2, 0),
(73, 'حمدي سعيد', '2025-05-23 21:00:00', '00:00:00', 'لا يوجد وصف معين', 9, 22, 2, 0),
(77, 'عاصم السبئي', '2025-05-30 21:00:00', '15:30:00', 'تلميع اسناني', 5, 21, 2, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Upload_path` varchar(255) NOT NULL,
  `specialty` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `experience` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `Upload_path`, `specialty`, `description`, `education`, `experience`) VALUES
(1, 'كريم خالد سرور', 'Upload/9.webp', 'اختصاصي علاج الجذور', 'د. كريم خالد سرور استشاري زراعة وتجميل أسنان يتمتع بخبرة واسعة في مجال التركيبات السنية وزراعة الأسنان، ويقدم خدمات عالية الجودة باستخدام أحدث التقنيات في طب الأسنان التجميلي وتأهيل الفك، ويُعد افضل دكتور تجميل اسنان بالرياض كما أنه أفضل دكتور زراعة اسنان بالرياض أيضًا، مما يضمن أفضل النتائج لمرضاه', 'دكتوراه في طب الأسنان التجميلي', 'خبرة 15 سنة في زراعة وتجميل الأسنان'),
(5, 'عمرو حامد', 'upload/21.webp', 'اختصاصي علاج الجذور', ' د. عمرو حامد متخصص في علاج الجذور بدقة عالية، ولديه خبرة طويلة في التعامل مع المرضى ويهتم بتقديم تجربة طبية مريحة.\r\n', 'ماجستير في علاج جذور الأسنان', '\'خبرة 10 سنوات في علاج الجذور'),
(6, 'مجدي الدين محمود', 'upload/25.webp', 'أخصائي طب الأسنان التجميلي', ' \'البروفيسور أ.د مجدي الدين محمود يعد من الكفاءات البارزة في مجال التعويضات السنية وزراعة الأسنان ويُعد افضل دكتور زراعة أسنان في الرياض، هو استشاري اسنان يمتلك خبرة واسعة ومؤهلات علمية متقدمة، يسعى دائمًا لتقديم أفضل الخدمات الطبية والتعليمية لخدمة المجتمع الطبي في المملكة العربية السعودية وبالتحديد في عيادة البروفيسور بالرياض.\',\r\n', 'بروفيسور في التعويضات السنية', '\'خبرة 20 سنة في زراعة الأسنان'),
(7, 'خالد عزوز', 'upload/101.webp', '\'اختصاصي جراحة الفم', ' \'اخصائي طب أسنان الأسرة عضو الجمعية السعودية لطب الأسنان خبرة أكثر من ١٥ عام في تجميل الأسنان ماستر في علاج الجذور والأعصاب. بورد طب أسنان الأسرة.\',\r\n', ' \'بورد طب أسنان الأسرة\',\r\n', '\'خبرة 15 سنة في تجميل الأسنان'),
(8, 'ديما الفيصل', 'upload/24.webp', 'طب الأسنان العام\',', ' \'د. ديما الفيصل خبيرة في طب الأسنان العام، ولديها أسلوب مريح في التعامل مع المرضى، وتستخدم تقنيات متطورة.\',\r\n', '\'دكتوراه في طب الأسنان العام', '\'خبرة 8 سنوات في طب الأسنان العام'),
(9, 'محمد سعد الغامدي', 'upload/401.png', '\'استشاري تركيبات سنية', ' \'استشاري تركيبات سنية بخبرة طويلة، حاصل على عدة شهادات محلية وعالمية، ويقدم أفضل حلول التعويضات السنية.\',\r\n', 'زمالة في التركيبات السنية', '\'خبرة 12 سنة في التركيبات السنية'),
(10, 'محمد أحمد المطيري', 'upload/1-1.webp', '\'تقويم الأسنان', ' \'د. محمد احمدالمطري يعتبر من الأطباء المتميزين في مجال علاج جذور الأسنان و استشاري اعصاب اسنان، فهو حاصل على شهادة البورد السعودي في علاج جذور الأسنان وهو من أفضل استشاريين اعصاب الاسنان بالرياض، يقدم خدمات متخصصة باستخدام أحدث التقنيات والمعايير الطبية العالية في عيادة البروفيسور، مما يساعد في تقديم رعاية شاملة وفعالة للمرضى\',\r\n', ' \'بورد سعودي في علاج الجذور\',\r\n', 'خبرة 11 سنة في علاج الجذور'),
(11, 'عبدالله السعد', 'upload/201.png', 'زراعة الأسنان', ' \'خبير زراعة الأسنان بأحدث الأجهزة وطرق الزرع الرقمية، ويملك سجلًا ناجحًا في زراعة الأسنان.\',\r\n', '\'زمالة في زراعة الأسنان', '\'خبرة 14 سنة في زراعة الأسنان'),
(12, 'رغد الفيصل', 'upload/701.png', '\'اختصاصي تقويم الأسنان\'', ' \'اختصاصية تقويم الأسنان للأطفال والبالغين، تهتم بتصميم الابتسامة وتستخدم أحدث أدوات التقويم.\',\r\n', 'تخصص في تقويم الأسنان', 'خبرة 9 سنوات في تقويم الأسنان'),
(13, 'M', 'upload/23.webp', 'M', 'SDFGH', 'GGG', 'YYYY');

-- --------------------------------------------------------

--
-- بنية الجدول `our_work`
--

CREATE TABLE `our_work` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `services`
--

CREATE TABLE `services` (
  `ServicesID` int(11) NOT NULL,
  `ServicesName` varchar(50) NOT NULL,
  `ServicesImge` text NOT NULL,
  `ServicesDetail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `services`
--

INSERT INTO `services` (`ServicesID`, `ServicesName`, `ServicesImge`, `ServicesDetail`) VALUES
(20, 'حشوة', '../Upload/زراعة-الأسنان.webp', 'لا يوجد وصف معين'),
(21, 'معاينة', '../Upload/علاج-اللثة-قص-اللثة-بالليزر (1).webp', 'لا يوجد وصف معين'),
(22, 'خلع اضراس', '../Upload/تنزيل (1).jpg', 'لا يوجد وصف معين'),
(23, 'تلميع اسنان', '../Upload/43.jpeg', 'لتصبح اسنانك ناصعة البياض معنا  نقدم خدمة ...');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `UserType` int(11) NOT NULL DEFAULT 0,
  `FullName` varchar(50) NOT NULL,
  `Imge` text NOT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `UserType`, `FullName`, `Imge`, `CreateDate`) VALUES
(1, 'azadeen', 'azadeen', 0, 'عزالدين السبئي', '../Upload/2025-05-16-091144.png', '2025-05-18 19:04:23'),
(2, 'Admin', 'Admin', 1, 'المدير', 'لا يوجد', '2025-05-22 17:17:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `ServicesID` (`ServicesID`),
  ADD KEY `booking_ibfk_1` (`UserID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_work`
--
ALTER TABLE `our_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ServicesID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `our_work`
--
ALTER TABLE `our_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ServicesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
