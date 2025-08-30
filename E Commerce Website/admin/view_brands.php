<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5 text-light text-center w-50 m-auto">
  <thead class="bg-info text-dark">
    <tr>
      <th>Brand ID</th>
      <th>Brand Title</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody class="bg-secondary">
    <?php
    $get_brands = "select * from `brands`";
    $result_brands = mysqli_query($conn, $get_brands);
    while ($row_brands = mysqli_fetch_array($result_brands)) {
      $brand_id = $row_brands["brand_id"];
      $brand_title = $row_brands["brand_title"];
      ?>
      <tr>
        <td><?php echo $brand_id ?></td>
        <td><?php echo $brand_title ?></td>
        <td><a href='index.php?edit_brand=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_brand=<?php echo $brand_id ?>' onclick="return confirm('Are you sure you want to delete this?')" class='text-light'><i class='fa-solid fa-trash'></i></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>