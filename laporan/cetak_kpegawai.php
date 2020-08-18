<?php 
require_once '../config/koneksi.php';
require_once '../config/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Kehadiran Pegawai</title>
</head>
<body>
	
</body>
</html>

<div class="container">
	<div class="row">
		<div class="col-md">
			<div class="card">
			  	<div class="card-header">Laporan Kehadiran Pegawai</div>
			  	<div class="card-body">
			  		<form action="cetak_keha_pegawai.php" method="post" target="_blank">
			  			<label for="bulan" class="form-label">Bulan</label>
						  	<select name="bulan" id="bulan" class="form-select">
						  		<option value="">Pilih Bulan</option>
						  		<option value="01">Januari</option>
						  		<option value="02">Februari</option>
						  		<option value="03">Maret</option>
						  		<option value="04">April</option>
						  		<option value="05">Mei</option>
						  		<option value="06">Juni</option>
						  		<option value="07">Juli</option>
						  		<option value="08">Agustus</option>
						  		<option value="09">September</option>
						  		<option value="10">Oktober</option>
						  		<option value="11">November</option>
						  		<option value="12">Desember</option>
						  	</select>
						<label for="tahun" class="form-label">Tahun</label>
						  	<select name="tahun" id="tahun" class="form-select">
					  		<option value="">Pilih Tahun</option>
							<?php 
							$y = date('Y');
							for ($i= 2018; $i < $y + 2; $i++) { ?>
								<option value="<?= $i; ?>"><?= $i; ?></option>
							<?php
							}
							?>
						  	</select>
						<button type="submit">Cetak Laporan</button>
			  		</form>
			  	</div>
			</div>
		</div>
	</div>
</div>