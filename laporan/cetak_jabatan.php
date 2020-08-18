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
	<title>Laporan Data Jabatan</title>
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
<p align="center">LAPORAN DATA JABATAN</p>

<table border="1" cellpadding="10" cellspacing="0" align="center" width="100%">
	<tr>
		<th>No</th>
		<th>Kode Jabatan</th>
		<th>Nama Jabatan</th>
		<th>Gaji Pokok</th>
		<th>Tunjungan</th>
	</tr>
	<?php 
	$sql = mysqli_query($konek, "SELECT * FROM jabatan ORDER BY kode_jabatan DESC") or die(mysqli_error($konek));
	$no = 1;
	while($d = mysqli_fetch_assoc($sql)) {
	?>
	<tr>
		<td><?= $no++; ?></td>
		<td><?= $d['kode_jabatan']; ?></td>
		<td><?= $d['nama_jabatan']; ?></td>
		<td><?= rupiah($d['gapok']); ?></td>
		<td><?= rupiah($d['tunjangan_jabatan']); ?></td>
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