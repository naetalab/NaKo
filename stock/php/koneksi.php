<?php
	class Koneksi
	{
		public function index()
		{
			$db=new mysqli('localhost','root','','koperasi_simpan_pinjam');
		}
	}