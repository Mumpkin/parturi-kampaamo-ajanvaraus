CREATE DATABASE scheduling;

CREATE TABLE users(
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(32),
  email VARCHAR(32),
  phone VARCHAR(32),
  password VARCHAR(32)
);

CREATE TABLE schedule(
  id INT AUTO_INCREMENT PRIMARY KEY,
  day INT,
  time INT,
  userid INT,
  comment VARCHAR(1000)
);
