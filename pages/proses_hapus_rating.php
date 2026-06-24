<?php
session_start();
require 'koneksi.php';

header('Content-Type: application/json');

// Validasi dasar
if (!isset($_SESSION['is_logged_in']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Akses tidak sah.']);
    exit();
}

$id_user = $_SESSION['user_id'];
$id_motor = filter_input(INPUT_POST, 'id_motor', FILTER_VALIDATE_INT);

if (!$id_motor) {
    echo json_encode(['status' => 'error', 'message' => 'ID motor tidak valid.']);
    exit();
}

// Hapus rating dari database
$sql_delete = "DELETE FROM user_motor_rating WHERE id_user = ? AND id_motor = ?";
$stmt_delete = $koneksi->prepare($sql_delete);
$stmt_delete->bind_param("ii", $id_user, $id_motor);

if ($stmt_delete->execute() && $stmt_delete->affected_rows > 0) {
    // Jika berhasil dihapus, hitung ulang rata-rata dan total rating
    $sql_agg = "SELECT AVG(rating) as avg_rating, COUNT(id_rating) as total_ratings FROM user_motor_rating WHERE id_motor = ?";
    $stmt_agg = $koneksi->prepare($sql_agg);
    $stmt_agg->bind_param("i", $id_motor);
    $stmt_agg->execute();
    $agg_result = $stmt_agg->get_result()->fetch_assoc();
    $stmt_agg->close();

    $new_average = round($agg_result['avg_rating'] ?? 0, 1);
    $new_total = $agg_result['total_ratings'] ?? 0;

    // Kirim kembali respons sukses beserta data yang baru
    $response = [
        'status' => 'success',
        'message' => 'Rating Anda telah berhasil dihapus.',
        'newAverage' => $new_average,
        'newTotal' => $new_total
    ];
} else {
    $response = ['status' => 'error', 'message' => 'Gagal menghapus rating atau rating tidak ditemukan.'];
}

$stmt_delete->close();
$koneksi->close();

echo json_encode($response);
exit();
?>