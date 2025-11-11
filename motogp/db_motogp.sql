CREATE DATABASE db_motogp;
USE db_motogp;

CREATE TABLE team (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  country VARCHAR(100)
);

CREATE TABLE rider (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  nationality VARCHAR(100),
  number INT,
  team_id INT,
  CONSTRAINT fk_rider_team FOREIGN KEY (team_id) REFERENCES team(id) ON DELETE SET NULL
);

CREATE TABLE bike (
  id INT AUTO_INCREMENT PRIMARY KEY,
  rider_id INT NOT NULL,
  model VARCHAR(120) NOT NULL,
  engine_cc INT,
  chassis VARCHAR(120),
  year INT,
  CONSTRAINT fk_bike_rider FOREIGN KEY (rider_id) REFERENCES rider(id) ON DELETE CASCADE
);
