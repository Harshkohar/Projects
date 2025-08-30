<?php
if (isset($_GET["delete_category"])) {
  $delete_id = $_GET["delete_category"];
  // select query
  $get_categories = "select * from `categories` where category_id=$delete_id";
  $result_categories = mysqli_query($conn, $get_categories);
  $row_categories = mysqli_fetch_array($result_categories);
  $category_title = $row_categories["category_title"];
  // select query for products
  $get_products = "select * from `products` where category_title='$category_title'";
  $result_products = mysqli_query($conn, $get_products);
  $rows = mysqli_num_rows($result_products);
  if ($rows > 0) {
    // delete products
    $delete_products = "delete from `products` where category_title='$category_title'";
    $result_products = mysqli_query($conn, $delete_products);
    // delete query
    $delete_category = "delete from `categories` where category_id=$delete_id";
    $result_delete = mysqli_query($conn, $delete_category);
    if ($result_delete) {
      echo "<script>alert('Category deleted successfully')</script>";
      echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
  } else {
    $delete_category = "delete from `categories` where category_id=$delete_id";
    $result_delete = mysqli_query($conn, $delete_category);
    if ($result_delete) {
      echo "<script>alert('Category deleted successfully')</script>";
      echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
  }
}
?>