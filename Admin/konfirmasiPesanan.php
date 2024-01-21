<?php

require_once "Admin.php";

$admin = new Admin;

$id_pesanan = $_GET['id_pesanan'];

if ($admin->konfirmasiPesanan($id_pesanan) > 0) {
      echo "<script>
            alert('Pesanan telah dikirim ');
            document.location.href = 'order.php';
      </script>";
} else {
      echo "  <script>
            alert('Pesanan gagal dikirim');
            document.location.href = 'order.php';
            </script>";
}
