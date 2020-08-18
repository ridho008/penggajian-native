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
	<title>Laporan Data Golongan</title>
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
<p align="center">LAPORAN DATA GOLONGAN</p>

<table border="1" cellpadding="10" cellspacing="0" align="center" width="100%">
	<tr>
		<th>No</th>
		<th>Kode Golongan</th>
		<th>Nama Golongan</th>
		<th>Tunjangan S/I</th>
		<th>Tunjungan Anak</th>
		<th>Uang Makan</th>
		<th>Uang Lembur</th>
		<th>Askes</th>
	</tr>
	<?php 
	$sql = mysqli_query($konek, "SELECT * FROM golongan ORDER BY kode_golongan DESC") or die(mysqli_error($konek));
	$no = 1;
	while($d = mysqli_fetch_assoc($sql)) {
	?>
	<tr>
		<td><?= $no++; ?></td>
		<td><?= $d['kode_golongan']; ?></td>
		<td><?= $d['nama_golongan']; ?></td>
		<td><?= rupiah($d['tunjangan_suami_istri']); ?></td>
		<td><?= rupiah($d['tunjangan_anak']); ?></td>
		<td><?= rupiah($d['uang_makan']); ?></td>
		<td><?= rupiah($d['uang_lembur']); ?></td>
		<td><?= rupiah($d['askes']); ?></td>
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