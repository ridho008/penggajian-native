<div class="row">
	<div class="col-md-6">
		<!-- Pesan -->
		<?php if(isset($_GET['m']) == 'berhasil') : ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
			  <strong>Proses Berhasil!</strong> Silahkan Lihat.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php endif; ?>
		<!-- /Pesan -->
	</div>
</div>
<div class="card">
  <div class="card-header">
    Data Jabatan
  </div>
  <div class="row">
  	<div class="col-md-6 mt-3 ml-3">
  		<a href="?p=jtambah" class="btn btn-primary"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
		</svg> Tambah Jabatan</a>
  	</div>
  </div>
  <div class="card-body">
  	<table class="table table-striped table-hover text-center">
  		<thead>
  			<tr>
  				<th>No</th>
  				<th>Kode Jabatan</th>
  				<th>Nama Jabatan</th>
  				<th>Gaji Pokok</th>
  				<th>Tunjungan</th>
  				<th>Aksi</th>
  			</tr>
  		</thead>
			<tbody>
				<?php 
				$sql = mysqli_query($konek, "SELECT * FROM jabatan ORDER BY kode_jabatan DESC") or die(mysqli_error($konek));
				$no = 1;
				while($d = mysqli_fetch_assoc($sql)) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $d['kode_jabatan']; ?></td>
					<td><?= $d['nama_jabatan']; ?></td>
					<td><?= number_format($d['gapok']); ?></td>
					<td><?= number_format($d['tunjangan_jabatan']); ?></td>
					<td>
						<a href="?p=jubah&id=<?= $d['kode_jabatan']; ?>" class="btn btn-info">Ubah</a>
						<a href="?p=jhapus&id=<?= $d['kode_jabatan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')">Hapus</a>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
  </div>
</div>

