CREATE TABLE `users` (
	`first_name` varchar(32) NOT NULL,
	`last_name` varchar(32) NOT NULL,
	`dob` DATE NOT NULL,
	`username` varchar(32) NOT NULL,
	`password` varchar(64) NOT NULL,
	PRIMARY KEY (`username`)
);

CREATE TABLE `session` (
	`session_id` varchar(16) NOT NULL AUTO_INCREMENT,
	`username` varchar(32) NOT NULL,
	`start_time` TIMESTAMP NOT NULL,
	`end_time` TIMESTAMP NOT NULL,
	PRIMARY KEY (`session_Id`)
);