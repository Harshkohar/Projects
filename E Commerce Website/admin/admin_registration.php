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
  <title>Admin Registration</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .admin-reg {
      width: 90%;
    }
  </style>
</head>

<body>
  <div class="m-3">
    <h2 class="text-center mb-5">Admin Registration</h2>
    <div class="d-flex justify-content-center" style="gap:100px;">
      <div class="w-50 text-center">
        <img src="../images/admin-regis.jpeg" alt="registration" class="admin-reg">
      </div>
      <div class="w-50">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-outline mb-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required
              class="form-control w-50">
          </div>
          <div class="form-outline mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter your email" required
              class="form-control w-50">
          </div>
          <div class="form-outline mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required
              class="form-control w-50">
          </div>
          <div class="form-outline mb-4">
            <label for="conf_password" class="form-label">Confirm Password</label>
            <input type="password" id="conf_password" name="conf_password" placeholder="Confirm password" required
              class="form-control w-50">
          </div>
          <div class="form-outline mb-4">
            <label for="admin_image" class="form-label">Admin Image</label>
            <input type="file" id="admin_image" name="admin_image" required
              class="form-control w-50">
          </div>
          <div>
            <input type="submit" class="btn btn-dark" value="Register" name="admin_registration">
            <p class="small fw-bold mt-2">Don't have an account? <a href="admin_login.php">Login</a></p>
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
if (isset($_POST["admin_registration"])) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $hash_password = password_hash($password, PASSWORD_DEFAULT);
  $confirm_password = $_POST["conf_password"];
  
  $admin_image = $_FILES["admin_image"]["name"];
  $admin_image_tmp = $_FILES["admin_image"]["tmp_name"];

  // select query
  $select_query = "select * from `admin_table` where admin_name = '$username' or admin_email='$email'";
  $select_query_result = mysqli_query($conn, $select_query);
  $rows = mysqli_num_rows($select_query_result);
  if ($rows > 0) {
    echo "<script>alert('Admin already exists!!!')</script>";
  } elseif ($password != $confirm_password) {
    echo "<script>alert('Passwords do not match!!!!')</script>";
  } else {
    // insert query
    move_uploaded_file($admin_image_tmp, "admin_images/$admin_image");
    $insert_query = "insert into `admin_table` (admin_name, admin_email, admin_password, admin_image) values ('$username', '$email', '$hash_password', '$admin_image')";
    $execute_query = mysqli_query($conn, $insert_query);
    if ($execute_query) {
      echo "<script>alert('Registration Successful')</script>";
      echo "<script>window.open('./admin_login.php','_self')</script>";
    } else {
      die("There is an error" . mysqli_error($conn));
    }
  }
}
?>