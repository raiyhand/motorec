<?php
session_start();
require 'koneksi.php';

// 1. Pastikan user login
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}
$id_user = $_SESSION['user_id'];

// 2. (BARU) Cek apakah pengguna ingin menampilkan semua motor
$show_all = isset($_GET['show']) && $_GET['show'] === 'all';

// 3. Logika Paginasi (Hanya berjalan jika tidak menampilkan semua)
$item_per_halaman = 9;
$total_halaman = 0;
$halaman_saat_ini = 1;
$offset = 0;

if (!$show_all) {
    $halaman_saat_ini = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) ?: 1;
    $offset = ($halaman_saat_ini - 1) * $item_per_halaman;
}

// 4. Ambil Kriteria Pencarian dari URL (tetap sama)
$budget = filter_input(INPUT_GET, 'budget', FILTER_VALIDATE_INT) ?: 9999999999;
$merk = trim(filter_input(INPUT_GET, 'merk', FILTER_SANITIZE_STRING) ?? '');
$jenis_bodi = trim(filter_input(INPUT_GET, 'jenis_bodi', FILTER_SANITIZE_STRING) ?? '');
$cc_range = trim(filter_input(INPUT_GET, 'cc_range', FILTER_SANITIZE_STRING) ?? '');
$prioritas = trim(filter_input(INPUT_GET, 'prioritas', FILTER_SANITIZE_STRING) ?? 'performa');

// 5. Bangun bagian WHERE dari Query (tetap sama)
$where_clause = " WHERE m.harga <= ?";
$params = [$budget];
$types = "i";

if (!empty($merk)) { $where_clause .= " AND m.merk = ?"; $params[] = $merk; $types .= "s"; }
if (!empty($jenis_bodi)) { $where_clause .= " AND m.jenis_bodi = ?"; $params[] = $jenis_bodi; $types .= "s"; }
if (!empty($cc_range)) { 
    list($min_cc, $max_cc) = explode('-', $cc_range);
    $where_clause .= " AND m.cc BETWEEN ? AND ?";
    $params[] = (int)$min_cc; $params[] = (int)$max_cc;
    $types .= "ii";
}

// 6. Query untuk MENGHITUNG TOTAL DATA (untuk paginasi)
$sql_count = "SELECT COUNT(m.id_motor) as total FROM motor m" . $where_clause;
$stmt_count = $koneksi->prepare($sql_count);
$stmt_count->bind_param($types, ...$params);
$stmt_count->execute();
$total_motor = $stmt_count->get_result()->fetch_assoc()['total'];
if (!$show_all) {
    $total_halaman = ceil($total_motor / $item_per_halaman);
}
$stmt_count->close();

// 7. Query untuk MENGAMBIL DATA MOTOR
$sql_data = "SELECT m.*, mi.nama_file as gambar, CAST(SUBSTRING_INDEX(m.tenaga_kuda, ' ', 1) AS DECIMAL(5,1)) AS hp 
             FROM motor m 
             LEFT JOIN motor_images mi ON m.id_motor = mi.id_motor AND mi.is_utama = 1" . $where_clause;

// Tambahkan ORDER BY (tetap sama)
$orderBy = " ORDER BY ";
switch ($prioritas) {
    case 'harga_terendah': $orderBy .= "harga ASC"; break;
    case 'harga_tertinggi': $orderBy .= "harga DESC"; break;
    case 'tahun_terbaru': $orderBy .= "tahun DESC"; break;
    case 'cc_tertinggi': $orderBy .= "cc DESC"; break;
    default: $orderBy .= "hp DESC"; break;
}
$sql_data .= $orderBy;

// HANYA tambahkan LIMIT & OFFSET jika tidak dalam mode "show all"
if (!$show_all) {
    $sql_data .= " LIMIT ? OFFSET ?";
    $params[] = $item_per_halaman;
    $params[] = $offset;
    $types .= "ii";
}

$stmt_data = $koneksi->prepare($sql_data);
if ($stmt_data) {
    $stmt_data->bind_param($types, ...$params);
    $stmt_data->execute();
    $motors = $stmt_data->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt_data->close();
} else {
    die("Error pada query data: " . $koneksi->error);
}

// 2. Ambil daftar motor favorit pengguna untuk status tombol 'love'
$user_favorites_ids = [];
$sql_favs = "SELECT id_motor FROM user_favorites WHERE id_user = ?";
$stmt_favs = $koneksi->prepare($sql_favs);
$stmt_favs->bind_param("i", $id_user);
$stmt_favs->execute();
$result_favs = $stmt_favs->get_result();
while ($row = $result_favs->fetch_assoc()) {
    $user_favorites_ids[] = $row['id_motor'];
}
$stmt_favs->close();

$koneksi->close();

require __DIR__ . '/../header.php'; // Panggil header setelah semua data siap
?>


<section class="food_section layout_padding">
    <div class="container">
<div class="heading_container heading_center">
    <h2>Hasil Rekomendasi</h2>
    <p>
        Menampilkan <strong><?php echo count($motors); ?></strong> motor diurutkan berdasarkan <strong><?php echo htmlspecialchars(ucfirst($prioritas)); ?></strong>.
    </p>
</div>

        <div class="filters_menu sort-button-group">
            <button class="btn btn-light" data-sort-direction="desc">Tertinggi &darr;</button>
            <button class="btn btn-light" data-sort-direction="asc">Terendah &uarr;</button>
        </div>

        <?php if (count($motors) > 0): ?>
            <div class="row grid animate-on-scroll">
                <?php foreach ($motors as $motor): ?>
                    <?php $is_card_favorited = in_array($motor['id_motor'], $user_favorites_ids); ?>
                    <div class="col-sm-6 col-lg-4 all" 
                         data-harga="<?php echo $motor['harga']; ?>"
                         data-performa="<?php echo $motor['hp']; ?>"
                         data-tahun="<?php echo $motor['tahun']; ?>"
                         data-cc="<?php echo $motor['cc']; ?>">
<div class="box">
    <div class="img-box">
        <img src="../images/motor/<?php echo htmlspecialchars($motor['gambar'] ?? 'default.png'); ?>" alt="<?php echo htmlspecialchars($motor['model']); ?>">
    </div>
    <div class="detail-box">
        <h5><?php echo htmlspecialchars($motor['merk'] . ' ' . $motor['model']); ?></h5>
        <p>Tipe: <?php echo htmlspecialchars($motor['jenis_bodi']); ?> | CC: <?php echo htmlspecialchars($motor['cc']); ?></p>
        
<div class="compare-action">
    <input 
        type="checkbox" 
        class="compare-checkbox" 
        data-motor-id="<?php echo $motor['id_motor']; ?>" 
        data-motor-name="<?php echo htmlspecialchars($motor['merk'] . ' ' . $motor['model']); ?>" 
        data-motor-image="../images/motor/<?php echo htmlspecialchars($motor['gambar'] ?? 'default.png'); ?>"
    >
    <label>Bandingkan</label>
</div>

        <div class="options">
            <h6>Rp <?php echo number_format($motor['harga'], 0, ',', '.'); ?></h6>
                                    <div class="action-buttons">
                                        <button class="favorite-btn card-favorite-btn <?php if ($is_card_favorited) echo 'favorited'; ?>" data-motor-id="<?php echo $motor['id_motor']; ?>" title="Tambahkan ke Favorit">
                                            <i class="fa <?php echo $is_card_favorited ? 'fa-heart' : 'fa-heart-o'; ?>"></i>
                                        </button>
                                        <a href="detail_motor.php?id=<?php echo $motor['id_motor']; ?>" class="info-btn" title="Lihat Detail">
                                            <i class="fa fa-info-circle" aria-hidden="true"></i>
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
                        <h4>Maaf, Tidak Ditemukan Motor yang Sesuai</h4>
                        <p>Coba ubah atau perluas kriteria pencarian Anda.</p>
                        <a href="rekomendasi.php" class="btn btn-primary mt-3 btn-primary-custom">Kembali ke Pencarian</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div> 
<div class="pagination-container">
    <ul class="pagination">
        <?php
            // Buat salinan dari semua parameter GET saat ini
            $queryParams = $_GET;

            // Logika hanya menampilkan nomor halaman jika tidak dalam mode "show all"
            if (!$show_all && $total_halaman > 1):
        ?>
            <?php if ($halaman_saat_ini > 1):
                $queryParams['page'] = $halaman_saat_ini - 1;
            ?>
                <li class="page-item"><a class="page-link" href="?<?php echo http_build_query($queryParams); ?>">Sebelumnya</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_halaman; $i++):
                $queryParams['page'] = $i;
            ?>
                <li class="page-item <?php if ($i == $halaman_saat_ini) echo 'active'; ?>">
                    <a class="page-link" href="?<?php echo http_build_query($queryParams); ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            
            <?php if ($halaman_saat_ini < $total_halaman):
                $queryParams['page'] = $halaman_saat_ini + 1;
            ?>
                <li class="page-item"><a class="page-link" href="?<?php echo http_build_query($queryParams); ?>">Berikutnya</a></li>
            <?php endif; ?>
        <?php 
            endif; // Akhir dari if (!$show_all)

            // Logika untuk menampilkan tombol "Tampilkan Semua" atau "Gunakan Paginasi"
            $queryParams['page'] = 1; // Selalu reset ke halaman 1
            if ($show_all):
                unset($queryParams['show']); // Hapus parameter 'show' untuk kembali ke mode paginasi
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
// Panggil footer terpusat
require __DIR__ . '/../footer.php'; 
?>