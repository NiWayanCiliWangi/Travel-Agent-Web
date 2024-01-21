<?php
session_start();

require_once "Client.php";

$client = new Client;

$id_pesanan = $_GET['id_pesanan'];

$bank = $_GET['bank'];

$order = $client->lihatInvoice($id_pesanan);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Faktur</title>
  <link rel="stylesheet" href="../css/clientside/invoice.css">
</head>

<body>

  <div id="invoice">
    <h1>Faktur</h1>

    <div class="invoice-details">
      <div>
        <strong>Nomor Faktur:</strong> INV- <?= $order['id_pesanan'] ?>
      </div>
      <div>
        <strong>Tanggal:</strong><?= $order['tgl_pesanan'] ?>
      </div>
    </div>

    <div id="customer">
      <h2>Detail Pelanggan</h2>
      <table>
        <tr>
          <th>Nama</th>
          <td><?= isset($_SESSION['nama_pembeli']) ? $_SESSION['nama_pembeli'] : ''; ?></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td><?= $order['alamat_pembeli'] ?></td>
        </tr>
      </table>
    </div>

    <div id="items">
      <h2>Produk</h2>
      <table>
        <tr>
          <th>Nama Wisata</th>
          <th>Harga Wisata</th>
          <th>Metode Pembayaran</th>
        </tr>
        <tr>
          <td><?= isset($order['nama_wisata']) ? $order['nama_wisata'] : ''; ?></td>
          <td><?= isset($order['harga']) ? $order['harga'] : ''; ?></td>
          <td><?= isset($_GET['bank']) ? $_GET['bank'] : ''; ?></td>
        </tr>
      </table>
    </div>

    <div id="thanks">
      <p>Terimakasih!</p>
    </div>


  </div>
  <div id="logout-container" style="text-align: center;">
    <a href="../logout.php" style="color: white;">Logout</a>
  </div>

</body>

</html>