<?php 
	include 'koneksi.php';

	$nama_kategori=$_POST['nama_kategori'];
	$id=$_POST['id_kategori'];

	

	$query=mysql_query("update kategori  set nama_kategori='$nama_kategori' where id='$id' ");
	//$insert=mysql_query($query);
	if ($query) {
		header("location:tabel_kategori.php");
	}
	else
	{
		echo "Error";
	}
?>