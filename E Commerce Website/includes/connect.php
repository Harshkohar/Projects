<?php
  $conn= new mysqli('localhost', 'root','','e-commerce');
  if(!$conn){
    die(mysqli_error($conn));
  }
?>