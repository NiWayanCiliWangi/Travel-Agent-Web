<?php

require '../config/Database.php';

class Client extends Database
{



    public function getAllWisata()
    {
        $query = " SELECT * FROM jasa_wisata ";
        $produk = $this->query($query);

        return $produk;
    }


    public function getWisataById($id_wisata)
    {
        $query = "SELECT * FROM jasa_wisata WHERE id_wisata = " . $id_wisata;
        $wisata = $this->query($query);

        if (empty($wisata)) {
            return $wisata;
        } else {
            return $wisata[0];
        }
    }


    public function tambahPesanan($data)
    {
        $conn = $this->conn;
        $id_pembeli = $data['id_pembeli'];
        $id_wisata = $data['id_wisata'];
        $harga = $data['harga'];
        $tgl_pesanan = $data['tgl_pesanan'];

        $query = "INSERT INTO pesanan (tgl_pesanan, id_pembeli, id_wisata, harga) 
                  VALUES ('$tgl_pesanan', '$id_pembeli', '$id_wisata', '$harga')";

        mysqli_query($conn, $query);

        // Use mysqli_insert_id() to get the last inserted ID
        $id = mysqli_insert_id($conn);

        if ($id > 0) {
            return $id;
        } else {
            return 0;
        }
    }



    public function getPesananById($id_pesanan)
    {
        $query = "SELECT * FROM pesanan WHERE id_pesanan = " . $id_pesanan;
        $pesanan = $this->query($query);

        if (empty($pesanan)) {
            return $pesanan;
        } else {
            return $pesanan[0];
        }
    }



    // Inside the Client class

    public function lihatPesanan($id_pesanan)
    {
        $conn = $this->conn;

        $query = "SELECT pesanan.*, jasa_wisata.nama_wisata, jasa_wisata.gambar, jasa_wisata.harga
              FROM pesanan
              JOIN jasa_wisata ON jasa_wisata.id_wisata = pesanan.id_wisata
              WHERE pesanan.id_pesanan = '$id_pesanan';";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $data = mysqli_fetch_assoc($result);

        return $data;
    }

    public function lihatInvoice($id_pesanan)
    {
        $conn = $this->conn;

        $query = "SELECT pesanan.id_pesanan, pesanan.tgl_pesanan, pembeli.nama_pembeli, pembeli.alamat_pembeli, jasa_wisata.nama_wisata, jasa_wisata.harga
              FROM pesanan
              INNER JOIN jasa_wisata ON pesanan.id_wisata = jasa_wisata.id_wisata
              INNER JOIN pembeli ON pesanan.id_pembeli = pembeli.id_pembeli
              WHERE pesanan.id_pesanan = '$id_pesanan';";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        $data = mysqli_fetch_assoc($result);

        return $data;
    }
}
