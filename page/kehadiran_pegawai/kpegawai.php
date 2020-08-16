<?php 
$tampilGaji = mysqli_query($konek, "SELECT * FROM master_gaji ORDER BY nip DESC") or die(mysqli_error($konek));

if(isset($_POST['tambah'])) {
	if(tambahAdmin($_POST) > 0) {
		echo "<script>alert('Data Admin Berhasil Ditambahkan.');window.location='?p=admin';</script>";
	} else {
		echo "<script>alert('Data Admin Gagal Ditambahkan.');window.location='?p=admin';</script>";
	}
}

if(isset($_POST['ubah'])) {
	if(ubahAdmin($_POST) > 0) {
		echo "<script>alert('Data Admin Berhasil Diubah.');window.location='?p=admin';</script>";
	} else {
		echo "<script>alert('Data Admin Gagal Diubah.');window.location='?p=admin';</script>";
	}
}

if((isset($_POST['bulan']) && $_POST['bulan'] != '') && isset($_POST['tahun']) && $_POST['tahun'] != '') {
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];
	$buta = $bulan . $tahun;
} else {
	$bulan = date('m');
	$tahun = date('Y');
	$buta = $bulan . $tahun;
}
?>
<div class="card">
  <div class="card-header">
    Data Kehadiran Pegawai
  </div>
  <div class="card-body">
    <div class="row">
    	<div class="col-md-4">
    		<form action="" method="post" class="needs-validation" novalidate>
				<div class="mb-3">
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
				  	<div class="valid-feedback">
				      Terlihat bagus!
				    </div>
				</div>
		</div>
		<div class="col-md-4">
	        	<div class="mb-3">
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
				  	<div class="valid-feedback">
				      Terlihat bagus!
				    </div>
				</div>
		</div>
		<div class="col-md-4">
				<div class="mb-3">
					<button type="submit" class="btn btn-primary">Tampilkan</button><br>
					<a href="?p=ktambah" class="btn btn-warning">Input</a>
				</div>
		</div>
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="mb-3">
					<div class="alert alert-info" role="alert">
					  Bulan : <?= $bulan; ?>, Tahun : <?= $tahun; ?>
					</div>
				</div>
			</div>
		</div>
        	</form>
    	<!-- </div> -->
    </div>
    <!-- tabel -->
    <div class="row">
    	<div class="col-md">
    		<table class="table table-striped table-hover text-center">
				<thead>
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Nama Pegawai</th>
						<th>Jabatan</th>
						<th>Masuk</th>
						<th>Izin</th>
						<th>Alpha</th>
						<th>Lembur</th>
						<th>Potongan</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$sql = mysqli_query($konek, "SELECT master_gaji.*, pegawai.nama_pegawai, pegawai.kode_jabatan, jabatan.nama_jabatan FROM master_gaji INNER JOIN pegawai ON master_gaji.nip = pegawai.nip INNER JOIN jabatan ON pegawai.kode_jabatan = jabatan.kode_jabatan WHERE master_gaji.bulan = $buta ORDER BY pegawai.nip ASC") or die(mysqli_error($konek));

					$no = 1;
					while($d = mysqli_fetch_assoc($sql)) {
					?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $d['bulan']; ?></td>
						<td><?= $d['nip']; ?></td>
						<td><?= $d['nama_pegawai']; ?></td>
						<td><?= $d['nama_jabatan']; ?></td>
						<td><?= $d['masuk']; ?></td>
						<td><?= $d['izin']; ?></td>
						<td><?= $d['alpha']; ?></td>
						<td><?= $d['lembur']; ?></td>
						<td><?= $d['potongan']; ?></td>
					</tr>
					<?php } ?>

					
				</tbody>

    		</table>
    		<?php if(mysqli_num_rows($sql) > 0) : ?>
    			<a href="?p=kedit&bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>" class="btn btn-primary">Edit Kehadiran</a>
			<?php else : ?>
				<div class="alert alert-danger" role="alert">
				  Data Masih Kosong !
				</div>
			<?php endif; ?>
    	</div>
    </div>
    <!-- /tabel -->
  </div>
</div>