<?php

class Tiket
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tiket ORDER BY id DESC";

        return mysqli_query($this->conn, $sql);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM tiket WHERE id=$id";

        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_assoc($result);
    }

    public function tambah($nama_tiket, $harga)
    {
        $sql = "INSERT INTO tiket (nama_tiket, harga)
                VALUES ('$nama_tiket', '$harga')";

        return mysqli_query($this->conn, $sql);
    }

    public function update($id, $nama_tiket, $harga)
    {
        $sql = "UPDATE tiket
                SET nama_tiket='$nama_tiket',
                    harga='$harga'
                WHERE id=$id";

        return mysqli_query($this->conn, $sql);
    }

    public function hapus($id)
    {
        $sql = "DELETE FROM tiket WHERE id=$id";

        return mysqli_query($this->conn, $sql);
    }
}