<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/website/config/database.php';

class Enrollement
{

    protected $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }


    public function enrollCourse($studentId, $courseId)
    {
        $query = "SELECT * FROM enrollments WHERE student_id = :student_id AND course_id = :course_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'student_id' => $studentId,
            'course_id' => $courseId,
        ]);
        if ($stmt->rowCount() > 0) {
            echo "You are already enrolled in this course.";
            exit();
        }

        $sql = "INSERT INTO enrollments (student_id, course_id) VALUES (:student_id, :course_id)";
        $stmt = $this->conn->prepare($sql);


        $stmt->execute([
            'student_id' => $studentId,
            'course_id' => $courseId,
        ]);
    }

    public function fetchEnrolledCourses($student_id)
    {
        $sql =
            "SELECT 
    c.id AS course_id,
    c.title AS course_title,
    c.img AS course_img,
    c.content AS course_content,
    c.description AS course_description,
    GROUP_CONCAT(t.name) AS course_tags,
    cat.name AS course_category,
    u.username AS student_name
FROM 
    Courses c
JOIN 
    Categories cat ON c.category_id = cat.id
JOIN 
    enrollments ON c.id = enrollments.course_id 
JOIN 
    users u ON enrollments.student_id = u.id
LEFT JOIN 
    CourseTags ct ON c.id = ct.course_id
LEFT JOIN 
    Tags t ON ct.tag_id = t.id
WHERE 
    enrollments.student_id = :student_id
GROUP BY 
    c.id, u.username;
";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['student_id' => $student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}



