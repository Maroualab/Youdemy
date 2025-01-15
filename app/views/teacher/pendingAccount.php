<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Account Verification Required</title>
    <meta name="description" content="Your teacher account is not verified yet. Please verify your account.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/png">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="../../../assets/css/bootstrap-5.0.5-alpha.min.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="../../../assets/css/style.css">
</head>

<body>
    <header class="header_area">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                    <img id="logo" src="../../../assets/images/logo.svg" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                </button>
            </nav>
        </div>
    </header>

    <main class="container text-center pt-5">
        <h1 class="mb-4">Account Verification Required</h1>
        <p class="lead">It looks like your teacher account is not verified yet. Please check your email for a verification link.</p>
        <p>If you haven't received the email, click the button below to resend it:</p>
        <button class="btn btn-primary mb-3" onclick="resendVerification()">Resend Verification Email</button>
        <p>If you're experiencing issues, please <a href="contact.html">contact support</a> for assistance.</p>
    </main>

    <footer class="footer-area pt-4">
        <div class="container">
            <div class="copy-right text-center">
                <p>© 2025 Education & Online Course Template. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function resendVerification() {
            // Simulate a call to resend the verification email
            alert('Verification email has been resent. Please check your inbox!');
            // In a real application, you would perform an AJAX request here.
        }
    </script>
</body>

</html>
