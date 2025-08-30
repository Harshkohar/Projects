<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5 text-light text-center">
  <?php
  $get_users = "select * from `user_table`";
  $result_users = mysqli_query($conn, $get_users);
  $row_count = mysqli_num_rows($result_users);
  if ($row_count == 0) {
    echo "<h2 class='text-danger text-center mt-5'>No users</h2>";
  } else {
    ?>
    <thead class="bg-info text-dark">
      <tr>
        <th>User ID</th>
        <th>Username</th>
        <th>User Email</th>
        <th>User Image</th>
        <th>User Address</th>
        <th>User Mobile</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody class="bg-secondary">
      <?php while ($row_users = mysqli_fetch_array($result_users)) {
        $user_id = $row_users["user_id"];
        $username = $row_users["username"];
        $user_email = $row_users["user_email"];
        $user_image = $row_users["user_image"];
        $user_address = $row_users["user_address"];
        $user_mobile = $row_users["user_mobile"];
        ?>
        <tr>
          <td><?php echo $user_id ?></td>
          <td><?php echo $username ?></td>
          <td><?php echo $user_email ?></td>
          <td><img src="../users_area/user_images/<?php echo $user_image ?>" width='60px' height='60px' alt="<?php echo $username ?>"></td>
          <td><?php echo $user_address ?></td>
          <td><?php echo $user_mobile ?></td>
          <td><a href='index.php?delete_user=<?php echo $user_id ?>'
              onclick="return confirm('Are you sure you want to delete this?')" class='text-light'><i
                class='fa-solid fa-trash'></i></a></td>
        </tr>
      <?php }
  } ?>
  </tbody>
</table>