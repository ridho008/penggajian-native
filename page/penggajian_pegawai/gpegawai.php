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
<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-header">
				Data Gaji Pegawai
			</div>
		</div>
		<div class="card-body">
			<form action="" method="post" class="needs-validation" novalidate>
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
							</svg> Lihat</button>
						</div>
					</div>
				</div>
			</form>

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

			<!-- Tabel Penggajian Pegawai -->
			<div class="row">
				<div class="col-md">
					<div class="table-responsive">
					<table class="table table-striped table-hover text-center">
						<thead>
							<tr>
								<th>No</th>
								<th>NIP</th>
								<th>Nama Pegawai</th>
								<th>Jabatan</th>
								<th>Golongan</th>
								<th>Status</th>
								<th>Jumlah Anak</th>
								<th>Tj. Jabatan</th>
								<th>Tj. S/I</th>
								<th>Tj. Anak</th>
								<th>Uang Makan</th>
								<th>Uang Lembur</th>
								<th>Askses</th>
								<th>Pendapatan</th>
								<th>Potongan</th>
								<th>Total Gaji</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$sql = mysqli_query($konek, "SELECT pegawai.nip, pegawai.nama_pegawai, jabatan.nama_jabatan, golongan.nama_golongan, pegawai.status, pegawai.jumlah_anak, jabatan.gapok, jabatan.tunjangan_jabatan, 
								IF(pegawai.status='Menikah', tunjangan_suami_istri,0) AS tjsi, 
								IF(pegawai.status ='Menikah', tunjangan_anak,0) AS tjanak, uang_makan AS uangmakan, master_gaji.lembur*uang_lembur AS uanglembur, 
								askes, (gapok+tunjangan_jabatan+(SELECT tjsi)+(SELECT tjanak)+(SELECT uangmakan)+(SELECT uanglembur)+askes) AS pendapatan, potongan, (SELECT pendapatan) - potongan AS totalgaji 
								FROM pegawai 
								INNER JOIN master_gaji ON master_gaji.nip = pegawai.nip 
								INNER JOIN golongan ON golongan.kode_golongan = pegawai.kode_golongan 
								INNER JOIN jabatan ON jabatan.kode_jabatan = pegawai.kode_jabatan 
								WHERE master_gaji.bulan = '$buta' 
								ORDER BY pegawai.nip ASC
								") or die(mysqli_error($konek));

							$no = 1;
							while($d = mysqli_fetch_assoc($sql)) {
							?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $d['nip']; ?></td>
								<td><?= $d['nama_pegawai']; ?></td>
								<td><?= $d['nama_jabatan']; ?></td>
								<td><?= $d['nama_golongan']; ?></td>
								<td><?= $d['status']; ?></td>
								<td><?= $d['jumlah_anak']; ?></td>
								<td><?= rupiah($d['tunjangan_jabatan']); ?></td>
								<td><?= rupiah($d['tjsi']); ?></td>
								<td><?= rupiah($d['tjanak']); ?></td>
								<td><?= rupiah($d['uangmakan']); ?></td>
								<td><?= rupiah($d['uanglembur']); ?></td>
								<td><?= rupiah($d['askes']); ?></td>
								<td><?= rupiah($d['pendapatan']); ?></td>
								<td><?= rupiah($d['potongan']); ?></td>
								<td><?= rupiah($d['totalgaji']); ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					</div>
					<!-- TOmbol Cetak -->
					<?php if(mysqli_num_rows($sql) > 0) : ?>
					<!-- <center> -->
						<a href="laporan/daftar_gaji_pegawai.php?bulan=<?= $bulan; ?>&tahun=<?= $tahun; ?>" target="_blank" class="btn btn-info mt-1"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-printer" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path d="M11 2H5a1 1 0 0 0-1 1v2H3V3a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2h-1V3a1 1 0 0 0-1-1zm3 4H2a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h1v1H2a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1z"/>
						  <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM5 8a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H5z"/>
						  <path d="M3 7.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
						</svg> Cetak</a>
					<!-- </center> -->
					<?php endif; ?>
					<!-- /TOmbol Cetak -->
				</div>
			</div>
			<!-- /Tabel Penggajian Pegawai -->

		</div>
	</div>
</div>