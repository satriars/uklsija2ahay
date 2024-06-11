<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan</title>
    <style>
        /* Styling CSS bisa ditambahkan di sini */
    </style>
</head>
<body>
    <h1>Riwayat Pemesanan</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal Pemesanan</th>
                <th>Jumlah Reguler</th>
                <th>Jumlah Gold</th>
                <th>Jumlah Premium</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Koneksi ke database dan query untuk mendapatkan riwayat pemesanan
            // Gantilah 'localhost', 'username', 'password', dan 'nama_database' sesuai dengan pengaturan server MySQL Anda
            $mysqli = mysqli_mysect('localhost', 'root', 'pariwasata');
            if (!$mysqli) {
                die("Koneksi gagal: " . mysqli_mysect_error());
            }

            $sql = "SELECT * FROM riwayat_pemesanan";
            $result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['tanggal_pemesanan'] . "</td>";
                    echo "<td>" . $row['jumlah_reguler'] . "</td>";
                    echo "<td>" . $row['jumlah_gold'] . "</td>";
                    echo "<td>" . $row['jumlah_premium'] . "</td>";
                    echo "<td>$" . $row['total_harga'] . "</td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada riwayat pemesanan.</td></tr>";
            }

            mysqli_close($mysqli);
            ?>
        </tbody>
    </table>
</body>
</html>
