<?php
$id = $_GET['id'];
$queryPegawai = mysqli_query($konek, "SELECT * FROM pegawai WHERE nip = '$id'") or die(mysqli_error($konek));
$rPe = mysqli_fetch_assoc($queryPegawai);

if(isset($_POST['ubah'])) {
	if(ubahPegawai($_POST) > 0) {
		echo "<script>alert('Data Pegawai Berhasil Diubah.');window.location='?p=pegawai';</script>";
	} else {
		echo "<script>alert('Data Pegawai Gagal Diubah.');window.location='?p=pegawai';</script>";
	}
}
?>
		

		<div class="card">
			<div class="card-header">
				Ubah Data Pegawai
			</div>
			<div class="card-body">
				<form action="" method="post" class="needs-validation" novalidate>
					<div class="mb-3">
					  <label for="nip" class="form-label">NIP</label>
					  <input type="text" class="form-control" id="nip" name="nip" required value="<?= $rPe['nip']; ?>" readonly>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="nama" class="form-label">Nama Pegawai</label>
					  <input type="text" class="form-control" id="nama" name="nama" required value="<?= $rPe['nama_pegawai']; ?>">
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
					  	<?php if($rJa['kode_jabatan'] == $rPe['kode_jabatan']) : ?>
							<option value="<?= $rJa['kode_jabatan']; ?>" selected><?= $rJa['kode_jabatan'] . " - " . $rJa['nama_jabatan']; ?></option>
							<?php else : ?>
							<option value="<?= $rJa['kode_jabatan']; ?>"><?= $rJa['kode_jabatan'] . " - " . $rJa['nama_jabatan']; ?></option>
							<?php endif; ?>
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
					  	<?php if($rGo['kode_golongan'] == $rPe['kode_golongan']) : ?>
							<option value="<?= $rGo['kode_golongan']; ?>" selected><?= $rGo['kode_golongan'] . " - " . $rGo['nama_golongan']; ?></option>
							<?php else : ?>
								<option value="<?= $rGo['kode_golongan']; ?>"><?= $rGo['kode_golongan'] . " - " . $rGo['nama_golongan']; ?></option>
							<?php endif; ?>
					  	<?php } ?>
					  </select>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="status" class="form-label">Status</label>
					  <select class="form-select" name="status" onchange="autoAnak()" id="status">
					  	<option value="">Pilih Status</option>
					  	<option value="Menikah" <?php if($rPe['status'] == 'Menikah'){echo "selected";} ?>>Menikah</option>
					  	<option value="Belum Menikah" <?php if($rPe['status'] == 'Belum Menikah'){echo "selected";} ?>>Belum Menikah</option>
					  </select>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="jml_anak" class="form-label">Jumlah Anak</label>
					  <input type="number" class="form-control" id="jml_anak" name="jml_anak" required value="<?= $rPe['jumlah_anak']; ?>">
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
						<a href="?p=pegawai" class="btn btn-danger">Batal</a>
					</div>
				</form>
			</div>
		</div>