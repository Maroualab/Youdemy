<?php

require_once '../../config/database.php';

class TagManager{

    protected $conn;

    public function fetchAllTags() {

        $this->conn = Database::getConnection();

        $sql = "SELECT * FROM tags";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        // return $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tags= $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteTag($id) {

        $this->conn = Database::getConnection();

        $sql = "DELETE FROM tags WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

}