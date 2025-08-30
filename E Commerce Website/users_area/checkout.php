<!-- Connect File -->
<?php
include("../includes/connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce website - Checkout Page</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- External CSS -->
  <link rel="stylesheet" href="../css/style.css">
  
  <style>
    #navbarSupportedContent li:hover {
      background-color: rgb(21, 47, 59);
      border-radius: 5px;
    }

    .nav-link.active {
      background-color: rgb(21, 47, 59);
      border-radius: 5px;
    }

    .second-nav a{
      color: white;
    }
  </style>

</head>

<body>

  <!-- Navbar -->
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
      <div class="container-fluid">
        <img src="../images/logo1.png" alt="Logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="../display_all_products.php">Products</a>
            </li>
            <?php 
              if (isset($_SESSION["username"])) {
                echo "<li class='nav-item'>
                        <a class='nav-link text-light' href='profile.php'>My Account</a>
                      </li>";
              } else {
                echo "<li class='nav-item'>
                        <a class='nav-link text-light' href='user_registration.php'>Register</a>
                      </li>";
              }
            ?>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- Second Navbar -->
  <nav class="navbar navbar-expand-lg navbar-secondary bg-dark">
    <ul class="navbar-nav me-auto second-nav">
      <?php
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
          <a class='nav-link' href='../index/php'>Welcome Guest</a>
        </li>";
      } else {
        echo "<li class='nav-item'>
          <a class='nav-link' href='profile.php'>Welcome " . $_SESSION['username']."</a>
        </li>";
      }
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
        <a class='nav-link' href='user_login.php'>Login</a>
      </li>";
      } else {
        echo "<li class='nav-item'>
        <a class='nav-link' href='logout.php'>Logout</a>
      </li>";
      }
      ?>
    </ul>
  </nav>

  <!-- Central text -->
  <div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communications is at the heart of e-commerce and community</p>
  </div>

  <!-- Main Data Section -->
  <div class="d-flex flex-wrap justify-content-center">
    <div style="width:80%;" class="align-items-center">

      <div class="d-flex flex-wrap">
        <?php
        if (!isset($_SESSION["username"])) {
          include("user_login.php");
        } else {
          include("payment.php");
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include("../includes/footer.php") ?>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>