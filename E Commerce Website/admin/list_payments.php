<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5 text-light text-center">
  <?php
  $get_payments = "select * from `user_payments`";
  $result_payments = mysqli_query($conn, $get_payments);
  $row_count = mysqli_num_rows($result_payments);
  if ($row_count == 0) {
    echo "<h2 class='text-danger text-center mt-5'>No payments yet</h2>";
  } else {
    ?>
    <thead class="bg-info text-dark">
      <tr>
        <th>Payment ID</th>
        <th>Order ID</th>
        <th>Invoice Number</th>
        <th>Amount</th>
        <th>Payment Mode</th>
        <th>Date</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody class="bg-secondary">
      <?php while ($row_payments = mysqli_fetch_array($result_payments)) {
        $order_id = $row_payments["order_id"];
        $payment_id = $row_payments["payment_id"];
        $amount = $row_payments["amount"];
        $invoice_number = $row_payments["invoice_number"];
        $payment_mode = $row_payments["payment_mode"];
        $date = $row_payments["date"];
        ?>
        <tr>
          <td><?php echo $payment_id ?></td>
          <td><?php echo $order_id ?></td>
          <td><?php echo $invoice_number ?></td>
          <td><?php echo $amount ?></td>
          <td><?php echo $payment_mode ?></td>
          <td><?php echo $date ?></td>
          <td><a href='index.php?delete_payment=<?php echo $payment_id ?>'
              onclick="return confirm('Are you sure you want to delete this?')" class='text-light'><i
                class='fa-solid fa-trash'></i></a></td>
        </tr>
      <?php }
  } ?>
  </tbody>
</table>