<?php 
session_start();

if(isset($_SESSION['id'])) {
require_once '../config/koneksi.php';
require_once '../config/functions.php';

$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$bulanTahun = $bulan . $tahun;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laporan Data Potonga Gaji Pegawai</title>
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
<p align="center">LAPORAN DATA POTONGAN GAJI PEGAWAI</p>
<p>Bulan : <?= bulanIndo($bulan); ?><br> Tahun : <?= $tahun; ?> </p>
<table border="1" cellpadding="10" cellspacing="0" align="center" width="100%">
	<tr>
		<th>No</th>
		<th>NIP</th>
		<th>Nama Pegawai</th>
		<th>Jabatan</th>
		<th>Golongan</th>
		<th>Potongan</th>
	</tr>
	<?php 
	$sql = mysqli_query($konek, "SELECT pegawai.nip, pegawai.nama_pegawai, jabatan.nama_jabatan, 
		golongan.nama_golongan, master_gaji.potongan 
		FROM pegawai 
		INNER JOIN jabatan ON jabatan.kode_jabatan = pegawai.kode_jabatan 
		INNER JOIN golongan ON golongan.kode_golongan = pegawai.kode_golongan 
		INNER JOIN master_gaji ON master_gaji.nip = pegawai.nip 
		WHERE master_gaji.bulan = '$bulanTahun' 
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
		<td><?= rupiah($d['potongan']); ?></td>
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
			Administrator, 
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