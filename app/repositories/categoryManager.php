<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php'; 


class CategoryManager{

    protected $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public static function fetchAllCategories() {
        $instance = new self();
        $sql = "SELECT * FROM categories";
        $stmt = $instance->conn->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deleteCategory($id) {
        $instance = new self();

        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt =$instance->conn->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }



  
}
