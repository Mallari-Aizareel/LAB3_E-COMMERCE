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

// Delete User Logic
if (isset($_POST['delete_user'])) {
    $userIdToDelete = mysqli_real_escape_string($conn, $_POST['user_id']);

    // Perform deletion query
    $deleteUserSql = "DELETE FROM users WHERE id = '$userIdToDelete'";
    
    if (mysqli_query($conn, $deleteUserSql)) {
        // User deleted successfully
        header("Location: ".$_SERVER['PHP_SELF']); // Redirect to the same page to refresh the user table
        exit();
    } else {
        // Error in deletion
        echo "Error deleting user: " . mysqli_error($conn);
    }
}

// Edit User Logic
if (isset($_POST['update_user'])) {
    $userIdToEdit = mysqli_real_escape_string($conn, $_POST['user_id_edit']);
    $editedUsername = mysqli_real_escape_string($conn, $_POST['edit_username']);
    $editedPassword = mysqli_real_escape_string($conn, $_POST['edit_password']);

    // Perform update query
    $updateUserSql = "UPDATE users SET username = '$editedUsername', password = '$editedPassword' WHERE id = '$userIdToEdit'";
    
    if (mysqli_query($conn, $updateUserSql)) {
        // User updated successfully
        header("Location: ".$_SERVER['PHP_SELF']); // Redirect to the same page to refresh the user table
        exit();
    } else {
        // Error in update
        echo "Error updating user: " . mysqli_error($conn);
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addUser"])) {
    // Validate and sanitize input data
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database with the hashed password
    $insertUserSql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
    
    if (mysqli_query($conn, $insertUserSql)) {
        $_SESSION['success_message'] = "User added successfully!";
    } else {
        $_SESSION['error_message'] = "Error adding user: " . mysqli_error($conn);
    }

  
  
} else {
   
}



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
    
  #example_wrapper {
    width: 80%;
    margin: auto;
  }
  /* Borders and background color for tables */
  #userTable {
    width: 80%;
    margin: auto;
    border: 1px solid #dee2e6;
    border-collapse: collapse;
    margin-top: 20px;
  }

  #userTable th, #example th {
    background-color: #343a40;
    color: white;
    border: 1px solid #dee2e6;
  }

  #userTable td, #example td {
    border: 1px solid #dee2e6;
  }

  /* Divider style */
  .b-example-divider {
    height: 3rem;
    width: 100%;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    margin-top: 20px;
  }

  /* Adjusted margins for modals */
  .modal-body {
    margin: 15px;
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
     <header class="py-3 mb-3 border-bottom " style="background-color: #a95c53;">
    <div class="container-fluid d-grid  align-items-center" style="grid-template-columns: 1fr 2fr;">
                  
                  
                <div class="dropdown">
        <a href="#" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-dark text-decoration-none dropdown-toggle" id="dropdownNavLink" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-qr-code" viewBox="0 0 16 16">
  <path d="M2 2h2v2H2z"/>
  <path d="M6 0v6H0V0zM5 1H1v4h4zM4 12H2v2h2z"/>
  <path d="M6 10v6H0v-6zm-5 1v4h4v-4zm11-9h2v2h-2z"/>
  <path d="M10 0v6h6V0zm5 1v4h-4V1zM8 1V0h1v2H8v2H7V1zm0 5V4h1v2zM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8zm0 0v1H2V8H1v1H0V7h3v1zm10 1h-1V7h1zm-1 0h-1v2h2v-1h-1zm-4 0h2v1h-1v1h-1zm2 3v-1h-1v1h-1v1H9v1h3v-2zm0 0h3v1h-2v1h-1zm-4-1v1h1v-2H7v1z"/>
  <path d="M7 12h1v3h4v1H7zm9 2v2h-3v-1h2v-1z"/>
</svg>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownNavLink">
          <li><a class="dropdown-item active" href="#" aria-current="page">Overview</a></li>
          <li><a class="dropdown-item" href="#">Inventory</a></li>
          <li><a class="dropdown-item" href="#">Customers</a></li>
          <li><a class="dropdown-item" href="#">Products</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Reports</a></li>
          <li><a class="dropdown-item" href="#">Analytics</a></li>
        </ul>
      </div>

      <div class="d-flex align-items-center">
        <form class="w-100 me-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

       
        <div class="flex-shrink-0 dropdown">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
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

  <!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">Username:</label>
                        <input type="text" name="new_username" id="newUsername" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Password:</label>
                        <input type="password" name="new_password" id="newPassword" class="form-control" required>
                    </div>

                    <button type="submit" name="add_user" class="btn btn-success">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>


  <!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="user_id_edit" id="editUserId">

                    <div class="mb-3">
                        <label for="editUsername" class="form-label">Username:</label>
                        <input type="text" name="edit_username" id="editUsername" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="editPassword" class="form-label">Password:</label>
                        <input type="password" name="edit_password" id="editPassword" class="form-control" required>
                    </div>

                    <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>


  <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <input type="hidden" name="product_id_edit" id="editProductId">

                    <div class="mb-3">
                        <label for="editProductName" class="form-label">Product Name:</label>
                        <input type="text" name="product_name" id="editProductName" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="editProductPrice" class="form-label">Product Price:</label>
                        <input type="text" name="product_price" id="editProductPrice" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="editProductImage" class="form-label">Product Image:</label>
                        <input type="file" name="product_image" id="editProductImage" class="form-control" accept="image/*">
                    </div>

                    <button type="submit" name="update" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>


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

                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name:</label>
                        <input type="text" name="product_name" class="form-control" value="<?php echo isset($editProductName) ? $editProductName : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="product_price" class="form-label">Product Price:</label>
                        <input type="text" name="product_price" class="form-control" value="<?php echo isset($editProductPrice) ? $editProductPrice : ''; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="product_image" class="form-label">Product Image:</label>
                        <input type="file" name="product_image" class="form-control" accept="image/*">
                    </div>

                    <?php if (isset($productIdToEdit) && !empty($productIdToEdit)) : ?>
                        <!-- If in edit mode, show update button -->
                        <button type="submit" name="update" class="btn btn-primary">Update Product</button>
                    <?php else : ?>
                        <!-- If in insert mode, show insert button -->
                        <button type="submit" class="btn btn-success">Insert Product</button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="b-example-divider"></div>
<!-- Table for Users -->

<div class="d-flex justify-content-center mt-3">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
            <path d="M8 1a7 7 0 0 0-5.574 11.243c.022.057.05.142.082.238.037.11.078.248.12.417.044.176.08.4.098.659.017.247.01.45-.025.616-.035.174-.11.329-.204.459a2.44 2.44 0 0 1-.311.365c-.054.052-.112.106-.174.162a7.008 7.008 0 0 0 1.883 1.562c.562.352 1.233.576 1.942.653.021.007.043.015.066.021a5.993 5.993 0 0 0 3.662 0c.024-.007.047-.014.068-.02.712-.197 1.39-.497 1.992-.887a7.008 7.008 0 0 0-1.883-1.562c-.562-.352-1.233-.576-1.942-.653a2.576 2.576 0 0 0-.066-.021 5.993 5.993 0 0 0-3.662 0c-.024.007-.047.014-.068.02A2.575 2.575 0 0 0 8 1zM1.5 14c-1.53 0-2.933-.837-3.465-2.2-.18-.459-.293-.93-.334-1.4a6.487 6.487 0 0 1 0-2.8c.04-.471.154-.942.334-1.4.532-1.363 1.934-2.2 3.465-2.2 1.53 0 2.933.837 3.465 2.2a6.597 6.597 0 0 1 .334 1.4c.007.082.01.165.01.25s-.003.168-.01.25a6.597 6.597 0 0 1-.334 1.4c-.532 1.363-1.934 2.2-3.465 2.2zM7 2c.208 0 .406.074.566.207a2.988 2.988 0 0 0 1.404 2.255 6.524 6.524 0 0 0-3.936 0A2.988 2.988 0 0 0 6.434 2.21A3.162 3.162 0 0 0 7 2zm7.812 1.207a.5.5 0 1 1 .353.854A6.524 6.524 0 0 0 14 5.498c0 .135.003.27.01.403a6.527 6.527 0 0 0 2.33.348 3.148 3.148 0 0 0-1.334-1.95z"/>
            <path fill-rule="evenodd" d="M14.5 8a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0zM8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg> Add User
    </button>
</div>

<!-- Table for Users -->
<table class="table table-hover" id="userTable">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th> <!-- New column for actions -->
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch data from the 'users' table
        $userSql = "SELECT id, username, password FROM users";
        $userResult = mysqli_query($conn, $userSql);

        if (mysqli_num_rows($userResult) > 0) {
            // Loop through each row and display the data
            while ($userRow = mysqli_fetch_assoc($userResult)) {
                echo "<tr>";
                echo "<td>" . $userRow['id'] . "</td>";
                echo "<td>" . $userRow['username'] . "</td>";
                echo "<td>" . $userRow['password'] . "</td>";
                // Action Column
                echo "<td>
                        <div class='col'>
                            <div class='row g-0'>
                                <form method='post' action='{$_SERVER['PHP_SELF']}' class='col'>
                                    <input type='hidden' name='user_id' value='{$userRow['id']}'>
                                    <button type='button' class='btn btn-warning btn-sm edit' data-bs-toggle='modal' data-bs-target='#editUserModal'
                                        onclick='editUser(\"{$userRow['id']}\", \"{$userRow['username']}\", \"{$userRow['password']}\")'>
                                        Edit
                                    </button>
                                </form>
                        
                                <form method='post' action='{$_SERVER['PHP_SELF']}' class='col'>
                                    <input type='hidden' name='user_id' value='{$userRow['id']}'>
                                    <button type='submit' name='delete_user' class='btn btn-danger btn-sm'>Delete</button>
                                </form>
                            </div>
                        </div>
                      </td>";
                echo "</tr>";
            }
        } else {
            // If no rows are found
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }
        ?>
    </tbody>
</table>



<div class="b-example-divider"></div>
<br />

<div class="d-flex justify-content-center">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 1a.5.5 0 0 1 .5.5V7h5a.5.5 0 0 1 0 1H8v5a.5.5 0 0 1-1 0V8H1a.5.5 0 0 1 0-1h6V1.5a.5.5 0 0 1 .5-.5z"/>
        </svg> Add Product
    </button>
</div>


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
                <div class='row g-0'>
                <form method='post' action='{$_SERVER['PHP_SELF']}' class='col'>
                <input type='hidden' name='product_id' value='{$row['id']}'>
                <button type='button' class='btn btn-warning btn-sm edit' data-bs-toggle='modal' data-bs-target='#editProductModal'
                    onclick='editProduct(\"{$row['id']}\", \"{$row['name']}\", \"{$row['price']}\")'>
                    Edit
                </button>
            </form>
        
                    <form method='post' action='{$_SERVER['PHP_SELF']}' class='col'>
                        <input type='hidden' name='product_id' value='{$row['id']}'>
                        <button type='submit' name='delete' class='btn btn-danger btn-sm'>Delete</button>
                    </form>
                </div>
            </div>
        </td>
        ";
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

<div class="b-example-divider"></div>

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
<script>
    function editProduct(id, name, price) {
        document.getElementById("editProductId").value = id;
        document.getElementById("editProductName").value = name;
        document.getElementById("editProductPrice").value = price;
    }
</script>
<script>
    function editUser(id, username, password) {
        document.getElementById("editUserId").value = id;
        document.getElementById("editUsername").value = username;
        document.getElementById("editPassword").value = password;
    }
</script>
<script>
    // Clear input fields when the modal is closed
    $('#addUserModal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
</script>


</html>