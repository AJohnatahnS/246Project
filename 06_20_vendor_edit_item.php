<?php
    require_once "00_header.php";
    require_once "00_config.php";

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
      }

    $item_id = $_POST['item_id'];

    $Query = "Select * from item where item_id = '$item_id'";
    $result = mysqli_query($connect, $Query);

    if (!$result)
    {
        die ("Error $Query ". mysqli_error($connect));
    }
    else
    {
        echo "update data $item_id<br><br>";
        while ($row = mysqli_fetch_assoc($result))
        { 

     
?>
<html>
    <body>
        <div class="add">
        <form method="post" action="06_21_vendor_edit_item_submit.php">
                
                <p> Item ID : <?php echo $item_id ?> </p>

                <p> Item Name : <input type="text" name="item_name" value="<?php echo $row['name']?>"> </p>
                <p> Item Code : <input type="number" name="item_code" value="<?php echo $row['code']?>"> </p>
                <p> Item Price : <input type="number" name="item_price" value="<?php echo $row['price']?>"> </p>
                <p> Item Image : <input type="text" name="item_image" value="<?php echo $row['image']?>"> </p>
                    
                    <input type="hidden" name="item_id" value="<?php echo $row["item_id"]?>">
                    <div class="button">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Cancel"></p>
                    </div>
                  
        </form>
        </div> 
    </body>
</html>

<?php
        }
    }
?>
 <?php   require_once "00_footer.php";  ?>