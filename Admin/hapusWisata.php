<?php

require_once "Admin.php";

$admin = new Admin;

$id_wisata = $_GET['id_wisata'];

if ($admin->hapusWisata($id_wisata) > 0) {
      echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'index.php';
      </script>";
} else {
      echo "  <script>
            alert('data gagal dihapus');
            document.location.href = 'index.php';
            </script>";
}
