<?php
include("../includes/connect.php");
include("../functions/function.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome <?php echo $_SESSION['username'] ?></title>

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
    .user-image {
      height: 100%;
      width: 50%;
    }

    .user-list a:hover {
      background-color: rgba(0, 0, 0, 1);
    }

    ul{
      height: 100%;
    }

    ul li:nth-child(2){
      height: 40%;
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
              <a class="nav-link <?= ($active_page == 'home') ? 'active' : '' ?> text-light" aria-current="page"
                href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($active_page == 'display_all_products') ? 'active' : '' ?> text-light"
                href="../display_all_products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($active_page == 'contact') ? 'active' : '' ?> text-light" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                  <?php cart_item(); ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- Second Navbar -->
  <nav class="navbar navbar-expand-lg navbar-secondary bg-dark">
    <ul class="navbar-nav me-auto second">
      <?php
      if (!isset($_SESSION['username'])) {
        echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
      } else {
        echo "<li class='nav-item'>
          <a class='nav-link' href='profile.php'>Welcome " . $_SESSION['username'] . "</a>
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

  <!-- Main Section -->
  <div class="d-flex">
    <!-- Options -->
    <div class="bg-dark p-0 mb-3" style="width:20%;">
      <ul class="navbar-nav bg-secondary text-center user-list">
        <li class="nav-item bg-dark">
          <a class="nav-link text-light" aria-current="page" href="profile.php">
            <h5>Your Profile</h5>
          </a>
        </li>
        <?php
        $username = $_SESSION["username"];
        $user_image_query = "select user_image from user_table where username='$username'";
        $result_image = mysqli_query($conn, $user_image_query);
        $row = mysqli_fetch_array($result_image);
        $user_image = $row["user_image"];
        echo "<li class='nav-item my-3 image-li'>
          <img src='./user_images/$user_image' alt='User' class='user-image'>
        </li>";
        ?>
        <li class="nav-item">
          <a class="nav-link text-light fw-bold" aria-current="page" href="profile.php">
            Pending Orders
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light fw-bold" aria-current="page" href="profile.php?edit_account">
            Edit Account
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light fw-bold" aria-current="page" href="profile.php?my_orders">
            My Orders
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light fw-bold" aria-current="page" href="profile.php?delete_account">
            Delete Account
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light fw-bold" aria-current="page" href="logout.php">
            Logout
          </a>
        </li>
      </ul>
    </div>
    <div style="width:80%;">
      <?php
        get_profile_details();
        if (isset($_GET["edit_account"])) {
          include("edit_account.php");
        }
        if (isset($_GET["my_orders"])) {
          include("user_orders.php");
        }
        if (isset($_GET["delete_account"])) {
          include("delete_account.php");
        }
      ?>
    </div>
  </div>

  <!-- Footer -->
  <?php include('../includes/footer.php') ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
</body>

</html>