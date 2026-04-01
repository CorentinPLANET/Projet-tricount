CREATE TABLE IF NOT EXISTS `users` (
	`id` int AUTO_INCREMENT NOT NULL,
	`mail` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`username` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `transactions` (
	`id` int AUTO_INCREMENT NOT NULL,
	`transaction_name` varchar(255) NOT NULL,
	`creator_id` int NOT NULL,
	`amount` int NOT NULL,
	`date` datetime NOT NULL DEFAULT 'current_timestamp',
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `groups` (
	`id` int AUTO_INCREMENT NOT NULL,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `group_user` (
	`user_id` int NOT NULL,
	`group_id` int NOT NULL,
	PRIMARY KEY (`user_id`, `group_id`)
);

CREATE TABLE IF NOT EXISTS `transaction_user` (
	`transaction_id` int NOT NULL,
	`contributor_id` int NOT NULL,
	`group_id` int NOT NULL,
	`amount` int NOT NULL,
	`complete` tinyint NOT NULL DEFAULT '0',
	PRIMARY KEY (`transaction_id`, `contributor_id`, `group_id`)
);


ALTER TABLE `transactions` ADD CONSTRAINT `transactions_fk2` FOREIGN KEY (`creator_id`) REFERENCES `users`(`id`);

ALTER TABLE `group_user` ADD CONSTRAINT `group_user_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `group_user` ADD CONSTRAINT `group_user_fk1` FOREIGN KEY (`group_id`) REFERENCES `groups`(`id`);
ALTER TABLE `transaction_user` ADD CONSTRAINT `transaction_user_fk0` FOREIGN KEY (`transaction_id`) REFERENCES `transactions`(`id`);

ALTER TABLE `transaction_user` ADD CONSTRAINT `transaction_user_fk1` FOREIGN KEY (`contributor_id`) REFERENCES `users`(`id`);

ALTER TABLE `transaction_user` ADD CONSTRAINT `transaction_user_fk2` FOREIGN KEY (`group_id`) REFERENCES `groups`(`id`);