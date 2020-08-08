<?php
//membuat kode_jabatan otomatis
$simbol = "J";
$query = mysqli_query($konek, "SELECT max(kode_jabatan) AS kode FROM jabatan WHERE kode_jabatan LIKE '$simbol%'") or die(mysqli_error($konek));
$data = mysqli_fetch_assoc($query);
$kodeTerakhir = $data['kode'];
$nomorTerakhir = substr($kodeTerakhir, 1, 2);
$nextNomor = $nomorTerakhir + 1;
$nextKode = $simbol.sprintf('%02s', $nextNomor); 

if(isset($_POST['tambah'])) {
	if(tambahJabatan($_POST) > 0) {
		echo "<script>alert('Data Jabatan Berhasil Ditambahkan.');window.location='?p=jabatan';</script>";
	} else {
		echo "<script>alert('Data Jabatan Gagal Ditambahkan.');window.location='?p=jabatan';</script>";
	}
}
?>
		
		<!-- HTML Tambah -->
		<div class="card">
			<div class="card-header">
				Tambah Data Jabatan
			</div>
			<div class="card-body">
				<form action="" method="post" class="needs-validation" novalidate>
					<div class="mb-3">
					  <label for="kode" class="form-label">Kode Jabatan</label>
					  <input type="text" class="form-control" id="kode" name="kode" value="<?= $nextKode; ?>" required readonly>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="nama" class="form-label">Nama Jabatan</label>
					  <input type="text" class="form-control" id="nama" name="nama" required>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="gaji" class="form-label">Gaji Pokok</label>
					  <input type="number" class="form-control" id="gaji" name="gaji" required>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="tunjangan" class="form-label">Tunjangan Jabatan</label>
					  <input type="number" class="form-control" id="tunjangan" name="tunjangan" required>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
						<a href="?p=jabatan" class="btn btn-danger">Batal</a>
					</div>
				</form>
			</div>
		</div>