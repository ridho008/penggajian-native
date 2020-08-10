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