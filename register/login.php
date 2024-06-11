<?php
// ,emgaktifkan session pada php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($mysqli,"select * from user1 where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){ 

    $data = mysqli_fetch_assoc($login);

    // cek jika user login dan username
    if($data['level']=="admin"){

        // buat session login dan usernames
        $_SESSION['username'] = $username;
        $_SESSION['LEVEL'] = "admin";
        // alihkan ke halaman daashboard admin
        header("location: ../admin/admindestinasi.php");

        // cek jika user login sebagai user
    }else if($data['level']=="user"){
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] ="user";

        // alihkan ke halaman login kembali
        header("location:../user/home.php");
    }
    }else{
        header("location:index.php?pesan=gagal");
    }

?>