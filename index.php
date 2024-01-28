<?php
include "config/dbcon.php";

// Fetch data from the 'products' table
$sql = "SELECT id, name, price, image FROM products";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
     <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

   <!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


	 <div>
        <!-- Use an anchor tag to create a link to login.php -->
        <a href="login.php" class="btn btn-primary">Log in</a>
    </div>

    <div class="container mt-5">
        <h2>Product Listing</h2>

        <div class="row">
            <?php
      

            // Assuming $result is the result set from your database query
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
              

                <div class="card" style="width: 18rem;">
 <img src='subdirectory/<?php echo $row['image']; ?>' class="card-img-top" alt='Product Image' style='height: 200px; object-fit: cover;'>
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['name']; ?></h5>
   <p class="card-text">Price: <?php echo $row['price']; ?></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
            <?php
                }
            } else {
                echo "<p>No products found</p>";
            }

            // Close the connection
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <!-- Add Bootstrap JS and any other necessary scripts here -->

</body>
</html>
