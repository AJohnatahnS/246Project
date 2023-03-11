<?php

require_once "00_config.php";

$account_id = $_POST["account_id"];
$item_name = $_POST["item_name"];
$item_price = $_POST["item_price"];
$item_code = $_POST["item_code"];
$item_image = $_POST["item_image"];

$NewProd = "INSERT INTO item (name, price, code, image, account_id ) 
                    VALUES ('$item_name', '$item_price', '$item_code', '$item_image', '$account_id')";

if ($connect->query($NewProd) === TRUE) {
    echo "New record created successfully";
    header("Location: 06_10_vendor_item_management.php");


  } else {
    echo "Error: " . $NewProd . "<br>" . $connect->error;
  }

?>
