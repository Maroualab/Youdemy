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

    public static function deleteTag($id) {
        $instance = new self();
        $sql = "DELETE FROM tags WHERE id = :id";
        $stmt = $instance->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public static function updateTag($id, $name) {
        $instance = new self();
        $sql = "UPDATE tags SET name = :name WHERE id = :id";
        $stmt = $instance->conn->prepare($sql);
        return $stmt->execute(['name' => $name, 'id' => $id]);
    }


}
