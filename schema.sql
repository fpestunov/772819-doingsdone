CREATE DATABASE doingsdone
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

CREATE TABLE `projects` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `user_id` INT(11) NOT NULL,
    `name` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `tasks` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `project_id` INT(11) NOT NULL,
    `user_id` INT(11) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `file_path` VARCHAR(255) DEFAULT NULL,
    `status` TINYINT NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `executed_at` TIMESTAMP NULL DEFAULT NULL,
    `deadline_at` DATE NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE INDEX task_name ON tasks(name);

CREATE TABLE `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(64) NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

CREATE UNIQUE INDEX user_email ON users(email);
