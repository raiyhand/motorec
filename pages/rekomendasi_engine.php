<?php

/**
 * Fungsi untuk mendapatkan rekomendasi collaborative filtering.
 * Menemukan motor yang disukai oleh pengguna dengan selera serupa.
 *
 * @param int $target_user_id ID pengguna yang sedang login.
 * @param int $current_motor_id ID motor yang sedang dilihat (untuk dikecualikan).
 * @param mysqli $koneksi Objek koneksi database.
 * @return array Array berisi data motor yang direkomendasikan.
 */
function getCollaborativeRecommendations($target_user_id, $current_motor_id, $koneksi)
{
    // 1. Temukan pengguna lain ('tetangga') yang juga memberi rating tinggi (>= 4) pada motor-motor yang sama dengan pengguna target.
    // Ini mencari pengguna dengan selera paling mirip.
    $sql_neighbors = "
        SELECT ur2.id_user, COUNT(ur1.id_motor) as common_likes
        FROM user_motor_rating ur1
        INNER JOIN user_motor_rating ur2 ON ur1.id_motor = ur2.id_motor AND ur1.id_user != ur2.id_user
        WHERE ur1.id_user = ? AND ur1.rating >= 4 AND ur2.rating >= 4
        GROUP BY ur2.id_user
        ORDER BY common_likes DESC
        LIMIT 10
    ";
    $stmt_neighbors = $koneksi->prepare($sql_neighbors);
    if (!$stmt_neighbors) return []; // Gagal prepare
    $stmt_neighbors->bind_param("i", $target_user_id);
    $stmt_neighbors->execute();
    $result_neighbors = $stmt_neighbors->get_result();

    $neighbor_ids = [];
    while ($row = $result_neighbors->fetch_assoc()) {
        $neighbor_ids[] = $row['id_user'];
    }
    $stmt_neighbors->close();

    // Jika tidak ditemukan tetangga, kembalikan array kosong.
    if (empty($neighbor_ids)) {
        return [];
    }

    // 2. Kumpulkan motor yang disukai oleh para tetangga, KECUALI yang sudah pernah dirating oleh pengguna target.
    $placeholders_neighbors = implode(',', array_fill(0, count($neighbor_ids), '?'));
    
    // Ambil semua motor yang pernah dirating oleh pengguna target untuk dikecualikan
    $sql_rated_by_user = "SELECT id_motor FROM user_motor_rating WHERE id_user = ?";
    $stmt_rated = $koneksi->prepare($sql_rated_by_user);
    if (!$stmt_rated) return []; // Gagal prepare
    $stmt_rated->bind_param("i", $target_user_id);
    $stmt_rated->execute();
    $result_rated = $stmt_rated->get_result();
    $rated_motor_ids = [];
    while($row = $result_rated->fetch_assoc()) {
        $rated_motor_ids[] = $row['id_motor'];
    }
    $stmt_rated->close();

    // Juga kecualikan motor yang sedang dilihat saat ini
    if (!in_array($current_motor_id, $rated_motor_ids)) {
        $rated_motor_ids[] = $current_motor_id;
    }
    
    if(empty($rated_motor_ids)) {
        // Jika user belum pernah merating motor lain, array kosong, jadi kita buat placeholder dummy
        $exclude_placeholders = '?';
        $rated_motor_ids = [0]; // nilai dummy yang tidak akan cocok dengan ID motor manapun
    } else {
        $exclude_placeholders = implode(',', array_fill(0, count($rated_motor_ids), '?'));
    }


    $sql_recs = "
        SELECT m.*, mi.nama_file as gambar, COUNT(DISTINCT ur.id_user) as popularity
        FROM user_motor_rating ur
        JOIN motor m ON ur.id_motor = m.id_motor
        LEFT JOIN motor_images mi ON m.id_motor = mi.id_motor AND mi.is_utama = 1
        WHERE ur.id_user IN ($placeholders_neighbors)
          AND ur.rating >= 4
          AND ur.id_motor NOT IN ($exclude_placeholders)
        GROUP BY m.id_motor
        ORDER BY popularity DESC, m.harga DESC
        LIMIT 3
    ";
    
    $params = array_merge($neighbor_ids, $rated_motor_ids);
    $types = str_repeat('i', count($params));

    $stmt_recs = $koneksi->prepare($sql_recs);
    if (!$stmt_recs) return []; // Gagal prepare
    $stmt_recs->bind_param($types, ...$params);
    $stmt_recs->execute();
    $result_recs = $stmt_recs->get_result();
    $recommendations = $result_recs->fetch_all(MYSQLI_ASSOC);
    $stmt_recs->close();

    return $recommendations;
}

?>