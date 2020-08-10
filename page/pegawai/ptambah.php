<?php

if(isset($_POST['tambah'])) {
	if(tambahPegawai($_POST) > 0) {
		echo "<script>alert('Data Pegawai Berhasil Ditambahkan.');window.location='?p=pegawai';</script>";
	} else {
		echo "<script>alert('Data Pegawai Gagal Ditambahkan.');window.location='?p=pegawai';</script>";
	}
}
?>
		
		<!-- HTML Tambah -->
		<div class="card">
			<div class="card-header">
				Tambah Data Pegawai
			</div>
			<div class="card-body">
				<form action="" method="post" class="needs-validation" novalidate>
					<div class="mb-3">
					  <label for="nip" class="form-label">NIP</label>
					  <input type="text" class="form-control" id="nip" name="nip" required>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="nama" class="form-label">Nama Pegawai</label>
					  <input type="text" class="form-control" id="nama" name="nama" required>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="jabatan" class="form-label">Jabatan</label>
					  <select class="form-select" name="jabatan" id="jabatan">
					  	<option value="">Pilih Jabatan</option>
					  	<?php 
					  	$queryJabatan = mysqli_query($konek, "SELECT * FROM jabatan") or die(mysqli_error($konek));
					  	while($rJa = mysqli_fetch_assoc($queryJabatan)) {
					  	?>
							<option value="<?= $rJa['kode_jabatan']; ?>"><?= $rJa['kode_jabatan'] . " - " . $rJa['nama_jabatan']; ?></option>
					  	<?php } ?>
					  </select>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="golongan" class="form-label">Golongan</label>
					  <select class="form-select" name="golongan" id="golongan">
					  	<option value="">Pilih Golongan</option>
					  	<?php 
					  	$queryGolongan = mysqli_query($konek, "SELECT * FROM golongan") or die(mysqli_error($konek));
					  	while($rGo = mysqli_fetch_assoc($queryGolongan)) {
					  	?>
							<option value="<?= $rGo['kode_golongan']; ?>"><?= $rGo['kode_golongan'] . " - " . $rGo['nama_golongan']; ?></option>
					  	<?php } ?>
					  </select>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="status" class="form-label">Status</label>
					  <select class="form-select" onchange="autoAnak()" name="status" id="status">
					  	<option value="">Pilih Status</option>
					  	<option value="Menikah">Menikah</option>
					  	<option value="Belum Menikah">Belum Menikah</option>
					  </select>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="jml_anak" class="form-label">Jumlah Anak</label>
					  <input type="number" class="form-control" id="jml_anak" name="jml_anak" required>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
						<a href="?p=pegawai" class="btn btn-danger">Batal</a>
					</div>
				</form>
			</div>
		</div>