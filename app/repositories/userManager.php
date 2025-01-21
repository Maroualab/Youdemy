<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/website/config/database.php'; 


class UserManager {

    protected $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function fetchUsers(){

        $sql = "SELECT * FROM users WHERE status != 'pending'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
    

}