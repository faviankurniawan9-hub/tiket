<?php

require_once "models/Tiket.php";

class TiketController
{
    private $tiket;

    public function __construct($conn)
    {
        $this->tiket = new Tiket($conn);
    }

    public function index()
    {
        $data = $this->tiket->getAll();

        include "views/tiket/index.php";
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nama = $_POST['nama_tiket'];
            $harga = $_POST['harga'];

            $this->tiket->tambah($nama, $harga);

            header("Location: index.php?action=tiket");
            exit;
        }

        include "views/tiket/tambah.php";
    }

    public function edit()
    {
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $nama = $_POST['nama_tiket'];
            $harga = $_POST['harga'];

            $this->tiket->update($id, $nama, $harga);

            header("Location: index.php?action=tiket");
            exit;
        }

        $tiket = $this->tiket->getById($id);

        include "views/tiket/edit.php";
    }

    public function hapus()
    {
        $id = $_GET['id'];

        $this->tiket->hapus($id);

        header("Location: index.php?action=tiket");
        exit;
    }
}