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
  <title>Admin Login</title>

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
    <h2 class="text-center mb-5">Admin Login</h2>
    <div class="d-flex justify-content-center" style="gap:100px;">
      <div class="w-50 text-center">
        <img src="../images/admin-regis.jpeg" alt="registration" class="admin-reg">
      </div>
      <div class="w-50">
        <form action="" method="post">
          <div class="form-outline mb-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required
              class="form-control w-50">
          </div>
          <div class="form-outline mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required
              class="form-control w-50">
          </div>

          <div>
            <input type="submit" class="btn btn-dark" value="Login" name="admin_login">
            <p class="small fw-bold mt-2">Already have an account? <a href="admin_registration.php">Register</a></p>
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
if (isset($_POST["admin_login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $select_query = "select * from `admin_table` where admin_name='$username'";
  $result = mysqli_query($conn, $select_query);
  $row_data = mysqli_fetch_assoc($result);
  $row = mysqli_num_rows($result);

  if ($row > 0) {
    $_SESSION["username"] = $username;
    if (password_verify($password, $row_data['admin_password'])) {
      $_SESSION["username"] = $username;
      echo "<script>alert('Logged In Successfully.')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    } else {
      echo "<script>alert('Invalid Credentials!!!!')</script>";
    }
  } else {
    echo "<script>alert('Invalid Credentials!!!!')</script>";
  }
}

?>