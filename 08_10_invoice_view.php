<html>
<body>
<link rel="stylesheet" href="maincss.css">

<?php
require_once "00_header.php";
require_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }


    $userQuery = "SELECT * from invoice where account_id = '".$_SESSION["account_id"]."' ";
    $result = mysqli_query($connect ,$userQuery);
    if ( !$result )
    {
        die ("Could not successfully run the query $userQuery " .mysqli_error($connect));
    }

    if ( mysqli_num_rows($result) == 0 )
    {
        echo "No records were found with query $userQuery";
    }
    else
    {
        ?>
        <div class="table_content">
        <?php
        
        echo "<table border = \"1\" >";
        echo    "<tr> <th> Invoice ID  </th> <th> Item Price </th> 
                 <th> Shipping Price </th> <th> Total Price </th>
                 <th> Invoice Date </th> <th> Address </th> </tr>" ;

        while ($row = mysqli_fetch_assoc($result))
        {
          echo    "<tr><td>" .$row['invoice_id']. "</td><td>" .$row['item_price']. "</td><td>" .$row['shipping_price']. "</td><td>"
                    .$row['total_price']. "</td><td>" .$row['invoice_date']. "</td><td>" .$row['address']. "</td>";
            
            
        }
        echo "</table>";
        ?>
        </div>
        <?php
    }

?>
 <?php   require_once "00_footer.php";  ?>

</body>
</html>