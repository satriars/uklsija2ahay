<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="riwayat.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="nav-logo">
            <a href="#">
                <img src="logo.jpg" alt="Logo">
            </a>
        </div>

        <ul class="nav-links">
            <li class="link"><a href="#header">Beranda</a></li>
            <li id="link1"><a href="#features">Destinasi</a></li>
            <li class="link"><a href="riwayat.php">riwayat</a></li>
            <li id="link3"><a href="#about">Tentang Kami</a></li>
        </ul>
    </nav>

    <header class="container" id="header">
        <div class="content">
            <span class="blur"></span>
            <span class="blur"></span>
            <h4>PARIWISATA</h4>
            <h1>mari <span>berwisata</span></h1>
            <p>Wisata yang Menginspirasi, Kenangan yang Abadi</p>
        </div>
    </header>

    <section id="features" class="container">
        <h2 class="header">Pilih Destinasi</h2>
        <div class="features">
        <?php
             include '../register/koneksi.php';
             $query_mysql = mysqli_query($mysqli, "SELECT * FROM destinasi") or die(mysqli_error($mysqli));
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <div class="card">
                <img src="../admin/uploaded_img/<?php echo $data['gambar'];?>" alt="100">
                <h4><?php echo $data['nama'];?></h4>
                <p><?php echo $data['deskripsi'];?></p>
                <a href="kuta.php">GO<i class="ri-arrow-right-line"></i></a>
            </div>
            <?php }?>
        </div>
    </section>

    <footer id="about" class="container">
        <span class="blur"></span>
        <span class="blur"></span>
        <div class="column">
            <div class="logo">
                <img src="logo.jpg" alt="Logo">
            </div>
            <p>PARIWISATA</p>
            <div class="socials"> 
                <a href="https://wa.me/6282131447400"><i class="ri-whatsapp-line"></i></a>
                <a href="https://instagram.com/stria_rmdhn28"><i class="ri-instagram-line"></i></a>
            </div>
        </div>
        <div class="column">
            <h4>Tentang Kami</h4> 
            <a href="#">Satria Ramadhan Suyono</a> 
            <a href="#">01/06/2024</a> 
            <a href="#">Buduran, Sidoarjo, Jawa Timur</a> 
        </div>
    </footer>
</body>
</html>