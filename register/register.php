<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link rel="icon" type="image/png" href="logotitle.png">
    <link rel="stylesheet" href="regis.css"> <!-- Add this line -->
</head>
<body>
    <div class="container">
        <h1 class="title">Register</h1><br>
        <form class="form" action="register.php" method="post">
            <input type="text" id="nama" name="nama" placeholder="Nama" required>
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="Password" id="Password" name="Password" placeholder="Password" required>
            <select name="level" id="level" required>
                <option disabled selected value="">Pilih Level</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <button class="button" name="submit" type="submit">Register</button>
        </form>
        <div class="forgot">
            <p>Do you have an account? <a href="index.php">Login here</a></p>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $Password = $_POST['Password'];
    $level = $_POST['level'];

    print_r($_POST);
    echo $Password;

    include_once("koneksi.php");

    $query = "INSERT INTO user1 (id, nama, username, password, level) VALUES (NULL,'$nama', '$username', '$Password', '$level')";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Registrasi gagal: " . mysqli_error($mysqli);
    }
}
?>
