
-- DROP DATABASE IF EXISTS employeesjobs;
CREATE DATABASE employeesjobs;
USE `employeesjobs`;
CREATE TABLE employees(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(60) NOT NULL,
    surname VARCHAR(60) NOT NULL,
    degree VARCHAR(80) NOT NULL,
    email VARCHAR(80) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    job_position VARCHAR(80) NOT NULL,
    salary VARCHAR(20)
);

CREATE TABLE jobs(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(80) NOT NULL,
    salary VARCHAR(80) NOT NULL
);