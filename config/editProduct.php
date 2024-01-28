<?php
// Handle product editing
if (isset($_POST['edit'])) {
    $productIdToEdit = $_POST['product_id'];

    // Fetch the product details for the selected product
    $editQuery = "SELECT name, price FROM products WHERE id = '$productIdToEdit'";
    $editResult = mysqli_query($conn, $editQuery);

    if ($editResult && mysqli_num_rows($editResult) > 0) {
        $editProduct = mysqli_fetch_assoc($editResult);
        $editProductName = $editProduct['name'];
        $editProductPrice = $editProduct['price'];
    }
}

?>