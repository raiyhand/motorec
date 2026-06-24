<footer class="footer_section">
  <div class="container">

<div class="footer-top-logo">
<img src="/motorec-app/images/favicon-2.png" alt="MotoRec Logo">
    </a>
</div>

    <div class="row">
      
      <div class="col-md-6 col-lg-4 footer-col">
        <div class="footer_detail">
          <a href="<?php echo $pathPrefix; ?>index.php" class="footer-logo">
            MotoRec
          </a>
          <p>
            Platform cerdas untuk menemukan rekomendasi motor yang paling sesuai dengan kebutuhan, gaya hidup, dan budget Anda.
          </p>
        </div>
      </div>

<div class="col-md-6 col-lg-4 footer-col">
    <h4>LINK CEPAT</h4>
    <ul class="footer_links">
        <li><a href="<?php echo $pathPrefix; ?>about.php">Tentang Kami</a></li>
        
        <?php if (isset($_SESSION['is_logged_in'])): ?>
            <li><a href="<?php echo $pathPrefix; ?>pages/rekomendasi.php">Mulai Rekomendasi</a></li>
            <li><a href="<?php echo $pathPrefix; ?>pages/favorit.php">Motor Favorit</a></li>
            <li><a href="<?php echo $pathPrefix; ?>pages/profile.php">Profil Saya</a></li>
        <?php else: ?>
            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#authModal">Mulai Rekomendasi</a></li>
        <?php endif; ?>

    </ul>
</div>

      <div class="col-md-12 col-lg-4 footer-col">
        <div class="footer_contact">
          <h4>KONTAK KAMI</h4>
<div class="contact_link_box">
              <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Khp+Hasan+Mustopa+No.+68,+Cikutra,+Cibeunying+Kidul,+Kota+Bandung" target="_blank">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Jl. Khp Hasan Mustopa No. 68, Cikutra, Cibeunying Kidul, Kota Bandung
                </span>
        <a href="tel:+6289637008091"><i class="fa fa-phone" aria-hidden="true"></i><span>Call +62 89637008091</span></a>
        <a href="mailto:raihankhairiadha07@gmail.com"><i class="fa fa-envelope" aria-hidden="true"></i><span>raihankhairiadha07@gmail.com</span></a>
      </div>
        </div>
      </div>

    </div>

    <div class="footer-info">
      <p class="footer-copyright-text">
        &copy; <span id="displayYear"></span> MotoRec. All Rights Reserved. <br>
        Dikembangkan oleh Raihan Khairi Adha.
      </p>
      </p>
      <div class="footer_social">
          <a href="https://www.facebook.com/share/1EpH9A4Zu6/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a href="https://x.com/prabowo" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <a href="https://www.instagram.com/rhnkhairi/profilecard/?igsh=Ynd6ZmFpNGw2M2di" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href="https://www.linkedin.com/in/raihan-khairi-adha-4665bb315?trk=contact-info" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
          
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
  </div>
</div>

<div class="compare-tray-container" id="compare-tray">
    <div class="compare-tray-header">
        <h5>Item untuk Dibandingkan (<span id="compare-count">0</span>/3)</h5>
        <button id="clear-compare" class="clear-btn">&times; Hapus Semua</button>
    </div>
    <div class="compare-tray-body" id="compare-items">
        </div>
    <form action="<?php echo $pathPrefix; ?>pages/perbandingan.php" method="GET" id="compare-form" class="compare-tray-footer">
        <input type="hidden" name="ids" id="compare-ids">
        <button type="submit" class="btn btn-compare" disabled>Bandingkan Sekarang</button>
    </form>
</div>

</footer>

  <!-- Modal Overlay-->
  <div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog medium-style-dialog" role="document">
        <div class="modal-content medium-style-content">
            <button type="button" class="close medium-close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body medium-body modal-body-flex">
                <div class="modal-image-side">
                    <img src="<?php echo $pathPrefix; ?>images/modal-moto.jpg" alt="Motorcycle">
                </div>
                <div class="modal-form-side">

                    <div id="login-view">
                        <h2 class="medium-title">Masuk ke Akun Anda</h2>
                        <p class="medium-subtitle">Selamat datang kembali! Silakan masukkan detail akun Anda.</p>
                        <form class="login-form" id="login-form" method="POST">
                            <div id="login-notice" class="form-notice"></div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control-modal" placeholder="Alamat Email" required>
                            </div>
                            <div class="form-group password-wrapper">
                                <input type="password" id="login-password" name="password" class="form-control-modal" placeholder="Password" required>
                                <i class="fa fa-eye-slash toggle-password"></i>
                            </div>
                            <div class="forgot-password-link">
                                <a href="#" id="show-forgot-link">Lupa password?</a>
                            </div>
                            <button type="submit" class="btn btn-login-modal">Masuk</button>
                        </form>
                        <div class="medium-signin-link">
                            Belum punya akun? <a href="#" id="show-register-link">Daftar sekarang</a>
                        </div>
                    </div>

                    <div id="register-view" style="display: none;">
                        <h2 class="medium-title">Buat Akun Baru</h2>
                        <p class="medium-subtitle">Bergabunglah dengan MotoRec untuk mendapatkan rekomendasi terbaik.</p>
                        <form class="login-form" id="register-form" action="<?php echo $pathPrefix; ?>pages/proses_register.php" method="POST">
                            <div class="form-group"><input type="text" name="nama_lengkap" class="form-control-modal" placeholder="Nama Lengkap" required></div>
                            <div class="form-group"><input type="text" name="username" class="form-control-modal" placeholder="Nama Pengguna (username)" required></div>
                            <div class="form-group"><input type="email" name="email" class="form-control-modal" placeholder="Alamat Email" required></div>
                            <div class="form-group password-wrapper">
                                <input type="password" id="register-password" name="password" class="form-control-modal" placeholder="Password" required>
                                <i class="fa fa-eye-slash toggle-password"></i>
                            </div>
                            <div class="form-group password-wrapper">
                                <input type="password" id="register-confirm-password" name="confirm_password" class="form-control-modal" placeholder="Konfirmasi Password" required>
                                <i class="fa fa-eye-slash toggle-password"></i>
                            </div>
                            <div id="password-error" class="form-error"></div>
                            <button type="submit" class="btn btn-login-modal">Daftar</button>
                        </form>
                        <div class="medium-signin-link">
                            Sudah punya akun? <a href="#" class="back-to-login">Masuk di sini</a>
                        </div>
                    </div>

                    <div id="forgot-password-view" style="display: none;">
                        <h2 class="medium-title">Reset Password</h2>
                        <p class="medium-subtitle">Masukkan alamat email Anda, dan kami akan mengirimkan link untuk mereset password Anda.</p>
                        <form class="login-form" id="forgot-password-form" method="POST">
                            <div id="forgot-password-notice" class="form-notice"></div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control-modal" placeholder="Alamat Email Terdaftar" required>
                            </div>
                            <button type="submit" class="btn btn-login-modal">Kirim Link Reset</button>
                        </form>
                        <div class="medium-signin-link">
                            <a href="#" class="back-to-login">Kembali ke Login</a>
                        </div>
                    </div>

                </div> </div> </div> </div> </div>
  <!--End Modal Overlay-->

<!-- jQery -->
  <script src="<?php echo $pathPrefix; ?>js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="<?php echo $pathPrefix; ?>js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- fancybox -->
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
  <!-- custom js -->
  <script src="<?php echo $pathPrefix; ?>js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI"></script>
  <!-- End Google Map -->
  <script src="<?php echo $pathPrefix; ?>js/scroll-animation.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/zoom/lg-zoom.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/thumbnail/lg-thumbnail.min.js"></script>

</body>
</html>