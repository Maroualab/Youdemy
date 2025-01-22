<?php

session_start();

if (!isset($_SESSION['teacher_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

$teacher_id = $_SESSION['teacher_id'];

include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/controllers/CategoryControllers.php';
$categories = CategoryManager::fetchAllCategories();
global $categories;

include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/controllers/TagControllers.php';
$tags = TagManager::fetchAllTags();
global $tags;


include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/repositories/courseManager.php';
$coursecatalog = new CourseManager();
$coursecatalog = $coursecatalog->fetchCourseCatalog($teacher_id);

if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}

if (isset($_GET['course_id'])) {

    $course_id = $_GET['course_id'];
    $singleCourse = new CourseManager();
    $singleCourse = $singleCourse->fetchSingleCourse($course_id, $teacher_id);
    $singleCourse = isset($singleCourse)?$singleCourse:[];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Youdemy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="../../../assets/css/animate.css">
    <link rel="stylesheet" href="../../../assets/css/LineIcons.2.0.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap-5.0.5-alpha.min.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <!-- <link href="../../../public/src/output.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            line-height: 1.6;
        }

        /* Navbar styles */
        .navbar {
            background-color: #ffffff;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo h1 {
            color: #3498db;
            margin: 0;
            font-size: 1.8rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #3498db;
            background-color: #f8f9fa;
        }

        .logout-btn {
            color: #e74c3c !important;
        }

        /* Main content area */
        .dashboard-main {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Section styles */
        .dashboard-section {
            background: #ffffff;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .dashboard-section h2 {
            color: #2c3e50;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Form styles */
        .course-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        label {
            font-weight: 500;
            color: #2c3e50;
        }

        input,
        select,
        textarea {
            padding: 0.8rem;
            border: 2px solid #e9ecef;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #3498db;
        }

        /* Upload content styles */
        .content-upload {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .upload-box {
            border: 2px dashed #e9ecef;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-box:hover {
            border-color: #3498db;
            background-color: #f8f9fa;
        }

        .upload-box i {
            font-size: 2rem;
            color: #3498db;
            margin-bottom: 1rem;
        }

        .upload-box input[type="file"] {
            display: none;
        }

        /* Button styles */
        .submit-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #2980b9;
        }

        /* Statistics grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: #ffffff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-card i {
            font-size: 2rem;
            color: #3498db;
        }

        .stat-info h3 {
            font-size: 0.9rem;
            color: #7f8c8d;
            margin-bottom: 0.5rem;
        }

        .stat-info p {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
        }

        /* Course grid */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        /* Search bar */
        /* .search-bar {
            margin-bottom: 2rem;
        } */

        .search-bar input {
            width: 100%;
            /* max-width: 400px; */
            padding: 0.8rem;
            border: 2px solid #e9ecef;
            border-radius: 5px;
            font-size: 1rem;
        }

        /* Chart container */
        .chart-container {
            margin-top: 2rem;
            padding: 1rem;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #ffffff;
                flex-direction: column;
                padding: 1rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .nav-links.active {
                display: flex;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Simpler tag styles */
        .tags-wrapper {
            background: #fff;
            border-radius: 8px;
            padding: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .tags-search {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .tags-search input {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 200px;
        }

        .selected-count {
            color: #666;
            font-size: 0.9rem;
        }

        .tags-container {
            max-height: 400px;
            overflow-y: auto;
        }

        .tags-group {
            margin-bottom: 1.5rem;
        }

        .tags-group h4 {
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 1rem;
        }

        .tags-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .tag {
            display: inline-block;
            cursor: pointer;
        }

        .tag input[type="checkbox"] {
            display: none;
        }

        .tag span {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 20px;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .tag input[type="checkbox"]:checked+span {
            background: #3498db;
            color: white;
            border-color: #3498db;
        }

        /* Scrollbar styling */
        .tags-container::-webkit-scrollbar {
            width: 6px;
        }

        .tags-container::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .tags-container::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 3px;
        }

        .search-bar {
            margin-bottom: 20px;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }
    </style>

</head>

<body>
    <!--====== HEADER PART START ======-->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4">
            <nav class="flex items-center justify-between py-4">
                <a class="navbar-brand" href="../../../public/index.php" aria-label="Homepage">
                    <img id="logo" src="../../../assets/images/logo.svg" alt="Logo" class="h-10">
                    <!-- Add class to control logo size -->
                </a>
                <ul class="flex space-x-6">
                    <li>
                        <a href="#add-course" id="addSection" class="flex items-center active">
                            <i class="fas fa-plus-circle"></i> Add Course
                        </a>
                    </li>
                    <li>
                        <a href="#manage-courses" id="manageSection" class="flex items-center">
                            <i class="fas fa-tasks"></i> Manage Courses
                        </a>
                    </li>
                    <li>
                        <a href="#statistics" id="statisticsSection" class="flex items-center">
                            <i class="fas fa-chart-bar"></i> Statistics
                        </a>
                    </li>
                    <li>
                        <a href="../../controllers/logout.php" aria-label="Logout">
                            <button
                                class="font-semibold text-red-600 bg-white  hover:bg-red-50 hover:text-red-700 transition duration-300 ease-in-out">
                                Logout
                            </button>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>


    <!--====== HEADER PART ENDS ======-->


    <main class="dashboard-main">
        <section id="add-course" class="dashboard-section">
            <!-- <h2><i class="fas fa-plus-circle"></i> Add New Course</h2> -->


            <form id="newCourseForm" class="course-form" action="../../controllers/CourseControllers.php" method="POST"
                enctype="multipart/form-data">

                <div class="form-group content-upload-section">
                    <label>Course Content</label>
                    <!-- <?php print_r($singleCourse) ;?> -->
                    <div class="content-upload">
                        <div class="upload-box">
                            <!-- <i class="fas fa-file-pdf"></i> -->
                            <i class="fa-solid fa-image"></i>
                            <label for="imgUpload">
                                <p>Upload Course Banner</p>
                            </label>

                            <input type="file" accept=".pdf,.jpg,.png" name="img" id="imgUpload">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="courseTitle">Course Title</label>
                    <input type="text" id="courseTitle" name="title" value="<?=isset($singleCourse['course_title'])?$singleCourse['course_title']:'' ?>" required>
                </div>

                <div class="form-group">
                    <label for="courseDescription">Course Description</label>
                    <textarea id="courseDescription" name="description" rows="4" required><?=isset($singleCourse['course_description'])?$singleCourse['course_description']:'' ?></textarea>

                    <label for="courseContent">Course Content</label>
                    <textarea name="content" id="editor"><?=isset($singleCourse['course_content'])?$singleCourse['course_content']:'' ?></textarea>

                </div>

                <div class="form-row">

                    <div class="form-group">
                        <label for="courseCategory">Category</label>
                        <select id="courseCategory" name="category" required>
                            <option value="" >Select Category</option>

                            <?php   
                            foreach ($categories as $category) {
                                $selected='';
                                if($singleCourse['course_category']===$category['name']){
                                    $selected='selected';
                                }
                                echo "
                                <option value='$category[id]' $selected>
                                    $category[name]</option>
                                ";
                            } ?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label>Course Tags</label>
                    <div class="tags-wrapper">
                        <!-- <div class="tags-search">
                            <input type="text" id="tagSearch" placeholder="Search tags...">
                            <span class="selected-count">0 selected</span>
                        </div> -->
                        <div class="tags-container">
                            <div class="tags-group">
                                <h4>Tags</h4>
                                <div class="tags-list">
                                    <?php 
                                    if(isset($singleCourse)){
                                    $editTags=explode(',',$singleCourse['course_tags']);
                                }
                                    // print_r($editTags);
                                    foreach ($tags as $tag) {
                                        if(isset($editTags)){
                                        $checked = in_array($tag['name'], $editTags) ? 'checked' : '';  
                                    }   
                                    global $checked;                               
                                       echo "
                        <label class='tag'>
                            <input type='checkbox' name='tags[]' value='$tag[id]' $checked>
                            <span>$tag[name]</span>
                        </label>
                                        ";
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
                 <input name="course_id" type="hidden" value="<?=isset($singleCourse['course_id'])?$singleCourse['course_id']:'' ?>">                   
                <button type="submit" name="submit" class="submit-btn">Create Course</button>
            </form>
        </section>


        <section id="manage-courses" class="dashboard-section" style="display: none;">
            <!-- <h2><i class="fas fa-tasks"></i> Manage Courses</h2> -->

            <!--====== CATALOG PART START ======-->
            <!-- <section id="catalog" class="course-area pt-140 pb-170"> -->
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-10 mx-auto">
                        <div class="section-title text-center mb-50">
                            <h2 class="mb-15 wow fadeInUp" data-wow-delay=".2s">Course Catalog</h2>
                            <p class="wow fadeInUp" data-wow-delay=".4s">Explore our comprehensive range of free online
                                courses designed to help you succeed.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="search-bar text-center">
                            <input type="text" id="search" placeholder="Search courses by keywords..."
                                class="form-control" onkeyup="filterCourses()">
                        </div>
                    </div>
                </div>

                <div id="course-list" class="row mb-30">
                    <!-- Existing Course -->
                    <?php
                    // print_r($coursecatalog);
                    foreach ($coursecatalog as $displaycourse) {
                        echo "
                    <div class='col-xl-4 col-lg-4 col-md-6'>
                        <div class='single-course wow fadeInUp' data-wow-delay='.2s'>
                            <div class='course-img'>
                                <a href='./courseDetails.php?course_id=$displaycourse[course_id]'>
                                    <img src='/website/assets/images/courseBanners/" . htmlspecialchars($displaycourse['course_img']) . "' alt='course_picture'>
                                </a>
                            </div>
                            <div class='course-info'>
                                <h4><a href='./courseDetails.php?course_id=$displaycourse[course_id]'>$displaycourse[course_title]</a></h4>
                            </div>
                        
                       
                            <a href='/website/app/views/teacher/teacherDashboard.php?course_id=$displaycourse[course_id]'> 
      <button class='flex p-2.5 bg-yellow-500 rounded-xl hover:rounded-3xl hover:bg-yellow-600 transition-all duration-300 text-white'>
       <i class='fa-regular fa-pen-to-square'></i>
        </button></a>
        
        <a href='/website/app/controllers/deleteCourse.php?DeleteId=$displaycourse[course_id]'> 
      <button class='flex p-2.5 bg-red-500 rounded-xl hover:rounded-3xl hover:bg-red-600 transition-all duration-300 text-white'>
       <i class='fas fa-trash-alt'></i>
        </button></a>


        </div>
                    </div>
                
               ";
                    }
                    ?>




                </div>

                <!-- Pagination -->
                <div class="row">
                    <div class="col-xl-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- </section> -->
            <!--====== CATALOG PART ENDS ======-->

            <!--====== COURSE DETAILS PART START ======-->


        </section>


        <section id="statistics" class="dashboard-section" style="display: none;">
            <h2><i class="fas fa-chart-bar"></i> Course Statistics</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <i class="fas fa-book-open"></i>
                    <div class="stat-info">
                        <h3>Total Courses</h3>
                        <p id="totalCourses">


                            <?php
                            // echo count($coursecatalog);
                            include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/models/Stats.php';
                            $totalCourses = new CourseStats();
                            print_r($totalCourses->calculate($teacher_id));
                            ?>
                        </p>


                    </div>
                </div>
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <div class="stat-info">
                        <h3>Total Students</h3>
                        <p id="totalStudents">

                            <?php
                            include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/models/Stats.php';
                            $totalStudents = new StudentStats();
                            echo ($totalStudents->calculate($teacher_id));
                            ?>



                        </p>
                    </div>
                </div>
            </div>
        </section>


    </main>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

        let managebutton = document.getElementById("manageSection");
        let manageSection = document.getElementById("manage-courses");
        let addbutton = document.getElementById("addSection");
        let addSection = document.getElementById("add-course");
        let statisticsbutton = document.getElementById("statisticsSection");
        let statisticsSection = document.getElementById("statistics");

        managebutton.addEventListener("click", function () {
            addSection.style.display = 'none';
            manageSection.style.display = 'block';
            statisticsSection.style.display = 'none';

            addbutton.classList.remove("active");
            managebutton.classList.add("active");
            statisticsbutton.classList.remove("active");

        })

        addbutton.addEventListener("click", () => {
            addSection.style.display = 'block';
            manageSection.style.display = 'none';
            statisticsSection.style.display = 'none';

            addbutton.classList.add("active");
            managebutton.classList.remove("active");
            statisticsbutton.classList.remove("active");
        })

        statisticsbutton.addEventListener("click", () => {
            addSection.style.display = 'none';
            manageSection.style.display = 'none';
            statisticsSection.style.display = 'block';

            addbutton.classList.remove("active");
            managebutton.classList.remove("active");
            statisticsbutton.classList.add("active");
        })

        function filterCourses() {
            const input = document.getElementById('search').value.toLowerCase();
            const courses = document.querySelectorAll('.single-course');
            courses.forEach(course => {
                const title = course.querySelector('h4 a').textContent.toLowerCase();
                if (title.includes(input)) {
                    course.style.display = '';
                } else {
                    course.style.display = 'none';
                }
            });
        }


    </script>

</body>

</html>