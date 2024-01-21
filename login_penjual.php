<?php

session_start();

require_once 'login.php';

$login = new Login;

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Assuming $login is an instance of a class with a method getPenjual
    $penjual = $login->getPenjual($username, $password);

    if ($penjual) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['id_penjual'] = $penjual[0]['id_penjual'];

        // Check if the user was found
        if ($penjual[0]['username'] == $username) {

            if ($penjual[0]['password'] == $password) {

                header('location:admin/index.php');
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
    <link rel="stylesheet" href="css/loginAdmin.css">
</head>

<body>
    <h1>Login</h1>

    <?php if (isset($error)) : ?>
        <p style="color : red">Username / Password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
            <li>
                <a href="registrasi_penjual.php">Klik untuk buat akun</a>
            </li>
        </ul>
    </form>