<?php
require_once "00_header.php";
require_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }

    $userQuery = "SELECT * from cart where account_id = '".$_SESSION['account_id']."' ";
    $result = mysqli_query($connect ,$userQuery);
    $total = 0 ;

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
        echo "<table border = \"1\" >";
        echo    "<tr> <th> item_id </th> <th> item_name </th> 
                 <th> price </th> <th> quantity </th> </tr>" ;

        while ($row = mysqli_fetch_assoc($result))
        {
            echo    "<tr><td>" .$row['item_id']. "</td><td>" .$row['item_name']. "</td><td>" .$row['price']. "</td><td>"
                    .$row['quantity']. "</td>";
            $total = $total + ($row['price']*$row['quantity']);
        }
        echo "</table>";
        
        ?>
        
        <div class="invoice">
        <form action="08_01_invoice_input.php" method="post">

            <p>Item price is <?php echo $total ?></p>

            <p>Choose Shipping company</p>
            <input type="radio" id="kexp" name="shipping" value="50">
            <label for="kexp">K-Express : 50$ : arrive in 7 day </label><br>
            <input type="radio" id="ems" name="shipping" value="150">
            <label for="ems">EMS : 150$ : arrive in 3 day </label><br>
            <input type="radio" id="pick" name="shipping" value="500">
            <label for="pick">Pick : 500$ : arrive in 1 day </label><br>

            <label for="address">Address</label>
            <textarea id="address" name="address" rows="4" cols="50">
            </textarea>
            <br>

            <p> Cash up front only </p>
            <input type="hidden" name="total" value="<?php echo $total ?>">

            <div class="button">
            <input type="submit" value="Submit">
            <input type="reset" value="Clear">
            </div>
        
        </form>
        </div>
        <?php
    }

?>       
 <?php   require_once "00_footer.php";  ?>