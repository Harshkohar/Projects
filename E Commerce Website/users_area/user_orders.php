<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Details</title>
  <style>
    table {
      width: 90%;
      text-align: center;
      color: white;
      border: 2px solid white;
    }

    th,
    td {
      padding: 5px;
    }

    tr {
      height: 40px;
    }
  </style>
</head>

<body>
  <?php
  $username = $_SESSION["username"];
  $get_user = "select user_id from `user_table` where username='$username'";
  $result = mysqli_query($conn, $get_user);
  $row = mysqli_fetch_array($result);
  $user_id = $row["user_id"];
  ?>
  <h3 class="text-center text-success mb-4">All orders</h3>
  <table class="table-bordered mt-5 m-auto">
    <?php
    $get_order_details = "select * from `user_orders` where user_id=$user_id";
    $result_order_details = mysqli_query($conn, $get_order_details);
    $row_count = mysqli_num_rows($result_order_details);
    if ($row_count == 0) {
      echo "<h2 class='text-danger text-center mt-5'>No orders</h2>";
    } else {
      ?>
      <thead class="bg-dark">
        <tr>
          <th>Sr. No.</th>
          <th>Due Amount</th>
          <th>Total products</th>
          <th>Invoice number</th>
          <th>Date</th>
          <th>Complete/Pending</th>
          <th>Payment Status</th>
        </tr>

      <tbody class="bg-secondary">

        <?php
        $srno = 1;
        while ($row = mysqli_fetch_array($result_order_details)) {
          $order_id = $row["order_id"];
          $due_amount = $row["due_amount"];
          $total_products = $row["total_products"];
          $invoice_number = $row["invoice_number"];
          $date = $row["order_date"];
          $status = $row["order_status"];
          echo "<tr>
          <td>$srno</td>
          <td>$due_amount</td>
          <td>$total_products</td>
          <td>$invoice_number</td>
          <td>$date</td>
          <td>$status</td>";
          ?>
          <?php
          if ($status == "Complete") {
            echo "<td>Paid</td>
                </tr>";
          } else {
            echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
          </tr>";
          }
          $srno++;
        }
    }
    ?>
    </tbody>
    </thead>
  </table>

</body>

</html>