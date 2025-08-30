<!-- Connect File -->
<?php
include("../includes/connect.php");
include("../functions/function.php");
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User-Login</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- External CSS -->
  <link rel="stylesheet" href="./css/style.css">

</head>

<body>
  <!-- Main Data Section -->
  <div class="container-fluid">
    <h2 class="text-center my-3">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
      <div class="col-lg-12 col-xl-6">
        <form action="" method="post">

          <!-- username -->
          <div class="form-outline mb-4">
            <label for="user_name" class="form-label">Username</label>
            <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter your username"
              autocomplete="off" required>
          </div>

          <!-- password -->
          <div class="form-outline mb-4">
            <label for="user_password" class="form-label">Password</label>
            <input type="password" name="user_password" id="user_password" class="form-control"
              placeholder="Enter your password" autocomplete="off" required>
          </div>

          <!-- Login -->
          <div class="mt-4 pt-2">
            <input type="submit" value="Login" class="btn btn-dark py-2 px-3" name="user_login">
            <p class="small fw-bold mt-2 pt-1 mb-4">Don't have an account? <a href="user_registration.php"
                class="text-danger">Register</a> </p>
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

<?php
if (isset($_POST["user_login"])) {
  $username = $_POST["user_name"];
  $password = $_POST["user_password"];
  $select_query = "select * from `user_table` where username='$username'";
  $result = mysqli_query($conn, $select_query);
  $row_data = mysqli_fetch_assoc($result);
  $row = mysqli_num_rows($result);
  $user_ip = get_ip_address();

  // cart item
  $select_cart_items = "select * from `cart_details` where ip_address='$user_ip'";
  $select_cart_items_result = mysqli_query($conn, $select_cart_items);
  $row_cart_count = mysqli_num_rows($select_cart_items_result);

  if ($row > 0) {
    $_SESSION["username"] = $username;
    if (password_verify($password, $row_data['user_password'])) {
      if ($row_cart_count == 0) {
        $_SESSION["username"] = $username;
        echo "<script>alert('Logged In Successfully.')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
      } else {
        $_SESSION["username"] = $username;
        echo "<script>alert('Logged In Successfully.')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
      }
    } else {
      echo "<script>alert('Invalid Credentials!!!!')</script>";
    }

  } else {
    echo "<script>alert('Invalid Credentials!!!!')</script>";
  }
}

?>