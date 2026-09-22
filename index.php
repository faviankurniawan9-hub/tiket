<?php

session_start();

require_once "config/database.php";

require_once "controllers/AuthController.php";
require_once "controllers/TiketController.php";
require_once "controllers/PenjualanController.php";


$action = $_GET['action'] ?? 'login';


// LOGIN
if ($action == 'login') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $controller = new AuthController($conn);

        $controller->login();

    } else {

        include "views/auth/login.php";
    }
}


// LOGOUT
elseif ($action == 'logout') {

    session_destroy();

    header("Location: index.php");
    exit;
}


// DASHBOARD
elseif ($action == 'dashboard') {

    include "views/dashboard.php";
}


// CRUD TIKET
elseif ($action == 'tiket') {

    $controller = new TiketController($conn);

    $controller->index();
}


elseif ($action == 'tiket_tambah') {

    $controller = new TiketController($conn);

    $controller->tambah();
}


elseif ($action == 'tiket_edit') {

    $controller = new TiketController($conn);

    $controller->edit();
}


elseif ($action == 'tiket_hapus') {

    $controller = new TiketController($conn);

    $controller->hapus();
}


// PENJUALAN
elseif ($action == 'penjualan') {

    $controller = new PenjualanController($conn);

    $controller->index();
}


elseif ($action == 'penjualan_simpan') {

    $controller = new PenjualanController($conn);

    $controller->simpan();
}