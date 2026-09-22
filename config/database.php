<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "db_tiket"
);

if (!$conn) {
    die("Koneksi database gagal");
}