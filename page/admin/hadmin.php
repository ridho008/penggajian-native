<?php
$id = $_GET['id'];

$sql = mysqli_query($konek, "DELETE FROM admin WHERE id_admin = $id AND id_admin != '1'") or die(mysqli_error($konek));
if($sql) {
	echo "<script>alert('Data Admin Berhasil Dihapus.');window.location='?p=admin';</script>";
} else {
	echo "<script>alert('Data Admin Gagal Dihapus.');window.location='?p=admin';</script>";
}