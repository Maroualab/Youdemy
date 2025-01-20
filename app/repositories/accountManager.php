<?php

require_once '../../config/database.php';


class AccountManager {

    protected $conn;

    public function login($email, $password)
    {
        $this->conn = Database::getConnection();
        $user = $this->checkEmailExistsLogin($email);
        $this->verifyPasswordAndLogin($user, $password);
    }

    private function checkEmailExistsLogin($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            throw new Exception("Email not registered.");
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function verifyPasswordAndLogin($user, $password)
    {
        if (!password_verify($password, $user['password'])) {
            throw new Exception("Invalid password.");
        }

        session_start();
        // $_SESSION['user_id'] = $user['id'];
        // $_SESSION['user_name'] = $user['username'];
        // $_SESSION['user_role'] = $user['role'];
        // $_SESSION['user_status'] = $user['status'];

        if ($user['status'] === 'suspended') {
            header("Location: ../views/auth/suspendedAccount.php");
        } elseif ($user['role'] === 'Teacher' && $user['status'] === 'pending') {
            header("Location: ../views/teacher/pendingAccount.php");
        } elseif ($user['role'] === 'Teacher' && $user['status'] === 'active') {
            $_SESSION['teacher_id'] = $user['id'];
            header("Location: ../views/teacher/teacherDashboard.php");
        } elseif ($user['role'] === 'Student') {
            $_SESSION['student_id'] = $user['id'];
            header("Location: ../views/student/studentHomepage.php");
        } elseif ($user['role'] === 'Admin' ) {
            $_SESSION['admin_id'] = $user['id'];
            header("Location: ../views/admin/adminDashboard.php");
        }
        exit();
    }
}
?>
