<?php
session_start();
require 'koneksi.php';

// Pastikan user login dan metode adalah POST
if (!isset($_SESSION['is_logged_in']) || $_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
    exit();
}

$id_user = $_SESSION['user_id'];
$new_email = trim($_POST['new_email']);
$current_password = $_POST['current_password'];

// 1. Validasi input
if (empty($new_email) || empty($current_password) || !filter_var($new_email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Email baru atau password saat ini tidak valid.";
    header("Location: profile.php");
    exit();
}

// 2. Ambil password yang ter-hash dari database untuk verifikasi
$sql_user = "SELECT password FROM user WHERE id_user = ?";
$stmt_user = $koneksi->prepare($sql_user);
$stmt_user->bind_param("i", $id_user);
$stmt_user->execute();
$result = $stmt_user->get_result();
$user = $result->fetch_assoc();

if (!$user || !password_verify($current_password, $user['password'])) {
    $_SESSION['error'] = "Password yang Anda masukkan salah.";
    header("Location: profile.php");
    exit();
}
$stmt_user->close();

// 3. Cek apakah email baru sudah digunakan oleh user lain
$sql_check = "SELECT id_user FROM user WHERE email = ? AND id_user != ?";
$stmt_check = $koneksi->prepare($sql_check);
$stmt_check->bind_param("si", $new_email, $id_user);
$stmt_check->execute();
if ($stmt_check->get_result()->num_rows > 0) {
    $_SESSION['error'] = "Email '{$new_email}' sudah digunakan oleh akun lain.";
    header("Location: profile.php");
    exit();
}
$stmt_check->close();

// 4. Jika semua aman, update email di database
$sql_update = "UPDATE user SET email = ? WHERE id_user = ?";
$stmt_update = $koneksi->prepare($sql_update);
$stmt_update->bind_param("si", $new_email, $id_user);

if ($stmt_update->execute()) {
    $_SESSION['success'] = "Email berhasil diperbarui!";
} else {
    $_SESSION['error'] = "Gagal memperbarui email.";
}

$stmt_update->close();
$koneksi->close();

header("Location: profile.php");
exit();
?>