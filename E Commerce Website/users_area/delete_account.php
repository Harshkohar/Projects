<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Account</title>
  <style>
    input{
      width: 30%;
    }
  </style>
</head>

<body>
  <div class="text-center">
    <h3 class="my-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
      <div class="form-outline mb-4">
        <input type="submit" value="Delete Account" name="delete" class="btn btn-danger m-auto">
      </div>
      <div class="form-outline mb-4">
        <input type="submit" value="Changed my mind" name="changed_mind" class="btn btn-success m-auto">
      </div>
    </form>
  </div>

  <?php
    $user_session = $_SESSION["username"];
    if (isset($_POST["delete"])) {
      $user_ip=get_ip_address();
      $select_query = "select * from `user_table` where username='$user_session'";
      $result_select = mysqli_query($conn, $select_query);
      $row_data = mysqli_fetch_array($result_select);
      $user_id = $row_data["user_id"];
      $delete_cart_items="delete from cart_details where ip_address='$user_ip'";
      $result_delete_cart_items=mysqli_query($conn, $delete_cart_items);
      $delete_query = "delete user_table, user_orders from user_table JOIN user_orders ON user_table.user_id=user_orders.user_id where user_table.username = '$user_session'";
      $result_delete = mysqli_query($conn, $delete_query);
      if ($result_delete) {
        session_destroy();
        echo "<script>alert('Account Deleted Successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
      }
    }
    if (isset($_POST["changed_mind"])){
      echo "<script>window.open('profile.php','_self')</script>";
    }
  ?>
</body>

</html>