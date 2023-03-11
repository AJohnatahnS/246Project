<?php
require_once "00_header.php";
require_once "00_config.php";


if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }

$item_id = $_POST['item_id'];
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$item_code = $_POST['item_code'];
$item_image = $_POST['item_image'];


$NewRe = "  UPDATE item SET    name         =   '$item_name'      
                               , price       =   '$item_price'      
                               , code      =   '$item_code'      
                               , image          =   '$item_image'    
                               
            WHERE               item_id           =   '$item_id'";


if ($connect->query($NewRe) === TRUE) {
    echo "<br> Item Name : $item_name <br> Price : $item_price <br> Quantity : $item_code <br> $item_image <br>";
    echo "Update created successfully";

  } else {
    echo "Error: " . $NewRe . "<br>" . $connect->error;
  }

echo "<a href=\"06_10_vendor_item_management.php\"> See all Record </a> <br><br>";

?>
 <?php   require_once "00_footer.php";  ?>