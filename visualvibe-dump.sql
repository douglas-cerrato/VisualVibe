-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: visualvibe
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
-- Table structure for table `blocked`
--

DROP TABLE IF EXISTS `blocked`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blocked` (
  `userID` int(11) DEFAULT NULL,
  `blockedID` int(11) DEFAULT NULL,
  KEY `FK_userID3_vibeUsers.ID` (`userID`),
  KEY `FK_blockedID_vibeUsers.ID` (`blockedID`),
  CONSTRAINT `FK_blockedID_vibeUsers.ID` FOREIGN KEY (`blockedID`) REFERENCES `vibeUsers` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_userID3_vibeUsers.ID` FOREIGN KEY (`userID`) REFERENCES `vibeUsers` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocked`
--

LOCK TABLES `blocked` WRITE;
/*!40000 ALTER TABLE `blocked` DISABLE KEYS */;
/*!40000 ALTER TABLE `blocked` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followers` (
  `userID` int(11) DEFAULT NULL,
  `followerID` int(11) DEFAULT NULL,
  KEY `Fk_userID_vibeUsers.ID` (`userID`),
  KEY `FK_followerID_vibeUsers.ID` (`followerID`),
  CONSTRAINT `FK_followerID_vibeUsers.ID` FOREIGN KEY (`followerID`) REFERENCES `vibeUsers` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Fk_userID_vibeUsers.ID` FOREIGN KEY (`userID`) REFERENCES `vibeUsers` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followers`
--

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
/*!40000 ALTER TABLE `followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `following`
--

DROP TABLE IF EXISTS `following`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `following` (
  `userID` int(11) DEFAULT NULL,
  `followingID` int(11) DEFAULT NULL,
  KEY `FK_userID2_vibeUsers.ID` (`userID`),
  KEY `FK_followingID_vibeUsers.ID` (`followingID`),
  CONSTRAINT `FK_followingID_vibeUsers.ID` FOREIGN KEY (`followingID`) REFERENCES `vibeUsers` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_userID2_vibeUsers.ID` FOREIGN KEY (`userID`) REFERENCES `vibeUsers` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `following`
--

LOCK TABLES `following` WRITE;
/*!40000 ALTER TABLE `following` DISABLE KEYS */;
/*!40000 ALTER TABLE `following` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postComments`
--

DROP TABLE IF EXISTS `postComments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postComments` (
  `postID` int(11) DEFAULT NULL,
  `commentUserID` int(11) DEFAULT NULL,
  `commentPostDate` date DEFAULT NULL,
  `postComment` varchar(255) DEFAULT NULL,
  KEY `FK_postID_userPosts.ID` (`postID`),
  KEY `FK_commentUserID_vibeUsers.ID` (`commentUserID`),
  CONSTRAINT `FK_commentUserID_vibeUsers.ID` FOREIGN KEY (`commentUserID`) REFERENCES `vibeUsers` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_postID_userPosts.ID` FOREIGN KEY (`postID`) REFERENCES `userPosts` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postComments`
--

LOCK TABLES `postComments` WRITE;
/*!40000 ALTER TABLE `postComments` DISABLE KEYS */;
/*!40000 ALTER TABLE `postComments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userMessages`
--

DROP TABLE IF EXISTS `userMessages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userMessages` (
  `userID` int(11) DEFAULT NULL,
  `messageReceiverID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userMessages`
--

LOCK TABLES `userMessages` WRITE;
/*!40000 ALTER TABLE `userMessages` DISABLE KEYS */;
/*!40000 ALTER TABLE `userMessages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userPosts`
--

DROP TABLE IF EXISTS `userPosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userPosts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL DEFAULT 0,
  `imagePosted` varchar(450) NOT NULL,
  `datePosted` date NOT NULL,
  `likeCount` int(11) NOT NULL DEFAULT 0,
  `commentCount` int(11) NOT NULL DEFAULT 0,
  `postLink` varchar(450) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `imagePosted` (`imagePosted`),
  KEY `FK_userID_to_ID` (`userID`),
  CONSTRAINT `FK_userID_to_ID` FOREIGN KEY (`userID`) REFERENCES `vibeUsers` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userPosts`
--

LOCK TABLES `userPosts` WRITE;
/*!40000 ALTER TABLE `userPosts` DISABLE KEYS */;
/*!40000 ALTER TABLE `userPosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vibeUsers`
--

DROP TABLE IF EXISTS `vibeUsers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vibeUsers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `followerCount` int(11) NOT NULL DEFAULT 0,
  `profilePrivate` binary(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Username` (`Username`),
  UNIQUE KEY `phoneNumber` (`phoneNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vibeUsers`
--

LOCK TABLES `vibeUsers` WRITE;
/*!40000 ALTER TABLE `vibeUsers` DISABLE KEYS */;
/*!40000 ALTER TABLE `vibeUsers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-20  5:09:33
