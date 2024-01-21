<?php
session_start();


$wisata = $admin->getAllWisata();

?>


<!-- <form action="" method="get" class="form">
    <input type="text" name="keyword" autofocus placeholder="cari id/nama " autocomplete="off" 
    value="<?= $keyword;  ?>" >
    <button type="submit" name="cari">Cari</button>
</form>
     <form action="" method="post" class="form"> 
            <input type="text" name="keywordNama" autofocus placeholder="cari nama" autocomplete="off" >
            <button type="submit" name="cariNama">Cari</button>
        </form> -->
<!-- create the header -->
<table border="1" cellpadding='10' cellspacing='0'>
    <tr>
        <th> No </th>
        <th> Id Tempat Wisata</th>
        <th> Nama Tempat Wisata</th>
        <th> Gambar Wisata </th>
        <th> Lokasi Wisata </th>
        <th> Deskripsi Wisata</th>
        <th> Harga Produk</th>
        <th> Actions</th>
    </tr>

    <?php $i = 1; ?>
    <!-- create the loop -->
    <?php foreach ($wisata as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['id_wisata']; ?></td>
            <td><?= $row['nama_wisata']; ?></td>
            <td><img src="../img/<?= $row['gambar']; ?>" width="100px" height="100px"></td>
            <td><?= $row['lokasi_wisata']; ?></td>
            <td><?= $row['deskripsi']; ?></td>
            <td><?= $row['harga']; ?></td>
            <td>
                <a href="ubahWisata.php?id_wisata=<?= $row['id_wisata']; ?>">Ubah</a>
                <a href="hapusWisata.php?id_wisata=<?= $row['id_wisata']; ?>" onclick="return confirm('yakin?');">hapus</a>
            </td>
            <?php $i++ ?>
        </tr>
    <?php endforeach; ?>
</table>