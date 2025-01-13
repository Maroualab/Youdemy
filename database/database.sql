-- Créer la base de données Youdemy
CREATE DATABASE Youdemy;

-- Utiliser la base de données Youdemy
USE Youdemy;

-- Créer la table Users
CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Student', 'Teacher', 'Admin') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Créer la table Categories
CREATE TABLE Categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Créer la table Tags
CREATE TABLE Tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Créer la table Courses
CREATE TABLE Courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    content TEXT,
    teacher_id INT,
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (teacher_id) REFERENCES Users(id),
    FOREIGN KEY (category_id) REFERENCES Categories(id)
);

-- Créer la table CourseTags (table de jonction pour la relation many-to-many entre Courses et Tags)
CREATE TABLE CourseTags (
    course_id INT,
    tag_id INT,
    PRIMARY KEY (course_id, tag_id),
    FOREIGN KEY (course_id) REFERENCES Courses(id),
    FOREIGN KEY (tag_id) REFERENCES Tags(id)
);

-- Créer la table Enrollments (table de jonction pour la relation many-to-many entre Students et Courses)
CREATE TABLE Enrollments (
    student_id INT,
    course_id INT,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (student_id, course_id),
    FOREIGN KEY (student_id) REFERENCES Users(id),
    FOREIGN KEY (course_id) REFERENCES Courses(id)
);
