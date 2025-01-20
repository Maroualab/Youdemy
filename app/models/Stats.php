<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php';

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
