<?php
include("../includes/connect.php");
include("../functions/function.php");
if (isset($_GET["user_id"])) {
  $user_id = $_GET["user_id"];
}

// getting total items and total price of all items
 $user_ip = get_ip_address();
 $total_price=0;
 $cart_query_price ="select c.product_id, p.product_price, c.quantity from cart_details c JOIN products p ON c.product_id=p.product_id where ip_address='$user_ip'";
 $result_cart_price = mysqli_query($conn, $cart_query_price);
 $invoice_number = mt_rand();
 $status ='pending';
 $count_products =mysqli_num_rows($result_cart_price);
 while($row_price = mysqli_fetch_array($result_cart_price)) {
  $product_id = $row_price["product_id"];
  $product_price = $row_price["product_price"];
  $price = str_replace(',', '', $product_price);
  $quantity=$row_price["quantity"];
  $total_quantity += $quantity;
  $total_price += (int)$price * $quantity;
 }

 $insert_orders = "insert into `user_orders` (user_id, due_amount, invoice_number, total_products, total_quantity, order_date, order_status) values ($user_id, $total_price, $invoice_number, $count_products, $total_quantity, NOW(), '$status')";
 $result_orders = mysqli_query($conn, $insert_orders);
 if ($result_orders) {
  echo "<script>alert('Orders are submitted successfully.')</script>";
  echo "<script>window.open('profile.php', '_self')</script>";
 }

//  orders pending
$insert_pending_orders="insert into `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) values ($user_id, $invoice_number, $product_id, $total_quantity, '$status')";
$result_pending_orders = mysqli_query($conn, $insert_pending_orders);

// delete items from cart
$empty_cart = "delete from `cart_details` where ip_address='$user_ip'";
$result_delete = mysqli_query($conn, $empty_cart);

?>