<?php
include("../includes/connect.php");
include("../functions/function.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce website - Payment Page</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- External CSS -->
  <link rel="stylesheet" href="./css/style.css">
  <style>
    img{
      width:100%;
    }
  </style>

</head>

<body>
  <!-- php code to access the user id -->
   <?php
    $user_ip = get_ip_address();
    $get_user = "select * from `user_table` where user_ip='$user_ip'";
    $result = mysqli_query($conn,$get_user);
    $fetch_data=mysqli_fetch_array( $result );
    $user_id=$fetch_data["user_id"];
   ?>
  <!-- Main Data Section -->
  <div class="container">
    <h2 class="text-center text-info mt-3">Payment Options</h2>
    <div class="d-flex justify-content-center align-items-center my-5">
      <div class="w-50">
        <a href="https://www.paytm.com" target="_blank"><img src="../images/upi.jpg" alt="UPI"></a>
      </div>

      <div class="w-50">
        <a href="order.php?user_id=<?php echo $user_id ?>" target="_self"><h2 class="text-center">Pay Offline</h2></a>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>