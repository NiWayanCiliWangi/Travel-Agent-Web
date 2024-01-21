<?php
require_once 'config/Database.php';

class Login extends Database
{

    public function getPenjual($username, $password)
    {
        $username = mysqli_real_escape_string($this->conn, $username);
        $password = mysqli_real_escape_string($this->conn, $password);

        $query = "SELECT * FROM penjual WHERE username = '" . $username . "' AND password = '" . $password . "'";
        $result = $this->query($query);

        return $result;
    }


    public function getPembeli($nama_pembeli, $password)
    {
        $nama_pembeli = mysqli_real_escape_string($this->conn, $nama_pembeli);
        $password = mysqli_real_escape_string($this->conn, $password);

        $query = "SELECT * FROM pembeli WHERE nama_pembeli = '" . $nama_pembeli . "' AND password = '" . $password . "'";
        $result = $this->query($query);

        return $result;
    }
}
