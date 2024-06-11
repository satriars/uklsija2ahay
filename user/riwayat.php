<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

include '../register/koneksi.php';

// Ambil data user dari sesi
$username = $_SESSION['username'];
$query_user = "SELECT * FROM user1 WHERE username = '$username'";
$result_user = mysqli_query($mysqli,$query_user);
$userData = mysqli_fetch_assoc($result_user);

// Query untuk mendapatkan riwayat transaksi user
$id = $userData['id'];
$query_riwayat = "SELECT user1.nama, destinasi.gambar, transaksi.tanggal_pemesanan, transaksi.jumlah_reguler, transaksi.jumlah_gold, transaksi.jumlah_premium, transaksi.total_harga
                  FROM ((transaksi
                  JOIN destinasi ON transaksi.id_destinasi = destinasi.id_destinasi)
                  JOIN user1 ON transaksi.id = user1.id)
                  WHERE transaksi.id = '$id'
                  ORDER BY transaksi.tanggal_pemesanan DESC;";

// Execute the query
$result_riwayat = mysqli_query($mysqli, $query_riwayat);

// Check if the query execution was successful
if (!$result_riwayat) {
    die("Query failed: " . mysqli_error($mysqli));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Sewa</title>
  <link rel="stylesheet" href="riwayatpakaian1.css">
</head>
<body>
<nav class="navbar">
        <div class="navbar-nav">
            <a href="riwayat.php">Riwayat pembelian</a>
            <a href="web saya.php">Home</a>
        </div>
    </nav>

  <div class="container">
    <h2>Riwayat Pembelian</h2>
    <a href="pakaian adat.php" class="btn">tiket</a>
    <br>
    <div class="riwayat-grid">
      <?php
      if (mysqli_num_rows($result_riwayat) > 0) {
          while ($row = mysqli_fetch_assoc($result_riwayat)) {
              echo '<div class="riwayat-item">';
              echo '<div class="riwayat-img">';
              echo '<img src="../admin/uploaded_img/' . $row['gambar'] . '" alt="' . $row['nama_pakaian'] . '">';
              echo '</div>';
              echo '<div class="riwayat-info">';
              echo '<h3>' . $row['nama_pakaian'] . '</h3>';
              echo '<p>Jumlah: ' . $row['jumlah'] . '</p>';
              echo '<p>Total Pembelian: ' . $row['total_pembelian'] . '</p>';
              echo '<p>Waktu: ' . $row['waktu'] . '</p>';
              echo '</div>';
              echo '</div>';
          }
      } else {
          echo '<p>Tidak ada riwayat pembelian.</p>';
      }
      ?>
    </div>
  </div>
</body>
</html>

<?php mysqli_close($mysqli); ?>
