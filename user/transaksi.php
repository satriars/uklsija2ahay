<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}

include '../register/koneksi.php';

// Ambil data user dari sesi
$username = $_SESSION['username'];
$query_user = "SELECT * FROM user WHERE username = '$username'";
$result_user = mysqli_query($mysqli, $query_user);
$userData = mysqli_fetch_assoc($result_user);

// Jika ada parameter id_pakaian pada URL
if(isset($_GET['id_destinasi'])) {
    $id_pakaian = $_GET['id_destinasi'];

    // Query untuk mendapatkan detail pakaian adat berdasarkan id_pakaian
    $query_pakaian = "SELECT * FROM  WHERE id_pakaian = '$id_pakaian'";
    $result_pakaian = mysqli_query($mysqli, $query_pakaian);
    $pakaianData = mysqli_fetch_assoc($result_pakaian);
} else {
    // Jika tidak ada id_pakaian, kembalikan ke halaman sebelumnya atau halaman lain
    header("Location: pakaian_adat.php");
    exit();
}

// Proses ketika tombol "Sewa Sekarang" ditekan
if(isset($_POST['submit'])) {
    // Ambil data dari formulir
    $id_user = $userData['id_user'];
    $id_pakaian = $_POST['id_pakaian'];
    $jumlah = $_POST['jumlah'];
    $harga = $pakaianData['harga']; // Ambil harga dari data pakaian
    $total_pembelian = $harga * $jumlah;

    // Insert data transaksi ke dalam tabel transaksi
    $query_insert = "INSERT INTO transaksi (id_user, id_pakaian, jumlah, total_pembelian) VALUES ('$id_user', '$id_pakaian', '$jumlah', '$total_pembelian')";
    $result_insert = mysqli_query($mysqli, $query_insert);

    if ($result_insert) {
        // Redirect ke halaman sewa.php jika transaksi berhasil
        header("Location: riwayat.php");
        exit();
    } else {
        // Tampilkan pesan error jika terjadi kesalahan dalam proses transaksi
        echo "Error: " . mysqli_error($mysqli);
    }
}

mysqli_close($mysqli);
?>