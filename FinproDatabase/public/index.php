<?php
session_start();
include('../config/config.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

$sql = "SELECT * FROM items"; // Tabel untuk barang
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Gudang</title>
    <link href="../public/css/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold my-4">Daftar Barang</h1>
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Nama Barang</th>
                    <th class="border p-2">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td class="border p-2"><?php echo $row['id']; ?></td>
                    <td class="border p-2"><?php echo $row['name']; ?></td>
                    <td class="border p-2"><?php echo $row['quantity']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
