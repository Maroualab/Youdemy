<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php'; 


class TagManager {

    protected $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public static function fetchAllTags() {
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


}
