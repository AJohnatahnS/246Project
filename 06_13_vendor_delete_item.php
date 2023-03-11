<?php
require_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
  
  $item_id = $_POST['item_id'];

$sql = "DELETE FROM item WHERE item_id ='$item_id'";

  
  if ($connect->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $connect->error;
  }
  
  header("Location: 06_10_vendor_item_management.php");


  $connect->close();
?>