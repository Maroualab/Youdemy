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
        $stmt = $this->conn->prepare($sql);

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

    public function insertCourse($title, $description, $content, $teacher_id, $category_id, $tags, $image)
    {
        try {
            $sql = "INSERT INTO courses (title, description, content, teacher_id, category_id,img) 
            VALUES (:title, :description, :content, :teacher_id, :category_id , :img)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'title' => $title,
                'description' => $description,
                'content' => $content,
                'teacher_id' => $teacher_id,
                'category_id' => $category_id,
                'img'=>$image
            ]);

            $course_id = $this->conn->lastInsertId();

            if (!empty($tags)) {
                foreach ($tags as $tag_id) {
                    $stmt = $this->conn->prepare("INSERT INTO coursetags (course_id, tag_id) VALUES (:course_id, :tag_id)");
                    $stmt->execute([
                        'course_id' => $course_id,
                        'tag_id' => $tag_id
                    ]);
                }
            } 

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    public function fetchCourseCatalog($teacher_id){

        $sql = "SELECT 
    c.id AS course_id,
    c.title AS course_title,
    c.img AS course_img,
    c.content AS course_content,
    c.description AS course_description,
    GROUP_CONCAT(t.name) AS course_tags,
    cat.name AS course_category
FROM 
    Courses c
JOIN 
    Categories cat ON c.category_id = cat.id
LEFT JOIN 
    CourseTags ct ON c.id = ct.course_id
LEFT JOIN 
    Tags t ON ct.tag_id = t.id
WHERE 
    c.teacher_id = :teacher_id
GROUP BY 
    c.id;
";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'teacher_id' => $teacher_id
        ]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    public function fetchSingleCourse($course_id,$teacher_id){
        $sql = "SELECT 
            c.id AS course_id,
            c.title AS course_title,
            c.img AS course_img,
            c.content AS course_content,
            c.description AS course_description,
            GROUP_CONCAT(t.name) AS course_tags,
            cat.name AS course_category,
            u.username AS teacher
        FROM 
            Courses c 
            JOIN 
users u ON c.teacher_id=u.id
        JOIN 
            Categories cat ON c.category_id = cat.id
        LEFT JOIN 
            CourseTags ct ON c.id = ct.course_id
        LEFT JOIN 
            Tags t ON ct.tag_id = t.id
        WHERE 
            c.id = :course_id AND c.teacher_id = :teacher_id
        GROUP BY 
            c.id;
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'course_id' => $course_id,
            'teacher_id' => $teacher_id
        ]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function fetchAllCourses(){
        $sql = "SELECT 
            c.id AS course_id,
            c.title AS course_title,
            c.img AS course_img,
            c.content AS course_content,
            c.description AS course_description,
            GROUP_CONCAT(t.name) AS course_tags,
            cat.name AS course_category,
            u.username AS teacher
        FROM 
            Courses c
        JOIN 
            Categories cat ON c.category_id = cat.id
        LEFT JOIN 
            CourseTags ct ON c.id = ct.course_id
        LEFT JOIN 
            Tags t ON ct.tag_id = t.id
        JOIN 
            Users u ON c.teacher_id = u.id
        GROUP BY 
            c.id;
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function fetchSingleCourseByCourseId($course_id){
        $sql = "SELECT 
            c.id AS course_id,
            c.title AS course_title,
            c.img AS course_img,
            c.content AS course_content,
            c.description AS course_description,
            GROUP_CONCAT(t.name) AS course_tags,
            cat.name AS course_category,
            u.username AS teacher
        FROM 
            Courses c
        JOIN 
            Categories cat ON c.category_id = cat.id
        LEFT JOIN 
            CourseTags ct ON c.id = ct.course_id
        LEFT JOIN 
            Tags t ON ct.tag_id = t.id
        JOIN 
            Users u ON c.teacher_id = u.id
        WHERE 
            c.id = :course_id
        GROUP BY 
            c.id;
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['course_id' => $course_id]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;

    }

    
}

