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
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, the file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["product_image"]["size"] > 5000000) {
            echo "Sorry, your file is too large. Maximum allowed size is 2 MB.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // If everything is okay, try to upload file
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFile)) {
                echo "The file " . htmlspecialchars(basename($_FILES["product_image"]["name"])) . " has been uploaded.";

                // Determine if it's an insert or update
                if (isset($_POST['product_id_edit']) && !empty($_POST['product_id_edit'])) {
                    // Update existing product
                    $productIdToEdit = $_POST['product_id_edit'];
                    $updateQuery = "UPDATE products SET name='$productName', price='$productPrice', image='$targetFile' WHERE id='$productIdToEdit'";
                    if (mysqli_query($conn, $updateQuery)) {
                        echo "Product updated successfully!";
                    } else {
                        echo "Error updating product: " . mysqli_error($conn);
                    }
                } else {
                    // Insert new product
                    $insertQuery = "INSERT INTO products (name, price, image) VALUES ('$productName', '$productPrice', '$targetFile')";
                    if (mysqli_query($conn, $insertQuery)) {
                        echo "Product inserted successfully!";
                    } else {
                        echo "Error inserting product: " . mysqli_error($conn);
                    }
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>