<?php
//membuat kode_jabatan otomatis
$simbol = "G";
$query = mysqli_query($konek, "SELECT max(kode_golongan) AS kode FROM golongan WHERE kode_golongan LIKE '$simbol%'") or die(mysqli_error($konek));
$data = mysqli_fetch_assoc($query);
$kodeTerakhir = $data['kode'];
$nomorTerakhir = substr($kodeTerakhir, 1, 2);
$nextNomor = $nomorTerakhir + 1;
$nextKode = $simbol.sprintf('%02s', $nextNomor); 

if(isset($_POST['tambah'])) {
	if(tambahGolongan($_POST) > 0) {
		echo "<script>alert('Data Golongan Berhasil Ditambahkan.');window.location='?p=golongan';</script>";
	} else {
		echo "<script>alert('Data Golongan Gagal Ditambahkan.');window.location='?p=golongan';</script>";
	}
}
?>
		
		<!-- HTML Tambah -->
		<div class="card">
			<div class="card-header">
				Tambah Data Golongan
			</div>
			<div class="card-body">
				<form action="" method="post" class="needs-validation" novalidate>
					<div class="mb-3">
					  <label for="kode" class="form-label">Kode Golongan</label>
					  <input type="text" class="form-control" id="kode" name="kode" value="<?= $nextKode; ?>" required readonly>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="nama" class="form-label">Nama Golongan</label>
					  <input type="text" class="form-control" id="nama" name="nama" required>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="si" class="form-label">Tunjangan S/I</label>
					  <input type="number" class="form-control" id="si" name="si" required>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="anak" class="form-label">Tunjangan Anak</label>
					  <input type="number" class="form-control" id="anak" name="anak" required>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="makan" class="form-label">Uang Makan</label>
					  <input type="number" class="form-control" id="makan" name="makan" required>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="lembur" class="form-label">Uang Lembur</label>
					  <input type="number" class="form-control" id="lembur" name="lembur" required>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <label for="askes" class="form-label">Askes</label>
					  <input type="number" class="form-control" id="askes" name="askes" required>
					  <div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
					  <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
						<a href="?p=golongan" class="btn btn-danger">Batal</a>
					</div>
				</form>
			</div>
		</div>