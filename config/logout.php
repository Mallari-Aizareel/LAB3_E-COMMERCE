<?php
// Handle logout
if (isset($_POST['logout'])) {
    // Destroy the session
    session_destroy();

    // Redirect to index.php after logout
    header("Location: ../index.php");
    exit();
}

?>