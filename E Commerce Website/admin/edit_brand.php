<?php
if (isset($_GET["edit_brand"])) {
  $brand_id = $_GET["edit_brand"];
  $fetch_brand = "select * from `brands` where brand_id=$brand_id";
  $result_brand = mysqli_query($conn, $fetch_brand);
  $row_brand = mysqli_fetch_array($result_brand);
  $brand_title = $row_brand["brand_title"];
}
if (isset($_POST["update_brand"])) {
  $br_title = $_POST["brand_title"];
  $update_brand = "update `brands` set brand_title='$br_title' where brand_id=$brand_id";
  $result_update = mysqli_query($conn, $update_brand);
  if ($result_update) {
    echo "<script>alert('Brand updated successfully')</script>";
    echo "<script>window.open('./index.php?view_brands','_self')</script>";
  }
}
?>

<div class="container mt-3">
  <h3 class="text-center">Edit Brand</h3>
  <form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="brand_title" class="form-label fw-bold mt-2">Brand Title</label>
      <input type="text" name="brand_title" id="brand_title" class="form-control w-50 m-auto"
        value="<?php echo $brand_title ?>" required>
    </div>
    <input type="submit" value="Update Brand" class="btn btn-dark px-3 mb-3" name="update_brand">
  </form>
</div>