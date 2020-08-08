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