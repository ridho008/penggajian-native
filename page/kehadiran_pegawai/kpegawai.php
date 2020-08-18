<?php

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
					<button type="submit" class="btn btn-primary float-left mt-4 mr-1"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cursor-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  <path fill-rule="evenodd" d="M14.082 2.182a.5.5 0 0 1 .103.557L8.528 15.467a.5.5 0 0 1-.917-.007L5.57 10.694.803 8.652a.5.5 0 0 1-.006-.916l12.728-5.657a.5.5 0 0 1 .556.103z"/>
					</svg> Lihat</button><br>
					<a href="?p=ktambah" class="btn btn-warning"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
					  <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
					</svg> Input Kehadiran Pegawai</a>
				</div>
		</div>
		</form>
	</div>
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
        	
    	<!-- </div> -->
    
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