<?php
session_start();
$teacher_id = $_SESSION['teacher_id'];

include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/repositories/courseManager.php';
if (isset($_GET['course_id'])) {

    $course_id = $_GET['course_id'];
    $singleCourse = new CourseManager();
    $singleCourse = $singleCourse->fetchSingleCourse($course_id, $teacher_id);

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
    </style>
</head>

<body>
    <!--====== HEADER PART START ======-->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 ">
            <nav class="flex items-center justify-between py-4">
                <a class="font-bold text-2xl text-yellow-500" href="../../../public/index.php">Course Logo</a>
                <ul class="flex space-x-6">
                    <li><a href="../../../public/index.php" class="hover:text-yellow-500">Home</a></li>
                    <li><a href="./coursesCatalog.php" class="hover:text-yellow-500">Course Catalog</a></li>
                    <li><a href="#blog" class="hover:text-yellow-500">Blog</a></li>
                    <li><a href="#contact" class="hover:text-yellow-500">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--====== HEADER PART ENDS ======-->

    <!--====== HERO PART START ======-->
    <?php
    print_r($singleCourse);
    ?>

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






                    <a href='#' class='main-btn mt-4 bg-blue-500 text-white p-2 rounded'>Enroll for Free</a>
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