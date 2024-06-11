<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: home.php");
    exit();
}


// Initialize variables
$jumlahReguler = $jumlahGold = $jumlahPremium = $totalHarga = $tanggalPemesanan = '';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlahReguler = isset($_POST['reguler']) ? (int)$_POST['reguler'] : 0;
    $jumlahGold = isset($_POST['gold']) ? (int)$_POST['gold'] : 0;
    $jumlahPremium = isset($_POST['premium']) ? (int)$_POST['premium'] : 0;
    $tanggalPemesanan = isset($_POST['selected_date']) ? $_POST['selected_date'] : '';

    // Define ticket prices
    $hargaReguler = 50;  // Define prices here or fetch from the database
    $hargaGold = 100;
    $hargaPremium = 200;

    // Calculate the total price
    $totalHarga = ($jumlahReguler * $hargaReguler) + ($jumlahGold * $hargaGold) + ($jumlahPremium * $hargaPremium);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="style1.css">
    <title>Halaman Baru</title>
</head>
<body>
<?php if ($_SERVER["REQUEST_METHOD"] != "POST") : ?>
<section id="pricing" class="container">
    <h2 class="header">Tiket</h2> 
    <p class="sub-header">Jelajahi berbagai pilihan tiket untuk memenuhi kebutuhan perjalanan Anda.</p> 
    <div class="pricing">
    <form method="post" action="">
        <div class="card">
            <div class="content">
                <h4>Tiket Reguler</h4> 
                <!-- Removed the price display here -->
                <p><i class="ri-checkbox-line"></i> tenda</p>
                <p><i class="ri-checkbox-line"></i> transportasi</p>
                <p><i class="ri-checkbox-line"></i> Tidak termasuk antrian prioritas</p>
                <label for="reguler">Jumlah:</label>
                <input type="number" id="reguler" name="reguler" min="0">
            </div>
        </div>
        <div class="card">
            <div class="content">
                <h4>Tiket Gold</h4> 
                <!-- Removed the price display here -->
                <p><i class="ri-checkbox-line"></i> tenda</p>
                <p><i class="ri-checkbox-line"></i> transportasi</p>
                <p><i class="ri-checkbox-line"></i> Antrian prioritas</p>
                <p><i class="ri-checkbox-line"></i> Akses ke fasilitas eksklusif</p>
                <label for="gold">Jumlah:</label>
                <input type="number" id="gold" name="gold" min="0">
            </div>
        </div>
        <div class="card">
            <div class="content">
                <h4>Tiket Premium</h4> 
                <!-- Removed the price display here -->
                <p><i class="ri-checkbox-line"></i> tenda</p>
                <p><i class="ri-checkbox-line"></i> transportasi</p>
                <p><i class="ri-checkbox-line"></i> Antrian prioritas</p>
                <p><i class="ri-checkbox-line"></i> fasilitas eksklusif</p>
                <p><i class="ri-checkbox-line"></i> Layanan makanan dan minuman gratis</p>
                <label for="premium">Jumlah:</label>
                <input type="number" id="premium" name="premium" min="0">
            </div>
        </div>
        <div class="date-selection">
            <label for="booking-date">Pilih Tanggal Pemesanan:</label>
            <input type="text" id="booking-date" name="booking_date" required>
        </div>
        <input type="hidden" id="selected-date" name="selected_date">
        <button class="btn" type="submit" name="buy_ticket">Beli Sekarang</button>
    </form>
    </div>
</section>
<?php endif; ?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
<section id="total" class="container">
    <h2 class="header">Total Pembayaran</h2>
    <p class="sub-header">Berikut adalah rincian total pembayaran Anda:</p>
    <div class="total-detail">
        <p>Jumlah Tiket Reguler: <?php echo htmlspecialchars($jumlahReguler); ?></p>
        <p>Jumlah Tiket Gold: <?php echo htmlspecialchars($jumlahGold); ?></p>
        <p>Jumlah Tiket Premium: <?php echo htmlspecialchars($jumlahPremium); ?></p>
        <p>Total Harga: $<?php echo htmlspecialchars($totalHarga); ?></p>
        <p>Tanggal Pemesanan: <?php echo htmlspecialchars($tanggalPemesanan); ?></p>
    </div>
    <div class="payment-method">
        <h3>Pilih Metode Pembayaran</h3>
        <ul>
            <li><input type="radio" name="payment_method" value="credit_card"> Kartu Kredit</li>
            <li><input type="radio" name="payment_method" value="bank_transfer"> Transfer Bank</li>
            <li><input type="radio" name="payment_method" value="paypal"> PayPal</li>
        </ul>
    </div>
    <form method="post" action="riwayat.php">
        <input type="hidden" name="total_harga" value="<?php echo htmlspecialchars($totalHarga); ?>">
        <input type="hidden" name="jumlah_reguler" value="<?php echo htmlspecialchars($jumlahReguler); ?>">
        <input type="hidden" name="jumlah_gold" value="<?php echo htmlspecialchars($jumlahGold); ?>">
        <input type="hidden" name="jumlah_premium" value="<?php echo htmlspecialchars($jumlahPremium); ?>">
        <input type="hidden" name="selected_date" value="<?php echo htmlspecialchars($tanggalPemesanan); ?>">
        <button class="btn" type="submit" name="confirm_order">Konfirmasi Pesanan</button>
    </form>
    <a href="home.php" class="btn">Kembali</a>
</section>
<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(function() {
        $("#booking-date").datepicker({
            onSelect: function(dateText) {
                $('#selected-date').val(dateText);
            }
        });
    });
</script>
</body>
</html>
