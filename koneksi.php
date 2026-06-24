<?php

// Konfigurasi Database
$hostname     = "localhost";
$db_username  = "root"; // ganti dengan username database Anda
$db_password  = "";     // ganti dengan password database Anda
$db_name      = "motorec_db"; // ganti dengan nama database Anda

// Membuat koneksi ke database menggunakan MySQLi
$koneksi = new mysqli($hostname, $db_username, $db_password, $db_name);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

?>