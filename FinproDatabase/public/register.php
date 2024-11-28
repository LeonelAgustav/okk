<?php
include('../config/config.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // user or admin
    
    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $role);
    
    if ($stmt->execute()) {
        header('Location: login.php');
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="../public/css/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl mb-4">Register</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" class="w-full p-2 mb-4 border border-gray-300 rounded" required>
            <input type="password" name="password" placeholder="Password" class="w-full p-2 mb-4 border border-gray-300 rounded" required>
            <select name="role" class="w-full p-2 mb-4 border border-gray-300 rounded">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit" name="register" class="w-full bg-green-500 text-white p-2 rounded">Register</button>
        </form>
    </div>
</body>
</html>
