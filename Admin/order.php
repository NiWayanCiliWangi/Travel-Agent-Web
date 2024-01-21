<?php
session_start();

require 'Admin.php';

$admin = new Admin;

$pesanan = $admin->lihatPesanan();


// var_dump($pesanan);
// exit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/adminside/order.css">
</head>

<body>
    <header>
        <h1>Healing Your Soul Trip</h1>
        <p>Healing your body and soul</p>
        <h1 style="color: white;">DAFTAR PESANAN</h1>
    </header>

    <table borde="1" cellpadding='10' cellspacing='0'>
        <tr>
            <th> No </th>
            <th> Id Pesanan</th>
            <th> Nama Pembeli</th>
            <th> Nama Wisata </th>
            <th> Harga Wisata</th>
            <th> Actions</th>
        </tr>

        <?php $i = 1; ?>
        <!-- create the loop -->
        <?php foreach ($pesanan as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['id_pesanan']; ?></td>
                <td><?= $row['nama_pembeli']; ?></td>
                <td><?= $row['nama_wisata']; ?></td>
                <td><?= $row['harga']; ?></td>
                <td>
                    <a href="konfirmasiPesanan.php?id_pesanan=<?= $row['id_pesanan']; ?>" onclick="return confirm('yakin?');">Konfirmasi Pemesanan</a>
                </td>
                <?php $i++ ?>
            </tr>
        <?php endforeach; ?>
    </table>

    <footer>
        <a href="../logout.php">Keluar</a>
        <p>Hubungi kami di: infohealingyoursoul.gmail.com | Phone: (123) 456-7890</p>
    </footer>