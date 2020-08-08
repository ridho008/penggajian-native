<?php
$id = $_GET['id'];

$sql = mysqli_query($konek, "DELETE FROM jabatan WHERE kode_jabatan = '$id'") or die(mysqli_error($konek));
if($sql) {
	echo "<script>alert('Data Jabatan Berhasil Dihapus.');window.location='?p=jabatan';</script>";
} else {
	echo "<script>alert('Data Jabatan Gagal Dihapus.');window.location='?p=jabatan';</script>";
}