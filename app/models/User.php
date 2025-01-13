<?php

require_once '../../config/database.php';

class User {
    private $conn;
    private $table_name;

    public function __construct($db) {
        $this->conn = $db->getConnection();
        $this->table_name = $db->getTableName('users');
    }

    public function find($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $query = "INSERT INTO " . $this->table_name . " (username, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$data['username'], $data['email'], $data['password'], $data['role']]);
    }
}
