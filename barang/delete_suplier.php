<?php 	
		include 'koneksi.php' ;
		$id=$_GET['id'];
		
		$query=mysql_query("delete from suplier where id='$id'");
		if ($query) 
		{
			header("location:tabel_suplier.php");
		}
		else
		{
			echo" Error";
		}
?>