-- Create database if not exists
CREATE DATABASE IF NOT EXISTS my_database;

-- Use the database
USE my_database;

-- Create Courses table
CREATE TABLE IF NOT EXISTS Courses (
    courses_ID INT PRIMARY KEY AUTO_INCREMENT,
    courses_Name VARCHAR(255) NOT NULL,
    courses_Credit INT NOT NULL
);

-- Create Semesters table
CREATE TABLE IF NOT EXISTS Semesters (
    semesters_ID INT PRIMARY KEY AUTO_INCREMENT,
    semesters_Name VARCHAR(255) NOT NULL
);

-- Create Departments table
CREATE TABLE IF NOT EXISTS Departments (
    departments_ID INT PRIMARY KEY AUTO_INCREMENT,
    departments_Name VARCHAR(255) NOT NULL
);

-- Create Days table
CREATE TABLE IF NOT EXISTS Days (
    days_ID INT PRIMARY KEY AUTO_INCREMENT,
    days_Name VARCHAR(255) NOT NULL
);

-- Create Years table
CREATE TABLE IF NOT EXISTS Years (
    years_ID INT PRIMARY KEY AUTO_INCREMENT,
    years_Name VARCHAR(255) NOT NULL
);

-- Create Rooms table
CREATE TABLE IF NOT EXISTS Rooms (
    rooms_ID INT PRIMARY KEY AUTO_INCREMENT,
    room_Name VARCHAR(255) NOT NULL,
    room_Capacity INT
);

-- Create Periods table
CREATE TABLE IF NOT EXISTS Periods (
    periods_ID INT PRIMARY KEY AUTO_INCREMENT,
    periods_Name VARCHAR(255) NOT NULL
);

-- Create Professors table
CREATE TABLE IF NOT EXISTS Professors (
    professors_ID INT PRIMARY KEY AUTO_INCREMENT,
    professors_Name VARCHAR(255) NOT NULL,
    professors_PhoneNumber VARCHAR(255),
    professors_UserName VARCHAR(255),
    professors_Password VARCHAR(255)
);

-- Create CoursesDetails table
CREATE TABLE IF NOT EXISTS CoursesDetails (
    coursesdetails_ID INT PRIMARY KEY AUTO_INCREMENT,
    coursesdetails_courses_ID INT,
    coursesdetails_semesters_ID INT,
    coursesdetails_departments_ID INT,
    coursesdetails_years_ID INT,
    coursesdetails_days_ID INT,
    coursesdetails_rooms_ID INT,
    coursesdetails_periods_ID INT,
    coursesdetails_IsEnd BIT,
    coursesdetails_professors_ID INT,
    FOREIGN KEY (coursesdetails_courses_ID) REFERENCES Courses(courses_ID),
    FOREIGN KEY (coursesdetails_semesters_ID) REFERENCES Semesters(semesters_ID),
    FOREIGN KEY (coursesdetails_departments_ID) REFERENCES Departments(departments_ID),
    FOREIGN KEY (coursesdetails_years_ID) REFERENCES Years(years_ID),
    FOREIGN KEY (coursesdetails_days_ID) REFERENCES Days(days_ID),
    FOREIGN KEY (coursesdetails_rooms_ID) REFERENCES Rooms(rooms_ID),
    FOREIGN KEY (coursesdetails_periods_ID) REFERENCES Periods(periods_ID),
    FOREIGN KEY (coursesdetails_professors_ID) REFERENCES Professors(professors_ID),
    CONSTRAINT Unique_Course_Scheduling UNIQUE (coursesdetails_years_ID, coursesdetails_days_ID, coursesdetails_rooms_ID, coursesdetails_periods_ID)
);

-- Create Students table
CREATE TABLE IF NOT EXISTS Students (
    students_ID INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    cgpa DECIMAL(3, 2) NOT NULL,
    student_id VARCHAR(10) NOT NULL UNIQUE
);

-- Create StudentCourses table
CREATE TABLE IF NOT EXISTS StudentCourses (
    students_ID INT,
    coursesdetails_ID INT,
    FOREIGN KEY (students_ID) REFERENCES Students(students_ID),
    FOREIGN KEY (coursesdetails_ID) REFERENCES CoursesDetails(coursesdetails_ID),
    CONSTRAINT Unique_Student_Course UNIQUE (students_ID, coursesdetails_ID)
);

-- Create CoursesExamsDetails table
CREATE TABLE IF NOT EXISTS CoursesExamsDetails (
    coursesexamsdetails_ID INT PRIMARY KEY AUTO_INCREMENT,
    coursesexamsdetails_courses_ID INT,
    coursesexamsdetails_Name VARCHAR(255) NOT NULL,
    coursesexamsdetails_Date DATE,
    coursesexamsdetails_TotalMarks INT,
    FOREIGN KEY (coursesexamsdetails_courses_ID) REFERENCES Courses(courses_ID)
);

-- Create CoursesExamsMarks table
CREATE TABLE IF NOT EXISTS CoursesExamsMarks (
    coursesexamsmarks_ID INT PRIMARY KEY AUTO_INCREMENT,
    coursesexamsmarks_coursesexamsdetails_ID INT,
    coursesexamsdetails_students_ID INT,
    coursesexamsdetails_MarkOfStudent DECIMAL(5, 2),
    FOREIGN KEY (coursesexamsmarks_coursesexamsdetails_ID) REFERENCES CoursesExamsDetails(coursesexamsdetails_ID),
    FOREIGN KEY (coursesexamsdetails_students_ID) REFERENCES Students(students_ID)
);

-- Create AdminUsers table
CREATE TABLE IF NOT EXISTS AdminUsers (
    adminusers_ID INT PRIMARY KEY AUTO_INCREMENT,
    adminusers_UserName VARCHAR(255),
    adminusers_Password VARCHAR(255)
);

-- Insert sample data into Students table
INSERT INTO Students (name, age, cgpa, student_id) VALUES
    ('Omar Moamen Ahmed', 25, 3.78, 'ABC123'),
    ('Marwan Gaber', 22, 3.55, 'DEF456'),
    ('Hadir Amr', 28, 3.60, 'GHI789'),
    ('Farida', 30, 3.44, 'JKL123'),
    ('Christien', 40, 4, 'MNO456');
