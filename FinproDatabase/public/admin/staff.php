<?php
session_start();
include('../config/config.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
}

$search = isset($_POST['search']) ? $_POST['search'] : '';
$sql = "SELECT * FROM staff WHERE name LIKE '%$search%'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Staff</title>
    <link href="../public/css/tailwind.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-4">Manage Staff</h1>

        <form method="POST" action="" class="mb-4">
            <input type="text" name="search" value="<?php echo $search; ?>" class="border p-2 rounded" placeholder="Search staff...">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
        </form>

        <a href="add_staff.php" class="mb-4 inline-block bg-green-500 text-white p-2 rounded">Add New Staff</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td>
                        <a href="edit_staff.php?id=<?php echo $row['id']; ?>" class="text-blue-500">Edit</a> |
                        <a href="delete_staff.php?id=<?php echo $row['id']; ?>" class="text-red-500">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <a href="admin_home.php" class="mt-4 inline-block bg-gray-500 text-white p-2 rounded">Back to Admin Page</a>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
