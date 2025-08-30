<?php
if (isset($_GET["edit_account"])) {
  $user_session_name = $_SESSION["username"];
  $select_query = "select * from `user_table` where username='$username'";
  $result = mysqli_query($conn, $select_query);
  $row_fetch = mysqli_fetch_assoc($result);
  $user_id = $row_fetch["user_id"];
  $username = $row_fetch["username"];
  $user_email = $row_fetch["user_email"];
  $user_address = $row_fetch["user_address"];
  $user_mobile = $row_fetch["user_mobile"];

  if (isset($_POST["update"])) {
    $updated_username = $_POST["username"];
    $updated_email = $_POST["email"];
    $updated_address = $_POST["user_address"];
    $updated_mobile = $_POST["user_contact"];
    $user_image = $_FILES["user_image"]["name"];
    $user_image_tmp = $_FILES["user_image"]["tmp_name"];
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");

    // update query
    $update_data="update `user_table` set username='$updated_username', user_email='$updated_email', 
    user_image='$user_image', user_address='$updated_address', user_mobile='$updated_mobile' where user_id=$user_id";
    $result_data = mysqli_query($conn, $update_data);
    if ($result_data) {
      echo "<script>alert('Information Updated successfully.')</script>";
      echo "<script>window.open('logout.php', '_self')</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit account</title>
  <style>
    .edit_image{
      width: 100px;
      height: 100px;
      object-fit: contain;
    }
  </style>
</head>

<body>
  <h3 class="text-center text-success mb-4">Edit Account</h3>
  <form action="" method="post" enctype="multipart/form-data" class="w-50 m-auto">
    <div class="form-outline mb-4">
      <label for="username">Username</label>
      <input type="text" class="form-control mt-2 m-auto" name="username" id="username" value="<?php echo $username ?>">
    </div>
    <div class="form-outline mb-4">
      <label for="email">Email</label>
      <input type="email" class="form-control mt-2 m-auto" name="email" id="email" value="<?php echo $user_email ?>">
    </div>
    <div class="form-outline mb-4">
      <label>Profile Image</label>
      <div class="d-flex mt-2 m-auto">
        <input type="file" class="form-control" name="user_image">
      <img src="./user_images/<?php echo $user_image ?>" alt="User" class="edit_image">
      </div>
    </div>
    <div class="form-outline mb-4">
      <label for="user_address">Address</label>
      <input type="text" class="form-control mt-2 m-auto h-100" name="user_address" id="user_address"
        value="<?php echo $user_address ?>">
    </div>
    <div class="form-outline mb-4">
      <label for="user_contact">Mobile No.</label>
      <input type="text" class="form-control mt-2 m-auto" name="user_contact" id="user_contact"
        value="<?php echo $user_mobile ?>">
    </div>

    <div class="text-center">
      <input type="submit" value="Update" class="btn btn-dark mb-4" name="update">
    </div>
  </form>
</body>

</html>