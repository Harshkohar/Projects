<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5 text-light text-center">
  <?php
  $get_orders = "select * from `user_orders`";
  $result_orders = mysqli_query($conn, $get_orders);
  $row_count = mysqli_num_rows($result_orders);
  if ($row_count == 0) {
    echo "<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
  } else {
    ?>
    <thead class="bg-info text-dark">
      <tr>
        <th>Order ID</th>
        <th>Due Amount</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody class="bg-secondary">
      <?php while ($row_orders = mysqli_fetch_array($result_orders)) {
        $order_id = $row_orders["order_id"];
        $user_id = $row_orders["user_id"];
        $due_amount = $row_orders["due_amount"];
        $invoice_number = $row_orders["invoice_number"];
        $total_products = $row_orders["total_products"];
        $total_quantity = $row_orders["total_quantity"];
        $order_date = $row_orders["order_date"];
        $order_status = $row_orders["order_status"];
        ?>
        <tr>
          <td><?php echo $order_id ?></td>
          <td><?php echo $due_amount ?></td>
          <td><?php echo $invoice_number ?></td>
          <td><?php echo $total_products ?></td>
          <td><?php echo $order_date ?></td>
          <td><?php echo $order_status ?></td>
          <td><a href='index.php?delete_order=<?php echo $order_id ?>'
              onclick="return confirm('Are you sure you want to delete this?')" class='text-light'><i
                class='fa-solid fa-trash'></i></a></td>
        </tr>
      <?php }
  } ?>
  </tbody>
</table>