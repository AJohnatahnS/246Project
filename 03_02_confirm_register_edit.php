<?php
include_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }

  $sql = "SELECT account_id,account_email,account_state FROM account order by account_id desc limit 1 ";
  $result = $connect->query($sql);  

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    $state = $row['account_state'];
    echo $state;
  
    if($state == 'vendor'){  
      $edit = " UPDATE vendor 
                SET vendor.account_id = '".$row['account_id']."'
                WHERE vendor_email = '".$row['account_email']."'";

      if (mysqli_query($connect, $edit)) {
        echo "New record created successfully";
        header("Location: 02_00_login.php");

      } else {
        echo "Error: " . $edit . "<br>" . mysqli_error($connect);
      }
    }
    elseif($state == 'customer'){     
      $edit = " UPDATE customer 
                SET customer.account_id = '".$row['account_id']."'
                WHERE customer_email = '".$row['account_email']."'";

      if (mysqli_query($connect, $edit)) {
        echo "New record created successfully";
        header("Location: 02_00_login.php");

      } else {
        echo "Error: " . $edit . "<br>" . mysqli_error($connect);
      }
    }

  }
} else {
  echo "0 results";
}


?>