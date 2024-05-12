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
    student_id VARCHAR(10) NOT NULL UNIQUE
);

-- Insert some initial data
INSERT INTO students (name, age, cgpa, student_id) VALUES
    ('Omar Moamen Ahmed', 25, 3.78, 'ABC123'),
    ('Marwan Gaber', 22, 3.55, 'DEF456'),
    ('Hadir Amr', 28, 3.60, 'GHI789');