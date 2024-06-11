<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Destinasi</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Destinasi</h1><br>
        <!-- Correct the redirection link -->
        <form class="form" action="tambahdestinasi.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nama" placeholder="Nama destinasi" required>
            <input type="text" name="deskripsi" placeholder="Deskripsi" required>
            <input type="file" id="gambar" name="gambar" accept="image/png, image/jpeg, image/jpg" required>
            <button class="button" name="submit">Tambah destinasi</button>
        </form>

        <?php
        ob_start();

        // Include file koneksi, untuk menghubungkan ke database
        include "../register/koneksi.php";

        // Fungsi untuk mencegah inputan karakter yang tidak sesuai
        function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Cek apakah ada kiriman form dari method POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = input($_POST["nama"]);
            $deskripsi = input($_POST["deskripsi"]);

            if (isset($_FILES['gambar'])) {

                $gambar = $_FILES['gambar']['name'];
                $gambar_tmp_nama = $_FILES['gambar']['tmp_name'];
                $gambar_folder = 'uploaded_img/' . $gambar;

                // Validasi apakah direktori tujuan ada
                if (!file_exists('uploaded_img/')) {
                    mkdir('uploaded_img/', 0777, true);
                }

                // Query untuk menginput data ke dalam tabel makanan
                $sql = "INSERT INTO destinasi (nama, deskripsi, gambar) VALUES ('$nama', '$deskripsi', '$gambar')";

                $ayam = mysqli_query($mysqli, "SELECT * FROM destinasi");
                if (mysqli_query($mysqli, $sql)) {
                    // Jika berhasil memasukkan data, pindahkan gambar ke folder yang ditentukan
                    if (move_uploaded_file($gambar_tmp_nama, $gambar_folder)) {
                        echo "<div class='alert alert-success'>Data berhasil disimpan.</div>";
                        // Redirect to admindestinasi.php after successful insertion
                        header("Location: admindestinasi.php");
                        exit(); // Pastikan untuk menghentikan eksekusi setelah redirect
                    } else {
                        echo "<div class='alert alert-danger'>Gagal mengunggah gambar.</div>";
                    }
                    header("Location: admindestinasi.php");
                } else {
                    echo "<div class='alert alert-danger'>Data Gagal disimpan. Error: " . mysqli_error($mysqli) . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Gagal mengunggah gambar. Error: " . ($_FILES['gambar']['error'] ?? 'No file uploaded') . "</div>";
            }
        }

        ob_end_flush();
        ?>
    </div>
</body>
</html>
