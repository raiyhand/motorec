<?php
require __DIR__ . '/../header.php';
require 'koneksi.php';

if (!isset($_SESSION['is_logged_in'])) { /* ... cek login ... */ }
$id_user = $_SESSION['user_id'];

// --- Pengecekan Baru untuk Tombol "Tampilkan Semua" ---
$show_all = isset($_GET['show']) && $_GET['show'] === 'all';

// --- LOGIKA PAGINASI (Hanya berjalan jika tidak menampilkan semua) ---
$item_per_halaman = 9;
$total_halaman = 0;
$halaman_saat_ini = 1;
if (!$show_all) {
    $halaman_saat_ini = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) ?: 1;
    $offset = ($halaman_saat_ini - 1) * $item_per_halaman;
}


// =============================================================
// BAGIAN YANG HILANG - Ambil SEMUA ID motor yang difavoritkan user
// =============================================================
$user_favorites_ids = [];
$sql_all_favs = "SELECT id_motor FROM user_favorites WHERE id_user = ?";
$stmt_all_favs = $koneksi->prepare($sql_all_favs);
$stmt_all_favs->bind_param("i", $id_user);
$stmt_all_favs->execute();
$result_all_favs = $stmt_all_favs->get_result();
while ($row = $result_all_favs->fetch_assoc()) {
    $user_favorites_ids[] = $row['id_motor'];
}
$stmt_all_favs->close();


// Query untuk MENGHITUNG TOTAL motor yang dirating
$sql_count = "SELECT COUNT(*) as total FROM user_motor_rating WHERE id_user = ?";
$stmt_count = $koneksi->prepare($sql_count);
$stmt_count->bind_param("i", $id_user);
$stmt_count->execute();
$total_motor = $stmt_count->get_result()->fetch_assoc()['total'];
if (!$show_all) {
    $total_halaman = ceil($total_motor / $item_per_halaman);
}
$stmt_count->close();

// Query untuk MENGAMBIL DATA
$sql_rated = "SELECT m.*, umr.rating, mi.nama_file as gambar 
              FROM motor m
              INNER JOIN user_motor_rating umr ON m.id_motor = umr.id_motor
              LEFT JOIN motor_images mi ON m.id_motor = mi.id_motor AND mi.is_utama = 1
              WHERE umr.id_user = ?
              ORDER BY umr.created_at DESC";

// HANYA tambahkan LIMIT & OFFSET jika tidak menampilkan semua
if (!$show_all) {
    $sql_rated .= " LIMIT ? OFFSET ?";
    $stmt_rated = $koneksi->prepare($sql_rated);
    $stmt_rated->bind_param("iii", $id_user, $item_per_halaman, $offset);
} else {
    $stmt_rated = $koneksi->prepare($sql_rated);
    $stmt_rated->bind_param("i", $id_user);
}

$stmt_rated->execute();
$rated_motors = $stmt_rated->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt_rated->close();
$koneksi->close();
?>

<section class="food_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Riwayat Rating Anda</h2>
            <p>
                Anda telah memberikan rating pada <strong><?php echo count($rated_motors); ?></strong> motor.
            </p>
        </div>

        <?php if (count($rated_motors) > 0): ?>
            
            <div class="row grid animate-on-scroll">
                <?php foreach ($rated_motors as $motor): ?>
                    <?php
                      // Cek apakah motor yang dirating ini juga ada di daftar favorit
                      $is_card_favorited = in_array($motor['id_motor'], $user_favorites_ids);
                    ?>
                    <div class="col-sm-6 col-lg-4 all">
<div class="box">
    <div class="img-box">
        <img src="../images/motor/<?php echo htmlspecialchars($motor['gambar'] ?? 'default.png'); ?>" alt="<?php echo htmlspecialchars($motor['model']); ?>">
    </div>
    <div class="detail-box">
        <h5><?php echo htmlspecialchars($motor['merk'] . ' ' . $motor['model']); ?></h5>
        <p>Tipe: <?php echo htmlspecialchars($motor['jenis_bodi']); ?> | CC: <?php echo htmlspecialchars($motor['cc']); ?></p>
        
        <div class="compare-action">
            <input type="checkbox" class="compare-checkbox" data-motor-id="<?php echo $motor['id_motor']; ?>" data-motor-name="<?php echo htmlspecialchars($motor['merk'] . ' ' . $motor['model']); ?>" data-motor-image="../images/motor/<?php echo htmlspecialchars($motor['gambar'] ?? 'default.png'); ?>">
            <label>Bandingkan</label>
        </div>

        <div class="options">
            <h6>Rp <?php echo number_format($motor['harga'], 0, ',', '.'); ?></h6>
                                    <div class="action-buttons">
                                        <button class="favorite-btn card-favorite-btn <?php if ($is_card_favorited) echo 'favorited'; ?>" 
                                                data-motor-id="<?php echo $motor['id_motor']; ?>" 
                                                title="Tambahkan/Hapus dari Favorit">
                                            <i class="fa <?php echo $is_card_favorited ? 'fa-heart' : 'fa-heart-o'; ?>"></i>
                                        </button>
                                        <a href="detail_motor.php?id=<?php echo $motor['id_motor']; ?>" class="info-btn" title="Lihat & Ubah Rating">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> <?php else: ?>
        
            <div class="row">
                <div class="col-12">
                    <div class="no-result-box">
                        <h4>Anda Belum Memberi Rating Apapun</h4>
                        <p>Silakan jelajahi motor dan berikan rating untuk membantu kami memberi rekomendasi.</p>
                        <a href="rekomendasi.php" class="btn btn-primary mt-3">Cari Motor Sekarang</a>
                    </div>
                </div>
            </div>

        <?php endif; ?>

<div class="pagination-container">
    <ul class="pagination">
        <?php
            $queryParams = $_GET;
            if (!$show_all && $total_halaman > 1):
        ?>
            <?php for ($i = 1; $i <= $total_halaman; $i++):
                $queryParams['page'] = $i;
            ?>
                <li class="page-item <?php if ($i == $halaman_saat_ini) echo 'active'; ?>">
                    <a class="page-link" href="?<?php echo http_build_query($queryParams); ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        <?php 
            endif;

            // Tombol "Tampilkan Semua" / "Gunakan Paginasi"
            $queryParams['page'] = 1;
            if ($show_all):
                unset($queryParams['show']);
        ?>
            <li class="page-item"><a class="page-link show-all-btn active" href="?<?php echo http_build_query($queryParams); ?>">Gunakan Paginasi</a></li>
        <?php elseif ($total_motor > $item_per_halaman):
                $queryParams['show'] = 'all';
        ?>
            <li class="page-item"><a class="page-link show-all-btn" href="?<?php echo http_build_query($queryParams); ?>">Tampilkan Semua (<?php echo $total_motor; ?>)</a></li>
        <?php endif; ?>
    </ul>
</div>
    </div>
</section>
<?php
// Panggil footer di paling bawah.
require __DIR__ . '/../footer.php';
?>