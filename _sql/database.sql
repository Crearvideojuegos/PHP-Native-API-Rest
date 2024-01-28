DROP DATABASE if exists php_native_api_rest;
CREATE DATABASE php_native_api_rest CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
use php_native_api_rest;

CREATE TABLE `characters` (
    `id` tinyint (2) NOT NULL AUTO_INCREMENT,
    `name_character` varchar(40) NOT NULL,
    `description` varchar(200) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO `characters` (name_character, description) VALUES
('Alex', 'A Warrior Character');