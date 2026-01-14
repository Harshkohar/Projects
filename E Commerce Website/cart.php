<!-- Connect File -->
<?php
include("includes/connect.php");
include("functions/function.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce website-Cart Details</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- External CSS -->
  <link rel="stylesheet" href="./css/style.css">
  <style>
    .logo{
      width: 7%;
    }

    .cart-img {
      width: 80px;
      height: 80px;
      object-fit: contain;
    }

    #navbarSupportedContent li:hover {
      background-color: rgb(21, 47, 59);
      border-radius: 5px;
    }
  </style>

</head>

<body>

  <!-- Navbar -->
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
              <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="display_all_products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="./users_area/user_registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                  <?php cart_item(); ?></sup></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- Calling cart function -->
  <?php cart(); ?>

  <!-- Second Navbar -->
  <?php include("./includes/second_nav.php") ?>

  <!-- Central text -->
  <div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communications is at the heart of e-commerce and community</p>
  </div>

  <!-- Main Data Section -->
  <div class="d-flex flex-wrap justify-content-center">
    <div class="row">
      <form action="" method="post">
        <?php
        global $conn;
        $ip = get_ip_address();
        $total_price = 0;

        // Fetch products in the cart
        $select_query = "
          SELECT p.product_id, p.product_title, p.product_image1, p.product_price, c.quantity
          FROM cart_details c
          JOIN products p ON c.product_id = p.product_id
          WHERE c.ip_address = '$ip'";

        $result = mysqli_query($conn, $select_query);

        $num_of_rows = mysqli_num_rows($result);

        if ($num_of_rows == 0) {
          echo "<h2 class='flex-fill text-danger'>Your cart is empty!!!</h2>";
        } else { ?>
          <table class="table table-bordered text-center">
            <tr>
              <th>Product Title</th>
              <th>Product Image</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th>Remove</th>
              <th>Operations</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
              $product_id = $row["product_id"];
              $product_title = $row["product_title"];
              $product_image1 = $row["product_image1"];
              $product_price = $row["product_price"];
              $price = str_replace(',', '', $product_price);
              $quantity = $row['quantity'];
              $total_price += (int) $price * $quantity;
              ?>
              <tr>
                <td><?php echo $product_title ?></td>
                <td><img src="./admin/product_images/<?php echo $product_image1 ?>" alt="image" class="cart-img"></td>
                <td><input type="text" name="qty[<?php echo $product_id; ?>]" class="form-input w-50"
                    value="<?php echo $quantity ?>"></td>
                <td><?php echo $product_price ?>/-</td>
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>" id=""></td>
                <td>
                  <input type="submit" value="Update Cart" class="btn btn-dark text-light px-2 py-1 mx-2"
                    name="update_cart">
                </td>
              </tr>
            <?php } ?>
          </table>

          <!-- Update Cart Logic -->
          <?php
          if (isset($_POST['update_cart'])) {
            foreach ($_POST['qty'] as $prod_id => $quantity) {
              $quantity = intval($quantity);
              $update_cart = "UPDATE cart_details SET quantity=$quantity WHERE ip_address='$ip' AND product_id=$prod_id";
              mysqli_query($conn, $update_cart);
            }
            echo "<script>window.open('cart.php', '_self');</script>";
          }

          // Function for removing items from the cart
          function remove_cart_item()
          {
            global $conn;
            $ip = get_ip_address();
            if (isset($_POST["remove_cart"])) {
              foreach ($_POST["removeitem"] as $remove_id) {
                $delete_query = "DELETE FROM cart_details WHERE product_id=$remove_id AND ip_address='$ip'";
                $run_delete = mysqli_query($conn, $delete_query);
                if ($run_delete) {
                  echo "<script>window.open('cart.php', '_self');</script>";
                }
              }
            }
          }
          remove_cart_item();
          ?>

          </table>

          <!-- Total Section -->
          <div class="d-flex justify-content-between my-4" style="height:fit-content;">
            <h4 class="px-3">Total: <strong><?php echo $total_price ?>/-</strong></h4>
            <div>
              <input type="submit" value="Remove Items" name="remove_cart" class="btn btn-dark text-light px-2 py-1 mx-2">
              <a href="./users_area/checkout.php" class="btn btn-secondary text-light px-2 py-1 mx-2">Checkout</a>
            </div>
          </div>
        <?php } ?>
        <a href="index.php" class="btn btn-dark text-light px-3 py-2 my-3">Continue Shopping</a>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <?php include("./includes/footer.php") ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>