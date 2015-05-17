<?php 
	class Barang 
	{
		var $db;
		public function __construct()
		{
			$this->db=new mysqli('localhost','root','','koperasi_simpan_pinjam');
			
		}
		public function read()
		{
			
			$query=$this->db->query("Select * from barang");
			$hasil=$query->fetch_All(MYSQLI_ASSOC);
			include 'view/style.php';
			include 'view/index.php';
		}
		public function insert()
		{
			include 'view/tbl_barang.php';	
		}
	}

