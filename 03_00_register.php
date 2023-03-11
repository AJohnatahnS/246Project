<html>
    <head>
        <link rel="stylesheet" href="maincss.css">
    </head>
    <body>
    <?php require_once "00_header.php" ?>
        <div class="register">
        <form action="03_01_confirm_register.php" method="post">
            <img src="https://cdn.discordapp.com/attachments/888424949478490144/1083753856573395015/logo_img1599704122.png" alt="logo">
            <p><label for="name"> Name : </label></p>
            <p><input type="name" name="name" id="name" placeholder="name"></p>

            <p><label for="email"> Email : </label></p>
            <p><input type="text" name="email" id="email" placeholder="email"></p>

            <p><label for="phone"> Phone : </label></p>
            <p><input type="text" name="phone" id="phone" placeholder="phone"></p>

            <p><label for="password"> Password : </label></p>
            <p><input type="password" name="password" id="password" placeholder="password"></p>

            <p><label for="piority"> Who are you : </label>
            <select name="piority" id="piority">
                <option value="customer">Customer</option>
                <option value="vendor">Vendor</option>
            </select></p>
            
            <div class="button">
            <input type="submit" value="Register">
            <input type="reset" value="Clear">
            </div>
        
        </form>
        </div>

        <?php require_once "00_footer.php" ?>
</body>
</html>