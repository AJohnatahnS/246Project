<html>
    <head>
        <link rel="stylesheet" href="maincss.css">
    </head>
    <body>
        <?php   
            require_once "00_header.php";
            
        ?>
        <div class="add">
        <form action="06_12_vendor_add_item_submit.php" method="post">

            <p><label for="item_name"> Item Name : </label></p>
            <p><input type="text" name="item_name" id="item_name" placeholder="item_name"></p>
     
            <p><label for="item_code"> Item Code : </label></p>
            <p><input type="text" name="item_code" id="item_code" placeholder="item_code"></p>

            <p><label for="item_price"> Item Price : </label></p>
            <p><input type="text" name="item_price" id="item_price" placeholder="item_price"></p>

            <p><label for="item_image"> Item Image : </label></p>
            <p><input type="text" name="item_image" id="item_image" placeholder="item_image"></p>

            <input type="hidden" name="account_id" value="<?php echo $_SESSION["account_id"]?>"> 

            <div class="button">
            <input type="submit" value="Register">
            <input type="reset" value="Clear">
            </div>
        
        </form>
        </div>

 <?php   require_once "00_footer.php";  ?>
</body>
</html>