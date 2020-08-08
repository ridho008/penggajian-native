<?php 
$idJ = $_GET['id'];
$sqlUbah = mysqli_query($konek, "SELECT * FROM jabatan WHERE kode_jabatan = '$idJ'") or die(mysqli_error($konek));
$dEdit = mysqli_fetch_assoc($sqlUbah);

if(isset($_POST['ubah'])) {
	if(ubahJabatan($_POST) > 0) {
		echo "<script>alert('Data Jabatan Berhasil Diubah.');window.location='?p=jabatan&m=berhasil';</script>";
	} else {
		echo "<script>alert('Data Jabatan Gagal Diubah.');window.location='?p=jabatan&m=gagal';</script>";
	}
}

?>
<div class="card">
	<div class="card-header">
		Ubah Data Jabatan
	</div>
	<div class="card-body">
		<form action="" method="post" class="needs-validation" novalidate>
			<div class="mb-3">
			  <label for="kode" class="form-label">Kode Jabatan</label>
			  <input type="text" class="form-control" id="kode" name="kode" value="<?= $dEdit['kode_jabatan']; ?>" required readonly>
			  <div class="valid-feedback">
		      Terlihat bagus!
		    </div>
			</div>
			<div class="mb-3">
			  <label for="nama" class="form-label">Nama Jabatan</label>
			  <input type="text" class="form-control" id="nama" name="nama" required value="<?= $dEdit['nama_jabatan']; ?>">
			  <div class="valid-feedback">
		      Terlihat bagus!
		    </div>
			</div>
			<div class="mb-3">
			  <label for="gaji" class="form-label">Gaji Pokok</label>
			  <input type="number" class="form-control" id="gaji" name="gaji" required value="<?= $dEdit['gapok']; ?>">
			  <div class="valid-feedback">
		      Terlihat bagus!
		    </div>
			</div>
			<div class="mb-3">
			  <label for="tunjangan" class="form-label">Tunjangan Jabatan</label>
			  <input type="number" class="form-control" id="tunjangan" name="tunjangan" required value="<?= $dEdit['tunjangan_jabatan']; ?>">
			  <div class="valid-feedback">
		      Terlihat bagus!
		    </div>
			</div>
			<div class="mb-3">
			  <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
				<a href="?p=jabatan" class="btn btn-danger">Batal</a>
			</div>
		</form>
	</div>
</div>
