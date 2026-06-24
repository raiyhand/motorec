<?php
// Langkah 1: Panggil header dan koneksi
require __DIR__ . '/../header.php';
require 'koneksi.php';
require 'rekomendasi_engine.php'; // Panggil file engine rekomendasi
require_once '../includes/rekomendasi_hybrid.php'; // Panggil fungsi


// Langkah 2: Validasi ID motor dari URL
$id_motor = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id_motor) {
    header("Location: ../index.php");
    exit();
}

// Langkah 3: Ambil semua data motor utama dari database
$stmt_motor = $koneksi->prepare("SELECT * FROM motor WHERE id_motor = ?");
$stmt_motor->bind_param("i", $id_motor);
$stmt_motor->execute();
$result_motor = $stmt_motor->get_result();

if ($result_motor->num_rows === 0) {
    http_response_code(404);
    echo "Halaman tidak ditemukan. Motor dengan ID tersebut tidak ada.";
    exit();
}
$motor = $result_motor->fetch_assoc();
$stmt_motor->close();

// Langkah 4: Ambil semua data gambar untuk galeri
$stmt_images = $koneksi->prepare("SELECT nama_file FROM motor_images WHERE id_motor = ?");
$stmt_images->bind_param("i", $id_motor);
$stmt_images->execute();
$result_images = $stmt_images->get_result();
$gambar_array = [];
while ($row = $result_images->fetch_assoc()) {
    $gambar_array[] = $row['nama_file'];
}
$stmt_images->close();
$gambar_utama = !empty($gambar_array[0]) ? $gambar_array[0] : 'default.png';

// Langkah 5: Ambil data rating agregat
$stmt_agg = $koneksi->prepare("SELECT AVG(rating) as avg_rating, COUNT(id_rating) as total_ratings FROM user_motor_rating WHERE id_motor = ?");
$stmt_agg->bind_param("i", $id_motor);
$stmt_agg->execute();
$agg_rating = $stmt_agg->get_result()->fetch_assoc();
$stmt_agg->close();
$avg_rating = round($agg_rating['avg_rating'] ?? 0, 1);
$total_ratings = $agg_rating['total_ratings'] ?? 0;
$rating_percentage = ($avg_rating / 5) * 100;

// Langkah 6: Ambil data spesifik pengguna (jika login)
$user_rating = null;
$user_favorites_ids = [];
$collaborative_recommendations = [];
if (isset($_SESSION['is_logged_in'])) {
    $id_user = $_SESSION['user_id'];
    
    // Ambil rating user ini
    $stmt_user_rating = $koneksi->prepare("SELECT rating FROM user_motor_rating WHERE id_user = ? AND id_motor = ?");
    $stmt_user_rating->bind_param("ii", $id_user, $id_motor);
    $stmt_user_rating->execute();
    $user_rating_result = $stmt_user_rating->get_result()->fetch_assoc();
    $user_rating = $user_rating_result['rating'] ?? null;
    $stmt_user_rating->close();

    // Ambil semua motor favorit user
    $stmt_favs = $koneksi->prepare("SELECT id_motor FROM user_favorites WHERE id_user = ?");
    $stmt_favs->bind_param("i", $id_user);
    $stmt_favs->execute();
    $result_favs = $stmt_favs->get_result();
    while ($row = $result_favs->fetch_assoc()) { $user_favorites_ids[] = $row['id_motor']; }
    $stmt_favs->close();
    
    // Panggil fungsi collaborative filtering
    $collaborative_recommendations = getCollaborativeRecommendations($id_user, $id_motor, $koneksi);
}
$is_favorited = in_array($id_motor, $user_favorites_ids);

// Langkah 7: Ambil motor sejenis (berbasis konten)
$sql_similar = "SELECT m.*, mi.nama_file as gambar FROM motor m LEFT JOIN motor_images mi ON m.id_motor = mi.id_motor AND mi.is_utama = 1 WHERE m.jenis_bodi = ? AND m.id_motor != ? ORDER BY RAND() LIMIT 3";
$stmt_similar = $koneksi->prepare($sql_similar);
$stmt_similar->bind_param("si", $motor['jenis_bodi'], $id_motor);
$stmt_similar->execute();
$similar_motors = $stmt_similar->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt_similar->close();

$koneksi->close();
?>

    <section class="detail_section layout_padding">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="rekomendasi.php">Rekomendasi</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($motor['model']); ?></li>
                </ol>
            </nav>

            <div class="row">
<div class="product-gallery">
    <?php
        $gambar_utama = !empty($gambar_array[0]) ? trim($gambar_array[0]) : 'default.png';
    ?>
    <div class="main-image-container">
        <img src="../images/motor/<?php echo htmlspecialchars($gambar_utama); ?>" alt="<?php echo htmlspecialchars($motor['model']); ?>" id="main-product-image" style="cursor: zoom-in;">
    </div>
    
    <?php if (count($gambar_array) > 1): ?>
        <div class="thumbnail-container">
            <?php foreach ($gambar_array as $g): ?>
                <div class="thumbnail-item">
                    <img src="../images/motor/<?php echo htmlspecialchars(trim($g)); ?>" alt="Thumbnail" class="img-thumbnail gallery-thumb">
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div id="lightgallery-data" style="display:none;">
        <?php foreach ($gambar_array as $g): ?>
            <a href="../images/motor/<?php echo htmlspecialchars(trim($g)); ?>">
                <img src="../images/motor/<?php echo htmlspecialchars(trim($g)); ?>">
            </a>
        <?php endforeach; ?>
    </div>
</div>

                <div class="col-lg-6">
<div class="detail-box-main">
    <div class="title-wrapper">
        <h2 class="motor-title"><?php echo htmlspecialchars($motor['merk'] . ' ' . $motor['model']); ?></h2>
        <button class="favorite-btn <?php if ($is_favorited) echo 'favorited'; ?>" data-motor-id="<?php echo $motor['id_motor']; ?>">
            <i class="fa <?php echo $is_favorited ? 'fa-heart' : 'fa-heart-o'; ?>"></i>
        </button>
    </div>
    <h3 class="price">Rp <?php echo number_format($motor['harga'], 0, ',', '.'); ?></h3>

    <div class="aggregate-rating">
        <div class="stars-outer">
            <div class="stars-inner" style="width: <?php echo $rating_percentage; ?>%;"></div>
        </div>
        <span class="rating-text">
            <strong><?php echo $avg_rating; ?></strong> (<?php echo $total_ratings; ?> ratings)
        </span>
    </div>
                        
    
<div class="rating-section">
    <h4>Beri Rating Anda</h4>
    <?php if (isset($_SESSION['is_logged_in'])): ?>

        <div id="rating-notice" class="form-notice"></div>

        <form id="rating-form" method="POST">
            <input type="hidden" name="id_motor" value="<?php echo $motor['id_motor']; ?>">
            <input type="hidden" name="rating" id="rating-value" value="<?php echo $user_rating ?? 0; ?>">
            
            <div class="rating-stars-widget <?php if ($user_rating) echo 'rated'; ?>" data-rating="<?php echo $user_rating ?? 0; ?>">
                <i class="fa fa-star" data-value="1"></i>
                <i class="fa fa-star" data-value="2"></i>
                <i class="fa fa-star" data-value="3"></i>
                <i class="fa fa-star" data-value="4"></i>
                <i class="fa fa-star" data-value="5"></i>
            </div>

<div class="rating-buttons mt-3">
    <button type="submit" class="btn btn-primary btn-sm" <?php if ($user_rating) echo 'style="display:none;"'; ?>>Kirim Rating</button>
    
    <button type="button" id="ubah-rating-btn" class="btn btn-secondary btn-sm" <?php if (!$user_rating) echo 'style="display:none;"'; ?>>Ubah Rating</button>

    <button type="button" id="hapus-rating-btn" class="btn btn-danger btn-sm" style="display:none;">Hapus Rating</button>
</div>
        </form>
        
    <?php else: ?>
        <p>Silahkan <a href="#" data-toggle="modal" data-target="#authModal">login</a> untuk memberikan rating.</p>
    <?php endif; ?>
</div>

            <div class="row">
                <div class="col-12">
                    <div class="specs-tabs-container">
                        <h3 class="specs-title">Spesifikasi Lengkap</h3>
                        <table class="table table-striped specs-table">
                            <tbody>
                                <tr><td><strong>Merk</strong></td><td><?php echo htmlspecialchars($motor['merk']); ?></td></tr>
                                <tr><td><strong>Model</strong></td><td><?php echo htmlspecialchars($motor['model']); ?></td></tr>
                                <tr><td><strong>Tahun</strong></td><td><?php echo htmlspecialchars($motor['tahun']); ?></td></tr>
                                <tr><td><strong>Jenis Bodi</strong></td><td><?php echo htmlspecialchars($motor['jenis_bodi']); ?></td></tr>
                                <tr><td><strong>Kapasitas Mesin</strong></td><td><?php echo htmlspecialchars($motor['cc']); ?> cc</td></tr>
                                <tr><td><strong>Jumlah Silinder</strong></td><td><?php echo htmlspecialchars($motor['jumlah_silinder']); ?></td></tr>
                                <tr><td><strong>Jenis Mesin</strong></td><td><?php echo htmlspecialchars($motor['jenis_mesin']); ?></td></tr>
                                <tr><td><strong>Tenaga Kuda</strong></td><td><?php echo htmlspecialchars($motor['tenaga_kuda']); ?></td></tr>
                                <tr><td><strong>Torsi</strong></td><td><?php echo htmlspecialchars($motor['torsi']); ?></td></tr>
                                <tr><td><strong>Transmisi</strong></td><td><?php echo htmlspecialchars($motor['transmisi']); ?></td></tr>
                                <tr><td><strong>Negara Asal</strong></td><td><?php echo htmlspecialchars($motor['negara_asal']); ?></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>

<?php if (!empty($similar_motors)): ?>
<section class="food_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container animate-on-scroll">
      <h2>Motor Sejenis Lainnya</h2>
    </div>
<div class="row grid animate-on-scroll">
    <?php foreach ($similar_motors as $sim_motor): ?>
        <?php
          // Cek status favorit untuk kartu motor ini
          $is_sim_favorited = in_array($sim_motor['id_motor'], $user_favorites_ids);
        ?>
        <div class="col-sm-6 col-lg-4 all">
            <div class="box">
                <div class="img-box">
                    <img src="../images/motor/<?php echo htmlspecialchars($sim_motor['gambar'] ?? 'default.png'); ?>" alt="<?php echo htmlspecialchars($sim_motor['model']); ?>">
                </div>
                <div class="detail-box">
                    <h5><?php echo htmlspecialchars($sim_motor['merk'] . ' ' . $sim_motor['model']); ?></h5>
                    <p>Tipe: <?php echo htmlspecialchars($sim_motor['jenis_bodi']); ?> | CC: <?php echo htmlspecialchars($sim_motor['cc']); ?></p>

                    <div class="compare-action">
                        <input 
                            type="checkbox" 
                            class="compare-checkbox" 
                            data-motor-id="<?php echo $sim_motor['id_motor']; ?>" 
                            data-motor-name="<?php echo htmlspecialchars($sim_motor['merk'] . ' ' . $sim_motor['model']); ?>" 
                            data-motor-image="../images/motor/<?php echo htmlspecialchars($sim_motor['gambar'] ?? 'default.png'); ?>"
                        >
                        <label>Bandingkan</label>
                    </div>

                    <div class="options">
                        <h6>Rp <?php echo number_format($sim_motor['harga'], 0, ',', '.'); ?></h6>
                        <div class="action-buttons">
                            <button class="favorite-btn card-favorite-btn <?php if ($is_sim_favorited) echo 'favorited'; ?>" 
                                    data-motor-id="<?php echo $sim_motor['id_motor']; ?>" 
                                    title="Tambahkan ke Favorit">
                                <i class="fa <?php echo $is_sim_favorited ? 'fa-heart' : 'fa-heart-o'; ?>"></i>
                            </button>
                            <a href="detail_motor.php?id=<?php echo $sim_motor['id_motor']; ?>" class="info-btn" title="Lihat Detail">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
  </div>
</section>
<?php endif; ?>

<?php 
// Jika collaborative filtering tidak menghasilkan apa-apa, kita tampilkan motor terpopuler sebagai gantinya
if (empty($collaborative_recommendations) && isset($_SESSION['is_logged_in'])) {
    
    // Fallback: Ambil 3 motor dengan rating rata-rata tertinggi
    $koneksi = new mysqli("localhost", "root", "", "motorec_db"); // Buka koneksi lagi
    $sql_fallback = "SELECT m.*, mi.nama_file as gambar, AVG(umr.rating) as avg_rating
                     FROM motor m
                     JOIN user_motor_rating umr ON m.id_motor = umr.id_motor
                     LEFT JOIN motor_images mi ON m.id_motor = mi.id_motor AND mi.is_utama = 1
                     WHERE m.id_motor != ?
                     GROUP BY m.id_motor
                     ORDER BY avg_rating DESC, COUNT(umr.id_rating) DESC
                     LIMIT 3";
    $stmt_fallback = $koneksi->prepare($sql_fallback);
    $stmt_fallback->bind_param("i", $id_motor);
    $stmt_fallback->execute();
    $collaborative_recommendations = $stmt_fallback->get_result()->fetch_all(MYSQLI_ASSOC);
    $koneksi->close();
    $fallback_title = "Motor Terpopuler Lainnya"; // Judul berbeda untuk fallback
} else {
    $fallback_title = "Pengguna Lain Juga Suka";
}

if (!empty($collaborative_recommendations)): 
?>
<section class="food_section layout_padding-bottom">
    <div class="container">
        <div class="heading_container">
            <h2><?php echo $fallback_title; ?></h2>
        </div>
        <div class="row grid">
            <?php foreach ($collaborative_recommendations as $rec_motor): ?>
                <?php
                  $is_rec_favorited = in_array($rec_motor['id_motor'], $user_favorites_ids);
                ?>
                <div class="col-sm-6 col-lg-4 all">
                    <div class="box">
                        <div class="img-box">
                            <img src="../images/motor/<?php echo htmlspecialchars($rec_motor['gambar'] ?? 'default.png'); ?>" alt="<?php echo htmlspecialchars($rec_motor['model']); ?>">
                        </div>
                        <div class="detail-box">
                            <h5><?php echo htmlspecialchars($rec_motor['merk'] . ' ' . $rec_motor['model']); ?></h5>
                            <div class="options">
                                <h6>Rp <?php echo number_format($rec_motor['harga'], 0, ',', '.'); ?></h6>
                                <div class="action-buttons">
                                    <button class="favorite-btn card-favorite-btn <?php if ($is_rec_favorited) echo 'favorited'; ?>" data-motor-id="<?php echo $rec_motor['id_motor']; ?>">
                                        <i class="fa <?php echo $is_rec_favorited ? 'fa-heart' : 'fa-heart-o'; ?>"></i>
                                    </button>
                                    <a href="detail_motor.php?id=<?php echo $rec_motor['id_motor']; ?>" class="info-btn">
                                        <i class="fa fa-info-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>
<?php 
endif; 
// AKHIR DARI BAGIAN REKOMENDASI BARU
?>

  <!-- footer-->
    <?php require __DIR__ . '/../footer.php'; ?>
  <!--end footer-->
</body>
</html>