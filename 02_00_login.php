<html>
    <head>
        <link rel="stylesheet" href="maincss.css">
    </head>
    <body>
        <?php require_once "00_header.php" ?>
        <div class="login">
        
    <?php
    if(isset($_SESSION['errors_msg'])) 
    {
        echo $_SESSION['errors_msg'];
        session_unset();
    } 
    ?>  
         <img src="https://cdn.discordapp.com/attachments/888424949478490144/1083753856573395015/logo_img1599704122.png" alt="logo">
        <form action="02_01_confirm_login.php" method="post">
            <p><label for="email"> E-mail : </label></p>
            <p><input type="text" name="email" id="email" placeholder="email"></p>
            
            <p><label for="password"> Password : </label></p>
            <p><input type="password" name="password" id="password" placeholder="password"></p>
            
            <div class="button">
            <input type="submit" value="Login">
            <input type="reset" value="Clear"><br><br>
            </div>
            <p>Don't have account ? - <a href="03_00_register.php"> Register Here </a> - </p>
        </form>
        </div>

<?php require_once "00_footer.php" ?>
</body>
</html>