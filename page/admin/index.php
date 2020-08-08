<?php 
$tampilAdmin = mysqli_query($konek, "SELECT * FROM admin ORDER BY id_admin DESC") or die(mysqli_error($konek));

if(isset($_POST['tambah'])) {
	if(tambahAdmin($_POST) > 0) {
		echo "<script>alert('Data Admin Berhasil Ditambahkan.');window.location='?p=admin';</script>";
	} else {
		echo "<script>alert('Data Admin Gagal Ditambahkan.');window.location='?p=admin';</script>";
	}
}

if(isset($_POST['ubah'])) {
	if(ubahAdmin($_POST) > 0) {
		echo "<script>alert('Data Admin Berhasil Diubah.');window.location='?p=admin';</script>";
	} else {
		echo "<script>alert('Data Admin Gagal Diubah.');window.location='?p=admin';</script>";
	}
}
?>
<div class="card">
  <div class="card-header">
    Data Admin
  </div>
  <div class="row">
  	<div class="col-md-6 mt-3 ml-3">
  		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formTambahModal"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
			</svg> Tambah Admin</button>
  	</div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover text-center">
  		<thead>
  			<tr>
  				<th>No</th>
  				<th>Username</th>
  				<th>Nama</th>
  				<th>Aksi</th>
  			</tr>
  		</thead>
			<tbody>
				<?php 
				$no = 1;
				while($pecahAdmin = mysqli_fetch_assoc($tampilAdmin)) : ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $pecahAdmin['username']; ?></td>
					<td><?= $pecahAdmin['nama_lengkap']; ?></td>
					<td>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#formUbahModal<?= $pecahAdmin['id_admin']; ?>"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
					  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
					</svg> Ubah</button>
						<a href="?p=hadmin&id=<?= $pecahAdmin['id_admin']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
						</svg> Hapus</a>
					</td>
				</tr>
				<!-- Modal Ubah Admin -->
				<div class="modal fade" id="formUbahModal<?= $pecahAdmin['id_admin']; ?>" tabindex="-1" aria-labelledby="formTambahModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="formTambahModalLabel">Tambah Data Admin</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form action="" method="post" class="needs-validation" novalidate>
				        	<input type="text" name="id" value="<?= $pecahAdmin['id_admin']; ?>">
								  <div class="mb-3">
				        		<label for="nama" class="form-label">Nama Lengkap</label>
								  	<input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan nama lengkap" required value="<?= $pecahAdmin['nama_lengkap']; ?>">
								  	<div class="valid-feedback">
								      Terlihat bagus!
								    </div>
									</div>
				        	<div class="mb-3">
				        		<label for="username" class="form-label">Username</label>
								  	<input type="text" name="username" class="form-control" id="username" placeholder="Masukan username" required value="<?= $pecahAdmin['username']; ?>">
								  	<div class="valid-feedback">
								      Terlihat bagus!
								    </div>
									</div>
									<div class="mb-3">
				        		<label for="password" class="form-label">Password</label>
								  	<input type="password" name="password" class="form-control" id="password" placeholder="Masukan password lengkap" required value="<?= $pecahAdmin['password']; ?>">
								  	<div class="valid-feedback">
								      Terlihat bagus!
								    </div>
									</div>
						      <div class="modal-footer">
						        <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
						      </div>
				        </form>
				      </div>
				    </div>
				  </div>
				</div>
				<?php endwhile; ?>
			</tbody>
		</table>
  </div>
</div>


<!-- Modal Tambah Admin -->
<div class="modal fade" id="formTambahModal" tabindex="-1" aria-labelledby="formTambahModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formTambahModalLabel">Tambah Data Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="needs-validation" novalidate>
				  <div class="mb-3">
        		<label for="nama" class="form-label">Nama Lengkap</label>
				  	<input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan nama lengkap" required>
				  	<div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
        	<div class="mb-3">
        		<label for="username" class="form-label">Username</label>
				  	<input type="text" name="username" class="form-control" id="username" placeholder="Masukan username" required>
				  	<div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
					<div class="mb-3">
        		<label for="password" class="form-label">Password</label>
				  	<input type="password" name="password" class="form-control" id="password" placeholder="Masukan password lengkap" required>
				  	<div class="valid-feedback">
				      Terlihat bagus!
				    </div>
					</div>
		      <div class="modal-footer">
		        <button type="reset" class="btn btn-dark" data-dismiss="modal">Reset</button>
		        <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
		      </div>
        </form>
      </div>
    </div>
  </div>
</div>