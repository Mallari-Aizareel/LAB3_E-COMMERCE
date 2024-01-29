<?php
session_start();
include "../config/dbcon.php";

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: ../login.php");
    exit();
}

include "../config/logout.php";
include "../config/editProduct.php";
include "../config/updateProduct.php";
include "../config/insertProduct.php";
include "../config/deleteProduct.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sidebar.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.18.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Data Table CSS -->
    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
</head>
<style>
        /* Sidebar styles */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.1s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.1s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }


        #main-content {
            transition: margin-left .5s;
            padding: 5px;
        }

        /* Add this class to the main container when sidebar is toggled */
        #main-content.toggled {
            margin-left: 250px;
        }
      /* Button styles */
.openbtn {
    font-size: 20px;
    cursor: pointer;
    background-color: white;  /* Set to white background */
    color: #111;  /* Set to dark text color */
    padding: 5px 15px;
    border: 1px solid #111;  /* Add border for better visibility */
    border-radius: 8px;  /* Add border-radius for soft corners */
}

.openbtn:hover {
    background-color: #eee;  /* Change background color on hover */
    color: #333;  /* Change text color on hover */
    
}

/* Close button styles */
.closebtn {
    position: absolute;
    right: 25px;
    font-size: 20px;
    margin-left: 50px;
    border-radius: 8px;  /* Add border-radius for soft corners */
}

.closebtn:hover {
    background-color:red;  /* Change background color on hover */
    color: white;  /* Change text color on hover */
}

    </style>

<body id="page-top">

 <!-- Sidebar -->
 <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarLabel">Sidebar</h5>
            <button type="button" class="closebtn text-reset" data-bs-dismiss="offcanvas" aria-label="Close" onclick="closeNav()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
</svg>
        </button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#inventory-collapse" aria-expanded="false">
                        Inventory
                    </button>
                    <div class="collapse" id="inventory-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">Overview</a></li>
                            <li><a href="#" class="link-dark rounded">Categories</a></li>
                            <!-- Add more links as needed -->
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#customers-collapse" aria-expanded="false">
                        Customers
                    </button>
                    <div class="collapse" id="customers-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">New</a></li>
                            <li><a href="#" class="link-dark rounded">Registered</a></li>
                            <!-- Add more links as needed -->
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                        data-bs-target="#products-collapse" aria-expanded="false">
                        Products
                    </button>
                    <div class="collapse" id="products-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark rounded">All Products</a></li>
                            <li><a href="#" class="link-dark rounded">Out of Stock</a></li>
                            <!-- Add more links as needed -->
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- end of sidebar -->


  <!-- Main content container -->
  <div id="main-content">
     <!-- Header -->
        <header class="p-3 mb-3 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <!-- Add a button to toggle the sidebar with an icon -->
                    <button class="openbtn btn-outline-secondary me-2 " type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#sidebar" aria-controls="sidebar" onclick="openNav()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                        </svg>
                    </button>
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li> <form method="post">
                        <button type="submit" name="logout" class="dropdown-item">Logout</button>
                    </form>
</li>
          </ul>
        </div>
                </div>
            </div>
        </header>

 

<!-- Insertion/Edit form -->
<!-- Insertion/Edit form as a modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
  
  <input type="hidden" name="product_id_edit" value="<?php echo isset($productIdToEdit) ? $productIdToEdit : ''; ?>">
  
  <label for="product_name">Product Name:</label>
  <input type="text" name="product_name" value="<?php echo isset($editProductName) ? $editProductName : ''; ?>" required>
  <br>

  <label for="product_price">Product Price:</label>
  <input type="text" name="product_price" value="<?php echo isset($editProductPrice) ? $editProductPrice : ''; ?>" required>
  <br>

  <label for="product_image">Product Image:</label>
  <input type="file" name="product_image" accept="image/*">
  <br>

  <?php if (isset($productIdToEdit) && !empty($productIdToEdit)) : ?>
      <!-- If in edit mode, show update button -->
      <input type="submit" name="update" value="Update Product">
  <?php else : ?>
      <!-- If in insert mode, show insert button -->
      <input type="submit" value="Insert Product">
  <?php endif; ?>
</form>
            </div>
        </div>
    </div>
</div>


<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
<table class="table table-hover" id="example">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
              <!-- Table Body -->
<tbody>
    <?php
    // Fetch data from the 'products' table
$sql = "SELECT id, name, price, image FROM products";
$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Loop through each row and display the data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td><img src='" . $row['image'] . "' alt='Product Image' style='width:50px;height:50px;'></td>";
            // Action Column
            echo "<td>
            <div class='col'>
            <div class='row'>
                <form method='post' action='{$_SERVER['PHP_SELF']}' >
                    <input type='hidden' name='product_id' value='{$row['id']}'>
                    <button type='submit' name='edit' class='btn btn-warning btn-sm'>Edit</button>
                </form>
            
                <form method='post' action='{$_SERVER['PHP_SELF']}'>
                    <input type='hidden' name='product_id' value='{$row['id']}'>
                    <button type='submit' name='delete' class='btn btn-danger btn-sm'>Delete</button>
                </form>
                </div>
              </div>
            </td>";
            echo "</tr>";
        }
    } else {
        // If no rows are found
        echo "<tr><td colspan='4'>No products found</td></tr>";
    }

    // Close the connection
    mysqli_close($conn);
    ?>
</tbody>


            </table>


</div>

</body>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/sidebar.js"></script>

<!-- jQuery -->
<script src='https://code.jquery.com/jquery-3.7.0.js'></script>
<!-- Data Table JS -->
<script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
<script src="../js/sidenav.js"></script>
<script src="../js/tables.js"></script>
<script>
    function toggleAddProductForm() {
        var addProductForm = document.getElementById("addProductForm");
        addProductForm.style.display = addProductForm.style.display === "none" ? "block" : "none";
    }
</script>

</html>