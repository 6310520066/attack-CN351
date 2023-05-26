
USE `login_db`;

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `username` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
                        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
                        `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
                        `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;
