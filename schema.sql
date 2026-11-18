CREATE DATABASE IF NOT EXISTS the_burgerhotdog
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE the_burgerhotdog;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    middle_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    id_type VARCHAR(32) NOT NULL,
    username VARCHAR(191) NOT NULL,
    password VARCHAR(255) NOT NULL,
    id_image VARCHAR(255) NOT NULL,
    selfie_image VARCHAR(255) NOT NULL,
    face_confidence DECIMAL(5, 2) NOT NULL DEFAULT 0.00,
    PRIMARY KEY (id),
    UNIQUE KEY uq_users_username (username)
) ENGINE=InnoDB
  DEFAULT CHARACTER SET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;
