<?php
session_start();
require 'koneksi.php';

// Cek login dan metode POST
if (!isset($_SESSION['is_logged_in']) || $_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
    exit();
}

// Cek apakah ada file yang di-upload dan tidak ada error
if (isset($_FILES['fotoProfil']) && $_FILES['fotoProfil']['error'] === UPLOAD_ERR_OK) {
    
    $id_user = $_SESSION['user_id'];
    $uploadDir = '../images/profiles/';
    $file = $_FILES['fotoProfil'];
    
    // Buat nama file unik untuk mencegah penimpaan
    $fileName = uniqid('user_' . $id_user . '_') . '_' . basename($file['name']);
    $uploadFilePath = $uploadDir . $fileName;
    
    // Pindahkan file yang di-upload ke folder tujuan
    if (move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
        // Jika berhasil, update nama file di database
        $sql = "UPDATE user SET foto_profil = ? WHERE id_user = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("si", $fileName, $id_user);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = "Foto profil berhasil diperbarui!";
            // Perbarui juga session foto profil jika ada
            $_SESSION['foto_profil'] = $fileName;
        } else {
            $_SESSION['error'] = "Gagal memperbarui database.";
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Gagal memindahkan file yang di-upload.";
    }
} else {
    $_SESSION['error'] = "Tidak ada file yang diunggah atau terjadi kesalahan.";
}

$koneksi->close();
// Redirect kembali ke halaman profil
header("Location: profile.php");
exit();
?>