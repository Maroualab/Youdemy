<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/website/config/database.php';

class User
{
    private $username;
    private $email;
    private $password;
    private $role;
    protected $conn;

    public function __construct($username , $email , $password , $role)
    {
        $this->conn = Database::getConnection();
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->role = $role;
        
    }

    public function register()
    {
        $this->checkEmailExistsRegister($this->email);
        $this->password = $this->hashPassword($this->password);
        $this->insertUser();
    }

    private function checkEmailExistsRegister($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            throw new Exception("Email is already registered.");
        }
    }

    private function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    private function insertUser()
    {
        try {
            $sql = "INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)";
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password,
                'role' => $this->role
            ]);

            session_start();
            $_SESSION['user_id'] = $this->conn->lastInsertId();
            $_SESSION['user_name'] = $this->username;
            $_SESSION['user_role'] = $this->role;

            header("Location: ../../public/index.php");
            exit();
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }

 
}

class Teacher extends User
{
    public static function getPendingTeachers()
    {
        $sql = "SELECT * FROM users WHERE role = 'teacher' AND status = 'pending'";
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


