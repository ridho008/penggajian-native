<?php 
$bulan = $_GET['bulan'];
$tahun = $_GET['tahun'];
$bulanTahun = $bulan.$tahun;

if(isset($_POST['edit'])) {
	if(editKehadiran($_POST) > 0) {
		echo "<script>alert('Data Berhasil Edit.');window.location='?p=kpegawai';</script>";
	} else {
		echo "<script>alert('Data Gagal Edit.');window.location='?p=kpegawai';</script>";
	}
}

?>

<div class="card">
	<div class="card-header">
	Edit Data Kehadiran Pegawai
	</div>
	<div class="card-body">
	<!-- Informasi Bulan & Tahun -->
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
	<!-- /Informasi Bulan & Tahun -->

	<!-- Tabel Edit Kehadiran -->
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
						$query = mysqli_query($konek, "SELECT master_gaji.*, pegawai.nama_pegawai, jabatan.nama_jabatan FROM master_gaji INNER JOIN pegawai ON master_gaji.nip = pegawai.nip INNER JOIN jabatan ON pegawai.kode_jabatan = jabatan.kode_jabatan WHERE master_gaji.bulan = '$bulanTahun' ORDER BY master_gaji.nip ASC") or die(mysqli_error($konek));
						while($d = mysqli_fetch_assoc($query)) : ?>
							<input type="text" name="bulan[]" value="<?= $bulanTahun; ?>">
							<input type="text" name="nip[]" value="<?= $d['nip']; ?>">
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $d['nip']; ?></td>
								<td><?= $d['nama_pegawai']; ?></td>
								<td><?= $d['nama_jabatan']; ?></td>
								<td>
									<input type="number" name="masuk[]" class="form-control" value="<?= $d['masuk']; ?>" required>
								</td>
								<td>
									<input type="number" name="sakit[]" class="form-control" value="<?= $d['sakit']; ?>" required>
								</td>
								<td>
									<input type="number" name="izin[]" class="form-control" value="<?= $d['izin']; ?>" required>
								</td>
								<td>
									<input type="number" name="alpha[]" class="form-control" value="<?= $d['alpha']; ?>" required>
								</td>
								<td>
									<input type="number" name="lembur[]" class="form-control" value="<?= $d['lembur']; ?>" required>
								</td>
								<td>
									<input type="number" name="potongan[]" class="form-control" value="<?= $d['potongan']; ?>" required>
								</td>
							</tr>
						<?php endwhile; ?>
							<tr>
								<td colspan="2"></td>
								<td colspan="5">
									<button type="submit" name="edit" class="btn btn-primary">Edit</button>
									<a href="?p=kpegawai" class="btn btn-info">Kembali</a>
								</td>
							</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
	<!-- /Tabel Edit Kehadiran -->
	</div>
</div>	