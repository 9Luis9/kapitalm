CREATE TABLE `users` (
	`user_id` INT(20) NOT NULL AUTO_INCREMENT,
	`role_id` VARCHAR(20) NOT NULL,
	`login` varchar(100) NOT NULL,
	`email` varchar(100) NOT NULL,
	`password` varchar(100) NOT NULL,
	`activation_code` varchar(100) NOT NULL,
	`activated` INT(1) NOT NULL DEFAULT '0',
	`fio` varchar(100) NOT NULL,
	`phone` varchar(30) NOT NULL,
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `roles` (
	`role_id` VARCHAR(20) NOT NULL,
	`role_name` varchar(20) NOT NULL,
	PRIMARY KEY (`role_id`)
);

CREATE TABLE `chats` (
	`chat_id` INT(20) NOT NULL AUTO_INCREMENT,
	`user_id` INT(20) NOT NULL,
	PRIMARY KEY (`chat_id`)
);

CREATE TABLE `messages` (
	`message_id` INT(20) NOT NULL AUTO_INCREMENT,
	`chat_id` INT(20) NOT NULL,
	`user_id` INT(20) NOT NULL,
	`message_text` TEXT(1000) NOT NULL,
	`message_time` DATETIME NOT NULL,
	`uploaded_doc` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`message_id`)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles`(`role_id`);

ALTER TABLE `chats` ADD CONSTRAINT `chats_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `messages` ADD CONSTRAINT `messages_fk0` FOREIGN KEY (`chat_id`) REFERENCES `chats`(`chat_id`);

ALTER TABLE `messages` ADD CONSTRAINT `messages_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

