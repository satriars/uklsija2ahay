<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman data USER</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" integrity="sha512-1l8HI1StbyB56f0o0D4bJHf6MfJoLZs7gLAFofY8TGJ6Mc8yyA1W2eX55kG6oKYps2fEw8PQg6KU0gFZZ/aLQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<header>
    <div class="container">
        <a href="#" class="logo">
            <img src="../user/img/logo.png" alt="">
        </a>
        <nav>
            <ul class="navbar">
                <li><a href="folderadmin.php">User</a></li>
                <li><a href="admindestinasi.php">Destinasi</a></li>
                <li><a href="riwayatpembelian.php">Riwayat</a></li>
            </ul>
        </nav>
        <div class="menu-toggle">
            <i class='bx bx-menu'></i>
        </div>
    </div>
</header>

<section class="user">
    <h1 class="heading">Data User</h1>
    <br>
    <div>
        <a href="../register/register.php" class="btn">Tambah User</a>
        <a href="../register/login.php" class="btn">Log Out</a>
    </div>
    <br>
    <br>
    <table border="1" class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>level</th>
            <th>Action</th> 
            <th>Action</th> 
        </tr>
        <?php
        include '../register/koneksi.php';
        $query = "SELECT * FROM user1";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        $nomor = 1;
        while($data = mysqli_fetch_array($result)) { 
        ?>
        <tr>
            <td><?php echo $nomor++; ?></td>
            <td><?php echo $data['nama']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['password']; ?></td>
            <td><?php echo $data['level']; ?></td>
            <td><a href="hapususer.php?id=<?php echo $data['id']; ?>" class="btn-hapus">Hapus</a> </td>
            <td><a href="updateuser.php?id=<?php echo $data['id']; ?>" class="btn-update">Update</a> </td>  
        </tr>
        <?php } ?>
    </table>
</section>

<script>
    const menuToggle = document.querySelector('.menu-toggle');
    const navbar = document.querySelector('.navbar');
    menuToggle.addEventListener('click', () => {
        navbar.classList.toggle('active');
    });
</script>
</body>
</html>
