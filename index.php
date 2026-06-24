<?php 
require 'header.php'; 
require 'pages/koneksi.php'; // Panggil koneksi ke database
require_once 'includes/rekomendasi_hybrid.php';

// Query untuk mengambil 3 motor paling populer (Terpopuler Saat Ini)
$sql_populer = "SELECT m.*, mi.nama_file as gambar, COUNT(uf.id_motor) as total_favorit
                FROM motor m
                LEFT JOIN user_favorites uf ON m.id_motor = uf.id_motor
                LEFT JOIN motor_images mi ON m.id_motor = mi.id_motor AND mi.is_utama = 1
                GROUP BY m.id_motor
                ORDER BY total_favorit DESC
                LIMIT 3";

$result_populer = $koneksi->query($sql_populer);
$popular_motors = $result_populer->fetch_all(MYSQLI_ASSOC);


// ==========================================
// SECTION 1: REKOMENDASI SPESIAL UNTUK ANDA
// ==========================================

// Cek apakah user sudah login
if (isset($_SESSION['user_id'])) {
    
    // Hitung apakah user aktif ini sudah pernah memberikan rating di database
    $cek_rating = $koneksi->prepare("SELECT COUNT(*) as jumlah_rating FROM user_motor_rating WHERE id_user = ?");
    $cek_rating->bind_param("i", $_SESSION['user_id']);
    $cek_rating->execute();
    $hasil_cek = $cek_rating->get_result()->fetch_assoc();

    // Jika sudah pernah rating minimal 1 kali, panggil algoritma Hybrid (Collaborative Filtering)
    if ($hasil_cek['jumlah_rating'] > 0) {
        $items = getHybridRecommendation($_SESSION['user_id'], null, $koneksi);
    } else {
        $items = []; // Dipaksa kosong jika user benar-benar baru agar logis saat demo skripsi
    }

    // Tampilkan hanya jika ada data rekomendasi (Sudah lolos sensor akun baru)
    if (!empty($items)) : ?>
        <section class="offer_section layout_padding">
            <div class="container">
                <div class="heading_container heading_center animate-on-scroll">
                    <h2>
                        Rekomendasi Spesial Untuk Anda
                    </h2>
                </div>
                <div class="row">
                    <?php foreach ($items as $m) : ?>
                    <div class="col-md-6 col-lg-4">
                        <a href="pages/detail_motor.php?id=<?php echo $m['id_motor']; ?>" class="popular-card-link">
                            <div class="popular-card animate-on-scroll">
                                <div class="popular-card-img-container">
                                    <img src="images/motor/<?php echo htmlspecialchars($m['nama_file'] ?? 'default.png'); ?>" alt="<?php echo htmlspecialchars($m['nama_motor']); ?>">
                                </div>
                                <div class="popular-card-body animate-on-scroll">
                                    <h5><?php echo htmlspecialchars($m['nama_motor']); ?></h5>
                                    <?php if (isset($m['harga'])): ?>
                                        <p class="price">Rp <?php echo number_format($m['harga']); ?></p>
                                    <?php endif; ?>
                                    <div class="card-actions animate-on-scroll">
                                        <a href="pages/detail_motor.php?id=<?php echo $m['id_motor']; ?>" class="btn btn-sm btn-detail">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="offer_section layout_padding text-center">
            <div class="container animate-on-scroll">
                <div class="heading_container heading_center">
                    <h2>Rekomendasi Spesial Untuk Anda</h2>
                </div>
                <p class="text-muted mt-4">Silakan berikan penilaian/rating pada beberapa motor terlebih dahulu di halaman detail untuk mengaktifkan sistem rekomendasi personal Anda!</p>
            </div>
        </section>
    <?php endif;
}
?>
 <!-- offer section -->

<section class="offer_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container heading_center animate-on-scroll">
      <h2>
        Terpopuler Saat Ini
      </h2>
    </div>
    <div class="row">
    <?php foreach ($popular_motors as $motor): ?>
        <div class="col-md-6 col-lg-4">
            <a href="pages/detail_motor.php?id=<?php echo $motor['id_motor']; ?>" class="popular-card-link">
                <div class="popular-card animate-on-scroll">
                    <div class="popular-card-img-container">
                        <img src="images/motor/<?php echo htmlspecialchars($motor['gambar'] ?? 'default.png'); ?>" alt="<?php echo htmlspecialchars($motor['model']); ?>">
                    </div>
                    <div class="popular-card-body animate-on-scroll">
                        <h5><?php echo htmlspecialchars($motor['merk'] . ' ' . $motor['model']); ?></h5>
                        <p class="price">Rp <?php echo number_format($motor['harga']); ?></p>
                    <div class="card-actions animate-on-scroll">
                        <a href="pages/detail_motor.php?id=<?php echo $motor['id_motor']; ?>" class="btn btn-sm btn-detail">Lihat Detail</a>
                    </div>
                </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
  </div>
</section>

  <!-- end offer section -->



  <!-- about section -->

  <section class="about_section layout_padding"> <div class="container ">
    <div class="row">
      <div class="col-md-6 ">
        <div class="img-box animate-on-scroll"> <img src="images/about-img.png" alt="Motorcycle" class="moto-hero-image">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container animate-on-scroll"> <h2>
              Ini Adalah MotoRec
            </h2>
          </div>
          <p class="animate-on-scroll"> Lebih dari sekadar sistem rekomendasi, kami adalah teman perjalananmu dalam menemukan motor impian.
            Dengan menggabungkan teknologi cerdas dan sentuhan personal, MotoRec hadir untuk membantumu memilih kendaraan yang paling cocok dengan gaya hidup, kebutuhan, dan karakter unikmu.
            Karena setiap pengendara punya cerita, dan setiap motor punya tujuan.
          </p>
          <a href="about.php" class="animate-on-scroll"> Baca Selanjutnya
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- end about section -->

  <!-- book section -->
<section class="book_section layout_padding">
    <div class="container animate-on-scroll">
        <div class="heading_container ">
            <h2>Umpan Balik</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form_container">
<form action="pages/proses_umpan_balik.php" method="POST">
    <?php if (isset($_SESSION['is_logged_in'])): ?>
        <div>
            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?>" readonly>
        </div>
        <div>
            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" readonly>
        </div>
        <div>
            <input type="text" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon (Opsional)">
        </div>
    <?php endif; ?>

    <div>
        <select name="subjek" class="form-control nice-select wide" required>
            <option value="" disabled selected>Subjek Masukan</option>
            <option value="saran">Saran</option>
            <option value="bug">Laporan Bug</option>
        </select>
    </div>
    <div>
        <textarea name="pesan" class="form-control" placeholder="Isi Pesan Anda di sini..." rows="5" required></textarea>
    </div>
    
    <div class="btn_box mt-3">
        <?php if (isset($_SESSION['is_logged_in'])): ?>
            <button type="submit">Kirim Umpan Balik</button>
        <?php else: ?>
            <button type="button" class="btn-login-trigger">Kirim (Login Diperlukan)</button>
        <?php endif; ?>
    </div>
</form>
                </div>
            </div>

      <div class="col-md-6">
        <div class="map_container animate-on-scroll"> 
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7921.8642750280005!2d107.6311268412903!3d-6.8987200224019425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7bc68e2e737%3A0x194e40758d7a919!2sUniversitas%20Sangga%20Buana%20YPKP!5e0!3m2!1sid!2sid!4v1751116583755!5m2!1sid!2sid"
           width="600" 
           height="450" 
           style="border:0;" 
           allowfullscreen="" 
           loading="lazy" 
           referrerpolicy="no-referrer-when-downgrade"></iframe>
          </iframe>
        </div>         
      </div>
    </div>
  </div>
</section>
  <!-- end book section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container animate-on-scroll">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>
          Komentar Dari Kustomer
        </h2>
      </div>
      <div class="carousel-wrap row ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Pelayanan di sini benar-benar memukau! Setiap detail diperhatikan, membuat saya merasa sangat nyaman dan dihargai sebagai pelanggan. Rekomendasi yang diberikan juga selalu tepat sasaran. Luar biasa!
                </p>
                <h6>
                  Rachel Florencia
                </h6>
                <p>
                  artis
                </p>
              </div>
              <div class="img-box">
                <img src="images/client1.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Efisiensi adalah kunci. Tempat ini tahu bagaimana memberikan apa yang dibutuhkan, tanpa basa-basi. Produknya andal, pelayanannya cepat dan tanpa cela. Saya menghargai ketepatan mereka.
                </p>
                <h6>
                  John Wick
                </h6>
                <p>
                  veteran
                </p>
              </div>
              <div class="img-box">
                <img src="images/client2.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Sebagai seorang yang bergerak di industri kreatif, saya sangat menghargai inovasi dan kualitas. Produk dan layanan di sini tidak pernah mengecewakan. Selalu ada yang baru dan inspiratif!
                </p>
                <h6>
                  Ana de Armas
                </h6>
                <p>
                  aktris
                </p>
              </div>
              <div class="img-box">
                <img src="images/client3.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Dalam dunia bisnis, saya selalu mencari yang terbaik dan paling strategis. Produk dan layanan dari tempat ini menawarkan nilai yang tak tertandingi dan membantu saya membuat keputusan yang cerdas. Sangat direkomendasikan untuk siapa pun yang serius dalam berinvestasi.
                </p>
                <h6>
                  Bruce Wayne
                </h6>
                <p>
                  wirausahawan
                </p>
              </div>
              <div class="img-box">
                <img src="images/client4.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Sebagai seorang ilmuwan, saya sangat menghargai presisi dan analisis data. MotoRec menyediakan rekomendasi yang sangat akurat, membantu saya menemukan motor dengan spesifikasi teknis yang sempurna.
                </p>
                <h6>
                  Walter White
                </h6>
                <p>
                  ilmuwan
                </p>
              </div>
              <div class="img-box">
                <img src="images/client5.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Dalam ring, saya mengutamakan kekuatan dan ketahanan. MotoRec memberikan rekomendasi motor yang tangguh dan dapat diandalkan, cocok untuk kebutuhan mobilitas saya yang menuntut.
                </p>
                <h6>
                  Mike Tyson
                </h6>
                <p>
                  petinju
                </p>
              </div>
              <div class="img-box">
                <img src="images/client6.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Sebagai seorang atlet, performa adalah segalanya. MotoRec membantu saya menemukan motor yang lincah dan responsif, sangat mendukung gaya hidup aktif saya. Inovasi dan kualitasnya juara!
                </p>
                <h6>
                  Jacquelyn Chandra
                </h6>
                <p>
                  atlet
                </p>
              </div>
              <div class="img-box">
                <img src="images/client7.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Sebagai seorang penyanyi, saya mencari koneksi dan kebebasan dalam setiap melodi. MotoRec membantu saya menemukan motor yang tidak hanya keren, tetapi juga memberikan pengalaman berkendara yang inspiratif.
                </p>
                <h6>
                  Tyler Joseph
                </h6>
                <p>
                  penyanyi
                </p>
              </div>
              <div class="img-box">
                <img src="images/client8.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Sebagai seorang aktris, saya menghargai autentisitas dan detail. MotoRec memberikan rekomendasi motor yang sangat personal dan sesuai dengan gaya saya. Pengalaman yang luar biasa dan tanpa drama!
                </p>
                <h6>
                  Jennifer Lawrence
                </h6>
                <p>
                  aktris
                </p>
              </div>
              <div class="img-box">
                <img src="images/client9.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->



  
  <!-- Modal Overlay-->
   
  <!--End Modal Overlay-->


<?php 
$koneksi->close(); // Tutup koneksi setelah selesai
require 'footer.php'; ?>