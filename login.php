<?php
// Include your database connection file (dbcon.php)
include "config/dbcon.php";
include "config/loginAuth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

body {
        margin: 0;
        background: url('img/1.jpg') center/cover no-repeat;
    }

    .outer-wrapper {
        position: fixed;
        top: 550px;
        left: 1000px;
        transform: translate(-50%, -50%);
        width: 40vw; /* Adjust the width as needed */
        height: 21vw; /* Adjust the height as needed to make it square */
        z-index: -1;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.8); /* Set the background color and opacity */
        border-radius: 30px; /* Adjust the border-radius for rounded corners */
    }

        .panel__wrapper {
            position: relative;
            display: flex;
            justify-content: space-between;
            width: 775px; /* Adjust the width as needed */
            height: 430px; /* Adjust the height as needed */
            margin: auto;
            padding: 20px;
            z-index: 1;
        }

        .panel__left {
        width: 60%;
        max-width: 350px;
        padding: 30px;
        border: 1px solid #ccc;
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3); /* Add box-shadow for a subtle shadow effect */
    }

        .panel__left img {
            max-width: 300px; /* Adjust the maximum width as needed */
            max-height: 150px; /* Adjust the maximum height as needed */
            border-radius: 20px;
        }

        .panel__right {
            width: 50%;
            max-width: 350px;
            border: 1px solid #ccc;
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3); /* Add box-shadow for a subtle shadow effect */
        }

        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            margin-bottom: 15px;
            margin-right: 0; /* Add margin-right to create space on the right side */
        }

        .password-wrapper {
            position: relative; /* Add position relative to the wrapper */
        }

        .password__show-password {
            position: absolute;
            right: 10px; /* Adjust the right position as needed */
            top: 50%; /* Center vertically */
            transform: translateY(-50%);
        }
    </style>

    <script type="text/javascript">
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("floatingPassword");
            const passwordIcon = document.querySelector(".password__show-password img");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordIcon.style.color = "blue";
            } else {
                passwordInput.type = "password";
                passwordIcon.style.color = "black";
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const passwordIcon = document.querySelector(".password__show-password img");
            passwordIcon.addEventListener('click', togglePasswordVisibility);
        });
    </script>
    <!-- Custom styles for this template -->
</head>


<body style="margin: 1000px; background: url('img/1.jpg') center/cover no-repeat;">

    <div class="outer-wrapper">
        <div class="panel__wrapper">
            <!-- Left Panel with Image -->
            <div class="panel__left">
                <img src="img/2.jpg" alt="Your Image">
            </div>

        <!-- Right Panel with Login Form -->
            <div class="panel__right">
                <main class="form-signin">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <h5 class="mb-1 fw-normal">Login</h5>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username" required>
                            <label for="floatingInput">Username</label>
                            <span class="text-danger"><?php echo $usernameErr; ?></span>
                        </div>
                        <div class="form-floating password-wrapper">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                            <label for="floatingPassword">Password</label>
                            <!-- Password show/hide removed -->
                            <span class="text-danger"><?php echo $passwordErr; ?></span>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit" value="login">Login</button>

                        <!-- Add spacing and "Forgot Password" link -->
                        <div class="mt-2 mb-2" style="font-size: 14px;">
                            <a href="forgot_password.php">Forgot Password?</a>
                        </div>

                        <p class="mt-3" style="font-size: 13px;">
                            By continuing, you agree to our <a href="terms_of_use.php">Terms of Use</a> and <a href="privacy_notice.php">Privacy Notice</a>.
                        </p>

                        <a href="register.php" class="btn btn-primary">Create an Account</a>
                    </form>
                </main>
            </div>
        </div>
    </div>


</body>
</html>
