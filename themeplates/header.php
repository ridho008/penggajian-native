<?php 
session_start();
require_once 'config/koneksi.php';
require_once 'config/functions.php';

error_reporting(0);

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
          <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('index.php?p=admin'); ?>">Admin</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Data Pegawai
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url('index.php?p=jabatan') ?>">Jabatan</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php?p=golongan') ?>">Golongan</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php?p=pegawai') ?>">Pegawai</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php?p=kpegawai') ?>">Kehadiran Pegawai</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php?p=gpegawai') ?>">Gaji Pegawai</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Laporan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?= base_url('laporan/cetak_pegawai.php') ?>">Laporan Pegawai</a></li>
            <li><a class="dropdown-item" href="<?= base_url('laporan/cetak_golongan.php') ?>">Laporan Golongan</a></li>
            <li><a class="dropdown-item" href="<?= base_url('laporan/cetak_jabatan.php') ?>">Laporan Jabatan</a></li>
            <li><a class="dropdown-item" href="<?= base_url('laporan/cetak_kpegawai.php') ?>">Laporan Kehadiran Pegawai</a></li>
            <li><a class="dropdown-item" href="<?= base_url('laporan/cetak_lpegawai.php') ?>">Laporan Lembur Pegawai</a></li>
            <li><a class="dropdown-item" href="<?= base_url('laporan/cetak_pgaji.php') ?>">Laporan Potongan Gaji</a></li>
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