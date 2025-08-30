<?php
// include("./includes/connect.php");

// fetching products
function fetch_products()
{
  global $conn;
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {

      $select_query = "select * from `products` order by rand() limit 0,6";
      $result_query = mysqli_query($conn, $select_query);
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row["product_id"];
        $product_title = $row["product_title"];
        $product_description = $row["product_description"];
        $product_image1 = $row["product_image1"];
        $product_price = $row["product_price"];
        $category_title = $row["category_title"];
        $brand_title = $row["brand_title"];

        echo "<div class='mb-3 px-4 h-100' style='width:33%; '>
              <div class='card px-2' style='max-height:700px;'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p><strong>Price:</strong> &#8377; $product_price</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
              </div>
              </div>";
      }
    }
  }
}

// fetching all products
function fetch_all_products()
{
  global $conn;
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {

      $select_query = "select * from `products` order by rand()";
      $result_query = mysqli_query($conn, $select_query);
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row["product_id"];
        $product_title = $row["product_title"];
        $product_description = $row["product_description"];
        $product_image1 = $row["product_image1"];
        $product_price = $row["product_price"];
        $category_title = $row["category_title"];
        $brand_title = $row["brand_title"];

        echo "<div class='mb-3 px-4 h-100' style='width:33%;'>
              <div class='card px-2'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p><strong>Price:</strong> &#8377; $product_price</p>
              <a href='display_all_products.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
              </div>
              </div>";
      }
    }
  }
}

// fetching products with category
function fetch_products_using_category()
{
  global $conn;
  if (isset($_GET['category'])) {
    $category_title = $_GET['category'];
    $select_query = "SELECT * FROM `products` WHERE category_title='$category_title';";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='flex-fill text-center text-danger'>No stock for this category!!!</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row["product_id"];
      $product_title = $row["product_title"];
      $product_description = $row["product_description"];
      $product_image1 = $row["product_image1"];
      $product_price = $row["product_price"];
      $category_title = $row["category_title"];
      $brand_title = $row["brand_title"];

      echo "<div class='mb-3 px-4 h-100' style='width:33%;'>
              <div class='card px-2'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p><strong>Price:</strong> &#8377; $product_price</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
              </div>
              </div>";
    }
  }
}

// fetching products with brand
function fetch_products_using_brand()
{
  global $conn;
  if (isset($_GET['brand'])) {
    $brand_title = $_GET['brand'];
    $select_query = "SELECT * FROM `products` WHERE brand_title='$brand_title';";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='flex-fill text-center text-danger'>No stock for this brand!!!</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row["product_id"];
      $product_title = $row["product_title"];
      $product_description = $row["product_description"];
      $product_image1 = $row["product_image1"];
      $product_price = $row["product_price"];
      $category_title = $row["category_title"];
      $brand_title = $row["brand_title"];

      echo "<div class='mb-3 px-4 h-100' style='width:33%;'>
              <div class='card px-2'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p><strong>Price:</strong> &#8377; $product_price</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
              </div>
              </div>";
    }
  }
}

//fetch brands 
function fetch_brands()
{
  global $conn;
  $select_brands = "select * from `brands`";
  $result_brands = mysqli_query($conn, $select_brands);
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title = $row_data["brand_title"];
    $brand_id = $row_data["brand_id"];
    echo "<li class='nav-item'>
    <a href='index.php?brand=$brand_title' class='nav-link text-light'>$brand_title</a></li>";
  }
}

// fetch categories
function fetch_categories()
{
  global $conn;
  $select_categories = "select * from `categories`";
  $result_categories = mysqli_query($conn, $select_categories);
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $category_title = $row_data["category_title"];
    $category_id = $row_data["category_id"];
    echo "<li class='nav-item'>
    <a href='index.php?category=$category_title' class='nav-link text-light'>$category_title</a></li>";
  }
}

// searching products

function search_products()
{
  global $conn;
  if (isset($_GET['search'])) {
    $search_value = $_GET['search'];
    $search_query = "select * from `products` where product_keywords like '%$search_value%'";
    $result_query = mysqli_query($conn, $search_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='flex-fill text-center text-danger'>No match found!!!!</h2>";
    }
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row["product_id"];
      $product_title = $row["product_title"];
      $product_description = $row["product_description"];
      $product_image1 = $row["product_image1"];
      $product_price = $row["product_price"];
      $category_title = $row["category_title"];
      $brand_title = $row["brand_title"];

      echo "<div class='mb-3 px-4 h-100' style='width:33%;'>
              <div class='card px-2'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p><strong>Price:</strong> &#8377; $product_price</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
              </div>
              </div>
              </div>";
    }
  }
}

// View More Details 
function view_more()
{
  global $conn;
  if (isset($_GET["product_id"])) {
    if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) {
        $product_id = $_GET['product_id'];
        $select_query = "select * from `products` where product_id=$product_id";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row["product_id"];
          $product_title = $row["product_title"];
          $product_description = $row["product_description"];
          $product_image1 = $row["product_image1"];
          $product_image2 = $row["product_image2"];
          $product_image3 = $row["product_image3"];
          $product_price = $row["product_price"];
          $category_title = $row["category_title"];
          $brand_title = $row["brand_title"];

          echo "<div class='mb-3 px-4 h-100' style='width:33%;'>
              <div class='card px-2'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p><strong>Price:</strong> &#8377; $product_price</p>
              <p><strong>Price:</strong> &#8377; $product_price</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-dark'>Add to Cart</a>
              <a href='index.php' class='btn btn-secondary'>Go Home</a>
              </div>
              </div>
              </div>
              <div class='col-md-8'>
                <div class='row'>
                  <div class='col-md-12'>
                    <h4 class='text-center mb-5'>Related products</h4>
                  </div>
                  <div class='col-md-6'>
                    <img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                  </div>
                  <div class='col-md-6'>
                    <img src='./admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                  </div>
                </div>
              </div>";
        }
      }
    }
  }
}

// fetching ip address
function get_ip_address()
{
  // if user from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //if user is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //if user is from the remote address  
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

// cart function
function cart()
{
  if (isset($_GET['add_to_cart'])) {
    global $conn;
    $ip = get_ip_address();
    $get_product_id = $_GET['add_to_cart'];
    $select_query = "select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
    $result = mysqli_query($conn, $select_query);
    $num_of_rows = mysqli_num_rows($result);
    if ($num_of_rows > 0) {
      echo "<script>alert('This item is already present inside cart')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    } else {
      $insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id, '$ip', 1)";
      $result = mysqli_query($conn, $insert_query);
      echo "<script>alert('Item is added to cart')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }
  }
}

// cart item number
function cart_item()
{
  if (isset($_GET['add_to_cart'])) {
    global $conn;
    $ip = get_ip_address();
    $select_query = "select * from `cart_details` where ip_address='$ip'";
    $result = mysqli_query($conn, $select_query);
    $count_cart_items = mysqli_num_rows($result);
  } else {
    global $conn;
    $ip = get_ip_address();
    $select_query = "select * from `cart_details` where ip_address='$ip'";
    $result = mysqli_query($conn, $select_query);
    $count_cart_items = mysqli_num_rows($result);
  }
  echo $count_cart_items;
}

// total cart price
function total_cart_price() {
  global $conn;
  $ip = get_ip_address();
  $total_price = 0;

  $select_query = "
    SELECT p.product_price, c.quantity
    FROM cart_details c
    JOIN products p ON c.product_id = p.product_id
    WHERE c.ip_address = '$ip'
  ";

  $result = mysqli_query($conn, $select_query);

  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $price_string = $row['product_price'];
      $quantity = $row['quantity'];
      $price = str_replace(',','', $price_string);
      $total_price += (int)$price * $quantity;
    }
  }
  echo $total_price;
}

// get user order details
function get_profile_details(){
  global $conn;
  $username = $_SESSION["username"];
  $get_details_query = "select user_id from `user_table` where username='$username'";
  $result_details = mysqli_query($conn, $get_details_query);
  $row_details = mysqli_fetch_assoc($result_details);
  $user_id = $row_details["user_id"];
  if(!isset($_GET["edit_account"])){
    if(!isset($_GET["my_orders"])){
      if(!isset($_GET["delete_account"])){
        $get_orders_query = "select * from `user_orders` where user_id=$user_id and order_status='pending'";
        $result_orders = mysqli_query($conn, $get_orders_query);
        $row_count = mysqli_num_rows($result_orders);
        if($row_count>0){
          echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>
          <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
        } else {
          echo "<h3 class='text-center text-success mt-5 mb-2'>You have No pending orders</h3>
          <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
        }
      }
    }
  }
}

?>