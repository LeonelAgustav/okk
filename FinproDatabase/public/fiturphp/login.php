<?php
session_start();
include('../config/config.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role']; // 'user' or 'admin'
        
        if ($user['role'] == 'admin') {
            header('Location: homepage_admin.php');
        } else {
            header('Location: homepage_user.php');
        }
    } else {
        echo "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../public/css/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl mb-4">Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" class="w-full p-2 mb-4 border border-gray-300 rounded" required>
            <input type="password" name="password" placeholder="Password" class="w-full p-2 mb-4 border border-gray-300 rounded" required>
            <button type="submit" name="login" class="w-full bg-blue-500 text-white p-2 rounded">Login</button>
        </form>
        <p class="mt-4 text-center"><a href="register.php" class="text-blue-500">Don't have an account? Register here</a></p>
    </div>
</body>
</html>
