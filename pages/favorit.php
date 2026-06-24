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

// Query untuk MENGHITUNG TOTAL motor favorit
$sql_count = "SELECT COUNT(*) as total FROM user_favorites WHERE id_user = ?";
$stmt_count = $koneksi->prepare($sql_count);
$stmt_count->bind_param("i", $id_user);
$stmt_count->execute();
$total_motor = $stmt_count->get_result()->fetch_assoc()['total'];
if (!$show_all) {
    $total_halaman = ceil($total_motor / $item_per_halaman);
}
$stmt_count->close();

// Query untuk MENGAMBIL DATA
$sql = "SELECT m.*, mi.nama_file as gambar 
        FROM motor m
        INNER JOIN user_favorites uf ON m.id_motor = uf.id_motor
        LEFT JOIN motor_images mi ON m.id_motor = mi.id_motor AND mi.is_utama = 1
        WHERE uf.id_user = ?
        ORDER BY uf.created_at DESC";

// HANYA tambahkan LIMIT & OFFSET jika tidak menampilkan semua
if (!$show_all) {
    $sql .= " LIMIT ? OFFSET ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("iii", $id_user, $item_per_halaman, $offset);
} else {
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_user);
}

$stmt->execute();
$favorite_motors = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$koneksi->close();
?>

<section class="food_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Motor Favorit Anda</h2>
            <p>
                Menampilkan <strong><?php echo count($favorite_motors); ?></strong> motor dari daftar favorit Anda.
            </p>
        </div>

        <?php if (count($favorite_motors) > 0): ?>
            
            <div class="row grid animate-on-scroll">
                <?php foreach ($favorite_motors as $motor): ?>
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
                                        <button class="favorite-btn card-favorite-btn favorited" data-motor-id="<?php echo $motor['id_motor']; ?>" title="Hapus dari Favorit">
                                            <i class="fa fa-heart"></i>
                                        </button>
                                        <a href="detail_motor.php?id=<?php echo $motor['id_motor']; ?>" class="info-btn" title="Lihat Detail"><i class="fa fa-info-circle"></i></a>
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
                        <h4>Anda Belum Memiliki Motor Favorit</h4>
                        <p>Silakan jelajahi dan tekan tombol hati pada motor yang Anda sukai.</p>
                        <a href="rekomendasi.php" class="btn btn-primary mt-3">Cari Rekomendasi Sekarang</a>
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