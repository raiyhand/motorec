<?php
require 'koneksi.php'; // Hubungkan ke file koneksi Anda

// Asumsi: Anda memiliki sistem rating atau kita buat rata-rata dari preferensi
$query = "SELECT u.id_user, u.id_motor, 
          (SELECT COUNT(*) FROM user_favorites WHERE id_user = u.id_user) as rating_aktual,
          (SELECT AVG(harga) FROM motor) as rating_prediksi -- Ganti ini dengan logika skor rekomendasi Anda
          FROM user_favorites u";

$result = $koneksi->query($query);
$data = [];
while($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$n = count($data);
$mae = 0;
$mse = 0;

foreach ($data as $item) {
    $diff = abs($item['rating_aktual'] - $item['rating_prediksi']);
    $mae += $diff;
    $mse += pow($diff, 2);
}

$mae = $mae / $n;
$rmse = sqrt($mse / $n);

echo "MAE: " . number_format($mae, 4) . "<br>";
echo "RMSE: " . number_format($rmse, 4);
?>