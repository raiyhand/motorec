<?php
session_start();
require 'koneksi.php';

// Atur header untuk respons JSON
header('Content-Type: application/json');

// Validasi dasar
if (!isset($_SESSION['is_logged_in']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Akses tidak sah.']);
    exit();
}

$id_user = $_SESSION['user_id'];
$id_motor = filter_input(INPUT_POST, 'id_motor', FILTER_VALIDATE_INT);
$rating = filter_input(INPUT_POST, 'rating', FILTER_VALIDATE_INT);

if (!$id_motor || !$rating || $rating < 1 || $rating > 5) {
    echo json_encode(['status' => 'error', 'message' => 'Data tidak valid.']);
    exit();
}

// Gunakan query INSERT ... ON DUPLICATE KEY UPDATE untuk efisiensi
$sql = "INSERT INTO user_motor_rating (id_user, id_motor, rating) VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE rating = VALUES(rating)";

$stmt = $koneksi->prepare($sql);
$stmt->bind_param("iii", $id_user, $id_motor, $rating);

if ($stmt->execute()) {
    // Jika berhasil, hitung ulang rata-rata dan total rating untuk motor ini
    $sql_agg = "SELECT AVG(rating) as avg_rating, COUNT(id_rating) as total_ratings FROM user_motor_rating WHERE id_motor = ?";
    $stmt_agg = $koneksi->prepare($sql_agg);
    $stmt_agg->bind_param("i", $id_motor);
    $stmt_agg->execute();
    $agg_result = $stmt_agg->get_result()->fetch_assoc();

    $new_average = round($agg_result['avg_rating'] ?? 0, 1);
    $new_total = $agg_result['total_ratings'] ?? 0;

    // Kirim kembali respons sukses beserta data yang baru
    $response = [
        'status' => 'success',
        'message' => 'Terima kasih, rating Anda telah disimpan!',
        'newAverage' => $new_average,
        'newTotal' => $new_total
    ];
} else {
    $response = ['status' => 'error', 'message' => 'Gagal menyimpan rating ke database.'];
}

$stmt->close();
$koneksi->close();

echo json_encode($response);
exit();
?>