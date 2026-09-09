CREATE DATABASE IF NOT EXISTS `mydb`
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE `mydb`;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(100) NOT NULL,
    `lastname` VARCHAR(100) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `username` VARCHAR(100) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('admin', 'moderator', 'user') NOT NULL DEFAULT 'user',
    `is_active` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username_unique` (`username`),
    UNIQUE KEY `email_unique` (`email`),
    KEY `role_idx` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `products` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `product_name` VARCHAR(100) NOT NULL,
    `description` TEXT NOT NULL,
    `price` DECIMAL(10,2) UNSIGNED NOT NULL,
    `quantity` INT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `refresh_tokens` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `token` TEXT NOT NULL,
    `expires_at` DATETIME NOT NULL,
    `jti` TEXT NOT NULL,
    PRIMARY KEY (`id`),
    KEY `user_id_idx` (`user_id`),
    CONSTRAINT `refresh_tokens_user_fk`
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`firstname`, `lastname`, `email`, `username`, `password`)
SELECT 'Juan', 'Dela Cruz', 'juan@example.com', 'juandelacruz',
       '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC5D3a0vL6Y9Yj6Y2m9W'
WHERE NOT EXISTS (SELECT 1 FROM `users` WHERE `username` = 'juandelacruz');

INSERT INTO `users` (`firstname`, `lastname`, `email`, `username`, `password`)
SELECT 'Maria', 'Santos', 'maria@example.com', 'mariasantos',
       '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC5D3a0vL6Y9Yj6Y2m9W'
WHERE NOT EXISTS (SELECT 1 FROM `users` WHERE `username` = 'mariasantos');

INSERT INTO `users` (`firstname`, `lastname`, `email`, `username`, `password`)
SELECT 'Pedro', 'Garcia', 'pedro@example.com', 'pedrogarcia',
       '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC5D3a0vL6Y9Yj6Y2m9W'
WHERE NOT EXISTS (SELECT 1 FROM `users` WHERE `username` = 'pedrogarcia');

INSERT INTO `users` (`firstname`, `lastname`, `email`, `username`, `password`)
SELECT 'Ana', 'Reyes', 'ana@example.com', 'anareyes',
       '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC5D3a0vL6Y9Yj6Y2m9W'
WHERE NOT EXISTS (SELECT 1 FROM `users` WHERE `username` = 'anareyes');

INSERT INTO `users` (`firstname`, `lastname`, `email`, `username`, `password`)
SELECT 'Jose', 'Mendoza', 'jose@example.com', 'josemendoza',
       '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC5D3a0vL6Y9Yj6Y2m9W'
WHERE NOT EXISTS (SELECT 1 FROM `users` WHERE `username` = 'josemendoza');