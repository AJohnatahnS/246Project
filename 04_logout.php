<?php
require_once "00_config.php";
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }

  $sql = "TRUNCATE TABLE cart";
  $connect->query($sql);
  $connect->close();

session_start();
session_destroy();
session_unset();
header("refresh:0; url=01_mainpage.php");

?>