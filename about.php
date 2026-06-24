<?php
require __DIR__ . '/header.php'; // Panggil header terpusat Anda
?>

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img.png" alt="Tentang MotoRec">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>MotoRec: Lebih dari Sekadar Mesin Pencari Motor</h2>
            </div>
            <p>
              Lebih dari sekadar sistem rekomendasi, kami adalah teman perjalananmu dalam menemukan motor impian. Dengan menggabungkan teknologi cerdas dan sentuhan personal, MotoRec hadir untuk membantumu memilih kendaraan yang paling cocok dengan gaya hidup, kebutuhan, dan karakter unikmu. Karena setiap pengendara punya cerita, dan setiap motor punya tujuan.
            </p>
            <p>
              Kami bukan sekadar menampilkan katalog. Kami menganalisis data. Dengan menggabungkan spesifikasi mendalam dari ratusan motor dengan preferensi unik Anda—mulai dari budget, gaya hidup, hingga prioritas utama Anda (apakah itu performa, kenyamanan, atau desain)—sistem cerdas kami akan menyajikan rekomendasi yang paling relevan dan terpersonalisasi.
            </p>
            <h5>Keunggulan Kami:</h5>
            <ul>
              <li><strong>Rekomendasi Terpersonalisasi:</strong> Jawaban yang disesuaikan untuk Anda, bukan hanya daftar populer.</li>
              <li><strong>Database Komprehensif:</strong> Data yang terus diperbarui dari berbagai merk dan tipe.</li>
              <li><strong>Objektif dan Data-Driven:</strong> Rekomendasi berdasarkan data, bukan opini sponsor.</li>
              <li><strong>Hemat Waktu dan Tenaga:</strong> Lewati riset yang melelahkan dan langsung temukan kandidat terbaik Anda.</li>
            </ul>
            <a href="pages/rekomendasi.php" class="btn1">Mulai Cari Rekomendasi</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- footer section -->
<?php require 'footer.php'; ?>
  <!-- footer section -->

  <div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog medium-style-dialog" role="document">
        <div class="modal-content medium-style-content">
            <button type="button" class="close medium-close-btn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <div class="modal-body medium-body modal-body-flex">
                <div class="modal-image-side"><img src="images/modal-moto.jpg" alt="Motorcycle"></div>
                <div class="modal-form-side">
                    <div id="login-view">
                        <h2 class="medium-title">Selamat Datang di MotoRec</h2>
                        <p class="medium-subtitle">Masuk untuk mendapatkan rekomendasi motor yang dipersonalisasi.</p>
                        <form class="login-form" id="login-form" method="POST">
                            <div id="login-notice" class="form-notice"></div>
                            <div class="form-group"><input type="email" name="email" class="form-control-modal" placeholder="Alamat Email" required></div>
                            <div class="form-group password-wrapper"><input type="password" id="login-password" name="password" class="form-control-modal" placeholder="Password" required><i class="fa fa-eye-slash toggle-password"></i></div>
                            <div class="forgot-password-link"><a href="#" id="show-forgot-link">Lupa password?</a></div>
                            <button type="submit" class="btn btn-login-modal">Masuk</button>
                        </form>
                        <div class="medium-signin-link">Belum punya akun? <a href="#" id="show-register-link">Daftar sekarang</a></div>
                    </div>
                    <div id="register-view" style="display: none;">
                        <h2 class="medium-title">Buat Akun Baru</h2>
                        <p class="medium-subtitle">Bergabunglah untuk menemukan motor impian Anda.</p>
                        <form class="login-form" id="register-form" action="pages/proses_register.php" method="POST">
                            <div class="form-group"><input type="text" name="nama_lengkap" class="form-control-modal" placeholder="Nama Lengkap" required></div>
                            <div class="form-group"><input type="text" name="username" class="form-control-modal" placeholder="Username" required></div>
                            <div class="form-group"><input type="email" name="email" class="form-control-modal" placeholder="Alamat Email" required></div>
                            <div class="form-group password-wrapper"><input type="password" id="register-password" name="password" class="form-control-modal" placeholder="Password" required><i class="fa fa-eye-slash toggle-password"></i></div>
                            <div class="form-group password-wrapper"><input type="password" id="register-confirm-password" name="confirm_password" class="form-control-modal" placeholder="Konfirmasi Password" required><i class="fa fa-eye-slash toggle-password"></i></div>
                            <div id="password-error" class="form-error"></div>
                            <button type="submit" class="btn btn-login-modal">Daftar</button>
                        </form>
                        <div class="medium-signin-link">Sudah punya akun? <a href="#" class="back-to-login">Masuk di sini</a></div>
                    </div>
                    <div id="forgot-password-view" style="display: none;">
                        <h2 class="medium-title">Reset Password</h2>
                        <p class="medium-subtitle">Masukkan email Anda, kami akan mengirimkan link reset.</p>
                        <form class="login-form" id="forgot-password-form" method="POST">
                            <div id="forgot-password-notice" class="form-notice"></div>
                            <div class="form-group"><input type="email" name="email" class="form-control-modal" placeholder="Alamat Email Terdaftar" required></div>
                            <button type="submit" class="btn btn-login-modal">Kirim Link Reset</button>
                        </form>
                        <div class="medium-signin-link"><a href="#" class="back-to-login">Kembali ke Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>

</html>