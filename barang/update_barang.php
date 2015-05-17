<?php 
	include 'koneksi.php';

	$nama_barang=$_POST['nama_barang'];
	$harga_beli=$_POST['harga_beli'];
	$harga_jual=$_POST['harga_jual'];
	$kategori=$_POST['kategori'];
	$suplier=$_POST['suplier'];
	$stock=$_POST['stock'];
	$id_barang=$_POST['id_barang'];

	

	$query=("update barang  set nama_barang='$nama_barang', harga_beli='$harga_beli',harga_jual='$harga_jual',kategori_barang='$kategori',suplier='$suplier',stock='$stock' where id='$id_barang' ");
	$insert=mysql_query($query);
	if ($insert) {
		header("location:tabel_barang.php");
	}
	else
	{
		echo "Error";
	}
?>