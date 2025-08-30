<?php
if (isset($_GET["delete_order"])){
  $delete_order = $_GET["delete_order"];
  $delete_order = "delete from `user_orders` where order_id=$delete_order";
  $result_delete = mysqli_query($conn, $delete_order);
  if ($result_delete) {
    echo "<script>alert('Order deleted successfully')</script>";
    echo "<script>window.open('./index.php?list_orders','_self')</script>";
  }
}
?>