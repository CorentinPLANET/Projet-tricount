CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT,
    mail VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS transactions (
    id INT NOT NULL AUTO_INCREMENT,
    transaction_name VARCHAR(255) NOT NULL,
    creator_id INT NOT NULL,
    amount INT NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL ,
    PRIMARY KEY (id),
    FOREIGN KEY (creator_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `groups` (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `group_user` (
    user_id INT NOT NULL,
    group_id INT NOT NULL,
    PRIMARY KEY (user_id, group_id),
    FOREIGN KEY (user_id) REFERENCES `users`(id),
    FOREIGN KEY (group_id) REFERENCES `groups`(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS transaction_user (
    transaction_id INT NOT NULL,
    contributor_id INT NOT NULL,
    group_id INT NOT NULL,
    PRIMARY KEY (transaction_id, contributor_id,group_id),
    FOREIGN KEY (transaction_id) REFERENCES transactions(id),
    FOREIGN KEY (contributor_id) REFERENCES `users`(id),
    FOREIGN KEY (group_id) REFERENCES `groups`(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'ami'),
(2, 'famille'),
(3, 'tout le monde');

INSERT INTO `group_user` (`user_id`, `group_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(5, 1),
(1, 2),
(2, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3);

INSERT INTO `transactions` (`id`, `transaction_name`, `creator_id`, `amount`, `date`) VALUES
(1, 'Essence', 1, 30, '2025-12-19 21:32:27'),
(2, 'Switch 2', 1, 300, '2025-12-19 21:38:11'),
(3, 'Anniversaire', 1, 500, '2025-12-19 21:39:26'),
(4, 'Lego', 1, 50, '2025-12-19 21:39:26'),
(5, 'Robux', 1, 50, '2025-12-19 21:39:26');

INSERT INTO `transaction_user` (`transaction_id`, `contributor_id`, `group_id`) VALUES
(2, 2, 3),
(3, 2, 3),
(2, 3, 3),
(3, 3, 3),
(2, 4, 3),
(3, 4, 3),
(5, 4, 3),
(2, 5, 3),
(3, 5, 3);

INSERT INTO `users`(`id`, `mail`, `password`, `username`) VALUES
(1, 'corentinplanet@gmail.com', '1234', 'Coco'),
(2, 'morgane@gmail.com', '12345', 'Momo'),
(3, 'raphael@gmail.com', '1345', 'Raph'),
(4, 'baptiste@gmail.com', '125', 'Baptiste'),
(5, 'aymeric@gmail.com', '145', 'Aymeric');