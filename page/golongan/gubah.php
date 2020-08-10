<?php
$id = $_GET['id'];
$queryGo = mysqli_query($konek, "SELECT * FROM golongan WHERE kode_golongan = '$id'") or die(mysqli_error($konek));
$rGo = mysqli_fetch_assoc($queryGo);

if(isset($_POST['ubah'])) {
	if(ubahGolongan($_POST) > 0) {
		echo "<script>alert('Data Golongan Berhasil Diubah.');window.location='?p=golongan';</script>";
	} else {
		echo "<script>alert('Data Golongan Gagal Diubah.');window.location='?p=golongan';</script>";
	}
}
?>
		

		<div class="card">
			<div class="card-header">
				Ubah Data Golongan
			</div>
			<div class="card-body">
				<form action="" method="post" class="needs-validation" novalidate>
					<div class="mb-3">
					  <label for="kode" class="form-label">Kode Golongan</label>
					  <input type="text" class="form-control" id="kode" name="kode" value="<?= $rGo['kode_golongan']; ?>" required readonly>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="nama" class="form-label">Nama Golongan</label>
					  <input type="text" class="form-control" id="nama" name="nama" required value="<?= $rGo['nama_golongan']; ?>">
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="si" class="form-label">Tunjangan S/I</label>
					  <input type="number" class="form-control" id="si" name="si" required value="<?= $rGo['tunjangan_suami_istri']; ?>">
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="anak" class="form-label">Tunjangan Anak</label>
					  <input type="number" class="form-control" id="anak" name="anak" required value="<?= $rGo['tunjangan_anak']; ?>">
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="makan" class="form-label">Uang Makan</label>
					  <input type="number" class="form-control" id="makan" name="makan" required value="<?= $rGo['uang_makan']; ?>">
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="lembur" class="form-label">Uang Lembur</label>
					  <input type="number" class="form-control" id="lembur" name="lembur" required value="<?= $rGo['uang_lembur']; ?>">
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="askes" class="form-label">Askes</label>
					  <input type="number" class="form-control" id="askes" name="askes" required value="<?= $rGo['askes']; ?>">
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
						<a href="?p=golongan" class="btn btn-danger">Batal</a>
					</div>
				</form>
			</div>
		</div>