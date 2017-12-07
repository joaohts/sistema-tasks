CREATE TABLE users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, -- id
    name VARCHAR(60) NOT NULL, -- nome
    email VARCHAR(80) NOT NULL, -- email
    PRIMARY KEY(id)
) COLLATE=utf8_unicode_ci;

CREATE TABLE tasks(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, -- id
    name VARCHAR(60) NOT NULL, -- nome
    description VARCHAR(80) NOT NULL, -- description
    file VARCHAR(80) NOT NULL, -- file
    PRIMARY KEY(id)
) COLLATE=utf8_unicode_ci;