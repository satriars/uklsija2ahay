<?php
// Include koneksi ke database
include '../register/koneksi.php';

// Ambil ID pengguna dari URL
$id = $_GET['id'];

// Query ambil data pengguna berdasarkan ID
$query = "SELECT * FROM user WHERE id = $id";
$result = mysqli_query($mysqli, $query);
$data = mysqli_fetch_assoc($result);

// Proses form jika ada pengiriman data update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query update data pengguna berdasarkan ID
    $query = "UPDATE user SET nama='$nama', username='$username', password='$password' WHERE id=$id";
    $result = mysqli_query($mysqli, $query);

    // Redirect kembali ke halaman data user setelah update
    header("Location: folderadmin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form action="" method="post">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>"><br>
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value="<?php echo $data['password']; ?>"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
