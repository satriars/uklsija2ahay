<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman data USER</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
<header>
        <a href="#" class="logo">
            <img src="../user/img/logo.png" alt="">
        </a>
        <i class='bx bx-menu' id="menu-icon"></i>
        <ul class="navbar">
            <li><a href="folderadmin.php">User</a></li>
            <li><a href="admindestinasi.php">Destinasi</a></li>
            <li><a href="riwayatpembelian.php">riwayat</a></li>
        </ul>
        </div>
    </header>

    <section class="user">
        <h1 class="heading">Data User</h1>
        <br>
        <a href="tambahdestinasi.php" class="btn">Tambah Destinasi</a>
        <a href="../register/login.php" class="btn">Log Out</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Action</th> 
                <th>Action</th> 
            </tr>
            <?php
            include '../register/koneksi.php';
            $query = "SELECT * FROM destinasi";
            $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($result)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['deskripsi']; ?></td>
                <td class="image-col"><img src="uploaded_img/<?php echo $data['gambar']; ?>" alt="Gambar" width="100"></td>
                <td><a href="hapusdestinasi.php?id=<?php echo $data['id_destinasi']; ?>" class="btn-hapus">Hapus</a> </td>
                <td><a href="updatedestinasi.php?id=<?php echo $data['id_destinasi']; ?>" class="btn-update">Update</a> </td>  
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
    </section>
</body>
</html>
