<?php
require_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }

$account_id = $_POST['account_id'];
$account_name = $_POST['account_name'];
$account_email = $_POST['account_email'];
$account_phone = $_POST['account_phone'];
$account_password = $_POST['account_password'];
$account_state = $_POST['account_state'];


$NewRe = "  UPDATE account SET    account_name         =   '$account_name'      
                               , account_email       =   '$account_email'      
                               , account_phone      =   '$account_phone'      
                               , account_state          =   '$account_state'    
                               , account_password          =   '$account_password'
            WHERE               account_id           =   '$account_id'";


if ($connect->query($NewRe) === TRUE) {
    echo "Update created successfully";

  } else {
    echo "Error: " . $NewRe . "<br>" . $connect->error;
  }

echo "<a href=\"05_10_admin_account_management.php\"> See all Record </a> <br><br>";

?>