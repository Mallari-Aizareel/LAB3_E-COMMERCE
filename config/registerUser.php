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
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }

    // If both username and password are provided
    if (!empty($username) && !empty($password)) {
        // Insert new user into the database
        $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if (mysqli_query($conn, $insertQuery)) {
            // Registration successful
            echo "<script>alert('Account created successfully!');</script>";
        } else {
            // Registration failed
            echo "<script>alert('Error: " . $insertQuery . "<br>" . mysqli_error($conn) . "');</script>";
        }
    }
}
?>
