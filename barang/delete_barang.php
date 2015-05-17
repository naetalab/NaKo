<?php 	
		include 'koneksi.php' ;
		$id=$_GET['id'];
		
		$query=mysql_query("delete from barang where id='$id'");
		if ($query) 
		{
			header("location:tabel_barang.php");
		}
		else
		{
			echo" Error";
		}
?>