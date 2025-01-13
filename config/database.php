<?php
// config/Database.php

class Database {
    private $host = "localhost";
    private $db_name = "youdemy";
    private $username = "root";
    private $password = "";
    public $conn;

    // Table names
    public $tables = [
        'users' => 'Users',
        'courses' => 'Courses',
        'categories' => 'Categories',
        'tags' => 'Tags',
        'course_tags' => 'CourseTags',
        'enrollments' => 'Enrollments'
    ];

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function getTableName($table) {
        return $this->tables[$table];
    }
}
