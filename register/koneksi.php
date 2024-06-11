<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "pariwisata";

$mysqli = mysqli_connect($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>
