<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Destinasi</title>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
    <header>
        <a href="#" class="logo">
            <img src="../user/img/logo.png" alt="">
        </a>
    </header>

    <section class="update-form">
        <h1 class="heading">Update Destinasi</h1>
        <?php
        include '../register/koneksi.php';

        // Check if ID is set in URL
        if (isset($_GET['id'])) {
            $id_destinasi = $_GET['id'];

            // Fetch data from database
            $query = "SELECT * FROM destinasi WHERE id_destinasi = '$id_destinasi'";
            $result = mysqli_query($mysqli, $query);

            // Check for query error
            if (!$result) {
                die("Query error: " . mysqli_error($mysqli));
            }

            // Check if data exists
            if (mysqli_num_rows($result) == 1) {
                $data = mysqli_fetch_assoc($result);
            } else {
                echo "Data tidak ditemukan.";
                exit;
            }
        } else {
            echo "ID tidak ditemukan.";
            exit;
        }

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_destinasi = $_POST['id_destinasi'];
            $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
            $deskripsi = mysqli_real_escape_string($mysqli, $_POST['deskripsi']);

            // Handling file upload
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == UPLOAD_ERR_OK) {
                $gambar = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];
                move_uploaded_file($tmp_name, "uploaded_img/$gambar");
            } else {
                // If no new image is uploaded, use the existing image
                $gambar = $_POST['existing_gambar'];
            }

            // Update query
            $update_query = "UPDATE destinasi SET nama='$nama', deskripsi='$deskripsi', gambar='$gambar' WHERE id_destinasi='$id_destinasi'";

            if (mysqli_query($mysqli, $update_query)) {
                header ("location: admindestinasi.php");
            } else {
                echo "Error: " . mysqli_error($mysqli);
            }
        }
        ?>

        <!-- Update Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            <a href="admindestinasi.php"></a>
            <input type="hidden" name="id_destinasi" value="<?php echo htmlspecialchars($data['id_destinasi']); ?>">
            <label for="nama">Nama Destinasi:</label><br>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>"><br>
            <label for="deskripsi">Deskripsi:</label><br>
            <textarea id="deskripsi" name="deskripsi"><?php echo htmlspecialchars($data['deskripsi']); ?></textarea><br>
            <label for="gambar">Gambar:</label><br>
            <img src="uploaded_img/<?php echo htmlspecialchars($data['gambar']); ?>" alt="Gambar" width="100"><br>
            <input type="file" id="gambar" name="gambar"><br><br>
            <input type="hidden" name="existing_gambar" value="<?php echo htmlspecialchars($data['gambar']); ?>">
            <button type="submit" class="btn">Update</button>
        </form>
    </section>
</body>
</html>
