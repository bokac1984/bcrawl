ALTER TABLE  `users` ADD  `group_id` INT NOT NULL AFTER  `id`;
CREATE TABLE groups (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    created DATETIME,
    modified DATETIME
);