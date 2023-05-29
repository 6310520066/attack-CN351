
USE `db_test`;

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `username` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
                        `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
                        `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
                        `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

DROP TABLE IF EXISTS `blog`;

CREATE TABLE blog (
                      `id` INT PRIMARY KEY AUTO_INCREMENT,
                      `header` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
                      `detail` VARCHAR(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
                      `created_by` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
                      `created_at` TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
                    `id` INT PRIMARY KEY AUTO_INCREMENT,
                    `blog_id` INT NOT NULL,
                    `created_by` INT(11) NOT NULL,
                    `created_at` TIMESTAMP,
                    FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE, 
                    FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;