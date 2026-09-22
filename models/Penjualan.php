<?php

class Penjualan
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function simpan(
        $nama,
        $tiket_id,
        $harga,
        $jumlah,
        $total,
        $bayar,
        $kembalian
    ) {

        $sql = "INSERT INTO penjualan
                (
                    nama_pembeli,
                    tiket_id,
                    harga,
                    jumlah,
                    total,
                    bayar,
                    kembalian
                )
                VALUES
                (
                    '$nama',
                    '$tiket_id',
                    '$harga',
                    '$jumlah',
                    '$total',
                    '$bayar',
                    '$kembalian'
                )";

        return mysqli_query($this->conn, $sql);
    }

    public function getAll()
    {
        $sql = "SELECT penjualan.*, tiket.nama_tiket
                FROM penjualan
                JOIN tiket
                ON penjualan.tiket_id = tiket.id
                ORDER BY penjualan.id DESC";

        return mysqli_query($this->conn, $sql);
    }
}