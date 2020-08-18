<?php 
if($page) {
	switch ($page) {
		case 'admin':
			require_once 'page/admin/index.php';
			break;
		case 'hadmin':
			require_once 'page/admin/hadmin.php';
			break;
		case 'jabatan':
			require_once 'page/jabatan/index.php';
			break;
		case 'jtambah':
			require_once 'page/jabatan/jtambah.php';
			break;
		case 'jubah':
			require_once 'page/jabatan/jubah.php';
			break;
		case 'jhapus':
			require_once 'page/jabatan/jhapus.php';
			break;
		case 'golongan':
			require_once 'page/golongan/index.php';
			break;
		case 'gtambah':
			require_once 'page/golongan/gtambah.php';
			break;
		case 'gubah':
			require_once 'page/golongan/gubah.php';
			break;
		case 'ghapus':
			require_once 'page/golongan/ghapus.php';
			break;
		case 'pegawai':
			require_once 'page/pegawai/index.php';
			break;
		case 'ptambah':
			require_once 'page/pegawai/ptambah.php';
			break;
		case 'pubah':
			require_once 'page/pegawai/pubah.php';
			break;
		case 'phapus':
			require_once 'page/pegawai/phapus.php';
			break;
		case 'kpegawai':
			require_once 'page/kehadiran_pegawai/kpegawai.php';
			break;
		case 'ktambah':
			require_once 'page/kehadiran_pegawai/ktambah.php';
			break;
		case 'kedit':
			require_once 'page/kehadiran_pegawai/kedit.php';
			break;
		case 'gpegawai':
			require_once 'page/penggajian_pegawai/gpegawai.php';
			break;
		
		default:
			require_once './index.php';
			break;
	}
} else { ?>
<div class="jumbotron">
  <h1 class="display-4">Selamat Datang <i><u><?= $_SESSION['user']; ?></u></i></h1>
  <pre class="text-muted"><?php var_dump($_SESSION); ?></pre>
  <p class="lead">Aplikasi sederhana berbasis website tentang pengelolaan penggajian pegawai perkantoran.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Bisa !</a>
</div>

<?php
}

?>