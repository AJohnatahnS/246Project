<?php
require_once "00_header.php";
require_once "00_config.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }

if($_SESSION['state'] == 'admin' )
{
    $userQuery = "SELECT * from account ";
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
        
        echo "<table border>";
        echo    "<tr> <th> Account ID </th> <th> Account Name </th> 
                 <th> Account Email </th> <th> Account Phone </th>
                 <th> Account Password </th> <th> Account State </th> </tr>" ;

        while ($row = mysqli_fetch_assoc($result))
        {
            echo    "<tr><td>" .$row['account_id']. "</td><td>" .$row['account_name']. "</td><td>" .$row['account_email']. "</td><td>"
                    .$row['account_phone']. "</td><td>" .$row['account_password']. "</td><td>" .$row['account_state']. "</td>";
            ?>
            <form action="05_11_admin_account_edit.php" method="post">
                <td> <input type="hidden" name="account_id" value="<?php echo $row["account_id"]?> ">
                    <input type="hidden" name="X " value="<?php echo 1?>">
                    <input type="submit" value="UPDATE"> 
                </td>
            </form>
            <?php
            ?>
            <form action="05_20_admin_account_delete.php" method="post">
                <td> <input type="hidden" name="account_id" value="<?php echo $row["account_id"]?>"> 
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
 <?php   require_once "00_footer.php";  ?>