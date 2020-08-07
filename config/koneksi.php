<?php
$konek = mysqli_connect("localhost", "root", "", "penggajian_native") or die(mysqli_error($konek));

function base_url($url = null)
{
	$base_url = "http://localhost/penggajian-native/";
	if($url != null) {
		return $base_url . $url;
	} else {
		return $base_url;
	}
}