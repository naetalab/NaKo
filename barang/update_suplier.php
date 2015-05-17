<?php 
	include 'koneksi.php';

	$nama_suplier=$_POST['nama_suplier'];
	$alamat_suplier=$_POST['alamat_suplier'];
	$id=$_POST['id_suplier'];

	

	$query=mysql_query("update suplier  set nama_suplier='$nama_suplier', alamat_suplier='$alamat_suplier' where id='$id' ");
	//$insert=mysql_query($query);
	if ($query) {
		header("location:tabel_suplier.php");
	}
	else
	{
		echo "Error";
	}
?>