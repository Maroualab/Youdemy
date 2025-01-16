<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php';

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

    

}