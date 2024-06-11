<?php
include '../register/koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM destinasi WHERE id = $id";
$result = mysqli_query($mysqli, $query);

header("Location: admindestinasi.php");
exit();
?>
