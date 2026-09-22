<?php

require_once "models/Penjualan.php";
require_once "models/Tiket.php";

class PenjualanController
{
    private $penjualan;
    private $tiket;

    public function __construct($conn)
    {
        $this->penjualan = new Penjualan($conn);
        $this->tiket = new Tiket($conn);
    }

    public function index()
    {
        $tiket = $this->tiket->getAll();
        $penjualan = $this->penjualan->getAll();

        include "views/penjualan/index.php";
    }

    public function simpan()
    {
        $nama = $_POST['nama'];
        $tiket_id = $_POST['tiket_id'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $bayar = $_POST['bayar'];

        // Hitung total
        $total = $harga * $jumlah;

        // Hitung kembalian
        $kembalian = $bayar - $total;

        $this->penjualan->simpan(
            $nama,
            $tiket_id,
            $harga,
            $jumlah,
            $total,
            $bayar,
            $kembalian
        );

        header("Location: index.php?action=penjualan");
        exit;
    }
}