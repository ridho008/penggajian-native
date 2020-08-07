<?php 
if($page) {
	switch ($page) {
		case 'admin':
			require_once 'page/admin/index.php';
			break;
		case 'hadmin':
			require_once 'page/admin/hadmin.php';
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