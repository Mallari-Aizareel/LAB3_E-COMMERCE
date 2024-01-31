<?php
// Handle product deletion
if (isset($_POST['delete'])) {
    $productIdToDelete = $_POST['product_id'];

    // Delete the product from the database
    $deleteQuery = "DELETE FROM products WHERE id = '$productIdToDelete'";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Product deleted successfully!');</script>";
        // Redirect to refresh the page
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        echo "<script>alert('Error deleting product: " . mysqli_error($conn) . "');</script>";
    }
}
?>
