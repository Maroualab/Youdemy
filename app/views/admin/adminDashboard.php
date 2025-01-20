<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
                <button id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-yellow-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-yellow-500 focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <div class="flex items-center justify-center sm:justify-start">
                <a href="#" class="text-3xl font-semibold">Admin</a>
            </div>
            <div class="hidden sm:block sm:ml-6">
                <div class="flex space-x-4">
                    <!-- Navigation links -->
                    <a href="#user-management" class="text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">User Management</a>
                    <a href="#content-management" class="text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">Content Management</a>
                    <a href="#statistics" class="text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">Statistics</a>
                    <a href="../../controllers/logout.php" class="text-white hover:text-yellow-300 px-3 py-2 rounded-md text-lg">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="sm:hidden">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="#user-management" class="text-white block px-3 py-2 rounded-md text-base">User Management</a>
            <a href="#content-management" class="text-white block px-3 py-2 rounded-md text-base">Content Management</a>
            <a href="#statistics" class="text-white block px-3 py-2 rounded-md text-base">Statistics</a>
            <a href="../../controllers/logout.php" class="text-white block px-3 py-2 rounded-md text-base">Logout</a>
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
                    <!-- <th class="py-3 px-4 border border-gray-300">ID</th> -->
                    <th class="py-3 px-4 border border-gray-300">Name</th>
                    <th class="py-3 px-4 border border-gray-300">Email</th>
                    <th class="py-3 px-4 border border-gray-300">Role</th>
                    <th class="py-3 px-4 border border-gray-300">Status</th>
                    <th class="py-3 px-4 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Data (Dynamic Content Expected) -->
                <tr class="hover:bg-gray-100 transition">
                    <!-- <td class="border border-gray-300 px-4 py-2">1</td> -->
                    <td class="border border-gray-300 px-4 py-2">John Doe</td>
                    <td class="border border-gray-300 px-4 py-2">john@example.com</td>
                    <td class="border border-gray-300 px-4 py-2">teacher</td>
                    <td class="border border-gray-300 px-4 py-2">Active</td>
                    <td class="border border-gray-300 px-4 py-2">
                
                    <div class="flex justify-around">
                        <button class="w-full  ml-2 bg-yellow-600 text-white py-1 px-2 rounded-md hover:bg-yellow-700 transition">activate/disactivate</button>
                        <button class="w-full  ml-2 bg-yellow-600 text-white py-1 px-2 rounded-md hover:bg-yellow-700 transition">Submit</button>
                    </div>

                    </td>

                </tr>
                
            </tbody>
        </table>
    </section>

    <!-- Content Management Section -->
    <section id="content-management" class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Content Management</h2>

        <!-- Add Category Form -->
        <div class="space-y-6">
            <div>
                <h3 class="text-xl mb-2">Add Category</h3>
                <form class="flex items-center space-x-4">
                    <label for="category-name" class="sr-only">Category Name</label>
                    <input id="category-name" type="text" placeholder="New Category Name" class="border rounded p-2 mb-2 w-3/4 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                    <button class="bg-yellow-600 text-white py-2 px-4 rounded-md hover:bg-yellow-700 transition">Add Category</button>
                </form>
            </div>

            <!-- Add Tags Form -->
            <div>
                <h3 class="text-xl mb-2">Add Tag</h3>
                <form class="flex items-center space-x-4">
                    <label for="tags" class="sr-only">Tags</label>
                    <textarea id="tags" placeholder="Enter tags separated by commas" class="border rounded p-2 mb-2 w-3/4 focus:outline-none focus:ring-2 focus:ring-yellow-300"></textarea>
                    <button class="bg-yellow-600 text-white py-2 px-4 rounded-md hover:bg-yellow-700 transition">Add Tags</button>
                </form>
            </div>

            <!-- Manage Courses -->
            <div>
                <h3 class="text-xl mb-2">Manage Courses</h3>
                <table class="min-w-full border-collapse shadow-lg">
                    <thead>
                        <tr class="bg-yellow-500 text-white">
                            <th class="py-3 px-4 border border-gray-300">ID</th>
                            <th class="py-3 px-4 border border-gray-300">Title</th>
                            <th class="py-3 px-4 border border-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover:bg-gray-100 transition">
                            <td class="border border-gray-300 px-4 py-2">101</td>
                            <td class="border border-gray-300 px-4 py-2">Introduction to PHP</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <select class="border p-1 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-300">
                                    <option>Publish</option>
                                    <option>Unpublish</option>
                                    <option>Delete</option>
                                </select>
                                <button class="ml-2 bg-yellow-600 text-white py-1 px-2 rounded-md hover:bg-yellow-700 transition">Submit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section id="statistics" class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Global Statistics</h2>
        <div class="space-y-4">
            <p>Total Courses: <strong>20</strong></p>
            <p>Categories: <strong>5</strong></p>
            <h3 class="mt-4">Most Enrolled Course:</h3>
            <p><strong>Understanding JavaScript</strong></p>
            <h3>Top 3 Instructors:</h3>
            <ul class="list-disc pl-5">
                <li>Alice Johnson</li>
                <li>Bob Williams</li>
                <li>Charlie Brown</li>
            </ul>
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
