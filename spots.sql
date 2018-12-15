-- MySQL dump 10.13  Distrib 5.7.24, for macos10.14 (x86_64)
--
-- Host: localhost    Database: cs329e_mitra_borischu
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Current Database: `cs329e_mitra_borischu`
--

--
-- Table structure for table `spots`
--

DROP TABLE IF EXISTS `spots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spots` (
  `username` varchar(100) DEFAULT NULL,
  `spot` varchar(100) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `rating` int(2) DEFAULT NULL,
  `review` varchar(500) DEFAULT NULL,
  `time` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spots`
--

LOCK TABLES `spots` WRITE;
/*!40000 ALTER TABLE `spots` DISABLE KEYS */;
INSERT INTO `spots` VALUES ('UTAustinStudent2018','Union Underground','https://universityunions.utexas.edu/food-fun/texas-union-underground','./img/union_underground.jpg',2,'The Union is a good place to socialize with other students. It is not a good place to study or do anything productive.',1544567911),('UTAustinStudent2018','Jester Center','https://maps.utexas.edu/buildings/utm/jes','./img/jester_central.jpg',6,'Jester Center is a good place to collaborate but not study independently because of the high number of students that walk through it everyday.',1544568066),('UTAustinStudent2018','Cain and Abels','https://abels.com/original/','./img/cain_abels.jpg',1,'Cain and Abel\'s is an above 21 bar. Do not come here to study.',1544568181),('UTAustinStudent2018','Gregory Gym Billiards','https://www.utrecsports.org/facilities/facility/gregory-gym','./img/billiards.jpg',1,'The billiards table at Gregory Gym is for playing Billiards. I do not recommend studying here.',1544568291),('UTAustinStudent2018','CPE Computer Lab','https://maps.utexas.edu/buildings/utm/cpe','./img/cpe_computer.jpg',7,'The computer lab in the Chemical and Engineering building is good for collaborating and studying. It can be noisy during the middle of the day on weekdays.',1544568509),('UTAustinStudent2018','Jester 2nd Floor','http://hf-food.austin.utexas.edu/foodpro/nutframe2.asp?sName=The+University+of+Texas+at+Austin+-+Housing+and+Dining&locationNum=12&locationName=Jester+2nd+Floor+Dining&naFlag=1','./img/j2.jpg',4,'J2 is a dining hall at Jester. It is a good spot to collaborate but not a good place to study independently.',1544568714),('UTAustinStudent2018','PCL','https://www.lib.utexas.edu/about/locations/pcl','./img/pcl.jpg',10,'The Perry-Castaneda library is one of the best places to study on campus. There are quiet floors for independent study in addition to floors for collaborative work. The hours are also good.',1544568820),('UTAustinStudent2018','EERC','http://www.engr.utexas.edu/eerc','./img/eerc.jpg',8,'The engineering building ground floor is good for studying and collaborating. The building is new and provides a modern look. There is also the Makerspace Studio for engineering students that want to use machinery or 3D printers.',1544569215),('UTAustinStudent2018','EERC Graduate Lounge','http://www.engr.utexas.edu/eerc','./img/eerc_grad.jpg',9,'The EERC graduate lounge is new and provides a modern look. It is fairly quiet.',1544569276),('UTAustinStudent2018','OXE Lounge','https://sites.utexas.edu/oxe/','./img/oxe.jpg',8,'The chemical engineering honor society, OXE, has a lounge for students to study and collaborate. They also sell snacks and drinks.',1544569371),('UTAustinStudent2018','Welch Hall','https://facilitiesservices.utexas.edu/buildings/UTM/0161','./img/welch.jpg',4,'Welch is the chemistry building. It is noisy because of the high number of students entering and exiting during the day.',1544569467),('UTAustinStudent2018','GDC Atrium','https://facilitiesservices.utexas.edu/buildings/UTM/0152','https://www.aiaaustin.org/sites/default/files/styles/story_image/public/useruploads/1/4/dell_atrium_620x390_smaller.jpeg?itok=VAMyEeUN',6,'The Gates-Dell Complex has a new and modern atrium. However, it is noisy during the weekdays due to the high foot traffic of students.',1544569674);
/*!40000 ALTER TABLE `spots` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-11 17:45:33
