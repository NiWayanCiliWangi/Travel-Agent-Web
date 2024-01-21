<?php

session_start();

require_once 'login.php';

$login = new Login;

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $nama_pembeli = $_POST['nama_pembeli'];
    $password = $_POST['password'];

    // Assuming $login is an instance of a class with a method getPenjual
    $pembeli = $login->getPembeli($nama_pembeli, $password);

    if ($pembeli) {
        $_SESSION['logged_in'] = true;
        $_SESSION['nama_pembeli'] = $nama_pembeli;
        $_SESSION['alamat_pembeli'] = $alamat_pembeli;
        $_SESSION['id_pembeli'] = $pembeli[0]['id_pembeli'];

        // Check if the user was found
        if ($pembeli[0]['nama_pembeli'] == $nama_pembeli) {

            if ($pembeli[0]['password'] == $password) {

                header('location:client/index.php');
            } else {
                // Password incorrect
                $error = "Password salah. Silakan coba lagi.";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/loginUser.css">
</head>

<body>

    <div class="login-container">
        <h1>Login Pembeli</h1>

        <?php if (isset($error)) : ?>
            <p style="color : red">Username / Password salah</p>
        <?php endif; ?>

        <form action="" method="post">
            <ul>
                <li>
                    <label for="nama_pembeli">Nama Pembeli :</label>
                    <input type="text" name="nama_pembeli" id="nama_pembeli">
                </li>
                <li>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
                <li>
                    <a href="registrasi_pembeli.php">Klik untuk buat akun</a>
                </li>
                <li>
                    <a href="login_penjual.php">Login untuk penjual</a>
                </li>
            </ul>
        </form>
    </div>

</body>

</html>