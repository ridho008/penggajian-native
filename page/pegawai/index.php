<div class="card">
  <div class="card-header">
    Data Pegawai
  </div>
  <div class="row">
  	<div class="col-md-6 mt-3 ml-3">
  		<a href="?p=ptambah" class="btn btn-primary"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
		</svg> Tambah Pegawai</a>
  	</div>
  </div>
  <div class="card-body">
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
  				<th>Aksi</th>
  			</tr>
  		</thead>
			<tbody>
				<?php 
				$sql = mysqli_query($konek, "SELECT pegawai.*, 
					jabatan.nama_jabatan, golongan.nama_golongan 
					FROM pegawai INNER JOIN jabatan ON 
					pegawai.kode_jabatan = jabatan.kode_jabatan 
					INNER JOIN golongan ON 
					pegawai.kode_golongan = golongan.kode_golongan 
					ORDER BY pegawai.nama_pegawai ASC") or die(mysqli_error($konek));
				$no = 1;
				while($d = mysqli_fetch_assoc($sql)) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $d['nip']; ?></td>
					<td><?= $d['nama_pegawai']; ?></td>
					<td><?= $d['nama_jabatan']; ?></td>
					<td><?= $d['nama_golongan']; ?></td>
					<td><?= $d['status']; ?></td>
					<td><?= $d['jumlah_anak']; ?></td>
					<td>
						<a href="?p=pubah&id=<?= $d['nip']; ?>" class="btn btn-info">Ubah</a>
						<a href="?p=phapus&id=<?= $d['nip']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')">Hapus</a>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
  </div>
</div>

