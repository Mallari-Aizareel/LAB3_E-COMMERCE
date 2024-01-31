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
    <link href="css/login.css" rel="stylesheet">
    <link href="js/login.js">

</head>

<body>

<div class="panel__wrapper">
    <!-- Left Panel with Image -->
    <div class="panel__left"> <br /> <br /> <br />
        <img src="img/2.jpg" alt="Your Image">
        <!-- Return to Homepage link -->
        <div class="return-to-homepage">
            <a href="index.php">Return to Homepage</a>
        </div>
    </div>

    <!-- Right Panel with Login Form -->
    <div class="panel__right">
        
        <main class="form-signin">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <!-- Center the "Login" word -->
                <h5 class="mb-1 fw-normal text-center">Login Your Account</h5>

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

                <div class="mt-3 text-center">
                    <p style="font-size: 15px;">Not registered yet?
                    <a href="register.php" class="btn-create">Create an Account</a> </p>
                </div>
            </form>
        </main>
    </div>
</div>

</body>
</html>

