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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS Files -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/variables.css" rel="stylesheet">

</head>

    <style>
        #header { 
            background-color: #FFFBFB;
            border-top: 1px solid darkred;
            border-bottom: 1px solid darkred;
/*            height: 60px;*/
        }

        .header {
          height: 60px;
          transition: all 0.5s;
          z-index: 997;
        }

        .header.sticked {
          height: 70px;
        }

        .header .logo h1 {
          font-size: 40px;
          font-weight: 700;
          color: darkred;
          font-family: ArcherBold, Cursive;
        }

      /*  #products {
            margin-top: 50px; 
        }*/

        .card {
            margin-right: 55px; 
        }

        .card:last-child {
            margin-right: 0;
        }

        .footer {
            background-color: #1B1B1B;
            color: white; /* Set text color to white or any other contrasting color */
            padding: 50px 0; /* Adjust padding as needed */
        }

    </style>


<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
         <!-- <img src="assets/img/logo.png" alt="Aice Logo"> -->
         <h1> Aice </h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#products">Products</i></a></li>
          <li><a href="#footer">Contact</a></li>
          <li><a href="login.php">Log in</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->
      </div>
    </div>
  </header><!-- End Header -->

    <main id="main">
    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <a href="#" class="img-bg d-flex align-items-end" style="background-image: url('img/1.jpg');">
                    <div class="img-bg-inner">
                      <h2 style="color: white;">The Best Homemade Cookies</h2>
                      <p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="#" class="img-bg d-flex align-items-end" style="background-image: url('img/2.jpg');">
                    <div class="img-bg-inner">
                      <h2>The Best Homemade Cookies</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="#" class="img-bg d-flex align-items-end" style="background-image: url('img/3.jpg');">
                    <div class="img-bg-inner">
                      <h2>The Best Homemade Cookies</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>

                <div class="swiper-slide">
                  <a href="#" class="img-bg d-flex align-items-end" style="background-image: url('img/2.jpg');">
                    <div class="img-bg-inner">
                      <h2>The Best Homemade Cookies</h2>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia! Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                    </div>
                  </a>
                </div>
              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->

    <div class="container mt-5" id="products">
        <h2 style="text-align: center;">Our Product </h2><br/>

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
    </main>
    <br/><br/><br/><br/><br/>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-legal">
      <div class="container">
      </div>
    </div>

  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>


</body>
</html>
