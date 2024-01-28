<?php
// Include your database connection file (dbcon.php)
include "config/dbcon.php";
include "registerUser.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Add Bootstrap CSS link here -->
</head>
<body>

    <div class="container mt-5">
        <h2>Create an Account</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <span class="text-danger"><?php echo $usernameErr; ?></span>
            <br>

            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <span class="text-danger"><?php echo $passwordErr; ?></span>
            <br>

            <input type="submit" value="Create Account">
        </form>

        <!-- Link to go back to the login page -->
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>

    <!-- Add Bootstrap JS and any other necessary scripts here -->

</body>
</html>
