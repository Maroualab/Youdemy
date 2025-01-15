<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Login - Education & Online Course Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="../../../assets/css/animate.css">
    <link rel="stylesheet" href="../../../assets/css/LineIcons.2.0.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap-5.0.5-alpha.min.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link href="../../../public/src/output.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"> -->


    <style>
        .login-area {
            background-color: #f7fafc;
            padding: 100px 0;
        }

        .login-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .login-title {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .main-btn {
            background-color: #fbbf24;
            /* Yellow */
            color: #000;
            border-radius: 4px;
        }

        .main-btn:hover {
            background-color: #d69e20;
            /* Darker Yellow */
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
                    <li><a href="./sign-up.php" class="hover:text-yellow-500">Sign Up</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--====== HEADER PART ENDS ======-->

    <!--====== LOGIN PART START ======-->
    <section class="login-area pt-170 pb-170">
        <div class="container">
            <div class="login-form">
                <h2 class="login-title">Login to Your Account</h2>
                <form action="dashboard.html" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="main-btn w-100">Login</button>
                    <div class="mt-3 text-center">
                        <p>Don't have an account? <a href="./sign-up.php" class="text-warning">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--====== LOGIN PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    <footer class="bg-gray-800 text-white pt-10">
        <div class="container mx-auto text-center">
            <p class="mb-2">Designed and Developed by <a href="https://github.com/Maroualab/Youdemy"
                    class="text-yellow-400 hover:underline">Maroua Labballi</a></p>
            <p>&copy; 2025 All rights reserved.</p>
        </div>
    </footer>
    <!--====== FOOTER PART ENDS ======-->

</body>

</html>