CREATE DATABASE  IF NOT EXISTS `wilmar_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wilmar_db`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: wilmar_db
-- ------------------------------------------------------
-- Server version	5.6.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Administración y contabilidad'),(2,'Administración de Proyectos'),(3,'Calidad, Logística y Distribución'),(4,'Ceremonial y Eventos'),(5,'Cocina y Gastronomía'),(6,'Computación y Sistemas'),(7,'Comercio Exterior y Relaciones Internacionales'),(8,'Comunicación, Publicidad y Periodismo'),(9,'Derecho y Legales'),(10,'Gestión y Management'),(11,'Gestoría'),(12,'Impuestos'),(13,'Idiomas'),(14,'Idiomas y negocios'),(15,'Inversiones y Finanzas'),(16,'Liderazgo / Coaching'),(17,'Marketing'),(18,'Marketing Online y Negocios en Internet'),(19,'Medicina y Salud'),(20,'Recursos Humanos RRHH'),(21,'Relaciones Públicas RRPP'),(22,'Tiempo Libre');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `modality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'React','ACERCA DEL CURSO\r\n\r\nVas a aprender a programar en HTML5, CSS3 y JavaScript en un mes y medio, terminando con la habilidad para desarrollar el Front End de sitios complejos y aplicaciones web. Este conocimiento te permite dar tus primeros pasos como programador, o postularte al Coding Bootcamp para dar un salto de carrera.\r\n\r\nDESTINATARIOS\r\n\r\nCualquiera que quiera aprender a programar, no se necesitan conocimientos previos.\r\nEspecialmente útil para ingenieros, diseñadores y profesionales del Marketing Online\r\nREQUISITOS\r\n\r\nEn el caso de los cursos presenciales es requisito asistir al curso con Notebook.\r\nEn caso de querer hacer el curso en modalidad Online, todo el contenido (videos, ejercicios y proyectos) estará disponible en nuestra plataforma y la comunicación con los profesores será vía chat para ayudarte en todas las dudas que tengas.',1,6,'Presencial',34,'imagenesDeCursos/Martin_curso_React.png','2017-12-15 14:46:45','2017-12-15 14:46:45'),(4,'DESARROLLO WEB FULL STACK','Este curso de Desarrollo Web te enseñará todo lo necesario para llevar a cabo proyectos web de principio a fin realizando programación orientada a objetos.\r\n\r\nCreá sitios y aplicaciones web sólidos, funcionales y atractivos. Incorporá los conocimientos técnicos y las metodologías de trabajo más actuales y usadas en el mercado.\r\n\r\nEn 5 meses aprendé los lenguajes y tecnologías que las empresas utilizan hoy. Vas a aprender Laravel, React, HTML, MySQL, PHP. Y todo lo necesario para dominar el Front End y el Back End de una aplicación.',2,6,'Presencial',100000,'imagenesDeCursos/Digital_curso_DESARROLLO WEB FULL STACK.png','2017-12-15 15:34:18','2017-12-15 15:34:18'),(5,'DESARROLLO MOBILE ANDROID','Este programa presencial e intensivo te enseñará todo lo necesario para desarrollar aplicaciones Mobile Android de principio a fin. Aprendé a Desarrollar Apps como un programador profesional.\r\n\r\nEn 5 meses aprendé a crear aplicaciones mobile sólidas, funcionales y atractivas. Incorporá los conocimientos técnicos y las metodologías de trabajo más actuales y usadas en el mercado.',2,6,'Presencial',350000,'imagenesDeCursos/Digital_curso_DESARROLLO MOBILE ANDROID.png','2017-12-15 15:35:57','2017-12-15 15:35:57'),(6,'REACT JS','Este curso intensivo te enseñará todo lo necesario para crear aplicaciones web en Javascript soportada por una de las librerías más populares y en crecimiento de hoy en día: React.js.\r\n\r\nEl objetivo del curso es generar un conocimiento completo de cómo modularizar una aplicación web en pequeños componentes, para que conformen una salida compleja: Single Page Application.\r\n\r\nNo solamente estaremos enfocando el uso de React sino que haremos hincapié en la sintaxis moderna que presenta ECMAScript 2016, explorando la arquitectura que presenta Redux e incluyendo paquetes utilizados en el mercado actual como React Router.\r\n\r\nAl finalizar el curso, vas a poder ganar la habilidad de enfocar una aplicación web con este paradigma distinto que presenta React, profesionalizando tu perfil como Frontender.',2,6,'Presencial',400000,'imagenesDeCursos/Digital_curso_REACT JS.png','2017-12-15 15:37:47','2017-12-15 15:37:47'),(7,'DESARROLLO MOBILE IOS','El curso de Desarrollo Mobile iOS te enseñará todo lo necesario para desarrollar aplicaciones de principio a fin. En 5 meses vas a realizar apps iOS con tecnología de programación orientada a objetos.\r\n\r\nCreá aplicaciones sólidas, funcionales y atractivas incorporando los conocimientos técnicos y las metodologías de trabajo más actuales y usadas en el mercado.',2,6,'Presencial',700000,'imagenesDeCursos/Digital_curso_DESARROLLO MOBILE IOS.png','2017-12-15 15:41:56','2017-12-15 15:41:56'),(9,'Call of duty','El mejor curso para aprender a jugar al call of duty',3,22,'Virtual',0,'imagenesDeCursos/Juan Carlos_curso_Call of duty.jpeg','2017-12-15 15:48:47','2017-12-15 15:48:47'),(10,'Asaditos','Sábados de 9 a 12 hs\r\n\r\n1° CLASE\r\nEl fuego y temperaturas. Dispositivos y herramientas. Medidas de higiene y seguridad.\r\nMaterias primas.;\r\nTeórico y práctico; Asado de tira y Vacío\r\n\r\n2° CLASE\r\nCarne vacuna. Teórico y práctico.; Bife de chorizo y lomo, Achuras, parrilladas y para eventos.',4,5,'Presencial',300,'imagenesDeCursos/Bill_curso_Asaditos.jpeg','2017-12-15 16:03:28','2017-12-15 16:03:28'),(11,'Derecho publico','Objetivos Generales\r\nQue los participantes:\r\n\r\nAdquieran competencias para detectar, neutralizar o encauzar potenciales conflictos laborales internos, a fin de evitar demandas judiciales.',5,9,'Presencial',200,'imagenesDeCursos/Bono_curso_Derecho publico.png','2017-12-15 16:05:16','2017-12-15 16:05:16'),(12,'Ingles para niños','De los cuatro a los siete años, tus hijos están llenos de energía, con deseos de aprender y participar en múltiples actividades. Este es el momento ideal para que como padre lo animes a explorar un mundo lleno de diversión.\r\n\r\nEl aprendizaje de un nuevo idioma en esta etapa de su vida, es ideal porque le servirá como herramienta de estimulación motriz y cerebral, esto le ayudará a explotar sus habilidades al 100%.',6,13,'Virtual',450,'imagenesDeCursos/Ceci_curso_Ingles para niños.jpeg','2017-12-15 16:07:02','2017-12-15 16:07:02'),(13,'Guitarra para principiantes','En este curso de guitarra online para principiantes gratuito podrás aprender online a tocar la guitarra desde cero. Este curso de guitarra es especialmente relevante para ir a tu ritmo, donde podrás practicar desde casa totalmente gratis.\r\n\r\nDesde 2011 hemos formado a más de 5 millones de personas a través de nuestros cursos de guitarra online. Como resultado, ahora tienes la oportunidad de sumarte al grupo de usuarios que quiere aprender a tocar la guitarra sin complicaciones.',7,22,'Virtual',4500,'imagenesDeCursos/Daniele_curso_Guitarra para principiantes.jpeg','2017-12-15 16:08:41','2017-12-15 16:08:41'),(14,'Pasteleria','La modalidad del Curso de Pastelería y Repostería comienza desde las bases de la pastelería, trabajando minuciosamente clase a clase con las diferentes técnicas de preparación, elaboración y presentación de cada uno de los productos.',8,5,'Presencial',10,'imagenesDeCursos/Donald_curso_Pasteleria.jpeg','2017-12-15 16:10:57','2017-12-15 16:10:57'),(15,'Logistica en el transporte','OBJETIVOS\r\nBrindar conocimientos que permitan al participante iniciar y profundizar su proceso de profesionalización dentro de la función logística, apuntando a la aplicación práctica e inmediata de dichos conceptos sobre las cuestiones diarias de una operación tipo, fortaleciendo su capacidad de análisis para abordar un correcto proceso de toma de decisiones.\r\nEl alumno aprenderá de la experiencia exitosa de quiénes trabajan en la gestión diaria, a configurar y controlar de manera práctica una operación logística de transporte.',8,3,'Presencial',80,'imagenesDeCursos/Donald_curso_Logistica en el transporte.jpeg','2017-12-15 16:11:53','2017-12-15 16:11:53'),(16,'Periodismo para no periodistas','A través del presente curso, se espera que los alumnos comprendan y reflexionen sobre el desempeño de la actividad periodística, conforme sus configuraciones histórico-sociales. A partir de ello, les brindará herramientas para construir una noticia atendiendo a sus diferentes características, sus vínculos con las fuentes, y las particularidades de cada género. Además, se les permitirá adentrarse en el actual mundo del periodismo digital para distinguir sus dificultades y potencialidades a la hora de construir una noticia en el entorno online.\r\n \r\nEl curso tendrá una modalidad teórico-práctica a fin de obtener los conocimientos teóricos necesarios para luego desarrollarlos en actividades presenciales con noticias de publicaciones gráficas y digitales. Por ello, es importante que cada alumno disponga de un diario en cada clase y acceso a publicaciones digitales.',9,8,'Presencial',250000,'imagenesDeCursos/Juan Roman_curso_Periodismo para no periodistas.jpeg','2017-12-15 16:13:37','2017-12-15 16:13:37'),(17,'Tiros libres','Tiroslibres Tiroslibres Tiroslibres Tiroslibres Tiroslibres Tiroslibres',9,22,'Virtual',35,'imagenesDeCursos/Juan Roman_curso_Tiros libres.jpeg','2017-12-15 16:14:55','2017-12-15 16:14:55'),(18,'Fifa 18','Te enseño a jugar al fifa18 full stack en la play 4',10,22,'Virtual',3000,'imagenesDeCursos/Dario_curso_Fifa 18.jpeg','2017-12-15 16:35:57','2017-12-15 16:35:57'),(19,'Comunity Manager','sfgdfgdfgdfg',11,10,'Virtual',50000,'imagenesDeCursos/Sandra_curso_Comunity Manager.jpeg','2017-12-15 17:02:11','2017-12-15 17:02:35');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrolleds`
--

DROP TABLE IF EXISTS `enrolleds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrolleds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrolleds`
--

LOCK TABLES `enrolleds` WRITE;
/*!40000 ALTER TABLE `enrolleds` DISABLE KEYS */;
INSERT INTO `enrolleds` VALUES (1,2,1,'2017-12-15 15:16:27','2017-12-15 15:16:27'),(2,3,6,'2017-12-15 15:49:45','2017-12-15 15:49:45'),(3,11,8,'2017-12-15 17:04:10','2017-12-15 17:04:10');
/*!40000 ALTER TABLE `enrolleds` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_12_05_134510_CreateCoursesTable',1),(4,'2017_12_05_154742_CreateCategoriesTable',1),(5,'2017_12_13_183711_CreateEnrolledTable',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` blob,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Martin','Ackerman','m@a.com','$2y$10$f0Kjct8Sz6NX.bibggy7mOLdhxHqqFRLtMkdzLcBAq007SDcjsvo2','avatars/1Martin.jpeg','RlyiiBn0lxr2saL588MhJPaCUlQ9AVF7dA5x1elgTfOh9h19LtfMO8cjZXnh','2017-12-15 14:45:29','2017-12-15 14:45:29'),(2,'Digital','House','d@h.com','$2y$10$xduCs8cfFcH50xITK.O9m.CoO4RrpjrY9zoneOJlsSxO/U7bXlcm2','avatars/2Digital.jpeg','9xTP1qUOYaPbaVlbDVdVuqhcEo09S9nCW8xxvpzWFy8zAXG37NtkDZaSUhrr','2017-12-15 15:08:47','2017-12-15 15:08:47'),(3,'Juan Carlos','Profesor','j@c.com','$2y$10$IqtQniK9ufC/GV4jvzEUZubaSfJ2So/v0CLMhu0xn/lJ.oFpXvnMu','avatars/3Juan Carlos.png','TISUkvBHKBfsLl2qXDQfg6nrIF6rVewBNveTkXJUr24j8ji02YRkg5JELkL3','2017-12-15 15:43:19','2017-12-15 15:43:19'),(4,'Bill','Gates','b@g.com','$2y$10$U6GR0OBXdf2pWkgsHgvfT.2B/zCGfNw.jyFE918224rnNI0voQMLq','avatars/4Bill.jpeg','xfNsjQ8nFu3HDe78zxPBh5Wl90IfFWSMVUc88Ptr6QyJMNFb7mggDOU0HoKX','2017-12-15 16:00:29','2017-12-15 16:00:29'),(5,'Bono','Ladri','b@l.com','$2y$10$Xi6rqdUZBDmsaO2mNWf7Ke.wTMmuhci2aZTbT2il9C1jjN1v/VRQ2','avatars/5Bono.jpeg','dSxPd7L5hTr7dHNEQhiagZY6EtEWzDNIZ9jDrSGmbXTV6Tvsj4fzKwAoip9q','2017-12-15 16:04:12','2017-12-15 16:04:12'),(6,'Ceci','Lia','c@l.com','$2y$10$b9emy2fBMdblk9yb/FZiQ.ngG/2HaqyyHYOawI5itG7LXF/OCTJou','avatars/6Ceci.png','XAkkfNohDk0ozCZtkU5gbbfpx2TMygSQeoPP9z8CiTiUos1PqH6v3Ov0xEni','2017-12-15 16:05:56','2017-12-15 16:05:56'),(7,'Daniele','Lopez','d@l.com','$2y$10$aNpwXtW9giE7S34VrCbdEOJcOWyBTHTbKZcHrm6Us9ajRaC.U6KTy','avatars/7Daniele.jpeg','Y80pnZPTGFMCyjCRi3SDfqwMbfxFDGrYEKlXSmf7L6yQo1hkMHMz6e90wcEa','2017-12-15 16:07:43','2017-12-15 16:07:43'),(8,'Donald','Trump','d@t.com','$2y$10$BCWPRKJcqEjKB3G57EKjGezInINDvRXn.s8hKrM61TqQ0IYFMvOEa','avatars/8Donald.jpeg','8nF9YZrmVWIZCDv30YNi3lRl15jGSiuncWEayCeaZEFarh3HFekHm5llR0XJ','2017-12-15 16:10:17','2017-12-15 16:10:17'),(9,'Juan Roman','Riquelme','j@r.com','$2y$10$iIekhYDqpsJxkez1vUxxB.CaZnY3XC.WwExwiFzHSRcon0BBenAwe','avatars/9Juan Roman.jpeg','I6sVeuC63cG8eWoqIPLYCrJvojIvBkmRLWqhmzT3ctjrtxoAUISbctPSo5yr','2017-12-15 16:12:41','2017-12-15 16:12:41'),(10,'Dario','Susnisky','d@s.com','$2y$10$4U2OQalyvmReYJdQ.rCMPuPscisotHoe3qSWQdZICCVhT.eTibmw2','avatars/10Dario.jpeg','RC2xVpMECeP51u1kTkFwuMMZaYieTgLSov5YwIfuqJpwpGq6SgbcDgsMvC13','2017-12-15 16:33:35','2017-12-15 16:33:35'),(11,'Sandra','Lopez','s@l.com','$2y$10$A6e.7T3xSdor3ITsPNYoGepMvvg199fYYK1WgHKBYPMUHXp3PWo8C','avatars/11Sandra.jpeg','0kGLjr9ZmTnZSkiYlBCCewfm6lPEvoExoqbRG5M2uKP4Du8zHSm09WbG4aEV','2017-12-15 17:00:13','2017-12-15 17:00:13');
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

-- Dump completed on 2017-12-15 12:45:57
