<?php
session_start();
require 'koneksi.php';

if (!$koneksi) {
    die(json_encode(['status' => 'error', 'message' => 'Koneksi database gagal']));
}

header('Content-Type: application/json');
$response = [];

// 1. Cek apakah user sudah login
if (!isset($_SESSION['is_logged_in']) || !$_SESSION['is_logged_in']) {
    $response = ['status' => 'error', 'message' => 'Silakan login terlebih dahulu untuk memfavoritkan motor.'];
    echo json_encode($response);
    exit();
}

// 2. Ambil data yang dikirim oleh AJAX
$id_user = $_SESSION['user_id'];
$id_motor = filter_input(INPUT_POST, 'id_motor', FILTER_VALIDATE_INT);

if (!$id_motor) {
    $response = ['status' => 'error', 'message' => 'ID motor tidak valid.'];
    echo json_encode($response);
    exit();
}

// 3. Cek apakah motor ini sudah difavoritkan sebelumnya oleh user
$sql_check = "SELECT id_favorite FROM user_favorites WHERE id_user = ? AND id_motor = ?";
$stmt_check = $koneksi->prepare($sql_check);

// TAMBAHKAN KODE INI UNTUK MENANGKAP EROR:
if (!$stmt_check) {
    die(json_encode(['status' => 'error', 'message' => 'Query Error: ' . $koneksi->error]));
}
$stmt_check->bind_param("ii", $id_user, $id_motor);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

// 4. Logika untuk Menambah atau Menghapus Favorit
if ($result_check->num_rows > 0) {
    // JIKA SUDAH ADA: Hapus dari favorit
    $sql_delete = "DELETE FROM user_favorites WHERE id_user = ? AND id_motor = ?";
    $stmt_delete = $koneksi->prepare($sql_delete);
    $stmt_delete->bind_param("ii", $id_user, $id_motor);
    if ($stmt_delete->execute()) {
        $response = ['status' => 'success', 'favorited' => false, 'message' => 'Dihapus dari favorit.'];
    }
} else {
    // JIKA BELUM ADA: Tambahkan ke favorit
    $sql_insert = "INSERT INTO user_favorites (id_user, id_motor) VALUES (?, ?)";
    $stmt_insert = $koneksi->prepare($sql_insert);
    $stmt_insert->bind_param("ii", $id_user, $id_motor);
    if ($stmt_insert->execute()) {
        $response = ['status' => 'success', 'favorited' => true, 'message' => 'Ditambahkan ke favorit!'];
    }
}

$koneksi->close();
echo json_encode($response);
exit();
?>