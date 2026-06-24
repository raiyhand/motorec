<?php
session_start();

// 1. Hapus hanya data yang berhubungan dengan login pengguna
unset($_SESSION['is_logged_in']);
unset($_SESSION['user_id']);
unset($_SESSION['nama_lengkap']);
unset($_SESSION['foto_profil']);
// Tambahkan unset lain di sini jika ada data sesi lain yang spesifik untuk user

// 2. Sekarang, setelah data login dihapus, ATUR pesan sukses logout
$_SESSION['success'] = "Anda telah berhasil logout.";

// 3. Arahkan pengguna kembali ke halaman utama
header("Location: ../index.php");
exit();
?>