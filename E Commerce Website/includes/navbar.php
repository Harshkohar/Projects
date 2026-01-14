<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar</title>
  <style>
    .logo{
      width: 7%;
    }

    #navbarSupportedContent li:hover{
      background-color: rgb(21, 47, 59);
      border-radius: 5px;
    }
    .nav-link.active{
      background-color: rgb(21, 47, 59);
      border-radius: 5px;
    }
  </style>
</head>
<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
      <div class="container-fluid">
        <img src="../images/webcart.png" alt="Logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link <?= ($active_page == 'home')? 'active':'' ?> text-light" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link <?= ($active_page == 'display_all_products') ? 'active':'' ?> text-light" href="display_all_products.php">Products</a>
            </li>
            <?php 
              if (isset($_SESSION["username"])) {
                echo "<li class='nav-item'>
                        <a class='nav-link text-light' href='./users_area/profile.php'>My Account</a>
                      </li>";
              } else {
                echo "<li class='nav-item'>
                        <a class='nav-link text-light' href='./users_area/user_registration.php'>Register</a>
                      </li>";
              }
            ?>
            <li class="nav-item">
              <a class="nav-link <?= ($active_page == 'contact')? 'active':'' ?> text-light" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                <?php cart_item();?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Total Price: <?php total_cart_price(); ?>/-</a>
            </li>

          </ul>
          <form class="d-flex" action="search.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
             <input type="submit" value="Search" class="btn btn-outline-light" name="search_product">
          </form>
        </div>
      </div>
    </nav>
  </div>
</body>
</html>