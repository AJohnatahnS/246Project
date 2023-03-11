<?php
include_once "00_config.php";

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$piority = $_POST["piority"];

$newaccount = "INSERT INTO account ( account_name, account_email, account_phone, account_password, account_state) 
                VALUES              ('$name',       '$email',       '$phone',      '$password',     '$piority')";

if ($connect->query($newaccount) === TRUE) 
    {
    echo "New record created successfully";


    } 
    else 
    {
    echo "Error: " . $newaccount . "<br>" . $connect->error;
    }

    if($piority == "vendor")
{
    $newvendor= "   INSERT INTO vendor ( vendor_name, vendor_email, vendor_phone)
                    values ('$name', '$email', '$phone') ";            

    if ($connect->query($newvendor) === TRUE) 
        {
        echo "New record created successfully";
        header("Location: 03_02_confirm_register_edit.php");
        }
        else 
        {
        echo "Error: " . $newvendor . "<br>" . $connect->error;
        }
}


elseif($piority == "customer")
{
    $newcustomer= "   INSERT INTO customer ( customer_name, customer_email, customer_phone)
                    values ('$name', '$email', '$phone') ";     

    if ($connect->query($newcustomer) === TRUE) 
        {
        echo "New record created successfully";
        header("Location: 03_02_confirm_register_edit.php");
        }
        else 
        {
        echo "Error: " . $newcustomer . "<br>" . $connect->error;
        }

}

?>

