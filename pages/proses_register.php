<?php
// Memulai session untuk menyimpan pesan feedback ke pengguna
session_start();

// Memanggil file koneksi ke database
require 'koneksi.php';

// Memastikan skrip diakses melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. Mengambil data dari form dan membersihkannya dari spasi
    $nama_lengkap = trim($_POST['nama_lengkap']);
    $username     = trim($_POST['username']);
    $email        = trim($_POST['email']);
    $password     = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // 2. Validasi input dasar
    if (empty($nama_lengkap) || empty($username) || empty($email) || empty($password)) {
        $_SESSION['error'] = "Semua kolom wajib diisi!";
        header("Location: ../index.php"); 
    }

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Password dan konfirmasi password tidak cocok!";
        header("Location: ../index.php"); 
        exit();
    }
    
    // 3. Cek apakah username atau email sudah terdaftar
    $sql_check = "SELECT id_user FROM user WHERE username = ? OR email = ?";
    $stmt_check = $koneksi->prepare($sql_check);
    $stmt_check->bind_param("ss", $username, $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $_SESSION['error'] = "Username atau email sudah terdaftar!";
        $stmt_check->close();
        header("Location: ../index.php");
    }
    $stmt_check->close();

    // 4. Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 5. Masukkan data user baru ke database
    $sql_insert = "INSERT INTO user (nama_lengkap, username, email, password) VALUES (?, ?, ?, ?)";
    $stmt_insert = $koneksi->prepare($sql_insert);
    $stmt_insert->bind_param("ssss", $nama_lengkap, $username, $email, $hashed_password);

    if ($stmt_insert->execute()) {
        $_SESSION['success'] = "Registrasi berhasil! Silakan masuk.";
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat mendaftar. Silakan coba lagi.";
    }
    
    $stmt_insert->close();
    $koneksi->close();

    // Redirect kembali ke halaman utama
    header("Location: ../index.php");
    exit();
}
?>