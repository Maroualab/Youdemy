<?php
session_start();
$student_id = $_SESSION['student_id'];

include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/repositories/courseManager.php';
if (isset($_GET['course_id'])) {

    $course_id = $_GET['course_id'];
    $singleCourse = new CourseManager();
    $singleCourse = $singleCourse->fetchSingleCourseByCourseId($course_id);

}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Course Details - Full-stack Web Development</title>
    <meta name="description"
        content="Discover the Full-stack Web Development course details, including topics covered, instructor information, and how to enroll.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <style>
        .hero {
            /* background-image: url("../../../assets/images/course-bg.jpg"); */
            background-size: cover;
            background-position: center;
            color: #ffffff;
        }

        .main-btn {
            padding: 12px 30px;
            background-color: #fbbf24;
            /* Yellow Color */
            color: #000000;
            /* Black for contrast */
            border-radius: 0.375rem;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .main-btn:hover {
            background-color: #d69e20;
            /* Darker Yellow */
            transform: scale(1.05);
        }

        .instructor-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

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
                    <a href="./myCourses.php" id="myCourses" class="flex items-center active">
                        </i>My courses
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

    <!--====== HERO PART START ======-->
    <!-- <?php
    // print_r($singleCourse);
    ?> -->

    <section class="hero h-64 flex flex-col items-center justify-center relative"
        style="background-image: url('/website/assets/images/courseBanners/<?php echo htmlspecialchars($singleCourse['course_img']); ?>');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <h1 class="text-4xl font-bold text-white z-20"><?php echo $singleCourse['course_title'] ?></h1>
        <p class="mt-2 font-semibold text-white z-20"><?php echo $singleCourse['course_description'] ?></p>
    </section>




    <!--====== HERO PART ENDS ======-->

    <!--====== COURSE DETAILS PART START ======-->

    <section class='py-10 p-10 bg-gray-100'>
        <div class='container mx-auto px-4'>
            <div class='flex flex-col lg:flex-row'>
                <div class='lg:w-2/3'>


                    <h2 class='mt-8 text-3xl font-semibold'>Course Content</h2>
                    <p class='mt-4'><?php echo $singleCourse['course_content'] ?></p>


                    <a href="../../controllers/enrollementController.php?course_id=<?php echo $singleCourse['course_id']; ?>&student_id=<?php echo $student_id; ?>" class="main-btn mt-4 bg-blue-500 text-white p-2 rounded">Enroll for Free</a>

                </div>

                <div class='lg:w-1/3 lg:ml-10'>
                    <div class='bg-white shadow-lg rounded-lg p-6'>
                        <h2 class='text-xl font-semibold'>Course Info</h2>

                        <div class='mt-4'>
                            <strong>Instructor:</strong> <?php echo $singleCourse['teacher'] ?>
                        </div>
                        <div class='mt-2'>
                            <strong>Tags:</strong> <?php echo $singleCourse['course_tags'] ?>
                        </div>
                        <div class='mt-2'>
                            <strong>Category:</strong> <?php echo $singleCourse['course_category'] ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--====== COURSE DETAILS PART ENDS ======-->


    <!--====== FOOTER PART START ======-->
    <footer class="bg-gray-800 text-white pt-10">
        <div class="container mx-auto text-center">
            <p class="mb-2">Designed and Developed by <a href="https://github.com/Maroualab/Youdemy"
                    class="text-yellow-400 hover:underline">Maroua Labballi</a></p>
            <p>&copy; 2025 All rights reserved.</p>
        </div>
    </footer>
    <!--====== FOOTER PART ENDS ======-->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Find all oembed tags
            var oembeds = document.querySelectorAll('oembed');

            oembeds.forEach(function (oembed) {
                // Extract the URL from the oembed tag
                var url = oembed.getAttribute('url');

                // Check if it's a YouTube URL
                if (url && url.includes('youtu.be')) {
                    // Convert the shortened youtu.be URL to the full embed URL format
                    var videoId = url.split('/').pop().split('?')[0]; // Get video ID
                    url = 'https://www.youtube.com/embed/' + videoId;
                }

                if (url) {
                    // Create an iframe element
                    var iframe = document.createElement('iframe');
                    iframe.src = url;
                    iframe.width = '560'; // You can adjust this
                    iframe.height = '315'; // You can adjust this
                    iframe.frameBorder = '0';
                    iframe.allow = 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture';
                    iframe.allowFullscreen = true;

                    // Replace the <oembed> tag with the iframe
                    oembed.replaceWith(iframe);
                }
            });
        });
    </script>

</body>

</html>