<?php

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Course Details - Full-stack Web Development</title>
    <meta name="description" content="Discover the Full-stack Web Development course details, including topics covered, instructor information, and how to enroll.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">

    <style>
        .hero {
            background-image: url("../../../assets/images/course-bg.jpg");
            background-size: cover;
            background-position: center;
            color: #ffffff;
        }

        .main-btn {
            padding: 12px 30px;
            background-color: #fbbf24; /* Yellow Color */
            color: #000000; /* Black for contrast */
            border-radius: 0.375rem;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .main-btn:hover {
            background-color: #d69e20; /* Darker Yellow */
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
    <section class="hero h-64 flex flex-col items-center justify-center bg-gray-800 text-white">
        <h1 class="text-4xl font-bold">Full-stack Web Development</h1>
        <p class="mt-2">Master the skills to become a full-stack web developer.</p>
    </section>
    <!--====== HERO PART ENDS ======-->

    <!--====== COURSE DETAILS PART START ======-->
    <section class="py-10 p-10">
        <div class="container mx-auto px-4 ">
            <div class="flex flex-col lg:flex-row">
                <div class="lg:w-2/3">
                    <h2 class="text-3xl font-semibold">Course Description</h2>
                    <p class="mt-4">This comprehensive course covers all aspects of web development, guiding you through both front-end and back-end technologies. You will learn to create dynamic web applications and gain proficiency in the development process.</p>

                    <h2 class="mt-8 text-3xl font-semibold">Course Topics</h2>
                    <ul class="list-disc ml-5 mt-4">
                        <li>HTML5 & CSS3: Building structured and styled web pages.</li>
                        <li>JavaScript: Making your web pages interactive.</li>
                        <li>React: Building user interfaces with React.js.</li>
                        <li>Node.js: Understanding server-side development.</li>
                        <li>Express.js: Setting up your web server.</li>
                        <li>MongoDB: Working with NoSQL databases.</li>
                        <li>RESTful APIs: Creating APIs for seamless data exchange.</li>
                        <li>Deployment: How to deploy your applications on cloud providers.</li>
                    </ul>

                    <h2 class="mt-8 text-3xl font-semibold">Instructor</h2>
                    <div class="flex items-center mt-4">
                        <img src="../../../assets/images/instructor.jpg" alt="Instructor" class="instructor-image">
                        <div class="ml-4">
                            <strong class="text-lg">John Doe</strong>
                            <p class="text-gray-500">John is a Senior Web Developer with over 10 years of experience in building scalable web applications and leading development teams. He is passionate about teaching and empowering the next generation of developers.</p>
                        </div>
                    </div>

                    <h2 class="mt-8 text-3xl font-semibold">Course Highlights</h2>
                    <ul class="list-disc ml-5 mt-4">
                        <li>Extensive hands-on projects to apply your skills.</li>
                        <li>Access to a community forum for collaboration and help.</li>
                        <li>Real-world examples and case studies.</li>
                        <li>Lifetime access to course materials and updates.</li>
                    </ul>

                    <h2 class="mt-8 text-3xl font-semibold">Curriculum</h2>
                    <ul class="list-disc ml-5 mt-4">
                        <li>Module 1: Introduction to Web Development</li>
                        <li>Module 2: HTML & CSS Basics</li>
                        <li>Module 3: JavaScript Essentials</li>
                        <li>Module 4: Responsive Design</li>
                        <li>Module 5: Frontend Frameworks Overview</li>
                        <li>Module 6: Backend Development with Node.js</li>
                        <li>Module 7: Database Management with MongoDB</li>
                        <li>Module 8: Building and Consuming APIs</li>
                        <li>Module 9: Deployment Strategies</li>
                    </ul>

                    <h2 class="mt-8 text-3xl font-semibold">Enroll Now</h2>
                    <p class="mt-4">This course is entirely free! Click the button below to enroll and start your journey in full-stack web development.</p>
                    <a href="#" class="main-btn mt-4">Enroll for Free</a>
                </div>

                <div class="lg:w-1/3 lg:ml-10">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-xl font-semibold">Course Info</h2>
                        <div class="mt-4">
                            <strong>Duration:</strong> 10 Weeks
                        </div>
                        <div class="mt-2">
                            <strong>Level:</strong> Intermediate
                        </div>
                        <div class="mt-2">
                            <strong>Students Enrolled:</strong> 3.1k
                        </div>
                        <div class="mt-2">
                            <strong>Rating:</strong> 4.9/5
                        </div>
                        <div class="mt-4">
                            <h3 class="font-semibold">Related Courses</h3>
                            <ul class="list-disc pl-5 mt-2">
                                <li><a href="#" class="text-yellow-500 hover:underline">JavaScript Fundamentals</a></li>
                                <li><a href="#" class="text-yellow-500 hover:underline">React Development</a></li>
                                <li><a href="#" class="text-yellow-500 hover:underline">Node.js Backend Essentials</a></li>
                            </ul>
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
            <p class="mb-2">Designed and Developed by <a href="https://github.com/Maroualab/Youdemy" class="text-yellow-400 hover:underline">Maroua Labballi</a></p>
            <p>&copy; 2025 All rights reserved.</p>
        </div>
    </footer>
    <!--====== FOOTER PART ENDS ======-->

</body>

</html>
