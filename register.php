<?php
// Include your database connection file (dbcon.php)
include "config/dbcon.php";
include "config/registerUser.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <style>
         body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: url('img/1.jpg') center/cover no-repeat;
        }

        .panel__wrapper {
            display: flex;
            justify-content: space-between;
            width: 800px; /* Adjust the width as needed */
            height: 430px; /* Adjust the height as needed */
            padding: 20px;
        }

        .panel__left {
            width: 50%;
            max-width: 350px; /* Adjust the maximum width as needed */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .panel__left img {
            max-width: 300px; /* Adjust the maximum width as needed */
            max-height: 150px; /* Adjust the maximum height as needed */
            border-radius: 20px;
        }

        .panel__center {
            width: 50%;
            max-width: 350px; /* Adjust the maximum width as needed */
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
        }
        .panel__right {
            width: 50%;
            max-width: 350px;
            border: 1px solid #ccc;
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
        }

        .form-signin {
            width: 100%;
        }

        .password__show-password {
            background-color: unset;
            user-select: none;
            cursor: pointer;
        }

        .password__show-password img {
            color: black;
        }

        .password__show-password.clicked img {
            color: blue;
        }

        .form-signin input[type="email"],
        .form-signin input[type="password"] {
            margin-bottom: 15px;
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

<body>


    <div class="panel__wrapper">
        <!-- Left Panel with Image -->
        <div class="panel__left">
            <img src="img/2.jpg" alt="Your Image">
        </div>
        <!-- Right Panel with Login Form -->
        <div class="panel__right">
            <main class="form-signin">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                    <h5 class="mb-1 fw-normal">Create Account</h5>
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

                    <button class="w-100 btn btn-lg btn-primary" type="submit" value="login">Create</button>

                    <!-- Link to go back to the login page -->
                    <p class="mt-3" style="font-size: 23px;"> Already have an account? <a href="login.php">Login here</a></p>
                </form>
            </main>
            <!-- Add Bootstrap JS and any other necessary scripts here -->
        </div>
   
</div>
</body>
</html>
