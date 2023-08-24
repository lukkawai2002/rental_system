CREATE DATABASE  IF NOT EXISTS `rental_system`;
USE `rental_system`;

DROP TABLE IF EXISTS `respond`;
DROP TABLE IF EXISTS `make_notice`;
DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `Login_id` varchar(9) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Nickname` varchar(15) NOT NULL,
  PRIMARY KEY (`Login_id`),
  UNIQUE KEY `Login_id_UNIQUE` (`Login_id`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `make_notice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(20) NOT NULL,
  `Location` varchar(30) NOT NULL,
  `Home_Size` int unsigned NOT NULL,
  `Number_Of_Room` int NOT NULL,
  `Price` int unsigned NOT NULL,
  `Contact_Number` int unsigned NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Login_id` varchar(9) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `Title_UNIQUE` (`Title`),
  UNIQUE KEY `Location_UNIQUE` (`Location`),
  KEY `Login_id_idx` (`Login_id`),
  CONSTRAINT `Login_id` FOREIGN KEY (`Login_id`) REFERENCES `user` (`Login_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `respond` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Respond` varchar(100) NOT NULL,
  `Send_id` varchar(9) NOT NULL,
  `Receive_id` varchar(9) NOT NULL,
  `Notice_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Send_id_idx` (`Send_id`),
  KEY `Receive_id_idx` (`Receive_id`),
  KEY `Notice_id_idx` (`Notice_id`),
  CONSTRAINT `Notice_id` FOREIGN KEY (`Notice_id`) REFERENCES `make_notice` (`id`) ON DELETE CASCADE,
  CONSTRAINT `Receive_id` FOREIGN KEY (`Receive_id`) REFERENCES `user` (`Login_id`) ON DELETE CASCADE,
  CONSTRAINT `Send_id` FOREIGN KEY (`Send_id`) REFERENCES `user` (`Login_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;