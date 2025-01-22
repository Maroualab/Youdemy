<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/website/config/database.php';

interface StatsInterface
{
    public function calculate($teacher_id);
}

class CourseStats implements StatsInterface
{
    protected $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function calculate($teacher_id)
    {
        $sql = "SELECT COUNT(*) as total_courses FROM courses WHERE teacher_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$teacher_id]);
        return $stmt->fetchColumn();
    }
}

class StudentStats implements StatsInterface
{
    protected $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function calculate($teacher_id)
    {
        $sql = "SELECT COUNT(DISTINCT student_id) as total_students FROM enrollments WHERE course_id IN (SELECT id FROM courses WHERE teacher_id = ?);";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$teacher_id]);
        return $stmt->fetchColumn();
    }
}

class AdminStats
{
    protected $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function calculateBestCourse()
    {
        $sql = "SELECT courses.id , courses.title , COUNT(enrollments.course_id) as Enrollement_Total
                FROM courses
                JOIN enrollments ON courses.id = enrollments.course_id
                GROUP BY enrollments.course_id 
                ORDER BY COUNT(enrollments.course_id) DESC
                LIMIT 1 ;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function calculateTopTeachers()
    {
        $sql = "SELECT 
    u.username AS teacher_username,
    COUNT(c.id) AS total_courses
FROM 
    Courses c
JOIN 
    Users u ON c.teacher_id = u.id
GROUP BY 
    u.id
ORDER BY 
    total_courses DESC
LIMIT 3;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}
