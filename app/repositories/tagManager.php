<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php'; 


class TagManager {

    protected $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public static function fetchAllTags() {
        // Create an instance of TagManager to access the connection
        $instance = new self();
        $sql = "SELECT * FROM tags";
        $stmt = $instance->conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteTag($id) {
        $sql = "DELETE FROM tags WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
