<?php
// Langkah 1: Selalu mulai session dan panggil koneksi di paling atas.
session_start();
require 'koneksi.php';

// Langkah 2: Pastikan hanya user yang sudah login yang bisa mengakses.
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}


// WAJIB ADA: Blok untuk membuat $pathPrefix
$currentPage = basename($_SERVER['PHP_SELF']);
$pathPrefix = '../'; // Untuk sub-folder, path prefixnya adalah ../

// Langkah 6: Sekarang kita mulai tulis HTML
require __DIR__ . '/../header.php'; // Panggil header terpusat Anda

?>
<!DOCTYPE html>
<html>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
    </header>
    </div>

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
        <option value="Alva">Alva</option>
        <option value="Aprilia">Aprilia</option>
        <option value="Benelli">Benelli</option>
        <option value="BMW">BMW</option>
        <option value="CFMoto">CFMoto</option>
        <option value="Ducati">Ducati</option>
        <option value="Gesits">Gesits</option>
        <option value="Harley-Davidson">Harley-Davidson</option>
        <option value="Honda">Honda</option>
        <option value="Husqvarna">Husqvarna</option>
        <option value="Indian">Indian</option>
        <option value="Kawasaki">Kawasaki</option>
        <option value="KTM">KTM</option>
        <option value="Moto Guzzi">Moto Guzzi</option>
        <option value="MV Agusta">MV Agusta</option>
        <option value="Royal Enfield">Royal Enfield</option>
        <option value="Selis">Selis</option>
        <option value="Suzuki">Suzuki</option>
        <option value="Triumph">Triumph</option>
        <option value="TVS">TVS</option>
        <option value="United">United</option>
        <option value="Vespa">Vespa</option>
        <option value="Viar">Viar</option>
        <option value="Yamaha">Yamaha</option>
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
        <option value="Touring">Touring</option>
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
    <label for="prioritas" style="font-size: 1.2rem; margin-bottom: 10px;">Tampilkan Semua Motor Berdasarkan:</label>
    <select id="prioritas" name="prioritas" class="form-control nice-select wide">
      <option value="performa">Performa (HP)</option>
      <option value="harga">Harga</option>
      <option value="tahun">Tahun Rilis</option>
      <option value="cc">Kapasitas Mesin (CC)</option>
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

    <!-- footer section -->
<?php require __DIR__ . '/../footer.php'; ?>
    <!-- footer section -->
</body>

</html>