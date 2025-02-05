<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/controllers/UsersControllers.php';
global $users;


include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/repositories/courseManager.php';
$coursecatalog = new CourseManager();
$coursecatalog = $coursecatalog->getAllCourses();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/png">
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
                        <a href="#user-management"
                            class="no-underline text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">User And Course Management</a>
                        <a href="./TeacherValidation.php"
                            class="no-underline text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">Teacher And Course Validation</a>
                        <a href="./TagCategory.php"
                            class="no-underline text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">Tag & Category Management</a>
                        <a href="./statistics.php"
                            class="no-underline text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">Statistics</a>
                        <a href="../../controllers/logout.php"
                            class="no-underline text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="sm:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <a href="#user-management" class="text-white block px-3 py-2 rounded-md text-base">User Management</a>
                <a href="./TeacherValidation.php" class="text-white block px-3 py-2 rounded-md text-base">Teacher Management</a>
                <a href="./TagCategory.php" class="text-white block px-3 py-2 rounded-md text-base">Tag & Category Management</a>
                <a href="./statistics.php" class="text-white block px-3 py-2 rounded-md text-base">Statistics</a>
                <a href="../../controllers/logout.php"
                    class="text-white block px-3 py-2 rounded-md text-base">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mx-auto my-6 p-6 bg-white rounded-lg shadow-md">

        <!-- User Management Section -->
        <section id="user-management" class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">User Management</h2>
            <table class="min-w-full border-collapse shadow-lg">
                <thead>
                    <tr class="bg-yellow-500 text-white">
                        <th class="py-3 px-4 border border-gray-300">Name</th>
                        <th class="py-3 px-4 border border-gray-300">Email</th>
                        <th class="py-3 px-4 border border-gray-300">Role</th>
                        <th class="py-3 px-4 border border-gray-300">Status</th>
                        <th class="py-3 px-4 border border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($users as $user) {
                        echo "
                <tr class='hover:bg-gray-100 transition'>
                    <td class='border border-gray-300 px-4 py-2'>{$user['username']}</td>
                    <td class='border border-gray-300 px-4 py-2'>{$user['email']}</td>
                    <td class='border border-gray-300 px-4 py-2'>{$user['role']}</td>
                    <td class='border border-gray-300 px-4 py-2'>{$user['status']}</td>
                    <td class='border border-gray-300 px-4 py-2'>
                    <div class='flex justify-around'>
                    <a href='/website/app/controllers/userUpdate.php?id=$user[id]&status=$user[status]'><button class='mr-4' title='Edit'>
                        <button class='btn btn-warning btn-sm'>Edit</button>
                    </a>
                    <a href='/website/app/controllers/userUpdate.php?id=$user[id]&role=$user[role]'><button class='mr-4' title='Edit'>
                        <button class='btn btn-danger btn-sm'>Delete</button>
                    </a>
                    </div>
                    </td>
                </tr>
    ";
                    } ?>


                </tbody>
            </table>
        </section>

       
    </main>
    
    <main class="container mx-auto my-6 p-6 bg-white rounded-lg shadow-md">

        <!-- Content Management Section -->
        <section id="teacher-management" class="mb-8">
            <h2 class="text-2xl font-semibold mb-4">Course Management</h2>


            <!-- Manage Courses -->
            <div>
                <h3 class="text-xl mb-2">All Courses</h3>
                <table class="min-w-full border-collapse shadow-lg">
                    <thead>
                        <tr class="bg-yellow-500 text-white">
                            <th class="py-3 px-4 border border-gray-300">Img</th>
                            <th class="py-3 px-4 border border-gray-300">Title</th>
                            <th class="py-3 px-4 border border-gray-300">Status</th>
                            <th class="py-3 px-4 border border-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // print_r($coursecatalog);
                        foreach ($coursecatalog as $course) {
                            echo "
                         <tr class='hover:bg-gray-100 transition'>
                            <td class='border border-gray-300 px-4 py-2'>
                             <a href='./courseDetails.php?course_id=$course[id]'>
                                    <img width=100 src='/website/assets/images/courseBanners/" . htmlspecialchars($course['img']) . "' alt='course_picture'>
                                </a>
                            </td>
                             <td class='border border-gray-300 px-4 py-2'> <a href='./courseDetails.php?course_id=$course[id]'>
                           <span>$course[title]</span> </a></td>
                             <td class='border border-gray-300 px-4 py-2'> 
                           $course[status]</td>
                             <td class='border border-gray-300 px-4 py-2'>
        
        <!-- Reject Button -->
        <a href='/website/app/controllers/approveCourses.php?id=$course[id]&status=$course[status]&reject'>
            <button name='reject' value='reject' class='ml-2 bg-red-600 text-white py-1 px-2 rounded-md hover:bg-red-700 transition'>
                Reject
            </button>
        </a>
    </td>
                        </tr>
                        
                        
                        ";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
            </div>
        </section>
    </main>



    <script>
        // Toggle the mobile menu
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>

</html>