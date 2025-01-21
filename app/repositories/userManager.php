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

    public function updateStatus($id,$status){

        $sql ="UPDATE users SET status=:status WHERE id=:id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute([
            "status"=>$status,
            "id"=>$id
        ]);
    }

    public function deleteUser($id ,$role ){
        
        if( $role = 'teacher' ){
        $sql = "DELETE FROM users WHERE id=:id";
        $stmt= $this->conn->prepare($sql);
        $stmt->execute([
            "id"=>$id
        ]);}else{
            $sql = "DELETE FROM Enrollments
WHERE id=:id;
DELETE FROM Users
WHERE id=:id AND role = :role;";
            $stmt= $this->conn->prepare($sql);
            $stmt->execute([
                "id"=>$id,
                "role"=>$role
            ]);

        }
    }

}