<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Products</title>
</head>
<body>
  <h3 class="text-center text-success">All Products</h3>
  <table class="table table-bordered mt-5 text-light text-center">
    <thead class="bg-info text-dark">
      <tr>
        <th>Product ID</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody class="bg-secondary">
      <?php
        $get_products="select * from `products`";
        $result_products=mysqli_query($conn, $get_products);
        while($row_products=mysqli_fetch_array($result_products)){
          $product_id=$row_products["product_id"];
          $product_title=$row_products["product_title"];
          $product_image1=$row_products["product_image1"];
          $product_price=$row_products["product_price"];
          $status=$row_products["status"];
          echo "<tr>
                  <td>$product_id</td>
                  <td>$product_title</td>
                  <td><img src='product_images/$product_image1' width='60px' height='60px'></td>
                  <td>$product_price</td>
                  <td>$status</td>
                  <td><a href='index.php?edit_product=$product_id' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
                  <td><a href='index.php?delete_product=$product_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
        }
      ?>
    </tbody>
  </table>
</body>
</html>