<?php
if (isset($_GET["delete_user"])){
  $delete_user = $_GET["delete_user"];
  $delete_user_query = "delete from `user_table` where user_id=$delete_user";
  $result_delete = mysqli_query($conn, $delete_user_query);
  if ($result_delete) {
    echo "<script>alert('User deleted successfully')</script>";
    echo "<script>window.open('./index.php?list_users','_self')</script>";
  }
}
?>