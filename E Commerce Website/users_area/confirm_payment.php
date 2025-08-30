<?php
include("../includes/connect.php");
session_start();
if (isset($_GET["order_id"])) {
  $order_id = $_GET["order_id"];
  $get_order_details = "select * from `user_orders` where order_id=$order_id";
  $result_order_details = mysqli_query($conn, $get_order_details);
  $row_order_details = mysqli_fetch_array($result_order_details);
  $invoice_number = $row_order_details["invoice_number"];
  $due_amount = $row_order_details["due_amount"];
}

if (isset($_POST["confirm_payment"])) {
  $payment_mode = $_POST["payment_mode"];
  $insert_query = "insert into `user_payments` (order_id, invoice_number, amount, payment_mode) values ($order_id, $invoice_number, $due_amount, '$payment_mode')";
  $result_insert = mysqli_query($conn, $insert_query);
  if ($result_insert) {
    echo "<script>alert('Payment is successful')</script>";
    echo "<script>window.open('profile.php?my_orders', '_self')</script>";
  }
  $update_orders= "update `user_orders` set order_status='Complete' where order_id=$order_id";
  $result_update = mysqli_query($conn, $update_orders);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-secondary text-light text-center">
  <div class="container my-5">
    <h1>Confirm Payment</h1>
    <form action="" method="post">
      <div class="form-outline my-4 w-50 m-auto">
        <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>" disabled>
      </div>
      <div class="form-outline my-4 w-50 m-auto">
        <label>Amount</label>
        <input type="text" class="form-control mt-2 w-50 m-auto" name="amount" value="<?php echo $due_amount ?>" disabled>
      </div>
      <div class="form-outline my-4 w-50 m-auto">
        <select name="payment_mode" class="form-select w-50 m-auto">
          <option selected>Select Payment Mode</option>
          <option>UPI</option>
          <option>Netbanking</option>
          <option>Paypal</option>
          <option>Cash on delivery</option>
        </select>
      </div>
      <div class="form-outline my-4 w-50 m-auto">
        <input type="submit" value="Confirm Payment" class="btn bg-light" name="confirm_payment">
      </div>
      
    </form>
  </div>
</body>
</html>