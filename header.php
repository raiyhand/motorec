<?php
// Selalu mulai session di baris paling atas
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 1. Mendeteksi nama file yang sedang aktif
$currentPage = basename($_SERVER['PHP_SELF']);

// 2. Menentukan path prefix dinamis secara otomatis
$pathPrefix = (in_array($currentPage, ['index.php', 'about.php'])) ? '' : '../';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>
    <?php
      // Judul halaman dinamis
      switch ($currentPage) {
        case 'about.php': echo 'Tentang MotoRec'; break;
        case 'rekomendasi.php': echo 'Cari Rekomendasi'; break;
        // ... judul halaman lain
        default: echo 'MotoRec - Rekomendasi Motor';
      }
    ?>
  </title>
  
  <link rel="shortcut icon" href="<?php echo $pathPrefix; ?>images/favicon.png" type="">
  <link rel="stylesheet" type="text/css" href="<?php echo $pathPrefix; ?>css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-zoom.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-thumbnail.min.css" />
  <link href="<?php echo $pathPrefix; ?>css/font-awesome.min.css" rel="stylesheet" />
  <link href="<?php echo $pathPrefix; ?>css/style.css" rel="stylesheet" />
  <link href="<?php echo $pathPrefix; ?>css/responsive.css" rel="stylesheet" />
</head>

<body class="<?php if ($currentPage != 'index.php') echo 'sub_page'; ?>">

<?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])): ?>
    <div class="notification-alert alert-success"><p><?php echo $_SESSION['success']; ?></p><span class="close-btn">&times;</span></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
<?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
    <div class="notification-alert alert-danger"><p><?php echo $_SESSION['error']; ?></p><span class="close-btn">&times;</span></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

  <div class="hero_area">
    <div class="bg-box">
      <img src="<?php echo $pathPrefix; ?>images/hero-bg.jpg" alt="Background Motor">
    </div>
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="<?php echo $pathPrefix; ?>index.php">
                    <img src="<?php echo $pathPrefix; ?>images/favicon-2.png" alt="MotoRec Logo" class="navbar-logo-icon">
                    <span>MotoRec</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"><span class=""></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item <?php if ($currentPage == 'index.php') echo 'active'; ?>"><a class="nav-link" href="<?php echo $pathPrefix; ?>index.php">Home</a></li>
                        <?php if (isset($_SESSION['is_logged_in'])): ?>
                            <li class="nav-item <?php if ($currentPage == 'rekomendasi.php') echo 'active'; ?>"><a class="nav-link" href="<?php echo $pathPrefix; ?>pages/rekomendasi.php">Rekomendasi</a></li>
                        <?php endif; ?>
                        <li class="nav-item <?php if ($currentPage == 'about.php') echo 'active'; ?>"><a class="nav-link" href="<?php echo $pathPrefix; ?>about.php">About</a></li>
                    </ul>
                    <div class="user_option">
    <div class="search_box">
        <form class="form-inline" id="search-form-nav">
            <input class="form-control nav_search-input" type="search" placeholder="Cari Model Motor..." id="search-input-nav">
            <button class="btn nav_search-btn" type="button">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>
        <div class="search_results_container" id="search-results-nav"></div>
    </div>                      
                        <?php if (isset($_SESSION['is_logged_in'])): ?>
                            <div class="dropdown profile-dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span><?php echo htmlspecialchars(explode(' ', $_SESSION['nama_lengkap'])[0]); ?></span>
                                    <a href="#" data-toggle="modal" data-target="#viewPhotoModal">
                                    <img src="<?php echo $pathPrefix; ?>images/profiles/<?php echo htmlspecialchars($_SESSION['foto_profil'] ?? 'default.png'); ?>" alt="Profil" class="profile-pic-nav" data-toggle="modal" data-target="#viewPhotoModal">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="<?php echo $pathPrefix; ?>pages/profile.php"><i class="fa fa-user"></i> Profil Saya</a>
                                    <a class="dropdown-item" href="<?php echo $pathPrefix; ?>pages/favorit.php"><i class="fa fa-heart"></i> Motor Favorit</a>
                                    <a class="dropdown-item" href="<?php echo $pathPrefix; ?>pages/rating_saya.php"><i class="fa fa-star"></i> Riwayat Rating</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item logout-item" href="<?php echo $pathPrefix; ?>pages/proses_logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <a href="javascript:void(0);" class="order_online" data-toggle="modal" data-target="#authModal">Mulai</a>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    
    <?php if ($currentPage == 'index.php'): ?>
<section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1 class="animate-on-scroll">
                      Motor Recommendation
                    </h1>
                    <p class="animate-on-scroll">
                      Memberikan solusi cepat, akurat, dan efisien dalam memilih motor di tengah banyaknya pilihan yang tersedia di pasar.
                      Cocok digunakan oleh pelajar, pekerja, hingga pecinta motor yang ingin mencari tunggangan baru tanpa harus bingung membandingkan satu per satu. Dengan tampilan yang sederhana dan informatif.
                    </p>
<div class="btn-box animate-on-scroll">
  <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true): ?>
    
    <a href="pages/rekomendasi.php" class="btn1">
      Mulai Rekomendasi
    </a>

  <?php else: ?>

    <a href="javascript:void(0);" class="btn1" data-toggle="modal" data-target="#authModal">
      Mulai
    </a>

  <?php endif; ?>
</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php endif; ?>
    
  </div>