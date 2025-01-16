<?php

require_once '../../config/database.php';

class Tag{

    public $tag;
    protected $conn;

  
    public function __construct($tag) {
        $this->tag = $tag;
        $this->conn = Database::getConnection();
    }
     
    public function insertTag(){
        $this->conn = Database::getConnection();

        $sql = "INSERT INTO tags (name) VALUES (:name)";
        $stmt = $this->conn->prepare($sql);
    
        $stmt->execute(['name'=>$this->tag]);
    }

    public function fetchAllTags() {
        $sql = "SELECT * FROM tags";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all tags
    }

    public function deleteTag($id) {
        $sql = "DELETE FROM tags WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}