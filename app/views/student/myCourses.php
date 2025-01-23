<?php

session_start();
$student_id = $_SESSION['student_id'];
require_once $_SERVER['DOCUMENT_ROOT'].'/website/app/repositories/enrollementManager.php'; 

 
$enroll = new Enrollement();
$courses = $enroll->fetchEnrolledCourses($student_id);  

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Course Catalog - Education & Online Course Website</title>
    <meta name="description" content="Browse our wide range of online courses.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="../../../assets/css/animate.css">
    <link rel="stylesheet" href="../../../assets/css/LineIcons.2.0.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap-5.0.5-alpha.min.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link href="../../../public/src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">


    <style>
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
            </a>
            <ul class="flex space-x-6">
                <li>
                    <a href="./studentHomepage.php" id="myCourses" class="flex items-center active">
                        </i>courses
                    </a>
                </li>
                <li>
                    <a href="../../controllers/logout.php" aria-label="Logout">
                        <button class="font-semibold text-red-600 bg-white  hover:bg-red-50 hover:text-red-700 transition duration-300 ease-in-out">
                            Logout
                        </button>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== CATALOG PART START ======-->
    <section id="catalog" class="course-area pt-140 pb-170">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-10 mx-auto">
                    <div class="section-title text-center mb-50">
                        <h2 class="mb-15 wow fadeInUp" data-wow-delay=".2s">My Courses</h2>
                        <p class="wow fadeInUp" data-wow-delay=".4s">Explore our comprehensive range of free online courses designed to help you succeed.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="search-bar text-center">
                        <input type="text" id="search" placeholder="Search courses by keywords..." class="form-control" onkeyup="filterCourses()">
                    </div>
                </div>
            </div>

            <div id="course-list" class="row mb-30">

                <!-- Existing Course -->
                <?php
                // print_r($courses);
                    // print_r($coursecatalog);
                    foreach ($courses as $course) {
                        echo "
                    <div class='col-xl-4 col-lg-4 col-md-6'>
                        <div class='single-course wow fadeInUp' data-wow-delay='.2s'>
                            <div class='course-img'>
                                <a href=''>
                                    <img src='/website/assets/images/courseBanners/". htmlspecialchars($course['course_img']) . "' alt='course_picture'>
                                </a>
                            </div>
                            <div class='course-info'>
                                <h4><a href='./courseDetails.php?course_id=$course[course_id]'>$course[course_title]</a></h4>
                            </div>
                        </div>
                    </div>
               ";
                    } 
                    ?>

               

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
    </section>
    <!--====== CATALOG PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    <footer id="footer" class="footer-area pt-170">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <a href="../../../public/index.php" class="logo d-blok">
                            <img src="../../../assets/images/logo.svg" alt="">
                        </a>
                        <p>Lorem ipsum dolor sit amco nsetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 offset-xl-1 offset-lg-1 col-md-6">
                    <div class="footer-widget">
                        <h5>Quick Links</h5>
                        <ul>
                            <li><a href="../../../public/index.php">Home</a></li>
                            <li><a href="./coursesCatalog.php">Courses</a></li>
                            <li><a href="#blog">Blog</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h5>Contact Us</h5>
                        <ul>
                            <li><p>Phone: +884-9273-3867</p></li>
                            <li><p>Email: hello@gmail.com</p></li>
                            <li><p>Address: Random Road<br> USA</p></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-credit">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="copy-right text-center text-md-left">
                            <p class="text-center">Designed and Developed by <a href="https://github.com/Maroualab/Youdemy">Maroua Labballi</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== Bootstrap js ======-->
    <script src="../../../assets/js/bootstrap.bundle-5.0.0.alpha-min.js"></script>
    <script src="../../../assets/js/main.js"></script>


</body>

</html>


