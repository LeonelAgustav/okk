<?php
session_start();
include('../config/config.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM staff WHERE id = $id";
$result = $conn->query($sql);
$staff = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $position = $_POST['position'];

    $sql = "UPDATE staff SET name = '$name', position = '$position' WHERE id = $id";
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
    <title>Edit Staff</title>
    <link href="../public/css/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Edit Staff</h1>
        
        <form method="POST" action="">
            <label for="name" class="block mb-2">Staff Name</label>
            <input type="text" name="name" class="border p-2 mb-4 w-full" value="<?php echo $staff['name']; ?>" required>
            
            <label for="position" class="block mb-2">Position</label>
            <input type="text" name="position" class="border p-2 mb-4 w-full" value="<?php echo $staff['position']; ?>" required>
            
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Save Changes</button>
        </form>

        <a href="staff.php" class="mt-4 inline-block bg-gray-500 text-white p-2 rounded">Back</a>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
