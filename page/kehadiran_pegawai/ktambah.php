<?php 
if((isset($_POST['bulan']) && $_POST['bulan'] != '') && (isset($_POST['tahun']) && $_POST['tahun'] != '')) {
	$bulan = $_POST['bulan'];
	$tahun = $_POST['tahun'];
	$buta = $bulan . $tahun;
} else {
	$bulan = date('m');
	$tahun = date('Y');
	$buta = $bulan . $tahun;
}

if(isset($_POST['simpan'])) {
	if(tambahKehadiran($_POST) > 0) {
		echo "<script>alert('Data Berhasil Tambahkan.');window.location='?p=ktambah';</script>";
	} else {
		echo "<script>alert('Data Gagal Tambahkan.');window.location='?p=ktambah';</script>";
	}
}
?>
<div class="card">
	<div class="card-header">
		Tambah Data Kehadiran Pegawai
	</div>
	<div class="card-body">
		<form action="" method="post">
			<div class="row">
				<div class="col-md-4">
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
					</div>
				</div>
				<div class="col-md-4">
					<div class="mt-4">
						<button type="submit" class="btn btn-primary">Generate Form</button>
					</div>
				</div>
			</div>
		</form>

		<!-- Informasi Tahun/Bulan -->
			<div class="row">
				<div class="col-md-4">
					<div class="mb-3">
						<div class="alert alert-info" role="alert">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							  <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
							</svg>
						  	<b>Bulan : <?= $bulan; ?>, Tahun : <?= $tahun; ?></b>
						</div>
					</div>
				</div>
			</div>
		<!-- /Informasi Tahun/Bulan -->
		<!-- Tabel Tambah Pegawai -->
			<div class="row">
				<div class="col-md">
					<form action="" method="post">
						<table class="table table-striped table-hover text-center">
							<thead>
								<th>No</th>
								<th>NIP</th>
								<th>Nama Pegawai</th>
								<th>Jabatan</th>
								<th>Masuk</th>
								<th>Sakit</th>
								<th>Izin</th>
								<th>Alpha</th>
								<th>Lembur</th>
								<th>Potongan</th>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								$query = mysqli_query($konek, "SELECT pegawai.*, jabatan.nama_jabatan FROM pegawai INNER JOIN jabatan ON pegawai.kode_jabatan = jabatan.kode_jabatan WHERE NOT EXISTS (SELECT * FROM master_gaji WHERE bulan = '$buta' AND pegawai.nip = master_gaji.nip) ORDER BY pegawai.nip ASC") or die(mysqli_error($konek));
								$jmlPegawai = mysqli_num_rows($query);
								while($d = mysqli_fetch_assoc($query)) : ?>
									<input type="text" name="bulan[]" value="<?= $buta; ?>">
									<input type="text" name="nip[]" value="<?= $d['nip']; ?>">
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $d['nip']; ?></td>
										<td><?= $d['nama_pegawai']; ?></td>
										<td><?= $d['nama_jabatan']; ?></td>
										<td>
											<input type="number" name="masuk[]" class="form-control" value="0" required>
										</td>
										<td>
											<input type="number" name="sakit[]" class="form-control" value="0" required>
										</td>
										<td>
											<input type="number" name="izin[]" class="form-control" value="0" required>
										</td>
										<td>
											<input type="number" name="alpha[]" class="form-control" value="0" required>
										</td>
										<td>
											<input type="number" name="lembur[]" class="form-control" value="0" required>
										</td>
										<td>
											<input type="number" name="potongan[]" class="form-control" value="0" required>
										</td>
									</tr>
								<?php endwhile; ?>
								<?php if($jmlPegawai > 0) : ?>
									<tr>
										<td colspan="2"></td>
										<td colspan="5">
											<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
											<a href="?p=kpegawai" class="btn btn-info">Kembali</a>
										</td>
									</tr>
								<?php else : ?>
									<tr>
										<td colspan="10"></td>
											<div class="alert alert-warning" role="alert">
											<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											  <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
											</svg>
											  Maaf..., Bulan dan tahun yang dipilih sudah diproses, silahkan lakukan edit data.
											</div>
											<!-- <label class="label label-warning"></label> -->
										</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		<!-- Tabel Tambah Pegawai -->
	</div>
</div>