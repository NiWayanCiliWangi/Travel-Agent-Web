<?php
// session_start();
// if (!isset($_SESSION['login'])){
//     header("Location: login.php");
//     exit;
// }

require 'Admin.php';

$admin = new Admin;


//check whether the button has been click or not
if (isset($_POST['submit'])) {

    //check the progress
    if ($admin->tambahWisata($_POST) > 0) {
        echo "
            <script>
            alert('Tempat wisata berhasil ditambah');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo " <script>
        alert('Tempat wisata gagal ditambah');
        document.location.href = 'index.php';
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
    <title>Tambah Wisata</title>
    <link rel="stylesheet" href="../css/adminside/tambahWisata.css">
</head>

<body>

    <h1>Tambah Wisata</h1>

    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <ul>
            <li>
                <label for="nama_wisata">Nama Wisata :</label>
                <input type="text" name="nama_wisata" id="nama_wisata">
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <label for="lokasi_wisata">Lokasi Wisata :</label>
                <input type="text" name="lokasi_wisata" id="lokasi_wisata">
            </li>
            <li>
                <label for="deskripsi">Deskripsi Wisata :</label>
                <input type="text" name="deskripsi" id="deskripsi">
            </li>
            <li>
                <label for="harga">Harga Wisata :</label>
                <input type="text" name="harga" id="harga">
            </li>
            <button type="submit" name="submit">Tambah</button>
        </ul>
        
        <a href="index.php">back</a>
    </form>

    <script>
        function validateForm() {
            var namaWisata = document.getElementById("nama_wisata").value;
            var gambar = document.getElementById("gambar").value;
            var lokasiWisata = document.getElementById("lokasi_wisata").value;
            var deskripsiWisata = document.getElementById("deskripsi").value;
            var hargaWisata = document.getElementById("harga").value;

            if (namaWisata === "" || gambar === "" || lokasiWisata === "" || deskripsiWisata === "" || hargaWisata === "") {
                alert("Semua kolom harus diisi.");
                return false;
            }

            return true;
        }
    </script>

</body>

</html>