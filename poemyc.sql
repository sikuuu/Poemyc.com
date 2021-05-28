-- MySQL dump 10.17  Distrib 10.3.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: poemyc
-- ------------------------------------------------------
-- Server version	10.3.25-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `activitat_coments`
--

DROP TABLE IF EXISTS `activitat_coments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activitat_coments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `comentari_id` bigint(20) unsigned NOT NULL,
  `article_id` bigint(20) unsigned NOT NULL,
  `creador_id` bigint(20) unsigned NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `activitat_coments_user_id_foreign` (`user_id`),
  KEY `activitat_coments_comentari_id_foreign` (`comentari_id`),
  KEY `activitat_coments_article_id_foreign` (`article_id`),
  KEY `activitat_coments_creador_id_foreign` (`creador_id`),
  CONSTRAINT `activitat_coments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `activitat_coments_comentari_id_foreign` FOREIGN KEY (`comentari_id`) REFERENCES `comentaris` (`id`) ON DELETE CASCADE,
  CONSTRAINT `activitat_coments_creador_id_foreign` FOREIGN KEY (`creador_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `activitat_coments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activitat_coments`
--

LOCK TABLES `activitat_coments` WRITE;
/*!40000 ALTER TABLE `activitat_coments` DISABLE KEYS */;
INSERT INTO `activitat_coments` VALUES (1,3,10,28,3,'comentar','2021-05-27 10:51:30'),(2,6,11,27,3,'comentar','2021-05-27 10:51:41'),(3,12,12,40,12,'comentar','2021-05-27 14:15:45'),(4,16,13,1,1,'comentar','2021-05-27 15:26:29');
/*!40000 ALTER TABLE `activitat_coments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activitat_likes`
--

DROP TABLE IF EXISTS `activitat_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activitat_likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `article_id` bigint(20) unsigned NOT NULL,
  `creador_id` bigint(20) unsigned NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `activitat_likes_user_id_foreign` (`user_id`),
  KEY `activitat_likes_article_id_foreign` (`article_id`),
  KEY `activitat_likes_creador_id_foreign` (`creador_id`),
  CONSTRAINT `activitat_likes_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `activitat_likes_creador_id_foreign` FOREIGN KEY (`creador_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `activitat_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activitat_likes`
--

LOCK TABLES `activitat_likes` WRITE;
/*!40000 ALTER TABLE `activitat_likes` DISABLE KEYS */;
INSERT INTO `activitat_likes` VALUES (1,1,30,6,'like','2021-05-26 23:25:22'),(2,1,30,6,'dislike','2021-05-26 23:25:26'),(3,1,30,6,'like','2021-05-27 02:48:29'),(4,1,30,6,'dislike','2021-05-27 02:48:30'),(5,1,30,6,'like','2021-05-27 02:48:31'),(6,1,31,6,'dislike','2021-05-27 02:48:36'),(7,1,30,6,'dislike','2021-05-27 02:49:29'),(8,1,30,6,'like','2021-05-27 02:49:29'),(9,1,30,6,'dislike','2021-05-27 02:49:29'),(10,1,30,6,'like','2021-05-27 02:49:30'),(11,1,30,6,'dislike','2021-05-27 02:49:30'),(12,1,30,6,'like','2021-05-27 02:49:30'),(13,1,30,6,'dislike','2021-05-27 02:49:30'),(14,1,30,6,'like','2021-05-27 02:49:31'),(15,1,30,6,'dislike','2021-05-27 02:49:31'),(16,1,30,6,'like','2021-05-27 02:49:31'),(17,1,30,6,'dislike','2021-05-27 02:49:31'),(18,1,30,6,'like','2021-05-27 02:49:31'),(19,1,30,6,'dislike','2021-05-27 02:49:31'),(20,1,30,6,'like','2021-05-27 02:49:32'),(21,1,30,6,'dislike','2021-05-27 02:49:32'),(22,1,30,6,'like','2021-05-27 02:49:32'),(23,1,30,6,'dislike','2021-05-27 02:49:32'),(24,1,30,6,'like','2021-05-27 02:49:32'),(25,1,30,6,'dislike','2021-05-27 02:49:33'),(26,1,30,6,'like','2021-05-27 02:49:33'),(27,1,30,6,'dislike','2021-05-27 02:49:33'),(28,1,30,6,'like','2021-05-27 02:49:34'),(29,1,25,1,'like','2021-05-27 03:41:43'),(30,1,25,1,'dislike','2021-05-27 03:41:44'),(31,1,25,1,'like','2021-05-27 03:41:46'),(32,1,25,1,'dislike','2021-05-27 03:41:47'),(33,1,25,1,'like','2021-05-27 04:22:58'),(34,1,25,1,'dislike','2021-05-27 04:22:59'),(35,6,41,13,'like','2021-05-27 10:28:31'),(36,3,41,13,'like','2021-05-27 10:30:57'),(37,6,36,3,'like','2021-05-27 10:31:07'),(38,3,28,3,'like','2021-05-27 10:52:29'),(39,3,28,3,'dislike','2021-05-27 10:52:29'),(40,12,36,3,'like','2021-05-27 14:22:03'),(41,12,25,1,'dislike','2021-05-28 00:18:03'),(42,12,1,1,'like','2021-05-28 00:18:57'),(43,12,36,3,'dislike','2021-05-28 00:19:03'),(44,12,27,3,'like','2021-05-28 00:19:27'),(45,12,25,1,'like','2021-05-28 00:51:14');
/*!40000 ALTER TABLE `activitat_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activitat_plans`
--

DROP TABLE IF EXISTS `activitat_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activitat_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `article_id` bigint(20) unsigned NOT NULL,
  `plan_id` bigint(20) unsigned NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `activitat_plans_user_id_foreign` (`user_id`),
  KEY `activitat_plans_article_id_foreign` (`article_id`),
  KEY `activitat_plans_plan_id_foreign` (`plan_id`),
  CONSTRAINT `activitat_plans_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `activitat_plans_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `activitat_plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activitat_plans`
--

LOCK TABLES `activitat_plans` WRITE;
/*!40000 ALTER TABLE `activitat_plans` DISABLE KEYS */;
INSERT INTO `activitat_plans` VALUES (1,1,25,2,'añadido','2021-05-26 23:25:38'),(2,1,25,21,'añadido','2021-05-26 23:25:43'),(3,1,25,21,'quitado','2021-05-26 23:25:45'),(4,1,25,2,'quitado','2021-05-26 23:25:46'),(5,1,2,21,'quitado','2021-05-26 23:25:50'),(6,1,25,2,'añadido','2021-05-26 23:31:42'),(7,12,40,18,'quitado','2021-05-27 14:20:37'),(8,12,40,18,'añadido','2021-05-27 14:20:37'),(9,12,39,18,'quitado','2021-05-27 14:20:40'),(10,12,39,18,'añadido','2021-05-27 14:20:40');
/*!40000 ALTER TABLE `activitat_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activitat_subs`
--

DROP TABLE IF EXISTS `activitat_subs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activitat_subs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `plan_id` bigint(20) unsigned NOT NULL,
  `creador_id` bigint(20) unsigned NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `activitat_subs_user_id_foreign` (`user_id`),
  KEY `activitat_subs_plan_id_foreign` (`plan_id`),
  KEY `activitat_subs_creador_id_foreign` (`creador_id`),
  CONSTRAINT `activitat_subs_creador_id_foreign` FOREIGN KEY (`creador_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `activitat_subs_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `activitat_subs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activitat_subs`
--

LOCK TABLES `activitat_subs` WRITE;
/*!40000 ALTER TABLE `activitat_subs` DISABLE KEYS */;
INSERT INTO `activitat_subs` VALUES (1,1,9,6,'suscrito','2021-05-26 23:26:14'),(2,1,2,1,'borrado','2021-05-27 01:01:08'),(3,1,8,6,'borrado','2021-05-27 01:01:09'),(4,1,9,6,'borrado','2021-05-27 01:01:10'),(5,1,9,6,'suscrito','2021-05-27 02:43:56'),(6,1,8,6,'suscrito','2021-05-27 02:43:57'),(7,3,2,1,'suscrito','2021-05-27 05:13:34'),(8,3,2,1,'borrado','2021-05-27 10:22:44'),(9,6,19,13,'suscrito','2021-05-27 10:28:18'),(10,3,19,13,'suscrito','2021-05-27 10:30:34'),(11,6,7,3,'suscrito','2021-05-27 10:30:41'),(12,6,17,3,'suscrito','2021-05-27 10:34:35'),(13,12,7,3,'suscrito','2021-05-27 14:18:42'),(14,12,6,3,'suscrito','2021-05-27 14:18:49'),(15,12,2,1,'suscrito','2021-05-27 14:56:58'),(16,12,9,6,'suscrito','2021-05-27 15:09:58'),(17,12,8,6,'suscrito','2021-05-27 15:10:00'),(18,16,2,1,'suscrito','2021-05-27 15:25:26'),(19,16,21,1,'suscrito','2021-05-27 15:25:45'),(20,16,2,1,'borrado','2021-05-27 15:27:41'),(21,16,21,1,'borrado','2021-05-27 15:27:42'),(22,6,2,1,'suscrito','2021-05-27 17:05:32'),(23,12,7,3,'borrado','2021-05-28 00:37:27'),(24,12,2,1,'borrado','2021-05-28 00:37:32'),(25,12,2,1,'suscrito','2021-05-28 00:46:56'),(26,12,21,1,'suscrito','2021-05-28 00:46:59'),(27,12,7,3,'suscrito','2021-05-28 00:48:45'),(28,12,16,3,'suscrito','2021-05-28 00:48:49'),(29,12,17,3,'suscrito','2021-05-28 00:48:51');
/*!40000 ALTER TABLE `activitat_subs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT 'https://poemyc.com/imgs/default-book.png',
  `user_id` bigint(20) unsigned NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`),
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Lorem Ipsum 1','https://poemyc.com/imgs/default-book.png',1,4,'Aenean ipsum quam, facilisis ut rutrum quis, finibus at turpis. Morbi porta nulla nec neque porta mollis. Duis pretium eu tortor a dignissim. Nullam vel lobortis lectus. Morbi sed velit at metus sagittis efficitur gravida ac nulla. In id metus sit amet risus vulputate mollis id et nulla. Morbi risus turpis, tempus ac interdum vitae, tempor id orci. Vivamus finibus sem vitae nulla ultrices porttitor. Phasellus imperdiet faucibus placerat. Nunc eu ex eleifend ipsum interdum ultrices. Mauris elementum quam at ullamcorper laoreet. Praesent egestas ipsum ac tortor accumsan, vitae rutrum nunc hendrerit. Nunc eu enim euismod, porttitor diam elementum, tempus risus. Integer sit amet feugiat arcu. Maecenas ullamcorper, nibh a imperdiet pellentesque, quam est gravida tortor, vitae tempus nulla lacus aliquet dui. Vestibulum bibendum aliquam fermentum.\n                       Phasellus ut placerat diam. Sed eu urna id dolor laoreet tincidunt ac ultricies turpis. Pellentesque efficitur neque sed elementum semper. Morbi ultricies nunc nec commodo fringilla. Aenean feugiat, orci eu molestie elementum, mauris mi efficitur tortor, ac finibus lacus leo volutpat elit. Phasellus ut massa sed dolor vehicula fermentum sed sit amet arcu. Ut nec ante mauris. Sed quis consectetur ligula. Duis in accumsan turpis. Donec quis sapien pulvinar sapien blandit venenatis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.','2021-05-13 14:10:10','2021-05-26 17:18:20'),(2,'Un latin aqui random','https://poemyc.com/imgs/default-book.png',1,2,'Proin nisi turpis, pretium in ultricies non, consequat at elit. Sed egestas, enim viverra pellentesque fringilla, enim justo aliquam libero, aliquam efficitur urna libero vitae orci. Maecenas vestibulum vitae dui nec interdum. Nunc suscipit tristique lectus. Sed ac tincidunt ipsum. Etiam eleifend ipsum a blandit ultrices. Sed volutpat id augue et egestas. Sed tincidunt ullamcorper odio, ut convallis lorem interdum id. In laoreet blandit tortor vel dictum. Cras laoreet ligula eget tortor malesuada ullamcorper. Pellentesque dignissim tempus turpis, in ullamcorper eros consectetur at. Integer commodo dolor nec purus pulvinar malesuada.\n                       Praesent sed elementum purus. Nulla consequat sapien et nisi molestie, a tempor mi iaculis. Donec arcu purus, iaculis eget sem ut, tincidunt sodales magna. Phasellus ut augue finibus, ultricies magna et, consequat massa. Nam vehicula nisl nisl, quis vehicula ligula convallis vel. Aliquam vulputate ullamcorper sem at vulputate. Nunc sem mauris, rutrum a lorem non, rutrum accumsan nulla. Duis vestibulum malesuada rutrum. Integer eget sapien dictum, bibendum nulla a, tincidunt justo. Maecenas lobortis justo scelerisque, rutrum magna eu, venenatis nibh. Integer nunc nulla, blandit sed commodo sit amet, lacinia ac odio. Nulla risus sapien, lacinia id interdum id, maximus vitae nunc. Duis risus lacus, rhoncus id sagittis ut, cursus nec nunc.','2021-05-13 14:10:10','2021-05-22 16:45:13'),(25,'ew','ewdf',1,11,'wed','2021-05-22 16:48:00','2021-05-22 16:48:00'),(26,'Rosa','https://www.colombiainforma.info/wp-content/uploads/2018/07/Rosa_Roja_2.jpg',6,2,'Les roses són molt cuquis.','2021-05-22 17:21:25','2021-05-22 17:21:25'),(27,'La luna - Betavf c fcxf','https://i.blogs.es/5efe2c/cap_001/450_1000.jpg',3,1,'No se que ponerfdbsdxf','2021-05-22 17:26:43','2021-05-25 12:54:30'),(28,'La luna','https://i.blogs.es/5efe2c/cap_001/450_1000.jpg',3,1,'Me gusta la luna','2021-05-22 17:26:48','2021-05-24 19:00:40'),(29,'Minnie Mouse','https://cdn1.parksmedia.wdprapps.disney.com/resize/mwImage/1/1600/900/75/dam/disneyland/attractions/disneyland/minnies-house/minnie-16x9.jpg?1559890635680',6,1,'Mira que moni la Minnie amb el vestidet.','2021-05-22 17:31:13','2021-05-22 17:31:13'),(30,'Margarites','https://i2.wp.com/www.florestore.com/flores-a-domicilio/wp-content/uploads/2018/07/cuidados-de-las-margaritas-florestore-portada.jpg?fit=846%2C635&ssl=1',6,2,'Més fluretes','2021-05-22 18:55:08','2021-05-22 18:55:08'),(31,'Jajaja graciós','mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmwrteyrtytmhfngbfdfaetwyeuyrukfhgdhrsgerq3546576i7yjdhgfgsafewr3qt46y5uthgsferq34y5uetjhdgbfsgrt42y5htengdbfsgeft4y5hetbfsgewt4y35tjngdbfgrt43y5u4tjrngbfrg4ty54u6thrbfvefqt42y35htebfvefg42y5h3jtenbrg4t2y53htebfvef4t2ygrbfvef24ty354htebrwgefqt42y53htbfvet43y5htngbfveft4y53jyngbfgrt4y54htgr4t5ytht576uyjt567uijyt5tyrhgbfregbr43trhtytjy6jtthyt5ghngr4grgr4gr34rtghnt34tht5yhjmy6jy6ujy54yhtghnght5hnt5thnt5yhjy6jy6jy6yhjmh5thnghyt5ghnhttgn rgbr44rgbfgrerfvfr4rgf4rfvefvfeddefvb gr4gbnhtyhmjuj,ku7ik8iou65hnt4tgbr3fevve3',6,0,'Sin texto','2021-05-22 18:56:10','2021-05-22 18:56:10'),(36,'Nuevo','https://poemyc.com/imgs/default-book.png',3,1,'qw','2021-05-24 16:24:08','2021-05-24 16:24:08'),(37,'mnk nb','iojpq2',3,1,'uiygv','2021-05-25 12:57:53','2021-05-25 12:57:53'),(38,'vino','ds',3,0,'ds','2021-05-25 13:56:17','2021-05-25 13:56:17'),(39,'Nose algo','jkbhjg',12,0,'jnkhbgfvdycstxygvibnijmokmonihubyft d','2021-05-25 18:38:50','2021-05-25 18:38:50'),(40,'jnhbjvgf','hbjgvf',12,0,'jnhbjghv','2021-05-25 18:40:02','2021-05-25 18:40:02'),(41,'Temps minimalista','https://poemyc.com/imgs/default-book.png',13,2,'tttttttttttttttttttttttttttttttttttttttt','2021-05-25 20:42:57','2021-05-25 20:42:57');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles_plans`
--

DROP TABLE IF EXISTS `articles_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` bigint(20) unsigned NOT NULL,
  `article_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_plans_plan_id_foreign` (`plan_id`),
  KEY `articles_plans_article_id_foreign` (`article_id`),
  CONSTRAINT `articles_plans_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `articles_plans_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles_plans`
--

LOCK TABLES `articles_plans` WRITE;
/*!40000 ALTER TABLE `articles_plans` DISABLE KEYS */;
INSERT INTO `articles_plans` VALUES (135,6,36,NULL,NULL),(136,7,36,NULL,NULL),(141,9,29,NULL,NULL),(142,8,26,NULL,NULL),(143,8,30,NULL,NULL),(144,9,31,NULL,NULL),(145,7,27,NULL,NULL),(146,16,28,NULL,NULL),(147,16,37,NULL,NULL),(159,19,41,NULL,NULL),(169,2,2,NULL,NULL),(171,2,1,NULL,NULL),(172,21,1,NULL,NULL),(176,2,25,NULL,NULL),(177,18,40,NULL,NULL),(178,18,39,NULL,NULL);
/*!40000 ALTER TABLE `articles_plans` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`poemyc`@`localhost`*/ /*!50003 trigger addtoplan AFTER INSERT ON articles_plans FOR EACH ROW
            BEGIN
                INSERT INTO activitat_plans (user_id,article_id,plan_id,text,time) VALUES ((select user_id from plans where id = new.plan_id), new.article_id, new.plan_id , "añadido", now());
            END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`poemyc`@`localhost`*/ /*!50003 trigger delfromplan AFTER DELETE ON articles_plans FOR EACH ROW
            BEGIN
                INSERT INTO activitat_plans (user_id,article_id,plan_id,text,time) VALUES ((select user_id from plans where id = old.plan_id), old.article_id, old.plan_id , "quitado", now());
            END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `cesta_lines`
--

DROP TABLE IF EXISTS `cesta_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cesta_lines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cesta_id` bigint(20) unsigned NOT NULL,
  `plan_id` bigint(20) unsigned NOT NULL,
  `quantitat_mesos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cesta_lines_cesta_id_foreign` (`cesta_id`),
  KEY `cesta_lines_plan_id_foreign` (`plan_id`),
  CONSTRAINT `cesta_lines_cesta_id_foreign` FOREIGN KEY (`cesta_id`) REFERENCES `cestas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cesta_lines_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cesta_lines`
--

LOCK TABLES `cesta_lines` WRITE;
/*!40000 ALTER TABLE `cesta_lines` DISABLE KEYS */;
/*!40000 ALTER TABLE `cesta_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cestas`
--

DROP TABLE IF EXISTS `cestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cestas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cestas_user_id_foreign` (`user_id`),
  CONSTRAINT `cestas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cestas`
--

LOCK TABLES `cestas` WRITE;
/*!40000 ALTER TABLE `cestas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comanda_lines`
--

DROP TABLE IF EXISTS `comanda_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comanda_lines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comanda_id` bigint(20) unsigned NOT NULL,
  `plan_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_preu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_creador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comanda_lines_comanda_id_foreign` (`comanda_id`),
  CONSTRAINT `comanda_lines_comanda_id_foreign` FOREIGN KEY (`comanda_id`) REFERENCES `comandas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comanda_lines`
--

LOCK TABLES `comanda_lines` WRITE;
/*!40000 ALTER TABLE `comanda_lines` DISABLE KEYS */;
/*!40000 ALTER TABLE `comanda_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comandas`
--

DROP TABLE IF EXISTS `comandas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comandas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comandas_user_id_foreign` (`user_id`),
  CONSTRAINT `comandas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comandas`
--

LOCK TABLES `comandas` WRITE;
/*!40000 ALTER TABLE `comandas` DISABLE KEYS */;
/*!40000 ALTER TABLE `comandas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentaris`
--

DROP TABLE IF EXISTS `comentaris`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentaris` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `article_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comentaris_user_id_foreign` (`user_id`),
  KEY `comentaris_article_id_foreign` (`article_id`),
  CONSTRAINT `comentaris_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comentaris_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentaris`
--

LOCK TABLES `comentaris` WRITE;
/*!40000 ALTER TABLE `comentaris` DISABLE KEYS */;
INSERT INTO `comentaris` VALUES (1,'No mola',1,1,'2021-05-13 14:10:10','2021-05-13 14:10:10'),(2,'io q se',1,1,'2021-05-13 14:10:10','2021-05-13 14:10:10'),(3,'a',1,25,'2021-05-27 06:40:25','2021-05-27 06:40:25'),(4,'Me ha gustado mucho, sube más artículos. Son muy buenos. Un poco cde paja para que haya texto a ver si queda bien',1,25,'2021-05-27 07:03:40','2021-05-27 07:03:40'),(5,'Define muy bien la vida, tres letras muy reales que en minúscula significan mucho',3,25,'2021-05-27 05:14:52','2021-05-27 05:14:52'),(6,'Aporreo de teclado del bueno.\r\n\r\nEjem...iubcsoibcoiudbcoiauybsdoyaiusvdbcyuavsiuydvciuasviyudvciausxvicusaviuxycvisuyvdiuctyfviau7sygvocuiaysgvyudcvisuyvacdicviaysdtciauydvicyuatvisyudcviastvdcuycvasytiuayvciuyac',3,25,'2021-05-27 05:16:11','2021-05-27 05:16:11'),(7,'Jeje hoi',6,41,'2021-05-27 10:28:43','2021-05-27 10:28:43'),(8,'Kiwoko',6,36,'2021-05-27 10:31:03','2021-05-27 10:31:03'),(9,'A mi tambien',3,28,'2021-05-27 10:39:32','2021-05-27 10:39:32'),(10,'test trigger',3,28,'2021-05-27 10:51:30','2021-05-27 10:51:30'),(11,'No sé ja que fer amb la vida ;)',6,27,'2021-05-27 10:51:41','2021-05-27 10:51:41'),(12,'hola buenas',12,40,'2021-05-27 14:15:45','2021-05-27 14:15:45'),(13,'la verdad es que este articulo, es bastante interesante ya que estudie latin en mis tiempos y esta chido. Un saludo guitarra',16,1,'2021-05-27 15:26:29','2021-05-27 15:26:29');
/*!40000 ALTER TABLE `comentaris` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`poemyc`@`localhost`*/ /*!50003 TRIGGER `comentar` AFTER INSERT ON `comentaris` FOR EACH ROW begin
        INSERT INTO activitat_coments (user_id,comentari_id,article_id,creador_id,text,time) VALUES (new.user_id,new.id, new.article_id, (select user_id from articles where id = new.article_id), "comentar", now());
        END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `likes_article_id_foreign` (`article_id`),
  KEY `likes_user_id_foreign` (`user_id`),
  CONSTRAINT `likes_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (216,25,3,'2021-05-25 11:31:00','2021-05-25 11:31:00'),(222,26,3,'2021-05-25 12:19:17','2021-05-25 12:19:17'),(223,30,3,'2021-05-25 12:26:54','2021-05-25 12:26:54'),(224,29,3,'2021-05-25 12:54:18','2021-05-25 12:54:18'),(226,1,3,'2021-05-25 12:55:50','2021-05-25 12:55:50'),(238,2,1,'2021-05-25 17:38:17','2021-05-25 17:38:17'),(252,2,13,'2021-05-25 20:42:13','2021-05-25 20:42:13'),(253,28,1,'2021-05-26 12:03:39','2021-05-26 12:03:39'),(257,37,1,'2021-05-26 17:43:46','2021-05-26 17:43:46'),(258,1,1,'2021-05-26 19:18:19','2021-05-26 19:18:19'),(279,30,1,'2021-05-27 04:49:34','2021-05-27 04:49:34'),(283,41,6,'2021-05-27 10:28:31','2021-05-27 10:28:31'),(284,41,3,'2021-05-27 10:30:57','2021-05-27 10:30:57'),(285,36,6,'2021-05-27 10:31:07','2021-05-27 10:31:07'),(288,1,12,'2021-05-28 00:18:57','2021-05-28 00:18:57'),(289,27,12,'2021-05-28 00:19:27','2021-05-28 00:19:27'),(290,25,12,'2021-05-28 00:51:14','2021-05-28 00:51:14');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`poemyc`@`localhost`*/ /*!50003 TRIGGER `like` AFTER INSERT ON `likes` FOR EACH ROW begin
        UPDATE articles set likes = likes+1 where articles.id = NEW.article_id;
        INSERT INTO activitat_likes (user_id,article_id,creador_id,text,time) VALUES (new.user_id, new.article_id, (select user_id from articles where id = new.article_id), "like", now());
        END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`poemyc`@`localhost`*/ /*!50003 TRIGGER `dislike` AFTER DELETE ON `likes` FOR EACH ROW begin
        UPDATE articles set likes = likes-1 where articles.id = OLD.article_id;
        INSERT INTO activitat_likes (user_id,article_id,creador_id,text,time) VALUES (OLD.user_id, OLD.article_id, (select user_id from articles where id = old.article_id), "dislike", now());
        END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_05_04_160731_plantejament',1),(5,'2021_05_22_173148_fotosllarguespeten',2),(6,'2021_05_22_190536_preuplansnumber',3),(7,'2021_05_24_194400_triggerdislike',4),(8,'2021_05_25_165727_guardarestatsidebar',5),(9,'2021_05_25_173255_alfinalnohoguardosidebar',6),(17,'2021_05_27_001610_actividad',7),(18,'2021_05_27_003613_triggers_actividad',8),(19,'2021_05_27_005028_modificar_triggers_likes',9),(20,'2021_05_27_124008_activitat_comentaris',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `preu` decimal(5,2) DEFAULT NULL,
  `foto` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT 'https://poemyc.com/imgs/default-plan.png',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plans_user_id_foreign` (`user_id`),
  CONSTRAINT `plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plans`
--

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
INSERT INTO `plans` VALUES (2,1,8.00,'https://poemyc.com/imgs/default-plan.png','Nose','Fumar mucho','2021-05-13 14:10:10','2021-05-13 14:10:10'),(6,3,20.00,'https://backtogreen.es/wp-content/uploads/2018/12/6e9db9e5-e16f-4d7e-873f-ba6789f1a895.jpg','To the panas','Aqui subire panas','2021-05-22 17:02:39','2021-05-22 17:02:39'),(7,3,500.00,'https://i1.wp.com/plumasatomicas.com/wp-content/uploads/2019/10/hombres-fotos-pene-narcisistas.jpeg?resize=1280%2C720&ssl=1','To the perverted girls','Aqui subire fotopollas','2021-05-22 17:09:01','2021-05-22 17:09:32'),(8,6,6.00,'https://www.floresyplantas.net/wp-content/uploads/flor-de-margarita.jpg','Hola','Jeje flureta','2021-05-22 17:16:12','2021-05-22 17:16:21'),(9,6,5.00,'https://cdn.aarp.net/content/dam/aarp/travel/Domestic/2019/05/1140-disney-castle-esp.imgcache.rev.web.900.513.jpg','Disney','Per beibis que s\'ho passen molt bé a Disneyland perquè hi ha en Mickey i la Minnie :).','2021-05-22 17:24:43','2021-05-22 17:24:43'),(16,3,50.00,'https://www.lionshome.es/img/product/v2-hamaca-de-algodon-al-aire-libre-para-mascotas-camas-para-coj:T1BOYkNpWnA3aEV6UVlEVjBYUWp3SzF2R3h0N2ltR3R0WDJkdWhGdzZSYktCTzRBQWpFM1JsZjkrVHFEYkdhVEdEWWs0Z0tUOGppU0swN0tWSVFWNnc9PQ==','Yo que se','Plan para poesia antigua','2021-05-25 12:57:17','2021-05-25 12:57:17'),(17,3,987.00,'xz','xxz','scxa','2021-05-25 12:59:37','2021-05-25 12:59:37'),(18,12,600.00,'jhg','Test','bhv','2021-05-25 18:38:19','2021-05-25 18:38:19'),(19,13,234.00,'https://poemyc.com/imgs/default-plan.png','Temps minimalista mínim','hhhhhhhhhhhhhhhhhhhhhh','2021-05-25 20:44:16','2021-05-25 20:44:16'),(21,1,345.00,'fdsa','edq','fasd','2021-05-26 19:23:38','2021-05-26 19:23:38');
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `objectguid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://poemyc.com/imgs/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'superadmin',NULL,'admin@gmail.com','https://poemyc.com/imgs/default.png',NULL,'$2y$10$2Sv/BoNxToFaxEIYMueQouFl9fijXhdT9OV8TH.y.eAS.znk1SndW',NULL,'2021-05-13 14:10:10','2021-05-25 17:11:40'),(2,NULL,'test','Victor Guitart Estrada','vguitart5@gmail.com','https://lh3.googleusercontent.com/a/AATXAJy9FD-wJ6JEe-VSbbio6zt76m4bMmwR795jscB_=s96-c',NULL,'$2y$10$GSoP9nS5i97gtXsDB/rVVesojE23cDC7m9W8Kg1pN2nfo7Ex6Q37G',NULL,'2021-05-13 14:10:10','2021-05-16 22:00:38'),(3,NULL,'vguitart6','Victor Guitart','vguitart6@gmail.com','https://lh3.googleusercontent.com/a-/AOh14GiUeSS5x-P8ubCrURyZYAZAD_P-L0_H-k6MMkI-hA=s96-c',NULL,NULL,NULL,'2021-05-13 14:39:46','2021-05-13 14:39:46'),(5,NULL,'nuriafake24','Núria Fake','nuriafake24@gmail.com','https://lh3.googleusercontent.com/a/AATXAJwKzmjQ0J0gVHGefZe4Zgx1Rvn6N4dAZY7fhxk1=s96-c',NULL,NULL,NULL,'2021-05-16 18:44:32','2021-05-16 18:44:32'),(6,NULL,'nuriaribasros','Núria Ribas Ros','nuriaribasros@gmail.com','https://lh3.googleusercontent.com/a-/AOh14Gh43fmlWCVJ2sKo93CSUsKoJR9Jv7CX8BgP3kzEg8I=s96-c',NULL,NULL,NULL,'2021-05-16 22:03:39','2021-05-16 22:03:39'),(7,NULL,'sikuusolutions','Sikuu Solutions','sikuusolutions@gmail.com','https://lh3.googleusercontent.com/a/AATXAJy5e7y8YVWHukRmZRoCC26a1qx36FsAvkAMXsUL=s96-c',NULL,NULL,NULL,'2021-05-16 22:03:40','2021-05-16 22:03:40'),(8,NULL,'inforcelranord','Inforcelra Nord','inforcelranord@gmail.com','https://lh3.googleusercontent.com/a-/AOh14Gh5pIISRO-rdTwIuXzncOn4Le_MSzwTwrFXbnqGbg=s96-c',NULL,NULL,NULL,'2021-05-18 11:27:46','2021-05-18 11:27:46'),(9,NULL,'nord.soli','nord soli','nord.soli@gmail.com','https://lh3.googleusercontent.com/a/AATXAJwa6F351GrVq9niCvaAoqUD3XMbOR4E0GrkgZEG=s96-c',NULL,NULL,NULL,'2021-05-19 13:13:16','2021-05-19 13:13:16'),(10,NULL,'Adolfo','','adolfo@mail.net','https://poemyc.com/imgs/default.png',NULL,'$2y$10$sdQZVYlJjwRno0x76P6WD.o.wGJbpnJDpwlopSFx37aI0Rwy.aP7G',NULL,'2021-05-24 15:12:50','2021-05-24 15:12:50'),(12,NULL,'vguitart','Victor Guitart Estrada','vguitart@cendrassos.net','https://lh3.googleusercontent.com/a/AATXAJwHXTeiR1rBcVBbuwj81V48CU0vImLDvEaYpP-i=s96-c',NULL,NULL,NULL,'2021-05-25 18:36:58','2021-05-25 18:36:58'),(13,NULL,'nuria','','a@a.es','https://poemyc.com/imgs/default.png',NULL,'$2y$10$x6wZID9uII0mM/k1kDuC4.tyb7Z9UZzSMjbJDHsAe3G3L0QSBusH6',NULL,'2021-05-25 20:39:56','2021-05-25 20:39:56'),(14,NULL,'JesseTen','','ioo.xv.e.r.tr.is@gmail.com','https://poemyc.com/imgs/default.png',NULL,'$2y$10$HutNljhXrcVZqqEiaE.IGuD2qKBfbdQLwxKvh0YhYlmSyi0XUTnXi',NULL,'2021-05-27 04:37:11','2021-05-27 04:37:11'),(16,NULL,'mperalta','Marc Peralta Gomez','mperalta@cendrassos.net','https://lh3.googleusercontent.com/a/AATXAJzT8JSJrKk0OAAETMzQFmRN1paWktKvWC4pdi8X=s96-c',NULL,NULL,NULL,'2021-05-27 15:24:56','2021-05-27 15:24:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_plans`
--

DROP TABLE IF EXISTS `users_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `caducitat` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_plans_plan_id_foreign` (`plan_id`),
  KEY `users_plans_user_id_foreign` (`user_id`),
  CONSTRAINT `users_plans_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_plans`
--

LOCK TABLES `users_plans` WRITE;
/*!40000 ALTER TABLE `users_plans` DISABLE KEYS */;
INSERT INTO `users_plans` VALUES (109,9,1,'2021-06-27 04:43:56',NULL,NULL),(110,8,1,'2021-06-27 04:43:57',NULL,NULL),(112,19,6,'2021-06-27 12:28:18',NULL,NULL),(113,19,3,'2021-06-27 12:30:34',NULL,NULL),(114,7,6,'2021-06-27 12:30:41',NULL,NULL),(115,17,6,'2021-06-27 12:34:35',NULL,NULL),(117,6,12,'2021-06-27 16:18:49',NULL,NULL),(119,9,12,'2021-06-27 17:09:58',NULL,NULL),(120,8,12,'2021-06-27 17:10:00',NULL,NULL),(123,2,6,'2021-06-27 19:05:32',NULL,NULL),(124,2,12,'2021-06-28 02:46:56',NULL,NULL),(125,21,12,'2021-06-28 02:46:59',NULL,NULL),(126,7,12,'2021-06-28 02:48:45',NULL,NULL),(127,16,12,'2021-06-28 02:48:49',NULL,NULL),(128,17,12,'2021-06-28 02:48:51',NULL,NULL);
/*!40000 ALTER TABLE `users_plans` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`poemyc`@`localhost`*/ /*!50003 trigger suscribir AFTER INSERT ON users_plans FOR EACH ROW
            BEGIN
                INSERT INTO activitat_subs (user_id,plan_id,creador_id,text,time) VALUES (new.user_id, new.plan_id ,(select user_id from plans where id = new.plan_id), "suscrito", now());
            END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`poemyc`@`localhost`*/ /*!50003 trigger desuscribir AFTER DELETE ON users_plans FOR EACH ROW
            BEGIN
                INSERT INTO activitat_subs (user_id,plan_id,creador_id,text,time) VALUES (old.user_id, old.plan_id ,(select user_id from plans where id = old.plan_id), "borrado", now());
            END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-28  4:55:16
