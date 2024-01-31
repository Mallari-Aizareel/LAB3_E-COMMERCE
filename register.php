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
    <link href="css/register.css" rel="stylesheet">
    <link href="js/register.js">

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

                    <!-- Center the "Create Account" text -->
                    <h5 class="mb-1 fw-normal text-center">Create Account</h5>

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

                    <!-- Checkbox and phrase -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Email me about special offers, new products and promotions.
                        </label>
                    </div>

                    <!-- Create button -->
                    <button class="w-100 btn btn-lg btn-primary" type="submit" value="login">Create</button>

                    <!-- Style the "Login here" link as a blue button -->
                    <p class="mt-3 text-center" style="font-size: 15px;"> Already have an account? 
                        <a href="login.php" class="btn-login">Login here</a>
                    </p>
                </form>
            </main>
            <!-- Add Bootstrap JS and any other necessary scripts here -->
        </div>
    </div>

</body>

</html>






