<?php
require_once 'koneksi.php';

function tambahAdmin($data)
{
	global $konek;
	$username = htmlspecialchars($data['username']);
	$password = htmlspecialchars(md5($data['password']));
	$nama = htmlspecialchars($data['nama']);

	mysqli_query($konek, "INSERT INTO admin VALUES(null, '$username', '$password', '$nama')") or die(mysqli_error($konek));
	return mysqli_affected_rows($konek);
}

function ubahAdmin($data)
{
	global $konek;
	$id = htmlspecialchars($data['id']);
	$username = htmlspecialchars($data['username']);
	$password = htmlspecialchars(md5($data['password']));
	$nama = htmlspecialchars($data['nama']);

	mysqli_query($konek, "UPDATE admin SET username = '$username', password = '$password', nama_lengkap = '$nama' WHERE id_admin = $id") or die(mysqli_error($konek));
	return mysqli_affected_rows($konek);
}


// ------------------JABATAN---------------------------

function tambahJabatan($data)
{
	global $konek;
	$kode = htmlspecialchars($data['kode']);
	$nama = htmlspecialchars($data['nama']);
	$gaji = htmlspecialchars($data['gaji']);
	$tunjangan = htmlspecialchars($data['tunjangan']);

	if(empty($kode && $nama && $gaji && $tunjangan)) {
		echo "<script>alert('Form harus di isi semua.')</script>";
		return false;
	}

	mysqli_query($konek, "INSERT INTO jabatan VALUES('$kode', '$nama', '$gaji', '$tunjangan')") or die(mysqli_error($konek));
	return mysqli_affected_rows($konek);
}

function ubahJabatan($data)
{
	global $konek;
	$idJ = htmlspecialchars($data['kode']);
	$nama = htmlspecialchars($data['nama']);
	$gaji = htmlspecialchars($data['gaji']);
	$tunjangan = htmlspecialchars($data['tunjangan']);

	if(empty($idJ && $nama && $gaji && $tunjangan)) {
		echo "<script>alert('Form harus di isi semua.')</script>";
		return false;
	}

	$sql = mysqli_query($konek, "UPDATE jabatan SET nama_jabatan = '$nama', gapok = '$gaji', tunjangan_jabatan = '$tunjangan' WHERE kode_jabatan = '$idJ'") or die(mysqli_error($konek));
	return mysqli_affected_rows($konek);
	// if($sql) {
	// 	echo "<script>alert('Data Jabatan Berhasil Ditambahkan.');window.location='?p=jabatan&m=berhasil';</script>";
	// } else {
	// 	echo "<script>alert('Data Jabatan Gagal Ditambahkan.');window.location='?p=jabatan&m=gagal';</script>";
	// }
}


// ------------------GOLONGAN---------------------

function tambahGolongan($data)
{
	global $konek;
	$kode = htmlspecialchars($data['kode']);
	$nama = htmlspecialchars($data['nama']);
	$si = htmlspecialchars($data['si']);
	$anak = htmlspecialchars($data['anak']);
	$makan = htmlspecialchars($data['makan']);
	$lembur = htmlspecialchars($data['lembur']);
	$askes = htmlspecialchars($data['askes']);

	if(empty($kode && $nama && $si && $anak && $makan && $lembur && $askes)) {
		echo "<script>alert('Form harus di isi semua.')</script>";
		return false;
	}

	mysqli_query($konek, "INSERT INTO golongan VALUES('$kode', '$nama', '$si', '$anak', '$makan', '$lembur', '$askes')") or die(mysqli_error($konek));
	return mysqli_affected_rows($konek);
}

function ubahGolongan($data)
{
	global $konek;
	$kode = htmlspecialchars($data['kode']);
	$nama = htmlspecialchars($data['nama']);
	$si = htmlspecialchars($data['si']);
	$anak = htmlspecialchars($data['anak']);
	$makan = htmlspecialchars($data['makan']);
	$lembur = htmlspecialchars($data['lembur']);
	$askes = htmlspecialchars($data['askes']);

	if(empty($kode && $nama && $si && $anak && $makan && $lembur && $askes)) {
		echo "<script>alert('Form harus di isi semua.')</script>";
		return false;
	}

	mysqli_query($konek, "UPDATE golongan SET nama_golongan = '$nama', tunjangan_suami_istri = '$si', tunjangan_anak = '$anak', uang_makan = '$makan', uang_lembur = '$lembur', askes = '$askes' WHERE kode_golongan = '$kode'") or die(mysqli_error($konek));
	return mysqli_affected_rows($konek);
}


// ---------------------PEGAWAI-----------------------

function tambahPegawai($data)
{
	global $konek;
	$nip = htmlspecialchars($data['nip']);
	$nama = htmlspecialchars($data['nama']);
	$jabatan = htmlspecialchars($data['jabatan']);
	$golongan = htmlspecialchars($data['golongan']);
	$status = htmlspecialchars($data['status']);
	$jml_anak = htmlspecialchars($data['jml_anak']);

	if(empty($nip && $nama && $jabatan && $golongan && $status && $jml_anak)) {
		echo "<script>alert('Form harus di isi semua.')</script>";
		return false;
	}

	mysqli_query($konek, "INSERT INTO pegawai VALUES ('$nip', '$nama', '$jabatan', '$golongan', '$status', '$jml_anak')") or die(mysqli_error($konek));
	return mysqli_affected_rows($konek);
}

function ubahPegawai($data)
{
	global $konek;
	$nip = htmlspecialchars($data['nip']);
	$nama = htmlspecialchars($data['nama']);
	$jabatan = htmlspecialchars($data['jabatan']);
	$golongan = htmlspecialchars($data['golongan']);
	$status = htmlspecialchars($data['status']);
	$jml_anak = htmlspecialchars($data['jml_anak']);

	if(empty($nip && $nama && $jabatan && $golongan && $status)) {
		echo "<script>alert('Form harus di isi semua.')</script>";
		return false;
	}

	mysqli_query($konek, "UPDATE pegawai SET nama_pegawai = '$nama', kode_jabatan = '$jabatan', kode_golongan = '$golongan', status = '$status', jumlah_anak = '$jml_anak' WHERE nip = '$nip'") or die(mysqli_error($konek));
	return mysqli_affected_rows($konek);
}


// ---------------------------Data Kehadiran Pegawai-----------------------------------

function tambahKehadiran($data)
{
	global $konek;
	$nip = $data['nip'];

	// menghitung berapa jumlah nip berada di DB
	$count = count($data['nip']);

	for ($i=0; $i < $count; $i++) {
		$nip = $data['nip'][$i];
		$bulan = $data['bulan'][$i];
		$masuk = $data['masuk'][$i];
		$sakit = $data['sakit'][$i];
		$izin = $data['izin'][$i];
		$alpha = $data['alpha'][$i];
		$lembur = $data['lembur'][$i];
		$potongan = $data['potongan'][$i];
		
		mysqli_query($konek, "INSERT INTO master_gaji VALUES('$bulan', '$nip', '$masuk', '$sakit', '$izin', '$alpha', '$lembur', '$potongan')") or die($konek);
	}
	return mysqli_affected_rows($konek);

}

function editKehadiran($data)
{
	global $konek;
	$nip = $data['nip'];

	// menghitung berapa jumlah nip berada di DB
	$count = count($data['nip']);

	for ($i=0; $i < $count; $i++) {
		$nip = $data['nip'][$i];
		$bulan = $data['bulan'][$i];
		$masuk = $data['masuk'][$i];
		$sakit = $data['sakit'][$i];
		$izin = $data['izin'][$i];
		$alpha = $data['alpha'][$i];
		$lembur = $data['lembur'][$i];
		$potongan = $data['potongan'][$i];
		
		mysqli_query($konek, "UPDATE master_gaji SET masuk = '$masuk', sakit = '$sakit', izin = '$izin', alpha = '$alpha', lembur = '$lembur', potongan = '$potongan' WHERE bulan = '$bulan' AND nip = '$nip'") or die($konek);
	}
	return mysqli_affected_rows($konek);

}

function rupiah($angka)
{
	$rupiah = "Rp. " . number_format($angka, 0, ',', '.');
	return $rupiah;
}

function bulanIndo($angkaBulan)
{
	switch ($angkaBulan) {
		case '1':
			$bulan = "Januari";
			break;
		case '2':
			$bulan = "Februari";
			break;
		case '3':
			$bulan = "Maret";
			break;
		case '4':
			$bulan = "April";
			break;
		case '5':
			$bulan = "Mei";
			break;
		case '6':
			$bulan = "Juni";
			break;
		case '7':
			$bulan = "Juli";
			break;
		case '8':
			$bulan = "Agustus";
			break;
		case '9':
			$bulan = "September";
			break;
		case '10':
			$bulan = "Oktober";
			break;
		case '11':
			$bulan = "November";
			break;
		case '12':
			$bulan = "Desember";
			break;
		
		default:
			$bulan = "Tidak ada bulan yang dipilih.";
			break;
	}
	return $bulan;
}

function tglIndo($tgl)
{
	// contoh : 2020-08-1, mendapatkan angka 8, hitung mulai dari 0. di bagian tanggalnya termasuk - (strip).
	$tanggal = substr($tgl, 8, 2);
	$bulan = bulanIndo(substr($tgl, 5, 2));
	$tahun = substr($tgl, 0, 4);

	return $tanggal . ' ' . $bulan . ' ' . $tahun;
}