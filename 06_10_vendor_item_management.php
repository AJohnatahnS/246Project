<html>
<body>
<link rel="stylesheet" href="maincss.css">

<?php
require_once "00_header.php";
require_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }

  

if ($_SESSION['state'] == 'vendor' )
{
    $userQuery = "SELECT * from item where account_id  = '".$_SESSION['account_id']."'";
    $result = mysqli_query($connect ,$userQuery);

    if ( !$result )
    {
        die ("Could not successfully run the query $userQuery " .mysqli_error($connect));
    }
?>
    <form action="06_11_vendor_add_item.php" method="post">
                <br><br>
                <input type="hidden" name="vendor_id" value="<?php echo $row["vendor_id"]?>"> 
                <input type="hidden" name="X " value="<?php echo 1?>"> 
                <input type="submit" value="ADD NEW ITEM"> 
            </form>
<?php
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
        echo    "<tr> <th> Item ID </th> <th> Item Name </th> 
                 <th> Item Code </th> <th> Item Price </th>
                 <th> Item Image </th> <th> Vendor Id </th> 
                 <th> Edit Item </th> <th> Delete Item </th></tr>" ;

        while ($row = mysqli_fetch_assoc($result))
        {
            echo    "<tr><td>" .$row['item_id']. "</td><td>" .$row['name']. "</td><td>" .$row['code']. "</td><td>"
                    .$row['price']. "</td><td>" .$row['image']. "</td><td>" .$row['account_id']. "</td>";
            ?>
            <form action="06_20_vendor_edit_item.php" method="post">
                <td> <input type="hidden" name="item_id" value="<?php echo $row["item_id"]?> ">
                    <input type="hidden" name="X " value="<?php echo 1?>">
                    <input type="submit" value="UPDATE"> 
                </td>
            </form>
            <?php
            ?>
            <form action="06_13_vendor_delete_item.php" method="post">
                <td> <input type="hidden" name="item_id" value="<?php echo $row["item_id"]?>"> 
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

elseif($_SESSION['state'] == 'admin' )
{
    $userQuery = "SELECT * from item ";
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
        echo    "<tr> <th> Item ID </th> <th> Item Name </th> 
                 <th> Item Code </th> <th> Item Price </th>
                 <th> Item Image </th> <th> Account ID </th>
                 <th> Edit Item </th> <th> Delete Item </th> </tr>" ;

        while ($row = mysqli_fetch_assoc($result))
        {
            echo    "<tr><td>" .$row['item_id']. "</td><td>" .$row['name']. "</td><td>" .$row['code']. "</td><td>"
                    .$row['price']. "</td><td>" .$row['image']. "</td><td>" .$row['account_id']. "</td>";
            ?>
            <form action="06_20_vendor_edit_item.php" method="post">
                <td> <input type="hidden" name="item_id" value="<?php echo $row["item_id"]?> ">
                    <input type="hidden" name="X " value="<?php echo 1?>">
                    <input type="submit" value="UPDATE"> 
                </td>
            </form>
            <?php
            ?>
            <form action="06_13_vendor_delete_item.php" method="post">
                <td> <input type="hidden" name="item_id" value="<?php echo $row["item_id"]?>"> 
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
        ?>
        <?php
    }
}

else
{
    echo "<h3 class='error'> You are unable to access this data , please try again </h3>";
}
?>
 <?php   require_once "00_footer.php";  ?>
 
</body>
</html>