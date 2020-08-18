<?php 
session_start();
require_once 'config/koneksi.php';
require_once 'config/functions.php';

if(!isset($_GET['p'])) {
  error_reporting(0);  
}

if(!isset($_SESSION['id'])) {
  header("Location: login.php");
  exit;
}
$page = $_GET['p'];
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

  <title>
    <?php 
    if($page) {
      switch ($page) {
        case 'admin':
          echo "Kelola Admin";
          break;
        case 'jabatan':
          echo "Halaman Jabatan";
          break;
        case 'jtambah':
          echo "Halaman Tambah Jabatan";
          break;
        case 'jubah':
          echo "Halaman Ubah Jabatan";
          break;
        case 'golongan':
          echo "Halaman Golongan";
          break;
        case 'gtambah':
          echo "Halaman Tambah Golongan";
          break;
        case 'gubah':
          echo "Halaman Ubah Golongan";
          break;
        case 'pegawai':
          echo "Halaman Pegawai";
          break;
        case 'ptambah':
          echo "Halaman Tambah Pegawai";
          break;
        case 'pubah':
          echo "Halaman Ubah Pegawai";
          break;
        case 'kpegawai':
          echo "Halaman Kehadiran Pegawai";
          break;
        case 'ktambah':
          echo "Halaman Tambah Kehadiran Pegawai";
          break;
        case 'kedit':
          echo "Halaman Edit Kehadiran Pegawai";
          break;
        case 'gpegawai':
          echo "Halaman Gaji Pegawai";
          break;

        default:
          echo "Home";
          break;
      }
    } else {
      echo "Home";
    }
    ?>
  </title>
</head>
<body>

<?php 
if($page == 'admin') {
  $aktifAdmin = "active";
}

if($page == '') {
  $aktifHome = "active";
}

if($page == 'jabatan') {
  $masterAktif1 = 'active';
  $jabatanAktif = 'active';
}

if($page == 'golongan') {
  $masterAktif1 = 'active';
  $golonganAktif = 'active';
}

if($page == 'pegawai') {
  $masterAktif1 = 'active';
  $pegawaiAktif = 'active';
}

if($page == 'kpegawai') {
  $masterAktif1 = 'active';
  $kpegawaiAktif = 'active';
}

if($page == 'gpegawai') {
  $masterAktif1 = 'active';
  $gpegawaiAktif = 'active';
}

?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url(); ?>">Gajian Pega</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $aktifHome; ?>" aria-current="page" href="<?= base_url(); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $aktifAdmin; ?>" href="<?= base_url('index.php?p=admin'); ?>">Admin</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= $masterAktif1; ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Data Pegawai
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item <?= $jabatanAktif; ?>" href="<?= base_url('index.php?p=jabatan') ?>">Jabatan</a></li>
            <li><a class="dropdown-item <?= $golonganAktif; ?>" href="<?= base_url('index.php?p=golongan') ?>">Golongan</a></li>
            <li><a class="dropdown-item <?= $pegawaiAktif; ?>" href="<?= base_url('index.php?p=pegawai') ?>">Pegawai</a></li>
            <li><a class="dropdown-item <?= $kpegawaiAktif; ?>" href="<?= base_url('index.php?p=kpegawai') ?>">Kehadiran Pegawai</a></li>
            <li><a class="dropdown-item <?= $gpegawaiAktif; ?>" href="<?= base_url('index.php?p=gpegawai') ?>">Gaji Pegawai</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Laporan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url('laporan/cetak_pegawai.php') ?>" target="_blank">Laporan Pegawai</a></li>
            <li><a class="dropdown-item" href="<?= base_url('laporan/cetak_golongan.php') ?>" target="_blank">Laporan Golongan</a></li>
            <li><a class="dropdown-item" href="<?= base_url('laporan/cetak_jabatan.php') ?>" target="_blank">Laporan Jabatan</a></li>
            <li><a class="dropdown-item" href="<?= base_url('laporan/cetak_kpegawai.php') ?>" target="_blank">Laporan Kehadiran Pegawai</a></li>
            <li><a class="dropdown-item" href="<?= base_url('laporan/cetak_lpegawai.php') ?>" target="_blank">Laporan Lembur Pegawai</a></li>
            <li><a class="dropdown-item" href="<?= base_url('laporan/cetak_pgaji.php') ?>" target="_blank">Laporan Potongan Gaji</a></li>
          </ul>
        </li>
      </ul>
      <span class="navbar-text">
        <a class="nav-link" href="logout.php">Logout</a>
      </span>
    </div>
  </div>
</nav>
<!-- /Navbar -->