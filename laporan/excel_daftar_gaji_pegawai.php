<?php 
require_once '../config/koneksi.php';

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachement; filename=daftar_gaji_pegawai.xls");

$bulanTahun = $_GET['bulan'] . $_GET['tahun'];

?>
<h3>PT. SURYA PEKANBARU</h3>
<p>Bulan : <?= $_GET['bulan'] . ", Tahun : " . $_GET['tahun']; ?></p>
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
			<td><?= $d['status']; ?></td>
			<td><?= $d['jumlah_anak']; ?></td>
			<td><?= $d['tunjangan_jabatan']; ?></td>
			<td><?= $d['tjsi']; ?></td>
			<td><?= $d['tjanak']; ?></td>
			<td><?= $d['uangmakan']; ?></td>
			<td><?= $d['uanglembur']; ?></td>
			<td><?= $d['askes']; ?></td>
			<td><?= $d['pendapatan']; ?></td>
			<td><?= $d['potongan']; ?></td>
			<td><?= $d['totalgaji']; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>