<?php
$id = $_GET['id'];

$sql = mysqli_query($konek, "DELETE FROM pegawai WHERE nip = '$id'") or die(mysqli_error($konek));
if($sql) {
	echo "<script>alert('Data Pegawai Berhasil Dihapus.');window.location='?p=pegawai';</script>";
} else {
	echo "<script>alert('Data Pegawai Gagal Dihapus.');window.location='?p=pegawai';</script>";
}