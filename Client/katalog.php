<?php
session_start();

require 'Client.php';

$client = new Client;


$wisata = $client->getAllWisata();

$id_pembeli = $_SESSION['id_pembeli'];



if (isset($_POST['tambah'])) {

    //check the progress
    $hasil_query = $client->tambahPesanan($_POST);
    if ($hasil_query > 0) {
        echo "
            <script>
            alert('Pesanan berhasil ditambahkan');
            document.location.href = 'order.php?id_pesanan=$hasil_query';
            </script>
        ";
    } else {
        echo " <script>
        alert('data gagal ditambah');
        document.location.href = 'katalog.php';
        </script>
    ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Agent</title>
    <link rel="stylesheet" href="../css/clientside/katalog.css">
</head>

<body>

    <header>
        <h1>Healing Your Soul Trip</h1>
        <p>Healing your body and soul</p>
    </header>

    <div id="card-container">
        <?php foreach ($wisata as $row) : ?>
            <div class="card">
                <div class="card-header">
                    <h2><?= $row['nama_wisata']; ?></h2>
                </div>
                <div class="card-body">
                    <img class="product-image" src="../img/<?= $row['gambar']; ?>" alt="Product Image">
                    <p><strong>Lokasi:</strong> <?= $row['lokasi_wisata']; ?></p>
                    <p><strong>Harga:</strong> Rp. <?= $row['harga']; ?></p>
                </div>
                <div class="form-container">
                    <form action="" method="post">

                        <input type="hidden" value="<?= $_SESSION['id_pembeli']; ?>" name="id_pembeli">
                        <input type="hidden" value="<?= $row['id_wisata']; ?>" name="id_wisata">
                        <input type="hidden" value="<?= $row['harga']; ?>" name="harga">
                        <input type="hidden" value="<?= date('Y-m-d'); ?>" name="tgl_pesanan">
                        <button name="tambah">Pesan</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>
<footer>
    <a href="../logout.php">Keluar</a>
    <p>Hubungi kami di: infohealingyoursoul.gmail.com | Phone: 081949820618</p>
</footer>

</html>