<?php
require __DIR__ . '/../header.php'; // Panggil header
require 'koneksi.php'; // Panggil koneksi

// Cek login & validasi ID dari URL
if (!isset($_SESSION['is_logged_in'])) {
    header("Location: ../index.php");
    exit();
}
$ids_string = $_GET['ids'] ?? '';
if (empty($ids_string)) { die("Tidak ada motor yang dipilih."); }
$id_array = array_map('intval', explode(',', $ids_string));
if (count($id_array) < 2) { die("Pilih minimal 2 motor untuk dibandingkan."); }

// Ambil data motor dari database
$placeholders = implode(',', array_fill(0, count($id_array), '?'));
$types = str_repeat('i', count($id_array));
$sql = "SELECT m.*, mi.nama_file AS gambar 
        FROM motor m
        LEFT JOIN motor_images mi ON m.id_motor = mi.id_motor AND mi.is_utama = 1
        WHERE m.id_motor IN ($placeholders)";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param($types, ...$id_array);
$stmt->execute();
$motors_to_compare = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Urutkan hasil agar sesuai dengan urutan pilihan pengguna
usort($motors_to_compare, function($a, $b) use ($id_array) {
    return array_search($a['id_motor'], $id_array) - array_search($b['id_motor'], $id_array);
});
?>

<section class="compare_section layout_padding">
    <div class="container-fluid"> <div class="heading_container heading_center">
            <h2>Perbandingan Head-to-Head</h2>
            <p>Lihat perbandingan spesifikasi lengkap dari motor pilihan Anda.</p>
        </div>

        <div class="row">
            <?php foreach ($motors_to_compare as $motor): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="compare-card">
                        <div class="compare-card-header">
                            <div class="compare-img-box">
                                <img src="../images/motor/<?php echo htmlspecialchars($motor['gambar'] ?? 'default.png'); ?>" alt="<?php echo htmlspecialchars($motor['model']); ?>">
                            </div>
                            <h3><?php echo htmlspecialchars($motor['merk']); ?></h3>
                            <h4><?php echo htmlspecialchars($motor['model']); ?></h4>
                            <p class="price">Rp <?php echo number_format($motor['harga']); ?></p>
                        </div>
                        <div class="compare-card-body">
                            <ul class="specs-list">
                                <li>
                                    <span>Tahun</span>
                                    <strong><?php echo htmlspecialchars($motor['tahun']); ?></strong>
                                </li>
                                <li>
                                    <span>Jenis Bodi</span>
                                    <strong><?php echo htmlspecialchars($motor['jenis_bodi']); ?></strong>
                                </li>
                                <li>
                                    <span>Kapasitas Mesin</span>
                                    <strong><?php echo htmlspecialchars($motor['cc']); ?> cc</strong>
                                </li>
                                <li>
                                    <span>Tenaga Kuda</span>
                                    <strong><?php echo htmlspecialchars($motor['tenaga_kuda']); ?></strong>
                                </li>
                                <li>
                                    <span>Torsi</span>
                                    <strong><?php echo htmlspecialchars($motor['torsi']); ?></strong>
                                </li>
                                <li>
                                    <span>Transmisi</span>
                                    <strong><?php echo htmlspecialchars($motor['transmisi']); ?></strong>
                                </li>
                            </ul>
                            <a href="detail_motor.php?id=<?php echo $motor['id_motor']; ?>" class="btn btn-detail-compare">Lihat Detail Lengkap</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
<div class="text-center mt-5">
    <a href="rekomendasi.php" class="btn btn-change-selection">
        <i class="fa fa-pencil"></i> Ubah Pilihan Motor
    </a>
</div>
    </div>
</section>

<?php require __DIR__ . '/../footer.php'; ?>