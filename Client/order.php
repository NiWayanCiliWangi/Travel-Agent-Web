<?php
session_start();

require 'Client.php';

$client = new Client;

$id_pesanan = $_GET['id_pesanan'];

$pesanan = $client->lihatPesanan($id_pesanan);

?>

<!-- Rest of your HTML code -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <link rel="stylesheet" href="../css/clientside/order.css">
</head>

<body>
    <header>
        <h1>Healing Your Soul Trip</h1>
        <p>Healing your body and soul</p>
    </header>

    <main>
        <?php if (isset($pesanan['nama_wisata'])) : ?>
            <h1><?= $pesanan['nama_wisata']; ?> </h1>
            <img src="../img/<?= $pesanan['gambar'] ?? ''; ?>" width="200px" height="200px">
            <h4>Rp.<?= $pesanan['harga'] ?? ''; ?></h4>
            <label for="dropdown">Pilih Pembayaran:</label>
            <select name="bank" id="dropdown">
                <option value="tunai">Tunai</option>
                <option value="mandiri">Mandiri</option>
                <option value="BRI">BRI</option>
                <option value="BNI">BNI</option>
                <option value="BPD Bali">BPD Bali</option>
                <option value="Permata Bank">Permata Bank</option>
                <option value="Bank Mega">Bank Mega</option>
            </select>
        <?php else : ?>
            <p>No data available.</p>
        <?php endif; ?>

        <div>
            <a href="#" onclick="checkout()">Bayar</a>
            <a href="#" onclick="cancelOrder()">Batal</a>
        </div>

        <script>
            function checkout() {
                var bank = document.getElementById('dropdown').value;
                window.location.href = "invoice.php?id_pesanan=<?= $pesanan['id_pesanan'] ?? ''; ?>&bank=" + bank;
            }

            function cancelOrder() {
                var confirmation = confirm('Yakin ingin membatalkan pesanan?');
                if (confirmation) {
                    var bank = document.getElementById('dropdown').value;
                    window.location.replace("katalog.php");
                }
            }
        </script>
    </main>

</body>

<footer>
    <a href="../logout.php">Keluar</a>
    <p>Hubungi kami di: infohealingyoursoul.gmail.com | Phone: 081949820618</p>
</footer>

</html>