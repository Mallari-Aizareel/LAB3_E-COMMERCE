<?php
// Handle form submission to insert new product or update existing product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["product_name"]) && isset($_POST["product_price"]) && isset($_FILES["product_image"])) {
        $productName = $_POST["product_name"];
        $productPrice = $_POST["product_price"];

        // Handle image upload
        $targetDirectory = "../uploads/";
        $targetFile = $targetDirectory . basename($_FILES["product_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["product_image"]["tmp_name"]);
            if ($check === false) {
                echo "<script>alert('File is not an image.');</script>";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "<script>alert('Sorry, the file already exists.');</script>";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["product_image"]["size"] > 15000000) {
            echo "<script>alert('Sorry, your file is too large. Maximum allowed size is 15 MB.');</script>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG, and GIF files are allowed.');</script>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>alert('Sorry, your file was not uploaded.');</script>";
        } else {
            // If everything is okay, try to upload file
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
                echo "<script>alert('The file " . htmlspecialchars(basename($_FILES["product_image"]["name"])) . " has been uploaded.');</script>";

                // Determine if it's an insert or update
                if (isset($_POST['product_id_edit']) && !empty($_POST['product_id_edit'])) {
                    // Update existing product
                    $productIdToEdit = $_POST['product_id_edit'];
                    $updateQuery = "UPDATE products SET name='$productName', price='$productPrice', image='$targetFile' WHERE id='$productIdToEdit'";
                    if (mysqli_query($conn, $updateQuery)) {
                        echo "<script>alert('Product updated successfully!');</script>";
                    } else {
                        echo "<script>alert('Error updating product: " . mysqli_error($conn) . "');</script>";
                    }
                } else {
                    // Insert new product
                    $insertQuery = "INSERT INTO products (name, price, image) VALUES ('$productName', '$productPrice', '$targetFile')";
                    if (mysqli_query($conn, $insertQuery)) {
                        echo "<script>alert('Product inserted successfully!');</script>";
                    } else {
                        echo "<script>alert('Error inserting product: " . mysqli_error($conn) . "');</script>";
                    }
                }
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            }
        }
    }
}
?>
