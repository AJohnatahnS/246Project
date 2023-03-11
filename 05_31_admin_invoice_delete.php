<?php
require_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
  
  $invoice_id = $_POST['invoice_id'];

$sql = "DELETE FROM invoice WHERE invoice_id ='$invoice_id'";

  
  if ($connect->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $connect->error;
  }
  
  header("Location: 05_30_admin_invoice_manage.php");

  $connect->close();
?>