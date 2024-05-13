-- Create database if not exists
CREATE DATABASE IF NOT EXISTS my_database;

-- Use the database
USE my_database;

-- Create students table
CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    cgpa DECIMAL(3, 2) NOT NULL,
    student_id VARCHAR(10) NOT NULL UNIQUE,
    email VARCHAR(100)
);

-- Create users table for authentication
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(10),
    username VARCHAR(50) NOT NULL,
    pass VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE,
    FOREIGN KEY (student_id) REFERENCES students(student_id)
);

-- Insert some initial data into students table
INSERT INTO students (name, age, cgpa, student_id, email) VALUES
    ('Omar Moamen Ahmed', 20, 3.78, 'ABC123', 'omarmoamen@gmail.com'),
    ('Marwan Gaber', 20, 3.55, 'DEF456', 'Marwan@gmail.com'),
    ('Hadir Amr', 19, 3.60, 'GHI789', 'Hadir@gmail.com'),
    ('Farida', 19, 3.44, 'JKL123', 'Farida@gmail.com');

INSERT INTO users (student_id, username, pass, email) VALUES
    ("ABC123", "justOmar",'123456', 'omarmoamen@gmail.com');