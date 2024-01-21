<?php

require '../config/Database.php';

class Admin extends Database
{

    public function getAllProduk()
    {
        $query = " SELECT * FROM produk ";
        $produk = $this->query($query);

        return $produk;
    }



    public function tambahProduk__($data)
    {
        $conn = $this->conn;

        $Nama_produk = $data['Nama_produk'];
        $Foto_produk = $data['Foto_produk'];
        $Stok_produk = $data['Stok_produk'];
        $Deskripsi_produk = $data['Deskripsi_produk'];
        $Harga_produk = $data['Harga_produk'];


        //make the insert syntax
        $query = "INSERT INTO produk VALUES 
            ('','$Nama_produk','$Foto_produk','$Stok_produk','$Deskripsi_produk','$Harga_produk')";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

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


    public function tambahWisata($data)
    {
        $conn = $this->conn;
        $nama_wisata = $data['nama_wisata'];
        $lokasi_wisata = $data['lokasi_wisata'];
        $deskripsi = $data['deskripsi'];
        $harga = $data['harga'];

        //upload gambar
        $gambar = $this->upload();
        if (!$gambar) {
            return false;
        }

        //make the insert syntax
        $query = "INSERT INTO jasa_wisata VALUES 
          ('','$nama_wisata','$lokasi_wisata','$gambar','$harga',' $deskripsi')";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    public function upload()
    {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile =  $_FILES['gambar']['size'];
        $error =  $_FILES['gambar']['error'];
        $tmp =  $_FILES['gambar']['tmp_name'];

        //cek apakah user sudah menambah gambar

        if ($error === 4) {
            echo "<script>
        alert ('pilih gambar dulu');
          </script>";
            return false;
        }

        //cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
        alert ('format gambar salah!');
          </script>";
            return false;
        }

        //cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000) {
            echo "<script>
        alert ('Ukuran terlalu besar');
          </script>";
        }

        //generate nama file random
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;


        //lolos semua hasil cek, lalu dijalankan
        move_uploaded_file($tmp, '../img/' . $namaFileBaru);

        return $namaFileBaru;
    }

    public function hapusWisata($id_wisata)
    {
        $conn = $this->conn;
        mysqli_query($conn, "DELETE FROM jasa_wisata WHERE id_wisata = $id_wisata");
        return mysqli_affected_rows($conn);
    }




    public function ubahProduk__($data)
    {
        $conn = $this->conn;
        $Id_produk = $data['Id_produk'];
        $Nama_produk = $data['Nama_produk'];
        $Foto_produk = $data['Foto_produk'];
        $Stok_produk = $data['Stok_produk'];
        $Deskripsi_produk = $data['Deskripsi_produk'];
        $Harga_produk = $data['Harga_produk'];

        //make the insert syntax
        $query = "UPDATE produk SET
        Nama_produk = '$Nama_produk',
        Foto_produk = '$Foto_produk',
        Stok_produk = $Stok_produk,
        Deskripsi_produk = '$Deskripsi_produk',
        Harga_produk = $Harga_produk
        WHERE Id_produk =$Id_produk
        ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }


    public function ubahWisata($data)
    {
        $conn = $this->conn;

        $id_wisata = $data['id_wisata'];
        $nama_wisata = $data['nama_wisata'];
        $lokasi_wisata = $data['lokasi_wisata'];
        $deskripsi = $data['deskripsi'];
        $harga = $data['harga'];
        $gambarLama = $data['gambarLama'];


        //check whether user pick a new image or not
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarLama;
        } else {
            $gambar = $this->upload();
        }


        //make the insert syntax
        $query = "UPDATE jasa_wisata SET
        nama_wisata = '$nama_wisata',
        lokasi_wisata = '$lokasi_wisata',
        gambar = '$gambar',
        harga = $harga,
        deskripsi = '$deskripsi'
        WHERE  id_wisata = $id_wisata
        ";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }


    public function lihatPesanan()
    {

        $result = $this->conn->query("SELECT pesanan.id_pesanan, pembeli.nama_pembeli, jasa_wisata.nama_wisata, jasa_wisata.harga
        FROM pesanan
        INNER JOIN jasa_wisata ON pesanan.id_wisata = jasa_wisata.id_wisata
        INNER JOIN pembeli ON pesanan.id_pembeli = pembeli.id_pembeli
        ");


        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }


    public function tambahPesanan($data)
    {
        $conn = $this->conn;
        $id_pembeli = $data['id_pembeli'];
        $id_wisata = $data['id_wisata'];
        $harga = $data['harga'];
        $tgl_pesanan = $data['tgl_pesanan'];

        $conn = $this->conn;
        $result = mysqli_query(
            $conn,
            "SELECT AUTO_INCREMENT
      FROM information_schema.TABLES
      WHERE TABLE_SCHEMA = 'travelagent' AND TABLE_NAME = 'pesanan';"
        );
        $row = mysqli_fetch_assoc($result);
        $id = $row["AUTO_INCREMENT"];
        $query = "INSERT INTO pesanan VALUES 
            ('$id','$tgl_pesanan','$id_pembeli','$id_wisata',' $harga')";

        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn)) {
            return $id;
        } else {
            return 0;
        }
    }

    public function tambahPesanan_($data)
    {
        $conn = $this->conn;
        $Id_pelanggan = $data['Id_pelanggan'];
        $Id_produk = $data['Id_produk'];
        $Alamat_pesanan = $data['Alamat_pesanan'];
        $Total_pesanan = $data['Total_pesanan'];
        $Tgl_pesanan = $data['Tgl_pesanan'];

        //upload gambar
        // $Foto_produk = upload();
        // if(!$Foto_produk){
        //   return false;
        // }

        //make the insert syntax
        $conn = $this->conn;
        $result = mysqli_query(
            $conn,
            "SELECT AUTO_INCREMENT
    FROM information_schema.TABLES
    WHERE TABLE_SCHEMA = 'jejaitan_upacara' AND TABLE_NAME = 'pesanan';"
        );
        $row = mysqli_fetch_assoc($result);
        $id = $row["AUTO_INCREMENT"];
        $query = "INSERT INTO pesanan VALUES 
          ('$id','$Id_pelanggan','$Id_produk','$Alamat_pesanan',' $Total_pesanan','$Tgl_pesanan')";

        mysqli_query($conn, $query);
        if (mysqli_affected_rows($conn)) {
            return $id;
        } else {
            return 0;
        }
    }




    public function konfirmasiPesanan($id_pesanan)
    {
        $conn = $this->conn;
        mysqli_query($conn, "DELETE FROM pesanan WHERE id_pesanan = $id_pesanan");

        return mysqli_affected_rows($conn);
    }
}
