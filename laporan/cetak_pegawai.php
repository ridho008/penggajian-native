<?php 
session_start();

if(isset($_SESSION['id'])) {
require_once '../config/koneksi.php';
require_once '../config/functions.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Data Pegawai</title>
	<style>
		table {border-collapse: collapse;}
		@media print {
			.no-print {
				display: none;;
			}	
		}
	</style>
</head>
<body>
	
<h3 align="center">PT. SURYA PEKANBARU</h3>
<hr width="200">
<p align="center">LAPORAN DATA PEGAWAI</p>

<table border="1" cellpadding="10" cellspacing="0" align="center" width="100%">
	<tr>
		<th>No</th>
		<th>NIP</th>
		<th>Nama Pegawai</th>
		<th>Jabatan</th>
		<th>Golongan</th>
		<th>Status</th>
		<th>Jumlah Anak</th>
	</tr>
	<?php 
	$sql = mysqli_query($konek, "SELECT pegawai.*, golongan.nama_golongan, jabatan.nama_jabatan 
		FROM pegawai 
		INNER JOIN jabatan ON jabatan.kode_jabatan = pegawai.kode_jabatan 
		INNER JOIN golongan ON golongan.kode_golongan = pegawai.kode_golongan 
		ORDER BY golongan.nama_golongan DESC
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
	</tr>
	<?php } ?>
	<?php 
	if(mysqli_num_rows($sql) === 0) { ?>
	<tr><td>Tidak ada data.</td></tr>
	<?php } ?>
</table>

<table width="100%">
	<tr>
		<td></td>
		<td width="200">
			<p>Pekanbaru, Riau <?= tglIndo(date('Y-m-d')); ?></p>
			<br>
			Administror, 
			<br><br><br>
			<p>__________________</p>
		</td>
	</tr>
</table>

<a href="#" class="no-print" onclick="window.print()">Cetak Laporan</a>

</body>
</html>
<?php 
} else {
	header("Location: login.php");
	exit;
}
?>