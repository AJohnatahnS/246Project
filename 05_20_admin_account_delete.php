<?php
require_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
  
  $account_id = $_POST['account_id'];

$sql = "DELETE FROM account WHERE account_id ='$account_id'";

  
  if ($connect->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $connect->error;
  }
  
  header("Location: 05_10_admin_account_management.php");

  $connect->close();
?>