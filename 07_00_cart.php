<html><body><link rel="stylesheet" href="maincss.css"><br><br><br><br><br><br>

<?php
require_once "00_header.php";
require_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }

    $userQuery = "SELECT * from item";
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
        <div class="row">
        <?php
        while ($row = mysqli_fetch_assoc($result))
        {
            ?>
        <form action="07_01_cart_add.php?item_id=<?php echo $row['item_id']?>" method="post">
            <div class="column">

                <div class="card">
                    <img src="<?php echo $row['image']?>" alt="image">
                    <h3><?php echo $row['name']; ?></h3>
                    <p><?php echo $row['price']; ?></p>
                    <input type="number" name="quantity">
                    <input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
                    <input type="submit" value="Add to Cart">
                    
                </div>
            </div>
        </form>
        
            <?php
        }
       ?>
       </div>

        <?php
        $userQuery = "SELECT * from cart ";
        $result = mysqli_query($connect ,$userQuery);
    
        if ( !$result )
        {
            die ("Could not successfully run the query $userQuery " .mysqli_error($connect));
        }
    
        if ( mysqli_num_rows($result) == 0 )
        {
       
        }
        else
        {
        ?>

        <?php
        
        echo "<table border = \"1\" >";
        echo    "<tr> <th> Cart ID  </th> <th> Item ID </th> 
                 <th> Item Name </th> <th> Price </th>
                 <th> Quantity </th> <th> Account ID </th> <th> Delete </th></tr>" ;

        while ($row = mysqli_fetch_assoc($result))
        {
            echo    "<tr><td>" .$row['cart_id']. "</td><td>" .$row['item_id']. "</td><td>" .$row['item_name']. "</td><td>"
                    .$row['price']. "</td><td>" .$row['quantity']. "</td><td>" .$row['account_id']. "</td>";
            
            ?>
            <form action="07_03_cart_delete.php" method="post">
                <td> <input type="hidden" name="cart_id" value="<?php echo $row["cart_id"]?>"> 
                <input type="hidden" name="X " value="<?php echo 1?>">
                <input type="submit" value="DELETE"> 
                </td>
            </form>
            <?php
        }
        echo "</table>";
        ?>

        <?php
    }
    ?>
        <form action="08_00_invoice_create.php">
        <div class="Buy-botton">
            <input type="submit" value="BUY">
        </div>
        </form>
       <?php  
    }
?>
 <?php   require_once "00_footer.php";  ?>

</body></html>