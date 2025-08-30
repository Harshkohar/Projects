<!-- Connect File -->
<?php
include("../includes/connect.php");
include("../functions/function.php");
session_start();
if (isset($_SESSION["username"])) {
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

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
      .admin-image {
        width: 120px;
        object-fit: contain;
      }
    </style>

  </head>

  <body>
    <div class="p-0">

      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid">
          <img src="../images/logo1.png" alt="Logo" class="logo">
          <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
              <?php
              if (!isset($_SESSION['username'])) {
                echo "<li class='nav-item'>
                      <a class='nav-link' href='#'>Welcome Guest</a>
                    </li>";
              } else {
                echo "<li class='nav-item'>
                      <a class='nav-link' href='index.php'>Welcome " . $_SESSION['username'] . "</a>
                    </li>";
              }
              ?>
            </ul>
          </nav>
        </div>
      </nav>

      <!-- Middle Text -->
      <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
      </div>

      <!-- Main Data -->
      <div>
        <div class="bg-secondary p-1 d-flex align-items-center">
          <div class="p-3">
            <?php
            $username = $_SESSION["username"];
            $admin_image_query = "select admin_image from admin_table where admin_name='$username'";
            $result_image = mysqli_query($conn, $admin_image_query);
            $row = mysqli_fetch_array($result_image);
            $admin_image = $row["admin_image"];
            echo "<img src='./admin_images/$admin_image' alt='admin' class='admin-image'>";
            ?>
            <p class="text-light text-center"><?php echo $_SESSION['username'] ?></p>
          </div>

          <!-- Button Container -->
          <div class="button text-center">
            <button class="my-2"><a href="insert_product.php" class="nav-link text-light bg-dark my-1">Insert
                Product</a></button>
            <button class="my-2"><a href="index.php?view_products" class="nav-link text-light bg-dark my-1">View
                Products</a></button>
            <button class="my-2"><a href="index.php?insert_category" class="nav-link text-light bg-dark my-1">Insert
                Category</a></button>
            <button class="my-2"><a href="index.php?view_categories" class="nav-link text-light bg-dark my-1">View
                Categories</a></button>
            <button class="my-2"><a href="index.php?insert_brand" class="nav-link text-light bg-dark my-1">Insert
                Brand</a></button>
            <button class="my-2"><a href="index.php?view_brands" class="nav-link text-light bg-dark my-1">View
                Brands</a></button>
            <button class="my-2"><a href="index.php?list_orders" class="nav-link text-light bg-dark my-1">All
                Orders</a></button>
            <button class="my-2"><a href="index.php?list_payments" class="nav-link text-light bg-dark my-1">All
                Payments</a></button>
            <button class="my-2"><a href="index.php?list_users" class="nav-link text-light bg-dark my-1">List
                Users</a></button>
            <button class="my-2"><a href="logout.php" class="nav-link text-light bg-dark my-1">Logout</a></button>
          </div>
        </div>
      </div>

      <!-- Button OnClick Data -->
      <div class="container my-3">
        <?php
        if (isset($_GET['insert_category'])) {
          include('insert_category.php');
        }
        if (isset($_GET['insert_brand'])) {
          include('insert_brand.php');
        }
        if (isset($_GET['view_products'])) {
          include('view_products.php');
        }
        if (isset($_GET['edit_product'])) {
          include('edit_products.php');
        }
        if (isset($_GET['delete_product'])) {
          include('delete_product.php');
        }
        if (isset($_GET['view_categories'])) {
          include('view_categories.php');
        }
        if (isset($_GET['view_brands'])) {
          include('view_brands.php');
        }
        if (isset($_GET['edit_category'])) {
          include('edit_category.php');
        }
        if (isset($_GET['edit_brand'])) {
          include('edit_brand.php');
        }
        if (isset($_GET['delete_category'])) {
          include('delete_category.php');
        }
        if (isset($_GET['delete_brand'])) {
          include('delete_brand.php');
        }
        if (isset($_GET['list_orders'])) {
          include('list_orders.php');
        }
        if (isset($_GET['delete_order'])) {
          include('delete_order.php');
        }
        if (isset($_GET['list_payments'])) {
          include('list_payments.php');
        }
        if (isset($_GET['delete_payment'])) {
          include('delete_payment.php');
        }
        if (isset($_GET['list_users'])) {
          include('list_users.php');
        }
        if (isset($_GET['delete_user'])) {
          include('delete_user.php');
        }
        ?>
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

<?php } else {
  echo "<h2 class='text-danger'>Error 404!!!! Page Not Found!!!<br> <span class='text-dark'>You are not allowed to access</span></h2>";
} ?>