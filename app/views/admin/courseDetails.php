<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/repositories/courseManager.php';
if (isset($_GET['course_id'])) {

    $course_id = $_GET['course_id'];
    $singleCourse = new CourseManager();
    $singleCourse = $singleCourse->fetchSingleCourseByCourseId($course_id);

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/bootstrap-5.0.5-alpha.min.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-yellow-500 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button -->
                <button id="mobile-menu-button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-yellow-500 focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <div class="flex items-center justify-center sm:justify-start">
                <a href="#" class="text-3xl font-semibold no-underline">Admin</a>
            </div>
            <div class="hidden sm:block sm:ml-6">
                <div class="flex space-x-4">
                    <!-- Navigation links -->
                    <a href="./adminDashboard.php" class="no-underline text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">User Management</a>
                    <a href="#teacher-management" class="no-underline text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">Teacher Management</a>
                    <a href="./TagCategory.php" class="no-underline text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">Tag & Category Management</a>
                    <a href="./statistics.php" class="no-underline text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">Statistics</a>
                    <a href="../../controllers/logout.php" class="no-underline text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">Logout</a>
                </div>
            </div>
        </div>
    </div>


        <!-- Mobile Menu -->
        <div id="mobile-menu" class="sm:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <a href="./adminDashboard.php" class="text-white block px-3 py-2 rounded-md text-base">User
                    Management</a>
                <a href="#teacher-management" class="text-white block px-3 py-2 rounded-md text-base">Teacher
                    Management</a>
                <a href="./TagCategory.php" class="text-white block px-3 py-2 rounded-md text-base">Tag & Category
                    Management</a>
                <a href="./statistics.php" class="text-white block px-3 py-2 rounded-md text-base">Statistics</a>
                <a href="../../controllers/logout.php"
                    class="text-white block px-3 py-2 rounded-md text-base">Logout</a>
            </div>
        </div>
    </nav>

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

                    <!-- <a href='#' class='main-btn mt-4 bg-blue-500 text-white p-2 rounded'>Enroll for Free</a> -->
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

        // Toggle the mobile menu
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>

</html>