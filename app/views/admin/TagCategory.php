<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/controllers/TagControllers.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/website/app/controllers/CategoryControllers.php';
global $tags;
global $categories;

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
                    <a href="#" class="text-3xl font-semibold">Admin</a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <!-- Navigation links -->
                        <a href="./adminDashboard.php"
                            class="no-underline text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">User Management</a>
                        <a href="./TeacherValidation.php"
                            class="no-underline text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">Teacher Management</a>
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
                <a href="./adminDashboard.php" class="text-white block px-3 py-2 rounded-md text-base">User Management</a>
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

      
        
        <!-- Content Management Section -->
        <section id="content-management" class="mb-8">
            <!-- <h2 class="text-2xl font-semibold mb-4">Content Management</h2> -->

            <!-- Add Category Form -->
            <div class="space-y-6">
                <div>
                    <h3 class="text-xl mb-2">Add Category</h3>
                    <form action="../../controllers/CategoryControllers.php" method="POST" class="flex items-center space-x-4">
                        <label for="category-name" class="sr-only">Category Name</label>
                        <input id="category-name" type="text" placeholder="New Category Name" name="category"
                            class="border rounded p-2 mb-2 w-3/4 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                        <button type="submit" class="bg-yellow-600 text-white py-2 px-4 rounded-md hover:bg-yellow-700 transition" name="add_category">Add
                            Category</button>
                    </form>
                </div>

                <!-- Add Tags Form -->
                <div>
                    <!-- <h3 class="text-xl mb-2">Add Tag</h3> -->
                    <form action="../../controllers/TagControllers.php" method="POST" class="flex items-center space-x-4">
                        <label for="tags" class="sr-only">Tags</label>
                        <input id="tags" type="text" placeholder="Enter Tag Name" name="tag"
                            class="border rounded p-2 mb-2 w-3/4 focus:outline-none focus:ring-2 focus:ring-yellow-300" required>
                        <button type="submit" name="add_tag" class="bg-yellow-600 text-white py-2 px-4 rounded-md hover:bg-yellow-700 transition">Add Tag</button>
                    </form>
                </div>
            </div>



            <section id="user-management" class="mb-8 flex justify-around">
           <div>
            <table class="min-w-full border-collapse shadow-lg">
                <thead>
                    <tr class="bg-yellow-500 text-white">
                        <th class="py-3 px-4 border border-gray-300">Tag</th>
                        <th class="py-3 px-4 border border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($tags as $tag) {
                    echo "
                    <tr>
                        <td class='editable' data-id='{$tag['id']}' id='toBeEdited' >{$tag['name']}</td>
                        <td>
                            <div class='action-buttons'>
                                 <a href='../../controllers/deleteTag.php?id=$tag[id]'><button class='action-btn'>Delete</button></a>
                            </div>
                        </td>
                    </tr>
                    ";
                } ?>
                </tbody>
            </table>
            </div>


            <div>
            <table class="min-w-full border-collapse shadow-lg">
                <thead>
                    <tr class="bg-yellow-500 text-white">
                        <th class="py-3 px-4 border border-gray-300">Category</th>
                        <th class="py-3 px-4 border border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($categories as $category) {
                    echo "
                    <tr>
                        <td>{$category['name']}</td>
                        <td>
                            <div class='action-buttons'>
                                <a href='../../controllers/deleteCategory.php?id=$category[id]'><button class='action-btn'>Delete</button>
                            </div>
                        </td>
                    </tr>
                    ";
                } ?>
                </tbody>
            </table>
            </div>


        </section>
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