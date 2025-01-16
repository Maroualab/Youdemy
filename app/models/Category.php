<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php';

class Category{

    public $category;
    protected $conn;

  
    public function __construct($category) {
        $this->category = $category;
        $this->conn = Database::getConnection();
    }
     
    public function insertCategory(){
        $this->conn = Database::getConnection();
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name'=>$this->category]);
    }
}