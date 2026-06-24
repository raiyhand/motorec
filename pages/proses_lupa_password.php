<?php
// 1. Memanggil koneksi database
require 'koneksi.php';

// 2. Set header JSON agar AJAX bisa membacanya
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    // Validasi input
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Format email tidak valid.']);
        exit();
    }

    // 3. Pastikan koneksi berhasil sebelum lanjut
    if (!$koneksi) {
        echo json_encode(['status' => 'error', 'message' => 'Koneksi database gagal.']);
        exit();
    }

    // 4. Query untuk cek email (Pastikan tabel 'user' dan kolom 'email' sesuai database Anda)
    $sql_check = "SELECT id_user FROM user WHERE email = ?";
    $stmt_check = $koneksi->prepare($sql_check);

    if ($stmt_check === false) {
        // Jika query salah (misal: salah ketik nama tabel), kirim pesan error
        echo json_encode(['status' => 'error', 'message' => 'Query error: ' . $koneksi->error]);
        exit();
    }

    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();
    
    if ($result->num_rows > 0) {
        // 5. Proses pembuatan token reset
        $token = bin2hex(random_bytes(50));
        $expires = date("Y-m-d H:i:s", strtotime('+1 hour'));

        $sql_update = "UPDATE user SET reset_token = ?, reset_token_expires = ? WHERE email = ?";
        $stmt_update = $koneksi->prepare($sql_update);
        
        if ($stmt_update === false) {
            echo json_encode(['status' => 'error', 'message' => 'Update query error: ' . $koneksi->error]);
            exit();
        }

        $stmt_update->bind_param("sss", $token, $expires, $email);
        
        if ($stmt_update->execute()) {
            // Berhasil
            echo json_encode(['status' => 'success', 'message' => 'Token reset telah dibuat. Silakan cek database.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan token reset.']);
        }
        $stmt_update->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Email tidak ditemukan di database kami.']);
    }

    $stmt_check->close();
    $koneksi->close();

} else {
    echo json_encode(['status' => 'error', 'message' => 'Metode tidak valid.']);
}
exit();
?>