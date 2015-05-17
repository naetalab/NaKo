<?php
	include 'koneksi.php';
	$nama_suplier=$_POST['nama_suplier'];
	$alamat_suplier=$_POST['alamat_suplier'];

	$query=mysql_query("insert into suplier (nama_suplier,alamat_suplier) values ('$nama_suplier','$alamat_suplier')");
	if ($query) 
	{
		header("location:page_suplier.php");
	}
	else
	{
		echo "Error";
	}
	?>