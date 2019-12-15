CREATE TABLE IF NOT EXISTS users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(45) NOT NULL,
  email VARCHAR(45) NOT NULL,
  password VARCHAR(45) NOT NULL,
  phone VARCHAR(45),
  skype VARCHAR(45),
  other_messanger VARCHAR(45),
  date_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  city_id INT references cities(id),
  popular INT(11),
  role INT(11),
  PRIMARY KEY(id),
  UNIQUE KEY `user_email` (`email`),
  FOREIGN KEY (role) REFERENCES user_role (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS categories (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(45),
  icon VARCHAR(45),
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS cities (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(45),
  latCity VARCHAR(45),
  longCity VARCHAR(45),
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS user_role (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(45),
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS statuses (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(45),
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS tasks (
  id INT(11) NOT NULL AUTO_INCREMENT,
  title VARCHAR(45) NOT NULL,
  description TEXT,
  category_id INT references categories (id),
  date_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  date_finish TIMESTAMP,
  city_id INT references cities (id),
  status_id INT references statuses (id),
  customer_id INT(11) references users (id),
  implementer_id INT(11) references users (id),
  file_link VARCHAR(45),
  cost INT(11),
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS response (
  id INT(11) NOT NULL AUTO_INCREMENT,
  comment TEXT NOT NULL,
  date_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  score INT(11),
  task_id INT references tasks (id),
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

