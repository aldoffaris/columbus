<?php
include 'koneksi.php';
session_start();

function formatTanggalIndo($tanggal)
{
  // Daftar nama bulan dalam bahasa Indonesia
  $bulanIndo = [
    1 => 'Januari',
    2 => 'Februari',
    3 => 'Maret',
    4 => 'April',
    5 => 'Mei',
    6 => 'Juni',
    7 => 'Juli',
    8 => 'Agustus',
    9 => 'September',
    10 => 'Oktober',
    11 => 'November',
    12 => 'Desember'
  ];

  // Memecah tanggal menjadi bagian-bagian (tahun, bulan, hari)
  $tanggalArray = explode('-', $tanggal);
  $tahun = $tanggalArray[0];
  $bulan = (int) $tanggalArray[1];
  $hari = (int) $tanggalArray[2];

  // Menggabungkan hasil dengan format "7 September 2024"
  return $hari . ' ' . $bulanIndo[$bulan] . ' ' . $tahun;
}

function formatRupiah($angka) {
  return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Columbus</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link href="assets_home/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_home/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_home/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets_home/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets_home/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets_home/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets_home/assets/css/main.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <h1>Columbus <span>.</span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="tentangkami.php">Tentang Kami</a></li>
          <li><a href="galeri.php">Galeri</a></li>
          <li><a href="produk.php">Produk Kami</a></li>
          <li><a href="kontak.php">Kontak</a></li>
          <li><a href="loginadmin.php">Login Admin</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->