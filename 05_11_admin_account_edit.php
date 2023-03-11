<?php

    require_once "00_config.php";

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
      }

    $account_id = $_POST['account_id'];

    $Query = "Select * from account where account_id = '$account_id'";
    $result = mysqli_query($connect, $Query);

    if (!$result)
    {
        die ("Error $Query ". mysqli_error($connect));
    }
    else
    {
        echo "update data $account_id<br><br>";
        while ($row = mysqli_fetch_assoc($result))
        { 
?>
<html>
    <body>
        <div class="edit">
        <form method="post" action="05_12_admin_account_edit_submit.php">
            <table >
                <tr>
                    <td> Item ID </td>
                    <td><?php echo $account_id ?></td>
                </tr>
                <tr>
                    <td>Account Name</td>
                    <td>
                        <input type="text" name="account_name" value="<?php echo $row['account_name']?>">
                    </td>
                </tr>
                <tr>
                    <td>Account Email</td>
                    <td>
                        <input type="text" name="account_email" value="<?php echo $row['account_email']?>">
                    </td>
                </tr>
                <tr>
                    <td>Account Phone</td>
                    <td>
                        <input type="number" name="account_phone" value="<?php echo $row['account_phone']?>">
                    </td>
                </tr>
                <tr>
                    <td>Account Password</td>
                    <td>
                        <input type="password" name="account_password" value="<?php echo $row['account_password']?>">
                    </td>
                </tr>
                <tr>
                    <td>Account Password</td>
                    <td>
                    <label for="account_state"> Account State </label>
                        <select name="account_state" id="account_state">
                            <option value="customer">Customer</option>
                            <option value="vendor">Vendor</option>
                        </select>
                    </td>
                </tr>

                <tr>
                        <input type="hidden" name="account_id" value="<?php echo $row["account_id"]?>">
                    <td><input type="submit" value="Submit"></td>
                    <td><input type="reset" value="Cancel"></td>
                </tr>
                
            </table>
        </form>
        </div>
    </body>
</html>


<?php
        }
    }
?>
        <?php require_once "00_footer.php" ?>
