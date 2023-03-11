<?php
require_once "00_header.php";
require_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }

if($_SESSION['state'] == 'admin' )
{
    $userQuery = "SELECT * from invoice ";
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
                 <th> Invoice Date </th> <th> Address </th> <th> Account ID </th> </tr>" ;

        while ($row = mysqli_fetch_assoc($result))
        {
            echo    "<tr><td>" .$row['invoice_id']. "</td><td>" .$row['item_price']. "</td><td>" .$row['shipping_price']. "</td><td>"
                    .$row['total_price']. "</td><td>" .$row['invoice_date']. "</td><td>" .$row['address']. "</td><td>" . $row['account_id'] . "</td>";
            
            ?>
            <form action="05_31_admin_invoice_delete.php" method="post">
                <td> <input type="hidden" name="invoice_id" value="<?php echo $row["invoice_id"]?>"> 
                <input type="hidden" name="X " value="<?php echo 1?>">
                <input type="submit" value="DELETE"> 
                </td>
            </form>
            <?php
        }
        echo "</table>";
        ?>
        </div>
        <?php
    }
}

else
{
    echo "<h3 class='error'> You are unable to access this data , please try again </h3>";
}
?>
 <?php require_once "00_footer.php"; ?>