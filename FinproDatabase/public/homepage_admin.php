<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Homepage</title>
    <link href="../public/css/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Admin Dashboard</h1>
        <div class="grid grid-cols-3 gap-4">
            <a href="staff.php" class="bg-blue-500 text-white p-4 rounded">Staff</a>
            <a href="customers.php" class="bg-blue-500 text-white p-4 rounded">Customers</a>
            <a href="items.php" class="bg-blue-500 text-white p-4 rounded">Items</a>
        </div>
    </div>
</body>
</html>
