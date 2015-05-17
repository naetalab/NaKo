<?php 	
		include 'koneksi.php' ;
		$id=$_GET['id'];
		
		$query=mysql_query("delete from kategori where id='$id'");
		if ($query) 
		{
			header("location:tabel_kategori.php");
		}
		else
		{
			echo" Error";
		}
?>