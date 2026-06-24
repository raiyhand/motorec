<?php
// Panggil header.php dengan path yang benar untuk naik satu folder
require __DIR__ . '/../header.php';

// Pastikan hanya user yang sudah login yang bisa akses
// Logika ini bisa juga dipindahkan ke header.php jika ingin diterapkan di semua halaman pages
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    // Redirect menggunakan path prefix dari header.php jika ada, atau hardcode
    $pathPrefix = (basename(dirname($_SERVER['PHP_SELF'])) == 'pages') ? '../' : '';
    header("Location: " . $pathPrefix . "index.php");
    exit();
}
?>

<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Temukan Motor Impian Anda</h2>
            <p>Isi kriteria di bawah ini untuk mendapatkan rekomendasi yang paling sesuai.</p>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="form_container">
                    <form action="hasil_rekomendasi.php" method="GET">
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="budget_display">Budget Maksimal (Rp)</label>
                                <input type="text" class="form-control" id="budget_display" placeholder="Contoh: 50.000.000">
                                <input type="hidden" name="budget" id="budget_hidden">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="merk">Brand / Merk</label>
                                <select id="merk" name="merk" class="form-control select2-searchable">
                                    <option value="">Pilih atau ketik merk</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Yamaha">Yamaha</option>
                                    <option value="Suzuki">Suzuki</option>
                                    <option value="Kawasaki">Kawasaki</option>
                                    </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jenis_bodi">Jenis Bodi</label>
                                <select id="jenis_bodi" name="jenis_bodi" class="form-control select2-searchable">
                                    <option value="">Pilih atau ketik jenis</option>
                                    <option value="Skuter">Skuter</option>
                                    <option value="Moped">Moped (Bebek)</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Naked Bike/Streetfighter">Naked Bike/Streetfighter</option>
                                    <option value="Trail/Off-Road">Trail/Off-Road</option>
                                    <option value="Cruiser">Cruiser</option>
                                    <option value="Adventure Touring">Adventure Touring</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cc_range">Kapasitas Mesin (CC)</label>
                                <select id="cc_range" name="cc_range" class="form-control nice-select wide">
                                    <option value="">Semua CC</option>
                                    <option value="0-125">< 125 cc</option>
                                    <option value="126-250">126 - 250 cc</option>
                                    <option value="251-600">251 - 600 cc</option>
                                    <option value="601-1000">601 - 1000 cc</option>
                                    <option value="1001-9999">> 1000 cc</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="prioritas">Urutkan Hasil Berdasarkan Prioritas</label>
                            <select id="prioritas" name="prioritas" class="form-control nice-select wide">
                                <option value="performa">Performa Tertinggi (HP)</option>
                                <option value="harga_terendah">Harga Termurah</option>
                                <option value="harga_tertinggi">Harga Termahal</option>
                                <option value="tahun_terbaru">Tahun Terbaru</option>
                                <option value="cc_tertinggi">CC Terbesar</option>
                            </select>
                        </div>
                        
                        <div class="btn_box">
                            <button type="submit">Tampilkan Hasil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require __DIR__ . '/../footer.php'; // Memanggil footer terpusat ?>

    <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              KONTAK KAMI
            </h4>
            <div class="contact_link_box">
              <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Khp+Hasan+Mustopa+No.+68,+Cikutra,+Cibeunying+Kidul,+Kota+Bandung" target="_blank">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Jl. Khp Hasan Mustopa No. 68, Cikutra, Cibeunying Kidul, Kota Bandung
                </span>
              </a>
              <a href="tel:+6289637008091">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +62 89637008091
                </span>
              </a>
              <a href="mailto:raihankhairiadha07@gmail.com">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  raihankhairiadha07@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              MotoRec
            </a>
            <p>
              Temukan rekomendasi merk motor terbaik Anda di MotoRec. 
              Kami membantu Anda membuat keputusan yang tepat.
            </p>
            <div class="footer_social">
              <a href="https://www.facebook.com/share/1EpH9A4Zu6/" target="_blank">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="https://x.com/prabowo" target="_blank">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="https://www.linkedin.com/in/raihan-khairi-adha-4665bb315?trk=contact-info" target="_blank">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="https://www.instagram.com/rhnkhairi/profilecard/?igsh=Ynd6ZmFpNGw2M2di" target="_blank">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="https://pin.it/4iw3Q8DA5" target="_blank">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            WAKTU LAYANAN
          </h4>
          <p>
            Senin - Jumat
          </p>
          <p>
            09:00 - 17:00 WIB
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> 
          <a>MotoRec. All Rights Reserved.</a><br><br>
          &copy; <span id="displayYear"></span> 
          <a>MotoRec. Dikembangkan oleh Raihan Khairi Adha.</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="../js/custom.js"></script>
</body>

</html>