<html>
    <head>
        <link rel="stylesheet" href="maincss.css">
    </head>
    <body>
        <?php require_once "00_header.php" ?>
        <div class="content">
        <?php  if(!isset($_SESSION['email'])){?>
           <br><br><br> <h1>Welcome Stranger OTOP Online Shopping We have Good Thing on SELL</h1>
        </div>
        <?php } else {?>
            <br><br>
        <h1> Welcome <?php echo $_SESSION['name'] ?> to OTOP Online Shopping We have Good Thing on SELL </h1>               

        <?php } ?>
        <?php require_once "00_footer.php" ?>
    </body>
</html>