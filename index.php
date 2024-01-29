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
            background-color: #A95C53 ;
        }

        .card:last-child {
            margin-right: 0;
        }

        .card-body {
          background-color: #A95C53 ;
          color: white;
        }

        .button {
          margin-left: 150px;
          background-color: #A95C53;
          border: 1px solid #F99A8E;
          border-radius: 5px;
          padding: 8px;
          color: white;
        }
        
        .button:hover{
          background-color: #F99A8E;
          border: 1px solid #F99A8E;
          color: white;
        }
        
                /*--------------------------------------------------------------
        # Footer
        --------------------------------------------------------------*/
        .footer {
          overflow: hidden;
          background: rgba(var(--color-black-rgb), 0.9);
          font-size: 16px;
          color: rgba(var(--color-white-rgb), 0.7);
        }

        .footer .footer-content {
          padding: 60px 0;
        }

        .footer a.footer-link-more {
          color: rgba(var(--color-white-rgb), 0.7);
          display: inline-block;
          position: relative;
        }

        .footer a.footer-link-more:before {
          content: "";
          position: absolute;
          bottom: 0;
          left: 0;
          right: 0;
          height: 1px;
          background: var(--color-white);
        }

        .footer a.footer-link-more:hover {
          color: rgba(var(--color-white-rgb), 1);
        }

        .footer .footer-heading {
          color: var(--color-white);
          margin-bottom: 20px;
          padding-bottom: 10px;
          font-size: 18px;
        }

        .footer .footer-blog-entry li {
          margin-bottom: 20px;
          display: block;
        }

        .footer .footer-blog-entry li a .post-meta {
          font-size: 10px;
          letter-spacing: 0.07rem;
          text-transform: uppercase;
          font-weight: 400;
          font-family: var(--font-secondary);
          color: rgba(var(--color-white-rgb), 0.4);
          margin-bottom: 0px;
        }

        .footer .footer-blog-entry li a img {
          flex: 0 0 50px;
          width: 50px;
        }

        .footer .footer-links li {
          margin-bottom: 10px;
        }

        .footer .footer-links li a {
          color: rgba(var(--color-white-rgb), 0.7);
        }

        .footer .footer-links li a:hover,
        .footer .footer-links li a:focus {
          color: rgba(var(--color-white-rgb), 1);
        }

        .footer .footer-legal {
          background: var(--color-black);
          padding: 40px 0;
        }

        .footer .footer-legal .social-links a {
          text-align: center;
          display: inline-block;
          width: 40px;
          height: 40px;
          background-color: rgba(var(--color-white-rgb), 0.09);
          border-radius: 50%;
          color: var(--color-white);
          line-height: 40px;
        }

        .footer .footer-legal .social-links a:hover {
          background-color: rgba(var(--color-white-rgb), 0.2);
        }

        .footer .copyright strong {
          font-weight: 400;
        }

        .footer .credits {
          padding-top: 6px;
          font-size: 13px;
        }

        .footer .credits a {
          color: var(--color-white);
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
                <button class="button">Buy Now</button>
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
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
            <h3 class="footer-heading">ABOUT AICE</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
            <p><a href="about.html" class="footer-link-more">Learn More</a></p>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">NAVIGATION</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="index.php"><i class="bi bi-chevron-right"></i> Home</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> About</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Products</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Contact</a></li>
              <li><a href="login.php"><i class="bi bi-chevron-right"></i> Login</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">SHOP WITH US</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="#"><i class="bi bi-chevron-right"></i> Valentine's Day</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Thank You</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Everyday Occasions</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Corporate Gifts</a></li>
              <li><a href="#"><i class="bi bi-chevron-right"></i> Birthday</a></li>

            </ul>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">CONTACT US</h3>
            <ul class="footer-links list-unstyled">
            <li><a href="#">info@aicecookie.com</a></li>
            <li><a href="#">0969-7499-959</a></li>
            </ul>
          </div>

          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">FOLLOW US</h3>
            <ul class="footer-links list-unstyled">
              <li><a href="" class="twitter"><i class="bi bi-twitter"></i></a>&nbsp &nbsp &nbsp 
                <a href="" class="facebook"><i class="bi bi-facebook"></i></a>&nbsp &nbsp &nbsp 
                <a href="" class="instagram"><i class="bi bi-instagram"></i></a>
             </li>
            </ul>
          </div>

          </div>
        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            <div class="copyright">
              © Copyright <strong><span>Aice</span></strong>. All Rights Reserved
            </div>

            <div class="credits">
              Designed by <a href="#">BootstrapMade</a>
            </div>

          </div>
        </div>
      </div>
    </div>

  </footer>


  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>


</body>
</html>
