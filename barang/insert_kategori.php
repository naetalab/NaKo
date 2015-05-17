<?php
	include 'koneksi.php';
	$nama_kategori=$_POST['nama_kategori'];

	$query=mysql_query("insert into kategori (nama_kategori) values ('$nama_kategori')");
	if ($query) 
	{
		header("location:page_kategori.php");
	}
	else
	{
		echo "Error";
	}
	?>