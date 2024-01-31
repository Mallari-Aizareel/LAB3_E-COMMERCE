<?php
// Handle product updating
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $productIdToUpdate = $_POST['product_id_edit'];
    $updatedProductName = $_POST['product_name'];
    $updatedProductPrice = $_POST['product_price'];

    // Update the product in the database
    $updateQuery = "UPDATE products SET name='$updatedProductName', price='$updatedProductPrice' WHERE id='$productIdToUpdate'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Product updated successfully!');</script>";

        // Redirect to reset the form
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        echo "<script>alert('Error updating product: " . mysqli_error($conn) . "');</script>";
    }
}
?>
