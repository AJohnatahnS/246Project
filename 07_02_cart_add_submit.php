<?php
include_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }

  $item_id = $_GET['item_id'];
  
  $sql = "SELECT * FROM item where item_id = '$item_id' ";
  $result = mysqli_query($connect, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $item_name = $row["name"];
    $price = $row["price"];
  

    $sql2 = "UPDATE cart SET item_name = '$item_name', price = '$price' WHERE item_id = '$item_id'";
    mysqli_query($connect, $sql2);



  }
  
  header("Location: 07_00_cart.php");

  mysqli_close($connect);
?>
