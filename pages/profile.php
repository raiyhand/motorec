<?php
// Selalu mulai session dan panggil koneksi di paling atas
session_start();
require 'koneksi.php';
require __DIR__ . '/../header.php'; // Panggil header terpusat Anda

// Pastikan hanya user yang sudah login yang bisa mengakses
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: ../index.php");
    exit();
}

// Ambil data user yang sedang login dari database
$id_user = $_SESSION['user_id'];
$sql_user = "SELECT nama_lengkap, username, email, foto_profil FROM user WHERE id_user = ?";
$stmt_user = $koneksi->prepare($sql_user);
$stmt_user->bind_param("i", $id_user);
$stmt_user->execute();
$result_user = $stmt_user->get_result();
$user = $result_user->fetch_assoc();
$stmt_user->close();

// Ambil jumlah motor favorit menggunakan metode bind_result() yang lebih andal
$sql_fav = "SELECT COUNT(*) FROM user_favorites WHERE id_user = ?";
$stmt_fav = $koneksi->prepare($sql_fav);
$stmt_fav->bind_param("i", $id_user);
$stmt_fav->execute();
$stmt_fav->bind_result($total_favorit); // Simpan hasilnya ke variabel
$stmt_fav->fetch(); // Ambil hasilnya
$stmt_fav->close();

// Ambil jumlah motor yang sudah dirating menggunakan metode yang sama
$sql_rating = "SELECT COUNT(*) FROM user_motor_rating WHERE id_user = ?";
$stmt_rating = $koneksi->prepare($sql_rating);
$stmt_rating->bind_param("i", $id_user);
$stmt_rating->execute();
$stmt_rating->bind_result($total_rating); // Simpan hasilnya ke variabel
$stmt_rating->fetch(); // Ambil hasilnya
$stmt_rating->close();

$koneksi->close();
?>

<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Profil Saya</h2>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="profile-page-card">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <a href="#" data-toggle="modal" data-target="#viewPhotoModal">
                                <img src="../images/profiles/<?php echo htmlspecialchars($user['foto_profil'] ?? 'default.png'); ?>" alt="Foto Profil" class="profile-pic-large">
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h3><?php echo htmlspecialchars($user['nama_lengkap']); ?></h3>
                            <p class="text-muted">@<?php echo htmlspecialchars($user['username']); ?></p>
                            <div class="profile-info-list">
                                <p><i class="fa fa-envelope"></i> <?php echo htmlspecialchars($user['email']); ?></p>
                            </div>
                            <div class="profile-stats">
                                <div class="stat-item"><h4><?php echo $total_favorit; ?></h4><p>Motor Favorit</p></div>
                                <div class="stat-item"><h4><?php echo $total_rating; ?></h4><p>Motor Dirating</p></div>
                            </div>
                            <hr>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
                                <i class="fa fa-pencil"></i> Edit Profil & Foto
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="editTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="data-diri-tab" data-toggle="tab" href="#data-diri" role="tab">Data Diri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="foto-profil-tab" data-toggle="tab" href="#foto-profil" role="tab">Foto Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="ubah-email-tab" data-toggle="tab" href="#ubah-email" role="tab">Ubah Email</a>
          </li>
        </ul>
        <div class="tab-content pt-3" id="editTabContent">

          <div class="tab-pane fade show active" id="data-diri" role="tabpanel">
            <form action="proses_update_profil.php" method="post">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo htmlspecialchars($user['nama_lengkap']); ?>" required>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" required>
              </div>
              <button type="submit" class="btn btn-primary">Simpan Data Diri</button>
            </form>
          </div>

          <div class="tab-pane fade" id="foto-profil" role="tabpanel">
            <form action="proses_upload_profil.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Pilih Foto Baru</label>
                    <input type="file" name="fotoProfil" class="form-control-file" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload Foto</button>
            </form>
          </div>

          <div class="tab-pane fade" id="ubah-email" role="tabpanel">
            <form action="proses_ubah_email.php" method="post">
                <div class="form-group">
                  <label>Email Baru</label>
                  <input type="email" name="new_email" class="form-control" placeholder="Masukkan email baru Anda" required>
                </div>
                <div class="form-group">
                  <label>Password Saat Ini (Untuk Verifikasi)</label>
                  <input type="password" name="current_password" class="form-control" placeholder="Masukkan password Anda saat ini" required>
                  <small class="form-text text-muted">Kami memerlukan password Anda untuk memastikan ini benar-benar Anda.</small>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Email</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="viewPhotoModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: transparent; border: none;">
        <img src="../images/profiles/<?php echo htmlspecialchars($user['foto_profil'] ?? 'default.png'); ?>" alt="Foto Profil Diperbesar" style="width: 100%; height: auto; border-radius: 10px;">
    </div>
  </div>
</div>

<?php require __DIR__ . '/../footer.php'; ?>