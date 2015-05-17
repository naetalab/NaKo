<?php 
	include 'koneksi.php';

	$nama_barang=$_POST['nama_barang'];
	$harga_beli=$_POST['harga_beli'];
	$harga_jual=$_POST['harga_jual'];
	$kategori=$_POST['kategori'];
	$suplier=$_POST['suplier'];
	$stock=$_POST['stock'];

	

	$query=("insert into barang (nama_barang,harga_beli,harga_jual,kategori_barang,suplier,stock) 
		value ('$nama_barang','$harga_beli','$harga_jual','$kategori','$suplier','$stock')");
	$insert=mysql_query($query);
	if ($insert) {
		header("location:page_barang.php");
	}
	else
	{
		echo "Error";
	}
?>