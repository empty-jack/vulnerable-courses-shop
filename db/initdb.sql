CREATE DATABASE `Task` CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use `Task`;

CREATE TABLE orders(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name TEXT,
	email TEXT,
	phone TEXT,
	comment TEXT,
	product_id TEXT,
	price INT
);

INSERT INTO orders(id,name,email,phone,comment,product_id, price) VALUES (1,'flag','inforu@company.com','+74951493555', 'Some Secret Information','Beginer', 5);

CREATE TABLE secret_table(
	id INT AUTO_INCREMENT PRIMARY KEY,
	secret_column TEXT
);

INSERT INTO secret_table(id,secret_column) VALUES (0,'Some Very Secret Information');

CREATE USER 'task'@'%' IDENTIFIED BY 'low_privilage_user_pass';

GRANT ALL PRIVILEGES ON *.* TO 'task'@'%'