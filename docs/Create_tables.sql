CREATE DATABASE IF NOT EXISTS arcadia_db CHARACTER SET utf8 COLLATE utf8_general_ci;
USE arcadia_db;



CREATE TABLE feedbacks (
  id integer PRIMARY KEY,
  pseudo varchar(255),
  content varchar(255),
  rating integer,
  status ENUM('PENDING', 'ACCEPTED', 'REFUSED') DEFAULT 'PENDING',
  created_at timestamp,
  updated_at timestamp
);

CREATE TABLE users (
  id integer PRIMARY KEY,
  role_id integer,
  username varchar(255),
  password  varchar(255),
  firtname varchar(255),
  lastname varchar(255) ,
  created_at timestamp,
  updated_at timestamp
);

CREATE TABLE roles (
  id integer PRIMARY KEY,
  label varchar(255) NULL,
  created_at timestamp,
  updated_at timestamp
);

CREATE TABLE services (
  id integer PRIMARY KEY,
  label varchar(255),
  content text,
  url text,
  options text,
  created_at timestamp,
  updated_at timestamp
);

CREATE TABLE hours (
  id integer PRIMARY KEY,
  day varchar(255),
  opening_time time,
  closing_time time,
  created_at timestamp,
  updated_at timestamp
);

CREATE TABLE homes (
  id integer PRIMARY KEY,
  label varchar(255),
  content text,
  created_at timestamp,
  updated_at timestamp
);

CREATE TABLE homes_comments (
  id integer PRIMARY KEY,
  user_id integer,
  home_id integer,
  content text,
  created_at timestamp,
  updated_at timestamp
);

CREATE TABLE homes_pictures (
  id integer PRIMARY KEY,
  home_id integer,
  url text,
  created_at timestamp,
  updated_at timestamp
);

CREATE TABLE animals (
  id integer PRIMARY KEY,
  home_id integer,
  name varchar(255),
  breed varchar(255),
  created_at timestamp,
  updated_at timestamp
);

CREATE TABLE pictures_animals (
  id integer PRIMARY KEY,
  animal_id integer,
  url text,
  created_at timestamp,
  updated_at timestamp
);

CREATE TABLE veterinarians_reports (
  id integer PRIMARY KEY,
  user_id integer,
  animal_id integer,
  animal_condition varchar(255),
  food varchar(255),
  food_quantity integer,
  details text,
  visit_at datetime,
  created_at timestamp,
  updated_at timestamp
);

CREATE TABLE animals_reports (
  id integer PRIMARY KEY,
  user_id integer,
  animal_id integer,
  food varchar(255),
  food_quantity integer,
  food_at datetime,
  created_at timestamp,
  updated_at timestamp
);

ALTER TABLE users ADD FOREIGN KEY (role_id) REFERENCES roles (id);

ALTER TABLE veterinarians_reports ADD FOREIGN KEY (user_id) REFERENCES users (id);

ALTER TABLE veterinarians_reports ADD FOREIGN KEY (animal_id) REFERENCES animals (id);

ALTER TABLE animals ADD FOREIGN KEY (home_id) REFERENCES homes (id);

ALTER TABLE pictures_animals ADD FOREIGN KEY (animal_id) REFERENCES animals (id);

ALTER TABLE homes_pictures ADD FOREIGN KEY (home_id) REFERENCES homes (id);

ALTER TABLE homes_comments ADD FOREIGN KEY (user_id) REFERENCES users (id);

ALTER TABLE homes_comments ADD FOREIGN KEY (home_id) REFERENCES homes (id);

ALTER TABLE animals_reports ADD FOREIGN KEY (user_id) REFERENCES users (id);

ALTER TABLE animals_reports ADD FOREIGN KEY (animal_id) REFERENCES animals (id);
