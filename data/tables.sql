CREATE TABLE IF NOT EXIST users (
id INT(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(45),
email VARCHAR(45) NOT NULL,
password VARCHAR(45),
date_add DATE(),
city INT references cities(id),
popular INT(11),
role INT(11),
PRIMARY KEY(id),
UNIQUE KEY `user_email` (`email`),
FOREIGN KEY (role) REFERENCES user_role (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXIST categories (
id INT(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(45),
icon VARCHAR(45),
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXIST cities (
id INT(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(45),
lat VARCHAR(45),
long VARCHAR(45),
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXIST user_role (
id INT(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(45),
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXIST statuses (
id INT(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(45),
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXIST tasks (
id INT(11) NOT NULL AUTO_INCREMENT,
title VARCHAR(45),
description VARCHAR(45) NOT NULL,
category_id INT references categories (id),
date_add DATE(),
date_finish DATE(),
city_id INT references cities (id),
status_id INT references statuses (id),
customer_id INT(11) references users (id),
implementer_id INT(11) references users (id),
file_link VARCHAR(45),
cost INT(11)
PRIMARY KEY(id),
UNIQUE KEY `user_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXIST response (
id INT(11) NOT NULL AUTO_INCREMENT,
comment VARCHAR(45),
date_add DATE(),
score INT(11),
task_id INT references tasks (id),
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

