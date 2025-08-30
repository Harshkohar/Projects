<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5 text-light text-center w-50 m-auto">
  <thead class="bg-info text-dark">
    <tr>
      <th>Category ID</th>
      <th>Category Title</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody class="bg-secondary">
    <?php
    $get_categories = "select * from `categories`";
    $result_categories = mysqli_query($conn, $get_categories);
    while ($row_categories = mysqli_fetch_array($result_categories)) {
      $category_id = $row_categories["category_id"];
      $category_title = $row_categories["category_title"];
     ?>
      <tr>
        <td><?php echo $category_id ?></td>
        <td><?php echo $category_title ?></td>
        <td><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_category=<?php echo $category_id ?>' onclick="return confirm('Are you sure you want to delete this?')" class='text-light'><i class='fa-solid fa-trash'></i></a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>