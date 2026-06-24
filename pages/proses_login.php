<?php
session_start();
require 'koneksi.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $response = ['status' => 'error', 'message' => 'Email dan password wajib diisi.'];
        echo json_encode($response);
        exit();
    }

    // 1. Ubah query SQL untuk mengambil juga kolom 'foto_profil'
// Pastikan query Anda juga mengambil email
$sql_check = "SELECT id_user, nama_lengkap, email, password, foto_profil FROM user WHERE email = ?";
$stmt_check = $koneksi->prepare($sql_check);
$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$result = $stmt_check->get_result();

// 2. Jika user dengan email tersebut ditemukan
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    // 3. Verifikasi password
    if (password_verify($password, $user['password'])) {
        // Jika password cocok -> Login Berhasil
        
        session_regenerate_id(true);
        
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        $_SESSION['foto_profil'] = $user['foto_profil'];
        
        // TAMBAHKAN BARIS INI UNTUK MENYIMPAN EMAIL
        $_SESSION['email'] = $user['email'];

        $response = ['status' => 'success', 'message' => 'Login berhasil! Memuat ulang halaman...'];
    } else {
        // Jika password salah
        $response = ['status' => 'error', 'message' => 'Email atau password yang Anda masukkan salah.'];
    }
    } else {
        // Jika email tidak ditemukan
        $response = ['status' => 'error', 'message' => 'Email atau password yang Anda masukkan salah.'];
    }

    $stmt_check->close();
    $koneksi->close();

} else {
    $response = ['status' => 'error', 'message' => 'Metode tidak valid.'];
}

echo json_encode($response);
exit();
?>