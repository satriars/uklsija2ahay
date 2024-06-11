<?php
include '../register/koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM user WHERE id = $id";
$result = mysqli_query($mysqli, $query);

header("Location: folderadmin.php");
exit();
?>
