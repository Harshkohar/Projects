<?php
if (isset($_GET["delete_brand"])) {
  $delete_id = $_GET["delete_brand"];
  // select query
  $get_brand = "select * from `brands` where brand_id=$delete_id";
  $result_brand = mysqli_query($conn, $get_brand);
  $row_brand = mysqli_fetch_array($result_brand);
  $brand_title = $row_brand["brand_title"];
  // select query for products
  $get_products = "select * from `products` where brand_title='$brand_title'";
  $result_products = mysqli_query($conn, $get_products);
  $rows = mysqli_num_rows($result_products);

  if ($rows > 0) {
    // delete products
    $delete_products = "delete from `products` where brand_title='$brand_title'";
    $result_products = mysqli_query($conn, $delete_products);
    // delete query
    $delete_brand = "delete from `brands` where brand_id=$delete_id";
    $result_delete = mysqli_query($conn, $delete_brand);
    if ($result_delete) {
      echo "<script>alert('Brand deleted successfully')</script>";
      echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
  } else {
    $delete_brand = "delete from `brands` where brand_id=$delete_id";
    $result_delete = mysqli_query($conn, $delete_brand);
    if ($result_delete) {
      echo "<script>alert('Brand deleted successfully')</script>";
      echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
  }
}
?>