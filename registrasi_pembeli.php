<?php
require_once "Registrasi.php";

$registrasi = new Registrasi();

if (isset($_POST['register_pembeli'])) {

    if ($registrasi->regristrasiPembeli($_POST) > 0) {
        echo "<script>
                alert('user baru berhasil ditambahkan');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('user gagal ditambahkan');
              </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/registrasiUser.css">
</head>

<body>

    <h1>Registration Page</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama_pembeli">Nama Pembeli :</label>
                <input type="text" name="nama_pembeli" id="nama_pembeli" required>
            </li>
            <li>
                <label for="alamat_pembeli">Alamat :</label>
                <input type="text" name="alamat_pembeli" id="alamat_pembeli" required>
            </li>
            <li>
                <label for="no_telp_pembeli">Nomor Kontak :</label>
                <input type="text" name="no_telp_pembeli" id="no_telp_pembeli" required>
            </li>
            <li>
                <label for="email_pembeli">Email :</label>
                <input type="text" name="email_pembeli" id="email_pembeli" required>
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <label for="password2">Confirm Password :</label>
                <input type="password" name="password2" id="password2" required>
            </li>
            <li>
                <button type="submit" name="register_pembeli">Register</button>
            </li>
        </ul>
        <div>
            <p>Sudah punya akun?</p>
            <a href="index.php">Login </a>
        </div>
    </form>


</body>

</html>