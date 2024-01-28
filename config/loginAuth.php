<?php

// Initialize variables to store user input
$username = $password = "";
$usernameErr = $passwordErr = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = $_POST["username"];
    }

    // Validate password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    // If both username and password are provided
    if (!empty($username) && !empty($password)) {
        // Check if the username exists in the database
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // User found in the database
            $user = mysqli_fetch_assoc($result);

            // Check if the password is correct
            if (password_verify($password, $user['password'])) {
                // Password is correct

                // Start a session and store user information
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                // Add any other relevant information to the session

                // Check if the username contains "@admin"
                if (stripos($username, "@admin") !== false) {
                    // Admin login
                    // Perform your authentication logic here

                    // For demonstration, assuming the authentication is successful
                    $authenticated = true;

                    if ($authenticated) {
                        // Redirect to admin/index.php
                        header("Location: admin/index.php");
                        exit();
                    }
                } else {
                    // Customer login
                    // Perform your authentication logic here

                    // For demonstration, assuming the authentication is successful
                    $authenticated = true;

                    if ($authenticated) {
                        // Redirect to customers/index.php
                        header("Location: customers/index.php");
                        exit();
                    }
                }
            } else {
                // Password is incorrect
                echo "Invalid password. ";
            }
        } else {
            // User not found in the database
            echo "Invalid username or password.";
        }
    }
}

?>