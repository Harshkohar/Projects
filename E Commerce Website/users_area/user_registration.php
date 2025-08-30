<!-- Connect File -->
<?php
include("../includes/connect.php");
include("../functions/function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User-registration</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- External CSS -->
  <link rel="stylesheet" href="./css/style.css">

</head>

<body>
  <!-- Main Data Section -->
  <div class="container-fluid">
    <h2 class="text-center my-3">New User
      Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-lg-12 col-xl-6">
        <form action="" method="post" enctype="multipart/form-data">

          <!-- username -->
          <div class="form-outline mb-4">
            <label for="user_name" class="form-label">Username</label>
            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter your username"
              autocomplete="off" required>
          </div>

          <!-- email -->
          <div class="form-outline mb-4">
            <label for="user_email" class="form-label">Email</label>
            <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter your email"
              autocomplete="off" required>
          </div>

          <!-- image field -->
          <div class="form-outline mb-4">
            <label for="user_image" class="form-label">User Image</label>
            <input type="file" name="user_image" id="user_image" class="form-control" required>
          </div>

          <!-- password -->
          <div class="form-outline mb-4">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" name="user_password" id="user_password" class="form-control"
              placeholder="Enter your password" autocomplete="off" required>
          </div>

          <!-- confirm password -->
          <div class="form-outline mb-4">
            <label for="conf_user_password" class="form-label">Confirm Password</label>
            <input type="password" name="conf_user_password" id="conf_user_password" class="form-control"
              placeholder="Confirm password" autocomplete="off" required>
          </div>

          <!-- address -->
          <div class="form-outline mb-4">
            <label for="user_address" class="form-label">Address</label>
            <input type="text" name="user_address" id="user_address" class="form-control"
              placeholder="Enter your address" autocomplete="off" required>
          </div>

          <!-- contact -->
          <div class="form-outline mb-4">
            <label for="user_contact" class="form-label">Contact</label>
            <input type="text" name="user_contact" id="user_contact" class="form-control"
              placeholder="Enter your mobile number" autocomplete="off" required>
          </div>

          <!-- register -->
          <div class="mt-4 pt-2">
            <input type="submit" value="Register" class="btn btn-dark py-2 px-3" name="user_register">
            <p class="small fw-bold mt-2 pt-1 mb-4">Already have an account? <a href="user_login.php"
                class="text-danger"> Login</a> </p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>

<!-- php code -->
<?php
if (isset($_POST["user_register"])) {
  $username = $_POST["user_name"];
  $email = $_POST["user_email"];
  $password = $_POST["user_password"];
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  $confirm_password = $_POST["conf_user_password"];
  $user_ip = get_ip_address();
  $user_address = $_POST["user_address"];
  $user_mobile = $_POST["user_contact"];
  $user_image = $_FILES["user_image"]["name"];
  $user_image_tmp = $_FILES["user_image"]["tmp_name"];

  // select query
  $select_query = "select * from `user_table` where username = '$username' or user_email='$email'";
  $select_query_result = mysqli_query($conn, $select_query);
  $rows = mysqli_num_rows($select_query_result);
  if ($rows > 0) {
    echo "<script>alert('Username or Email already exists!!!')</script>";
  } elseif ($password != $confirm_password) {
    echo "<script>alert('Passwords do not match!!!!')</script>";
  } else {
    // insert query
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");
    $insert_query = "insert into `user_table` (username, user_email, user_password,	user_image, user_ip,	user_address,	user_mobile ) values ('$username', '$email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_mobile')";
    $execute_query = mysqli_query($conn, $insert_query);
    if ($execute_query) {
      echo "<script>alert('Registration Successful')</script>";
      echo "<script>window.open('./user_login.php','_self')</script>";
    } else {
      die("There is an error" . mysqli_error($conn));
    }

    // selecting cart items
    $select_cart_items = "select * from `cart_details` where ip_address='$user_ip'";
    $select_cart_items_result = mysqli_query($conn, $select_cart_items);
    $cart_rows_count = mysqli_num_rows($select_cart_items_result);
    if ($cart_rows_count > 0) {
      $_SESSION["username"] = $username;
      echo "<script>alert('You have items in your cart')</script>";
      echo "<script>window.open('./checkout.php', '_self')</script>";
    } else {
      echo "<script>alert('window.open('../index.php', '_self')</script>";
    }
  }
}
?>