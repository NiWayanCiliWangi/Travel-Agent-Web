<?php

require 'config/Database.php';

class Registrasi extends Database
{

    public function regristrasiPembeli($data)
    {
        $conn = $this->conn;
        $nama_pembeli = strtolower(stripslashes($data['nama_pembeli']));
        $alamat_pembeli = $data['alamat_pembeli'];
        $no_telp_pembeli = $data['no_telp_pembeli'];
        $email_pembeli = $data['email_pembeli'];
        $password = $data['password'];
        $password2 = $data['password2'];

        // Check if the username already exists
        $stmt = mysqli_prepare($conn, "SELECT nama_pembeli FROM pembeli WHERE nama_pembeli = ?");
        mysqli_stmt_bind_param($stmt, "s", $nama_pembeli);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            echo "<script>
            alert('Username sudah ada');
        </script>";
            return false;
        }

        // Check password confirmation
        if ($password != $password2) {
            echo "<script>
            alert('Konfirmasi password tidak sesuai');
        </script>";
            return false;
        }

        // Insert new user into the database using prepared statement
        $stmt = mysqli_prepare($conn, "INSERT INTO pembeli VALUES(NULL, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssss", $nama_pembeli, $alamat_pembeli, $no_telp_pembeli, $email_pembeli, $password);
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_affected_rows($stmt);
    }


    public function regristrasiPenjual($data)
    {
        $conn = $this->conn;
        $username = strtolower(stripslashes($data['username']));
        $password = $data['password'];
        $password2 = $data['password2'];

        //cek username udah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM penjual WHERE username = '$username';");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>
  alert('user sudah ada');
  </script>";
            return false;
        }

        //cek  konfirmasi password
        if ($password != $password2) {
            echo "<script>
        alert('konfirmasi password tidak sesuai');
          </script>";
            return false;
        }

        //enkripsi passrod
        // $password = password_hash($password, PASSWORD_DEFAULT);

        //tambah user baru ke database
        mysqli_query($conn, "INSERT INTO penjual VALUES('','$username','$password')");
        return mysqli_affected_rows($conn);
    }
}
