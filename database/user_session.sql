--Creation of the Database "taskApp"
CREATE DATABASE IF NOT EXISTS taskapp;
--first table to be created
CREATE TABLE `users` (
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `user_type` varchar(16) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`username`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;
--creation of the second table
CREATE TABLE `session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `start_time` TIMESTAMP DEFAULT NULL,
  `end_time` TIMESTAMP DEFAULT now(),
  PRIMARY KEY (`session_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 21 DEFAULT CHARSET = utf8mb4;