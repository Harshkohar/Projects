<?php
if (isset($_GET["edit_product"])) {
  $edit_id = $_GET["edit_product"];
  $get_products_data = "select * from `products` where product_id=$edit_id";
  $result_products_data = mysqli_query($conn, $get_products_data);
  $row_products = mysqli_fetch_array($result_products_data);
  $product_title = $row_products["product_title"];
  $product_description = $row_products["product_description"];
  $product_keywords = $row_products["product_keywords"];
  $category_title = $row_products["category_title"];
  $brand_title = $row_products["brand_title"];
  $product_image1 = $row_products["product_image1"];
  $product_image2 = $row_products["product_image2"];
  $product_image3 = $row_products["product_image3"];
  $product_price = $row_products["product_price"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Products</title>
  <style>
    .edit_image {
      width: 100px;
      object-fit: contain;
    }
  </style>
</head>

<body>
  <div class="container mt-3">
    <h3 class="text-center">Edit Product</h3>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-outline w-50 m-auto mb-4">
        <label for="product_title" class="form-label">Product Title</label>
        <input type="text" id="product_title" name="product_title" class="form-control"
          value="<?php echo $product_title ?>" required>
      </div>
      <div class="form-outline w-50 m-auto mb-4">
        <label for="product_desc" class="form-label">Product Description</label>
        <input type="text" id="product_desc" name="product_desc" class="form-control"
          value="<?php echo $product_description ?>" required>
      </div>
      <div class="form-outline w-50 m-auto mb-4">
        <label for="product_keywords" class="form-label">Product Keywords</label>
        <input type="text" id="product_keywords" name="product_keywords" class="form-control"
          value="<?php echo $product_keywords ?>" required>
      </div>
      <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product Category</label>
        <select name="product_category" id="product_category" class="form-select">
          <option value="<?php echo $category_title ?>" selected><?php echo $category_title ?></option>
          <?php
          $select_category = "select * from `categories`";
          $result_category = mysqli_query($conn, $select_category);
          while ($row_category = mysqli_fetch_array($result_category)) {
            $title = $row_category["category_title"];
            echo "<option value='$title'>$title</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brand" class="form-label">Product Brand</label>
        <select name="product_brand" id="product_brand" class="form-select">
          <option value="<?php echo $brand_title ?>" selected><?php echo $brand_title ?></option>
          <?php
          $select_brand = "select * from `brands`";
          $result_brand = mysqli_query($conn, $select_brand);
          while ($row_brand = mysqli_fetch_array($result_brand)) {
            $title = $row_brand["brand_title"];
            echo "<option value='$title'>$title</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-outline w-50 m-auto  mb-4">
        <label for="product_image1" class="form-label">Product Image1</label>
        <div class="d-flex mt-2 m-auto">
          <input type="file" class="form-control" id="product_image1" name="product_image1" required>
          <img src="product_images/<?php echo $product_image1 ?>" alt="product_image1" class="edit_image">
        </div>
      </div>
      <div class="form-outline w-50 m-auto mb-4">
        <label for="product_image2" class="form-label">Product Image2</label>
        <div class="d-flex mt-2 m-auto">
          <input type="file" class="form-control" id="product_image2" name="product_image2" required>
          <img src="product_images/<?php echo $product_image2 ?>" alt="product_image2" class="edit_image">
        </div>
      </div>
      <div class="form-outline w-50 m-auto mb-4">
        <label for="product_image3" class="form-label">Product Image3</label>
        <div class="d-flex mt-2 m-auto">
          <input type="file" class="form-control" id="product_image3" name="product_image3" required>
          <img src="product_images/<?php echo $product_image3 ?>" alt="product_image3" class="edit_image">
        </div>
      </div>
      <div class="form-outline w-50 m-auto mb-4">
        <label for="product_price" class="form-label">Product Price</label>
        <input type="text" id="product_price" name="product_price" class="form-control"
          value="<?php echo $product_price ?>" required>
      </div>
      <div class="text-center">
        <input type="submit" value="Update Product" name="update_product" class="btn btn-dark">
      </div>
    </form>
  </div>

  <?php
    if (isset($_POST["update_product"])) {
      $product_title = $_POST["product_title"];
      $product_desc = $_POST["product_desc"];
      $product_keywords = $_POST["product_keywords"];
      $product_category = $_POST["product_category"];
      $product_brand = $_POST["product_brand"];
      $product_price = $_POST["product_price"];

      $product_image1 = $_FILES["product_image1"]['name'];
      $product_image2 = $_FILES["product_image2"]['name'];
      $product_image3 = $_FILES["product_image3"]['name'];

      $product_image1_temp = $_FILES["product_image1"]['tmp_name'];
      $product_image2_temp = $_FILES["product_image2"]['tmp_name'];
      $product_image3_temp = $_FILES["product_image3"]['tmp_name'];

      move_uploaded_file($product_image1_temp, "./product_images/$product_image1");
      move_uploaded_file($product_image2_temp, "./product_images/$product_image2");
      move_uploaded_file($product_image3_temp, "./product_images/$product_image3");
      $update_products = "update `products` set product_title='$product_title', product_description='$product_desc', product_keywords='$product_keywords',category_title='$product_category', brand_title='$product_brand', product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3', product_price=$product_price, date=NOW() where product_id=$edit_id";
      $result_update = mysqli_query($conn, $update_products);
      if ($result_update) {
        echo "<script>alert('Product updated successfully')</script>";
        echo "<script>window.open('./index.php?view_products','_self')</script>";
      }
    }
  ?>
</body>

</html>