<?php
session_start();
require 'koneksi.php';

// Pastikan user login dan metode adalah POST
if (!isset($_SESSION['is_logged_in']) || $_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
    exit();
}

$id_user = $_SESSION['user_id'];
$nama_lengkap = trim($_POST['nama_lengkap']);
$username = trim($_POST['username']);

// Validasi dasar
if (empty($nama_lengkap) || empty($username)) {
    $_SESSION['error'] = "Nama lengkap dan username tidak boleh kosong.";
    header("Location: profile.php");
    exit();
}

// Cek apakah username baru sudah digunakan oleh user lain
$sql_check = "SELECT id_user FROM user WHERE username = ? AND id_user != ?";
$stmt_check = $koneksi->prepare($sql_check);
$stmt_check->bind_param("si", $username, $id_user);
$stmt_check->execute();
if ($stmt_check->get_result()->num_rows > 0) {
    $_SESSION['error'] = "Username '{$username}' sudah digunakan. Silakan pilih yang lain.";
    header("Location: profile.php");
    exit();
}
$stmt_check->close();

// Update data di database
$sql_update = "UPDATE user SET nama_lengkap = ?, username = ? WHERE id_user = ?";
$stmt_update = $koneksi->prepare($sql_update);
$stmt_update->bind_param("ssi", $nama_lengkap, $username, $id_user);

if ($stmt_update->execute()) {
    // Perbarui juga data di session agar langsung tampil di header
    $_SESSION['nama_lengkap'] = $nama_lengkap;
    $_SESSION['success'] = "Profil berhasil diperbarui!";
} else {
    $_SESSION['error'] = "Gagal memperbarui profil.";
}

$stmt_update->close();
$koneksi->close();

header("Location: profile.php");
exit();
?>