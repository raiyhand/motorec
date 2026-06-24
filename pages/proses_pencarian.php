<?php
require 'koneksi.php';

header('Content-Type: application/json');

$query = $_GET['query'] ?? '';
$response = [];

// Hanya proses jika input lebih dari 2 karakter
if (strlen($query) > 2) {
    
    // 1. Pecah input pengguna menjadi beberapa kata kunci
    $keywords = explode(' ', $query);
    $search_conditions = [];
    $params = [];
    $types = '';

    // 2. Buat kondisi LIKE untuk setiap kata kunci
    foreach ($keywords as $keyword) {
        if (!empty($keyword)) {
            $search_conditions[] = "CONCAT(m.merk, ' ', m.model) LIKE ?";
            $params[] = "%" . $keyword . "%";
            $types .= "s";
        }
    }

    if (!empty($search_conditions)) {
        // Gabungkan semua kondisi dengan 'AND'
        $where_clause = implode(' AND ', $search_conditions);

        // Query SQL yang baru dan lebih fleksibel
        $sql = "SELECT m.id_motor, m.merk, m.model, m.cc, mi.nama_file AS gambar
                FROM motor m
                LEFT JOIN motor_images mi ON m.id_motor = mi.id_motor AND mi.is_utama = 1
                WHERE " . $where_clause . "
                LIMIT 5";

        $stmt = $koneksi->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $response[] = $row;
            }
            $stmt->close();
        }
    }
}

$koneksi->close();

echo json_encode($response);
exit();
?>