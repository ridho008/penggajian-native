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