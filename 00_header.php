<?php session_start(); ?>
<html>
    <head>
        <link rel="stylesheet" href="maincss.css">
    </head>
    <body>
        <div class="banner">
            <img src="https://cdn.discordapp.com/attachments/888424949478490144/1083753856573395015/logo_img1599704122.png" alt="logo">
   
            <div class="loginlink">
                <img src="https://cdn.discordapp.com/attachments/888424949478490144/1083753856095240274/c.png">

            <?php 
    if(isset($_SESSION['email']))
    {
        ?><div class="info-sess"><?php
        echo $_SESSION['account_id'];
        echo "<span class='user-desc'>&nbsp;[";
        echo $_SESSION['name']." "."-State : ".$_SESSION['state'];
        echo "]</span></li>";
        ?></div><div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">MENU</button>
        <div id="myDropdown" class="dropdown-content"><?php

        if($_SESSION['state'] == "customer") {
            echo '<li><a href="08_10_invoice_view.php"> - Invoice View - </a></li>';
        }
        if($_SESSION['state'] == "vendor")
            {
                echo '<li><a href="06_10_vendor_item_management.php"> - Item Manage - </a></li>';

            }
        if($_SESSION['state'] == "admin")
            {
                echo '<li><a href="06_10_vendor_item_management.php"> - Item Manage - </a></li>';
                echo '<li><a href="05_10_admin_account_management.php"> - Account Manage - </a></li>';
                echo '<li><a href="05_30_admin_invoice_manage.php"> - Invoice Manage - </a></li>';

            }
            echo '<li><a href="04_logout.php" >- Logout -</a></li>';
            ?>
            </div></div>
            <?php        
    }
    else
    {
        echo '<li><a href="02_00_login.php"> Login </a></li>';
    }
    ?>
    </div>
          <div class="headlink">
                <a href="01_mainpage.php">Home</a>
                <a href="07_00_cart.php">Product</a>
            <img src="https://cdn.discordapp.com/attachments/888424949478490144/1083753856355283024/line.png">
            </div>  </div>

            <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
            
    </body>
</html>

