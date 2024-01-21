<?php
// session_start();
// if (!isset($_SESSION['login'])){
//     header("Location: login.php");
//     exit;
// }
require 'Admin.php';

$admin = new Admin;

$id_wisata = $_GET["id_wisata"];

//get that $_GET
$wst = $admin->getWisataById($id_wisata);



//check whether the button has been click or not
if (isset($_POST['submit'])) {



    //check the progress
    if ($admin->ubahWisata($_POST) > 0) {
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo " <script>
        alert('data gagal diubah');
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
    <title>Ubah data Produk</title>
    <link rel="stylesheet" href="../css/adminside/ubahWisata.css">
</head>

<body>

    <h1>Ubah Data Wisata</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_wisata" value="<?= $wst['id_wisata'] ?>">
        <input type="hidden" name="gambarLama" value="<?= $wst['gambar'] ?>">
        <ul>
            <li>
                <label for="nama_wisata">Nama Wisata :</label>
                <input type="text" name="nama_wisata" id="nama_wisata" required value="<?= $wst['nama_wisata']; ?>">
            </li>
            <li>
                <label for="gambar">Foto Wisata :</label>
                <input type="file" name="gambar" id="nama">
                <img src="../img/<?= $wst['gambar'] ?>" width="100px" height="100px">
            </li>

            <li>
                <label for="lokasi_wisata">Lokasi Wisata :</label>
                <input type="text" name="lokasi_wisata" id="lokasi_wisata" required value="<?= $wst['lokasi_wisata']; ?>">
            </li>

            <li>
                <label for="deskripsi">Deskripsi Wisata :</label>
                <input type="text" name="deskripsi" id="deskripsi" required value="<?= $wst['deskripsi']; ?>">
            </li>
            <li>
                <label for="harga">Harga Wisata :</label>
                <input type="text" name="harga" id="harga" required value="<?= $wst['harga']; ?>">
            </li>
            <button type="submit" name="submit">Ubah</button>
        </ul>

        <a href="index.php">back</a>
    </form>


</body>

</html>