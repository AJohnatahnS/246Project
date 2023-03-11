<?php
session_start();
include_once "00_config.php";

$CheckState = "SELECT * from account where account_email = '".$_POST['email']."'" ;

$result = mysqli_query($connect,$CheckState);
if(!$result)
{
    die ("Could not Successfully run the query $CheckState ".mysqli_error($connect));

}
if(mysqli_num_rows($result) == 0)
{
    $_SESSION['errors_msg'] = "Username or Password is incorrect.";
    header("Location: 02_00_login.php");
}
else
{
    $row = mysqli_fetch_assoc($result);
    if(($_POST['email'] == $row['account_email']) && ($_POST['password'] == $row['account_password']))
    {
        $_SESSION['email'] = $row['account_email'];
        $_SESSION['name'] = $row['account_name'];
        $_SESSION['state'] = $row['account_state'];
        $_SESSION['account_id'] = $row['account_id']; 
        header("Location: 01_mainpage.php");
    }
    else
    {
        $_SESSION['errors_msg'] = "Username or Password is incorrect.";
        header("Location: 02_00_login.php");
    }
} 





?>