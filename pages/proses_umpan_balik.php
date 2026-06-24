<?php
session_start();
require 'koneksi.php';

// WAJIB: Pastikan hanya user yang sudah login yang bisa mengirim
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    $_SESSION['error'] = "Anda harus login untuk mengirim umpan balik.";
    header("Location: ../index.php#feedback-form");
    exit();
}

// Hanya proses jika metode adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil semua data dari session, karena user PASTI sudah login
    $id_user = $_SESSION['user_id'];
    $nama_lengkap = $_SESSION['nama_lengkap'];
    $email = $_SESSION['email'];
    
    // Ambil sisa data dari form
    $nomor_telepon = trim($_POST['nomor_telepon']);
    $subjek = $_POST['subjek'];
    $pesan = trim($_POST['pesan']);

    // Validasi dasar
    if (empty($subjek) || empty($pesan)) {
        $_SESSION['error'] = "Subjek dan isi pesan tidak boleh kosong.";
        header("Location: ../index.php#feedback-form");
        exit();
    }

    // Siapkan dan eksekusi query
    $sql = "INSERT INTO umpan_balik (id_user, nama_lengkap, nomor_telepon, email, subjek, pesan) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("isssss", $id_user, $nama_lengkap, $nomor_telepon, $email, $subjek, $pesan);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Terima kasih! Umpan balik Anda telah berhasil dikirim.";
    } else {
        $_SESSION['error'] = "Maaf, terjadi kesalahan saat mengirim umpan balik.";
    }

    $stmt->close();
    $koneksi->close();
}

// Arahkan kembali ke halaman utama
header("Location: ../index.php#feedback-form");
exit();
?>