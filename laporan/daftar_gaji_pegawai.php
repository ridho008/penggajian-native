<?php 
session_start();
if(isset($_SESSION['id'])) {
require_once '../config/koneksi.php';
require_once '../config/functions.php';

if((isset($_GET['bulan']) && $_GET['bulan'] != '') && isset($_GET['tahun']) && $_GET['tahun'] != '') {
	$bulan = $_GET['bulan'];
	$tahun = $_GET['tahun'];
	$buta = $bulan . $tahun;
} else {
	$bulan = date('m');
	$tahun = date('Y');
	$buta = $bulan . $tahun;
}	

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cetak Daftar Gaji Pegawai</title>
	<style>
		body {font-family: arial;}
		@media print {
			.no-print {
				display: none;
			}
		}

		table {
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	
<h3 align="center">PT. SURYA PEKANBARU <b>Daftar Gaji Pegawai</b></h3>
<hr width="200">
<table align="center">
	<tr>
		<td>Bulan</td>
		<td>:</td>
		<td><?= bulanIndo($bulan); ?></td>
	</tr>
	<tr>
		<td>Tahun</td>
		<td>:</td>
		<td><?= $tahun; ?></td>
	</tr>
</table>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
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

<table width="100%">
	<tr>
		<td></td>
		<td width="200">
			<p>Jl. Pepaya, <?= tglIndo(date('Y-m-d')); ?> Bendahara,</p>
			<br>
			<br>
			<br>
			<p>_______________________</p>
		</td>
	</tr>
</table>

<a href="" class="no-print" onclick="window.print()">Cetak</a>

</body>
</html>
<?php 
} else {
	header("Location: login.php");
	exit;
}
?>