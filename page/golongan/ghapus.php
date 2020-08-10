<?php
$id = $_GET['id'];

$sql = mysqli_query($konek, "DELETE FROM golongan WHERE kode_golongan = '$id'") or die(mysqli_error($konek));
if($sql) {
	echo "<script>alert('Data Golongan Berhasil Dihapus.');window.location='?p=golongan';</script>";
} else {
	echo "<script>alert('Data Golongan Gagal Dihapus.');window.location='?p=golongan';</script>";
}