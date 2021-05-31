CREATE TABLE `task` (
	`task_id` varchar(16) NOT NULL,
	`task_name` varchar(32) NOT NULL,
	`p_id` varchar(30) NOT NULL,
	`p_status` varchar(16) NOT NULL,
	`start_date` varchar(20) NOT NULL default now(),
	`end_date` varchar(20) NOT NULL,
	`created_by` varchar(20) NOT NULL
);