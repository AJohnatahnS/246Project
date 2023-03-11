<?php
require_once "00_config.php";
session_start();

$total = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_NUMBER_FLOAT);
$shipping = filter_input(INPUT_POST, 'shipping', FILTER_SANITIZE_NUMBER_FLOAT);
$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$date = date("d-m-Y");

$total_price = $total + $shipping;

if (!isset($total) || !isset($shipping) || !isset($address)) {
    echo "Error: Invalid input values";
    exit;
}

$stmt = $connect->prepare("INSERT INTO invoice (item_price, shipping_price, total_price, invoice_date, address, account_id) 
                            VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ddsssi", $total, $shipping, $total_price, $date, $address, $_SESSION["account_id"]);

if ($stmt->execute()) {
    echo "New record created successfully";
    header("Location: 08_10_invoice_view.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
    exit;
}
?>