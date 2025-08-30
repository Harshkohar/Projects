<?php
if (isset($_GET["edit_category"])) {
  $category_id = $_GET["edit_category"];
  $fetch_category = "select * from `categories` where category_id=$category_id";
  $result_category = mysqli_query($conn, $fetch_category);
  $row_category = mysqli_fetch_array($result_category);
  $category_title = $row_category["category_title"];
}
if (isset($_POST["update_category"])) {
  $cat_title = $_POST["category_title"];
  $update_category = "update `categories` set category_title='$cat_title' where category_id=$category_id";
  $result_update = mysqli_query($conn, $update_category);
  if ($result_update) {
    echo "<script>alert('Category updated successfully')</script>";
    echo "<script>window.open('./index.php?view_categories','_self')</script>";
  }
}
?>

<div class="container mt-3">
  <h3 class="text-center">Edit Category</h3>
  <form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="category_title" class="form-label fw-bold mt-2">Category Title</label>
      <input type="text" name="category_title" id="category_title" class="form-control w-50 m-auto"
        value="<?php echo $category_title ?>" required>
    </div>
    <input type="submit" value="Update Category" class="btn btn-dark px-3 mb-3" name="update_category">
  </form>
</div>