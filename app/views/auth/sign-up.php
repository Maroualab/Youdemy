<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sign Up - Education & Online Course Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="../../../assets/css/animate.css">
    <link rel="stylesheet" href="../../../assets/css/LineIcons.2.0.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap-5.0.5-alpha.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">

    <style>
        .signup-area {
            background-color: #f7fafc;
            padding: 100px 0;
        }
        .signup-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .signup-title {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        .main-btn {
        background-color: #fbbf24; /* Yellow Color */
        color: #000000; /* Black for contrast */
        border-radius: 4px;
        height: 50px; /* Increased height */
        font-size: 16px; /* Increased font size */
        transition: background-color 0.3s ease, transform 0.3s ease; /* Transition effect */
    }
    .main-btn:hover {
        background-color: #efc84d j ; /* Darker Yellow */
      
    }
        .toggle-role {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .role-button {
            border: 1px solid #ccc;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            margin: 0 5px;
            transition: background-color 0.3s ease;
        }
        .role-button.active {
            background-color: #fbbf24; /* Active color */
            color: #000;
        }
    </style>
</head>

<body>

    <!--====== HEADER PART START ======-->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4">
            <nav class="flex items-center justify-between py-4">
                <a class="font-bold text-2xl text-yellow-500" href="../../../public/index.php">Course Logo</a>
                <ul class="flex space-x-6">
                    <li><a href="../../../public/index.php" class="hover:text-yellow-500">Home</a></li>
                    <li><a href="./login.php" class="hover:text-yellow-500">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--====== HEADER PART ENDS ======-->

    <!--====== SIGN UP PART START ======-->
    <section class="signup-area pt-170 pb-170">
        <div class="container">
            <div class="signup-form">
                <h2 class="signup-title">Create Your Account</h2>
                <form action="../../controllers/SignUpController.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="toggle-role">
                        <div class="role-button active" onclick="setRole(this, 'student')">Student</div>
                        <div class="role-button" onclick="setRole(this, 'teacher')">Teacher</div>
                    </div>
                    <input type="hidden" name="role" id="role-input" value="student">

                    <button type="submit" name="submit" class="main-btn w-100" style="height: 50px; font-size: 16px; border-radius:15px">Sign Up</button>
                    <div class="mt-3 text-center">
                        <p>Already have an account? <a href="./login.php" class="text-warning">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--====== SIGN UP PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    <footer class="bg-gray-800 text-white pt-10">
        <div class="container mx-auto text-center">
            <p class="mb-2">Designed and Developed by <a href="https://github.com/Maroualab/Youdemy" class="text-yellow-400 hover:underline">Maroua Labballi</a></p>
            <p>&copy; 2025 All rights reserved.</p>
        </div>
    </footer>
    <!--====== FOOTER PART ENDS ======-->

    <script>
        function setRole(element, role) {
            // Set the role in the hidden input field
            document.getElementById("role-input").value = role;

            // Get all role buttons and remove 'active' class
            const buttons = document.querySelectorAll(".role-button");
            buttons.forEach(button => {
                button.classList.remove("active");
            });

            // Add 'active' class to the clicked button
            element.classList.add("active");
        }
    </script>
</body>

</html>
