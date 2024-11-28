<?php
session_start();
include('../config/config.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
}

$id = $_GET['id'];
$sql = "DELETE FROM customers WHERE id = $id";
if ($conn->query($sql)) {
    header('Location: customers.php');
} else {
    echo "Error: " . $conn->error;
}
?>
