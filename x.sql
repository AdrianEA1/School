-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: school
-- ------------------------------------------------------
-- Server version	10.11.6-MariaDB-0+deb12u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendances_student_id_foreign` (`student_id`),
  CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendances`
--

LOCK TABLES `attendances` WRITE;
/*!40000 ALTER TABLE `attendances` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `grado` char(1) NOT NULL,
  `grupo` char(1) NOT NULL,
  `id_school` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_grupo_unique` (`grupo`),
  KEY `groups_id_school_foreign` (`id_school`),
  CONSTRAINT `groups_id_school_foreign` FOREIGN KEY (`id_school`) REFERENCES `schools` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000001_create_cache_table',1),
(2,'0001_01_01_000002_create_jobs_table',1),
(3,'2024_10_03_025525_create_schools_table',1),
(4,'2024_10_03_030233_create_roles_table',1),
(5,'2024_10_03_033623_create_groups_table',1),
(6,'2024_10_03_042252_create_users_table',1),
(7,'2024_10_03_202807_create_students_table',2),
(8,'2024_10_04_014445_create_reports_table',2),
(9,'2024_10_04_025543_create_attendances_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `maestro` char(50) NOT NULL,
  `tipo` char(30) NOT NULL,
  `fecha` date NOT NULL,
  `motivo` char(150) NOT NULL,
  `confirmacion` tinyint(1) NOT NULL DEFAULT 0,
  `student_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_student_id_foreign` (`student_id`),
  CONSTRAINT `reports_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rol` char(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES
(1,'Admin',NULL,NULL),
(2,'Tutor',NULL,NULL),
(3,'Prefecto',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schools` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cct` char(10) NOT NULL,
  `nombre` char(80) NOT NULL,
  `direccion` char(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schools`
--

LOCK TABLES `schools` WRITE;
/*!40000 ALTER TABLE `schools` DISABLE KEYS */;
/*!40000 ALTER TABLE `schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` char(50) NOT NULL,
  `apellido_paterno` char(50) DEFAULT NULL,
  `apellido_materno` char(50) DEFAULT NULL,
  `group_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_group_id_foreign` (`group_id`),
  KEY `students_user_id_foreign` (`user_id`),
  CONSTRAINT `students_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `clave` char(30) NOT NULL,
  `nombre` char(50) NOT NULL,
  `apellido_paterno` char(50) DEFAULT NULL,
  `apellido_materno` char(50) DEFAULT NULL,
  `email` char(80) DEFAULT NULL,
  `telefono` char(12) NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'aL2{/pXL','Rabbi','Sockell','Kirsopp','rkirsopp0@pen.io','946-526-5368',2,NULL,NULL),
(2,'xK1}0~LQ/Gauc','Cicily','Parlatt','Schultheiss','cschultheiss1@mtv.com','611-398-1460',2,NULL,NULL),
(3,'uZ4,,Cgob','Frannie','Gatch','Pochon','fpochon2@phpbb.com','684-385-1312',3,NULL,NULL),
(4,'qZ6\'s>gaWN>6bNu<','Starlin','Storrar','Charters','scharters3@state.tx.us','510-136-8867',1,NULL,NULL),
(5,'gU5\"%lcs','Bradly','Ast','Grebert','bgrebert4@myspace.com','761-376-1652',3,NULL,NULL),
(6,'lH8+aig=d1Y!(OG','Jonas','Rosengren','Ledrane','jledrane5@usgs.gov','467-143-3809',2,NULL,NULL),
(7,'vT6?r\"/$\"w','Kaylee','Nuth','Broggini','kbroggini6@utexas.edu','596-878-1743',3,NULL,NULL),
(8,'yW6<pl1Ndrrqm}Z5','Mozelle','Yerson','Pentercost','mpentercost7@cbsnews.com','649-418-8504',3,NULL,NULL),
(9,'oX5/@Og&%','Bryon','Anders','Meagher','bmeagher8@gnu.org','319-143-8371',1,NULL,NULL),
(10,'eV5{p|oepTR','Connie','Palfery','Elesander','celesander9@feedburner.com','464-637-0156',3,NULL,NULL),
(11,'xY6,u|`ZRUl','Lindy','Vosper','Nazaret','lnazareta@mapquest.com','575-379-9587',3,NULL,NULL),
(12,'kZ2_3<}!\"@I>L','Inglebert','Darnody','Alston','ialstonb@blogtalkradio.com','977-219-6921',3,NULL,NULL),
(13,'dR9#)d_V$4`','Erroll','Thurnham','Tooth','etoothc@pinterest.com','998-363-7772',2,NULL,NULL),
(14,'bO4,tbXm}wv?Iet','Sascha','Elsmere','Dobell','sdobelld@i2i.jp','312-896-5347',3,NULL,NULL),
(15,'zD8~SnX$$$a0','Lisbeth','Flecknell','Attrey','lattreye@slashdot.org','760-870-9730',3,NULL,NULL),
(16,'oU4~rM5R4kZ7Q(s','Merle','Ruane','Davitti','mdavittif@bravesites.com','227-979-1252',3,NULL,NULL),
(17,'hJ1\'7tWI*lsNv','Gary','Masser','Garralts','ggarraltsg@amazon.co.uk','242-673-7755',1,NULL,NULL),
(18,'rW3`F9T\'?','Andeee','Wiltsher','Napper','anapperh@theatlantic.com','449-659-2895',3,NULL,NULL),
(19,'bN5\'$(Os|@h2B@/P','Kendell','Preist','Stellino','kstellinoi@yahoo.co.jp','793-877-0248',2,NULL,NULL),
(20,'qK8@R5%}Fy#+h3N','Evonne','Gawthrop','Andrault','eandraultj@hugedomains.com','492-207-0468',3,NULL,NULL),
(21,'iN9\"3(UTeY','Kym','Joisce','Cupitt','kcupittk@msu.edu','513-353-3997',3,NULL,NULL),
(22,'nB7$ye.B','Sinclair','Stanyer','Cowdry','scowdryl@storify.com','789-466-1716',3,NULL,NULL),
(23,'mC7{KBGT6$b%fB@','Paulo','Ruddle','Humpage','phumpagem@blogspot.com','127-998-1956',1,NULL,NULL),
(24,'qF7!kqx<{5Eh','Moselle','Leuren','McCarly','mmccarlyn@sbwire.com','512-169-6123',2,NULL,NULL),
(25,'gN8&p~S\"uipK6f5','Xaviera','Brechin','Farrer','xfarrero@craigslist.org','625-932-4235',3,NULL,NULL),
(26,'pN8~+*\"rK','Nestor','Plenty','Jenney','njenneyp@engadget.com','727-971-2184',2,NULL,NULL),
(27,'zI0=e$rXKc','Sal','Matzkaitis','Blay','sblayq@redcross.org','357-245-4392',3,NULL,NULL),
(28,'wT4@v<$4(|OX','Elnore','Chipman','Mulvey','emulveyr@psu.edu','251-527-8179',3,NULL,NULL),
(29,'bX3@r9oF@','Mikael','Josifovitz','Renton','mrentons@home.pl','178-478-6907',1,NULL,NULL),
(30,'xD7<YUJB8/7','Torie','Kirmond','Walters','twalterst@rediff.com','362-431-5817',3,NULL,NULL),
(31,'iS3{u+Fbdu','Claus','Luety','Quenell','cquenellu@state.gov','190-965-7941',1,NULL,NULL),
(32,'pR7(R\'=xdj1r)r','Ellissa','Cruse','Tumasian','etumasianv@earthlink.net','300-788-4374',2,NULL,NULL),
(33,'nM4`UEjOs@J','Ximenez','Utridge','Brodie','xbrodiew@webs.com','646-287-6736',2,NULL,NULL),
(34,'kM8/4{L!wd=tooHB','Keary','Zamorano','Norrie','knorriex@drupal.org','867-115-4602',1,NULL,NULL),
(35,'kT4/LqgM1cEZ','Ezekiel','Sothern','Alvarado','ealvaradoy@is.gd','106-769-9653',3,NULL,NULL),
(36,'yB7*XLLoQ8iX1#P','Harry','Cosgriff','Epps','heppsz@tiny.cc','290-402-3293',3,NULL,NULL),
(37,'yQ7>txp','Rodina','Ramsbottom','Sussans','rsussans10@bigcartel.com','685-907-7127',3,NULL,NULL),
(38,'vX6}=D#U&JU?eo9j','Benetta','McAsgill','Culligan','bculligan11@tinypic.com','840-503-5095',3,NULL,NULL),
(39,'uT7,Au(8n!`M','Pavla','Gavrieli','Ebbage','pebbage12@nba.com','605-112-1680',2,NULL,NULL),
(40,'mP8%.N.NEg$Y>c','Sella','Nower','Dodworth','sdodworth13@netlog.com','725-947-1118',2,NULL,NULL),
(41,'fJ5}D.Z4xtJVx7','Dasi','Peeters','Shurrocks','dshurrocks14@ezinearticles.com','733-210-2673',3,NULL,NULL),
(42,'kV9\"my%d(@','Barby','Bilbrooke','Smidmore','bsmidmore15@cyberchimps.com','603-689-3956',1,NULL,NULL),
(43,'vX5{.)<vashQ','Gorden','Annon','Pagden','gpagden16@feedburner.com','332-351-2293',3,NULL,NULL),
(44,'mU2|\">Y}=FUE','Adella','Milington','MacSporran','amacsporran17@ehow.com','504-463-6022',3,NULL,NULL),
(45,'sN6&0&p~Z.OO0(0','Olav','Brayley','Bellelli','obellelli18@census.gov','248-917-3097',3,NULL,NULL),
(46,'fE0=G8\'o','Kelsey','Thaxton','Durnin','kdurnin19@fotki.com','767-838-1806',3,NULL,NULL),
(47,'gE3?y33elM2m_a','Livia','Blything','Warriner','lwarriner1a@walmart.com','272-546-6897',2,NULL,NULL),
(48,'iC0=reHh','Pebrook','Aiton','McIntosh','pmcintosh1b@blogs.com','506-471-0128',1,NULL,NULL),
(49,'wR4.#OZw8F$b','Debora','Prettejohns','Gerleit','dgerleit1c@chronoengine.com','862-707-8174',2,NULL,NULL),
(50,'eP8@$i2,>o19#','Etti','Whiley','Cready','ecready1d@springer.com','355-682-2852',2,NULL,NULL),
(51,'rK9}~O/YvC630F,','Stefa','Kinlock','Triswell','striswell1e@wisc.edu','905-120-2196',2,NULL,NULL),
(52,'xR0\"RMuY','Juliet','Lowthian','Saller','jsaller1f@pagesperso-orange.fr','865-588-8472',3,NULL,NULL),
(53,'vN8)z&1P!8<<Bg','Tymothy','Bunney','Clark','tclark1g@discuz.net','956-123-3950',2,NULL,NULL),
(54,'hD0&H$EIQST0ID','Braden','MacGruer','Dulton','bdulton1h@soundcloud.com','889-174-5162',1,NULL,NULL),
(55,'tC2=2<4kx/ifiVG','Kristo','Ferretti','Dono','kdono1i@vkontakte.ru','435-762-3413',3,NULL,NULL),
(56,'zP9`2c4%>n2WnF+','Bevan','Angeau','Dudenie','bdudenie1j@lulu.com','301-859-4173',3,NULL,NULL),
(57,'rH9*1LE{p_xy','Viviene','Warry','Bicknell','vbicknell1k@ask.com','975-170-2903',2,NULL,NULL),
(58,'uQ3=uftn/(','Darya','Hewkin','Cringle','dcringle1l@apple.com','448-388-9361',2,NULL,NULL),
(59,'zK8,F+njNSiY','Kiel','Wolfer','Shakeshaft','kshakeshaft1m@360.cn','177-749-4588',3,NULL,NULL),
(60,'cO8+Fl\"9X5iyGbF>','Gerhardine','Alsina','Casbolt','gcasbolt1n@businessweek.com','771-352-7460',1,NULL,NULL),
(61,'kA4\'G@y}orOIpJ','Moore','Yvens','Suff','msuff1o@oracle.com','666-121-9933',3,NULL,NULL),
(62,'xG5(gPj3T','Annabela','Welbelove','Coldicott','acoldicott1p@omniture.com','645-115-9898',2,NULL,NULL),
(63,'gM9>43Mp#I','Annemarie','Wattinham','Manuele','amanuele1q@intel.com','271-681-8037',1,NULL,NULL),
(64,'nN3*X<}{','Dorice','Yann','McDermid','dmcdermid1r@chronoengine.com','317-659-2829',3,NULL,NULL),
(65,'tY9?hiPN','Weylin','Farmar','Bartocci','wbartocci1s@privacy.gov.au','209-929-8053',1,NULL,NULL),
(66,'fU3<OKEjpBjAi/YN','Alberik','Halm','McGiffin','amcgiffin1t@wordpress.org','105-883-1534',2,NULL,NULL),
(67,'tC9#w.q5B','Nona','Creswell','Steptow','nsteptow1u@dmoz.org','759-664-9964',1,NULL,NULL),
(68,'iH3_%Ii`wW','Barbee','Frontczak','Dory','bdory1v@nsw.gov.au','442-165-0811',3,NULL,NULL),
(69,'zS9(\"WL(,O#u$','Alyson','Duffer','Duddy','aduddy1w@mit.edu','244-206-8439',2,NULL,NULL),
(70,'gS1=EZ1=AE6TXH8X','Regen','Glenwright','Godsmark','rgodsmark1x@oakley.com','475-672-9118',1,NULL,NULL),
(71,'eM7$,9v+','Cindie','Algeo','O\'Doireidh','codoireidh1y@berkeley.edu','396-762-0060',3,NULL,NULL),
(72,'kH7*?P57j|`Nd\"','Germain','Tellenbroker','McManamen','gmcmanamen1z@ovh.net','908-918-4627',3,NULL,NULL),
(73,'qZ8}a+8Fx=p)','Allie','Lapidus','O\' Kelleher','aokelleher20@usatoday.com','983-221-9044',1,NULL,NULL),
(74,'bT4/EE\"MF*jYP','Tally','Rushforth','Rogister','trogister21@sbwire.com','182-240-9332',3,NULL,NULL),
(75,'zO0&c4Kz+$@`I','Jeanie','Keatch','Vickars','jvickars22@uol.com.br','133-324-5969',1,NULL,NULL),
(76,'tI1<rbP3','Bibbye','Itshak','Stammirs','bstammirs23@comsenz.com','415-360-8851',2,NULL,NULL),
(77,'dF9&go?pXi','Shaun','Burr','Balke','sbalke24@ihg.com','514-741-9358',1,NULL,NULL),
(78,'sS4~KVURF','Simone','Midgley','Gurg','sgurg25@utexas.edu','558-474-7922',3,NULL,NULL),
(79,'eI9%j!kiF<~9>Z18','Annie','Ranking','Coldtart','acoldtart26@over-blog.com','242-326-5620',1,NULL,NULL),
(80,'pZ4+h\'!HQP\n&','Selina','Carwardine','Edgeson','sedgeson27@booking.com','754-485-7408',2,NULL,NULL),
(81,'wC6/k|.#.fV','Haily','Gutans','Alvey','halvey28@paypal.com','585-322-7662',2,NULL,NULL),
(82,'bD8\'p*w/v\"\0wR','Vincent','Heighton','Drane','vdrane29@squidoo.com','617-313-7510',3,NULL,NULL),
(83,'cA8/f&ve@IV?`_W!','Halimeda','Gaukroger','Nerne','hnerne2a@digg.com','748-752-5001',3,NULL,NULL),
(84,'oE8<Whkf/ELX','Milli','Kohtler','Brumen','mbrumen2b@ucsd.edu','353-389-4384',2,NULL,NULL),
(85,'zZ4<.J9y}bscMOz','Ring','Scotchforth','Girvan','rgirvan2c@imageshack.us','972-356-5735',1,NULL,NULL),
(86,'rA6<E}F46KI','Andres','Bulstrode','Pelchat','apelchat2d@amazonaws.com','527-371-2676',2,NULL,NULL),
(87,'pF9$jG{yiUA','Dallis','Dixson','MacGovern','dmacgovern2e@java.com','438-645-3459',1,NULL,NULL),
(88,'lA4|Ik&W_u/huump','Elmore','McCann','Pourveer','epourveer2f@hc360.com','226-643-9577',2,NULL,NULL),
(89,'fU8!_0L\'9<','Benson','Antonutti','Robinett','brobinett2g@etsy.com','303-988-6585',1,NULL,NULL),
(90,'fN4\"\'&b)5gUh','Estrella','Vedeneev','Hum','ehum2h@booking.com','266-308-8076',2,NULL,NULL),
(91,'uS1<76StkN9<x|+','Laurie','Ludy','Swatheridge','lswatheridge2i@china.com.cn','897-560-8379',2,NULL,NULL),
(92,'iQ3|hNEjM','Odelle','Whiteman','Stratz','ostratz2j@barnesandnoble.com','886-387-0917',3,NULL,NULL),
(93,'sN5%pG(zvk+8C@','Lorant','Danes','Conybear','lconybear2k@accuweather.com','882-974-9328',3,NULL,NULL),
(94,'nU4$1IhMN\"gNncZ','Jobyna','Mease','Rivalland','jrivalland2l@forbes.com','945-951-8323',3,NULL,NULL),
(95,'lU9=r/VkCo/9@','Elton','Stapleford','Franzoli','efranzoli2m@go.com','661-135-7605',2,NULL,NULL),
(96,'eT4|{/qh','Becka','Landrean','Hutfield','bhutfield2n@e-recht24.de','696-907-7814',2,NULL,NULL),
(97,'nC9.=8yob','Trumann','Tregust','McKirdy','tmckirdy2o@ameblo.jp','174-264-3130',3,NULL,NULL),
(98,'iE8%t@F!Zs&dx','Almeria','Rogger','Ham','aham2p@cnbc.com','821-271-5882',2,NULL,NULL),
(99,'bI7{J{`LI','Alonso','Cockling','Pauletto','apauletto2q@dot.gov','417-226-8108',2,NULL,NULL),
(100,'yL5$u\'`Fw?JWRG','Ian','Chastel','Connett','iconnett2r@mysql.com','227-527-8659',2,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-13 19:20:41
