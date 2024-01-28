<?php
// Include your database connection file (dbcon.php)
include "config/dbcon.php";
include "config/loginAuth.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Add Bootstrap CSS link here -->
</head>
<body>

    <div class="container mt-5">
        <h2>Login</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <span class="text-danger"><?php echo $usernameErr; ?></span>
            <br>

            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <span class="text-danger"><?php echo $passwordErr; ?></span>
            <br>

            <input type="submit" value="Login">
        </form>

        <!-- Button for creating an account -->
        <a href="register.php" class="btn btn-primary mt-3">Create an Account</a>
    </div>

    <!-- Add Bootstrap JS and any other necessary scripts here -->

</body>
</html>
