<?php


require_once $_SERVER['DOCUMENT_ROOT'] . '/website/config/database.php';


class CourseManager
{
    protected $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function getAllCourses()
    {
        $sql = "SELECT * FROM courses";
        $stmt = $this->conn->query($sql);

        if ($stmt->rowCount() > 0) {
            $courses = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $courses[] = $row;
            }
            return $courses;
        } else {
            return [];
        }
    }

    public function getCourseById($id)
    {
        $sql = "SELECT * FROM courses WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function insertCourse($title, $description, $content, $teacher_id, $category_id, $tags = [])
    {
        try {
            $sql = "INSERT INTO Courses (title, description, content, teacher_id, category_id) 
            VALUES (:title, :description, :content, :teacher_id, :category_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'title' => $title,
                'description' => $description,
                'content' => $content,
                'teacher_id' => $teacher_id,
                'category_id' => $category_id
            ]);

            $course_id = $this->conn->lastInsertId();

            if (!empty($tags)) {
                foreach ($tags as $tag_id) {
                    $stmt = $this->conn->prepare("INSERT INTO CourseTags (course_id, tag_id) VALUES (:course_id, :tag_id)");
                    $stmt->execute([
                        'course_id' => $course_id,
                        'tag_id' => $tag_id
                    ]);
                }
            }

        } catch (PDOException $e) {
            // Handle the exception (e.g., log the error, rethrow, etc.)
            echo "Error: " . $e->getMessage();
        }

    }
}

