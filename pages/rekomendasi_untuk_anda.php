<?php
session_start();
require 'koneksi.php';
require 'rekomendasi_engine.php'; // Panggil file engine kita

// Pastikan hanya user yang sudah login yang bisa akses
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$recommended_ids = getCollaborativeRecommendations($user_id, $koneksi);
$motors = [];

if (!empty($recommended_ids)) {
    $placeholders = implode(',', array_fill(0, count($recommended_ids), '?'));
    $sql_motors = "SELECT * FROM motor WHERE id_motor IN ($placeholders)";
    $stmt_motors = $koneksi->prepare($sql_motors);
    $stmt_motors->bind_param(str_repeat('i', count($recommended_ids)), ...$recommended_ids);
    $stmt_motors->execute();
    $result_motors = $stmt_motors->get_result();
    $motors = $result_motors->fetch_all(MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rekomendasi Untuk Anda - MotoRec</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link href="../css/style.css" rel="stylesheet" />
</head>
<body class="sub_page">
    <div class="hero_area">
        <div class="bg-box"><img src="../images/hero-bg.jpg" alt=""></div>
        </div>

    <section class="food_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Rekomendasi Spesial Untuk Anda</h2>
                <p>Berdasarkan kemiripan selera dengan pengguna lain, berikut motor yang mungkin Anda sukai.</p>
            </div>

            <div class="row grid">
                <?php if (count($motors) > 0): ?>
                    <?php foreach ($motors as $motor): ?>
                        <div class="col-sm-6 col-lg-4 all">
                            <div class="box">
                                <div class="img-box">
                                    <img src="../images/<?php echo htmlspecialchars($motor['gambar']); ?>" alt="...">
                                </div>
                                <div class="detail-box">
                                    <h5><?php echo htmlspecialchars($motor['merk'] . ' ' . $motor['nama_motor']); ?></h5>
                                    <div class="options">
                                        <h6>Rp <?php echo number_format($motor['harga'], 0, ',', '.'); ?></h6>
                                        <a href="#"><i class="fa fa-info-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="no-result-box">
                            <h4>Belum Ada Rekomendasi</h4>
                            <p>Kami belum bisa memberikan rekomendasi. Coba berikan beberapa rating pada motor yang Anda ketahui untuk membantu kami mempelajari selera Anda.</p>
                            <a href="rekomendasi.php" class="btn btn-primary">Mulai Memberi Rating</a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    
    </body>
</html>