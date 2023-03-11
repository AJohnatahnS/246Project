<?php
require_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
  
  $cart_id = $_POST['cart_id'];

$sql = "DELETE FROM cart WHERE cart_id ='$cart_id'";

  
  if ($connect->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $connect->error;
  }
  
  header("Location: 07_00_cart.php");


  $connect->close();
?>