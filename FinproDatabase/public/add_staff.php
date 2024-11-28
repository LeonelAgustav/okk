<?php
session_start();
include('../config/config.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];

    $sql = "INSERT INTO staff (name, position) VALUES ('$name', '$position')";
    if ($conn->query($sql)) {
        header('Location: staff.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
    <link href="../public/css/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Add New Staff</h1>
        
        <form method="POST" action="">
            <label for="name" class="block mb-2">Staff Name</label>
            <input type="text" name="name" class="border p-2 mb-4 w-full" required>
            
            <label for="position" class="block mb-2">Position</label>
            <input type="text" name="position" class="border p-2 mb-4 w-full" required>
            
            <button type="submit" class="bg-green-500 text-white p-2 rounded">Add Staff</button>
        </form>

        <a href="staff.php" class="mt-4 inline-block bg-gray-500 text-white p-2 rounded">Back</a>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
