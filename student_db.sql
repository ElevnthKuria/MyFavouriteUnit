show databases;


CREATE DATABASE registration;

USE registration;

SHOW databases;

-- Create the Students Table
CREATE TABLE students
(student_id INT(100) AUTO_INCREMENT NOT NULL PRIMARY KEY,
student_name VARCHAR(50) NOT NULL,
registration_no VARCHAR(50) NOT NULL,
password VARCHAR(1000) NOT NULL
);


SELECT * FROM students;
DROP TABLE students;


DESCRIBE students;

DROP TABLE students;

-- Create the Units Table
CREATE TABLE units
(unit_id INT(10) AUTO_INCREMENT NOT NULL PRIMARY KEY,
unit_name VARCHAR(50) NOT NULL,
unit_code VARCHAR(10) NOT NULL,
year_taught VARCHAR(50) NOT NULL,
sem_taught VARCHAR(50) NOT NULL
);


SHOW TABLES;

DESCRIBE units;


DROP TABLE units;

INSERT INTO students(student_name, registration_no, password) 
	VALUES('Ken Kuria', 'BIS/011J/019', 'KenKuria#1');
INSERT INTO students(student_name, registration_no, password) 
	VALUES('ElevnthKuria', 'BIS/012J/019', 'KenKuria#2');
    
SELECT * FROM students;

    
INSERT INTO units(year_taught, sem_taught, unit_name, unit_code) 
	VALUES('First', 'I', 'Knowledge Management', 'HIS: 4103');
INSERT INTO units(year_taught, sem_taught, unit_name, unit_code) 
	VALUES('Third', 'II', 'Internet Application&Development', 'CIS: 4401');
    
SELECT * FROM units;

SELECT year_taught from units;


SELECT * FROM units WHERE unit_id = '1' AND unit_name ='Knowledge Management';

UPDATE units
SET unit_name= 'Databases', unit_code = 'CIS: 3321'
WHERE unit_id = '1';

DELETE FROM units
WHERE unit_id = '5';


SELECT * FROM units;
ORDER BY unit_code ASC; 
