<?php
require_once "00_config.php";
session_start();

$item_id = filter_input(INPUT_GET, 'item_id', FILTER_SANITIZE_NUMBER_INT);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);

if (!isset($item_id) || !isset($quantity)) {
    echo "Error: Invalid input values";
    exit;
}

$stmt = $connect->prepare("INSERT INTO cart (item_id, quantity, account_id) VALUES (?, ?, ?)");
$stmt->bind_param("iii", $item_id, $quantity, $_SESSION['account_id']);

if ($stmt->execute()) {
    echo "New record created successfully";
    header("Location: 07_02_cart_add_submit.php?item_id=$item_id");
    exit;
} else {
    echo "Error: " . $stmt->error;
    exit;
}
?> 