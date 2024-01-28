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

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> -->

            <!-- Divider -->
          

            <!-- Divider -->
            <hr class="sidebar-divider">

      


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

             

                <!-- Begin Page Content -->
                <div class="container-fluid">

                  

                    <!-- Content Row -->
                    <div class="row">

 <!-- Logout Button -->
                    <form method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                    </form>

                    </div>


                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
                            <p> table </p>
                            <div class="container mt-3">

<!-- Insertion/Edit form -->
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


  
   <table class="table table-dark table-hover">
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
                <form method='post' action='{$_SERVER['PHP_SELF']}'>
                    <input type='hidden' name='product_id' value='{$row['id']}'>
                    <button type='submit' name='edit' class='btn btn-warning btn-sm'>Edit</button>
                </form>

                <form method='post' action='{$_SERVER['PHP_SELF']}'>
                    <input type='hidden' name='product_id' value='{$row['id']}'>
                    <button type='submit' name='delete' class='btn btn-danger btn-sm'>Delete</button>
                </form>
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


                        </div>

                        <div class="col-lg-6 mb-4">

                            
                          

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>