<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
$proses=$_POST['proses'];
$hapus=$_GET['proses'];
$url="";
//fungsi insert
	function insert($nama_tabel,$values)
	{
		$sql="INSERT INTO ".$nama_tabel." VALUES(".$values.")";
		mysql_query($sql);	
	}
//fungsi update
	function update($nama_tabel,$values,$kondisi)
	{
		$sql="UPDATE ".$nama_tabel." SET ".$values." WHERE ".$kondisi;
		mysql_query($sql);
	}
//fungsi delete
	function delete($nama_tabel,$kondisi)
	{
		$sql="DELETE FROM ".$nama_tabel." WHERE ".$kondisi;
		mysql_query($sql);
	}
//pilih fungsi
	switch($proses){
		//pemilihan fungsi insert
		case "akun_insert":
		{
			$nama_tabel="account";
			$username=md5($_POST["username"]);
			$password=md5($_POST["password"]);
			$values="'$username', '$password', '$_POST[nama]', '$_POST[level]'";
			$hal="data_akun";
			insert($nama_tabel,$values);
			break;
		}
		
		case "pelanggan_insert":
			{
				$pelID=str_ireplace(" ",_,$_POST['pelanggan_id']);
				$nama_tabel="pelanggan";
				$values="'$_POST[pelanggan_inc]', '$pelID', '$_POST[nmPelanggan]', 
				'$_POST[alamatPel]', '$_POST[ketPel]', '$_POST[no_hp]'";
				$hal="data_pelanggan";
				$tes=insert($nama_tabel,$values);
				if ($tes) 
				{
				lompat_ke('index.php?halaman=form_simpan');
				}
				else
				{
				}
				break;
			}
			
		
		
		case "jual_insert":
		{
			//proses masuk ke piutang
			$sisa_piutang=$_POST['jml_bayar'];
			if($sisa_piutang!=0)
			{
				//insert ke piutang
				$piutang="INSERT INTO piutang(jual_id, no_nota, tgl_jual, pelanggan_nama, piutang_awal, piutang_sisa, tgl_jatuh_tempo, keterangan,inc)
				VALUES('$_POST[jual_id]', '$_POST[no_nota]', '$_POST[tgl_jual]', '$_POST[pelanggan_nama]', 		
				'$sisa_piutang', '$sisa_piutang', '$_POST[tgl_jatuh_tempo]', 'blm lunas','$_POST[inc]')";
				mysql_query($piutang);
				//insert ke piutang_detail
				$rinci="INSERT INTO piutang_detail(jual_id, tgl_bayar, sisa_bayar, inc)
				VALUES('$_POST[jual_id]', '$_POST[tgl_jual]', '$sisa_piutang', '1')";
				mysql_query($rinci);
			}
			//hapus data temp_jual_detail
			$hapus="DELETE FROM temp_jual_detail WHERE jual_id='$_POST[jual_id]'";
			mysql_query($hapus);
			//halaman
			$hal="piutang";
			break;
		}
		
		
		case "saving_insert":
		{
			//proses masuk ke simpan
			$sisa_simpan=$_POST['jml_bayar'];
			if($sisa_simpan!=0)
			{
				//insert ke simpan
				$simpan="INSERT INTO simpan(jual_id, no_nota, tgl_jual, pelanggan_nama, simpan_awal, simpan_sisa, tgl_nabung, keterangan,inc)
				VALUES('$_POST[jual_id]', '$_POST[no_nota]', '$_POST[tgl_jual]', '$_POST[pelanggan_nama]', 		
				'$sisa_simpan', '$sisa_simpan', '$_POST[tgl_nabung]', 'Saldo Awal','$_POST[inc]')";
				mysql_query($simpan);
				//insert ke simpan_detail
				$rinci="INSERT INTO simpan_detail(jual_id, tgl_bayar, sisa_bayar, inc)
				VALUES('$_POST[jual_id]', '$_POST[tgl_jual]', '$sisa_simpan', '1')";
				mysql_query($rinci);
			}
			//hapus data temp_jual_detail
			$hapus="DELETE FROM temp_jual_detail WHERE jual_id='$_POST[jual_id]'";
			mysql_query($hapus);
			//halaman
			$hal="simpan";
			break;
		}
		
		
		
		
		///
		case "piutang_bayar":
		{
			//cari sisa bayar
			$cek="SELECT * FROM piutang_detail WHERE jual_id='$_POST[jual_id]' ORDER BY inc DESC";
			$qcek=mysql_query($cek);
			$dcek=mysql_fetch_array($qcek);
			$sisa_bayar=$dcek['sisa_bayar']-$_POST['jml_bayar'];
			if($sisa_bayar==0)
			{
				$ket="lunas";
			}
			else
			{
				$ket="blm lunas";
			}
			//sum jml_bayar
			$jmlB="SELECT SUM(jml_bayar) AS jmlB FROM piutang_detail WHERE jual_id='$_POST[jual_id]'";
			$qjmlB=mysql_query($jmlB);
			$djmlB=mysql_fetch_array($qjmlB);
			$jml_bayar=$djmlB['jmlB']+$_POST['jml_bayar'];
			//update ke piutang
			$uppiutang="UPDATE piutang SET jml_bayar='$jml_bayar', piutang_sisa='$sisa_bayar', keterangan='$ket' 
			WHERE jual_id='$_POST[jual_id]'";
			mysql_query($uppiutang);
			//increment inc
			$a="SELECT * FROM piutang_detail";
			$b="SELECT inc FROM piutang_detail WHERE jual_id='$_POST[jual_id]' ORDER BY inc DESC LIMIT 1";
			$inc=penambahan($a, $b);
			//insert data
			$sql="INSERT INTO piutang_detail(jual_id, tgl_bayar, jml_bayar, sisa_bayar, inc)VALUES('$_POST[jual_id]', 
				'$_POST[tgl_bayar]', '$_POST[jml_bayar]', '$sisa_bayar', '$inc')";
			mysql_query($sql);
			$hal="piutang_rinci&id=$_POST[jual_id]";
			break;
		}
	
	
	///

		case "simpan_bayar":
		{
			//cari sisa bayar
			$cek="SELECT * FROM simpan_detail WHERE jual_id='$_POST[jual_id]' ORDER BY inc DESC";
			$qcek=mysql_query($cek);
			$dcek=mysql_fetch_array($qcek);
			$sisa_bayar=$dcek['sisa_bayar']+$_POST['jml_bayar'];
			if($sisa_bayar==0)
			{
				$ket="Bad Financial";
			}
			else
			{
				$ket="Good Financial";
			}
			//sum jml_bayar
			$jmlB="SELECT SUM(jml_bayar) AS jmlB FROM simpan_detail WHERE jual_id='$_POST[jual_id]'";
			$qjmlB=mysql_query($jmlB);
			$djmlB=mysql_fetch_array($qjmlB);
			$jml_bayar=$djmlB['jmlB']+$_POST['jml_bayar'];
			//update ke simpan
			$upsimpan="UPDATE simpan SET jml_bayar='$jml_bayar', simpan_sisa='$sisa_bayar', keterangan='$ket' 
			WHERE jual_id='$_POST[jual_id]'";
			mysql_query($upsimpan);
			//increment inc
			$a="SELECT * FROM simpan_detail";
			$b="SELECT inc FROM simpan_detail WHERE jual_id='$_POST[jual_id]' ORDER BY inc DESC LIMIT 1";
			$inc=penambahan($a, $b);
			//insert data
			$sql="INSERT INTO simpan_detail(jual_id, tgl_bayar, jml_bayar, sisa_bayar, inc)VALUES('$_POST[jual_id]', 
				'$_POST[tgl_bayar]', '$_POST[jml_bayar]', '$sisa_bayar', '$inc')";
			mysql_query($sql);
			$hal="simpan_rinci&id=$_POST[jual_id]";
			break;
		}
	
		case "ubah_akun":
		{
			$sql="UPDATE account SET password='$_POST[password]', nama='$_POST[nama]', level='$_POST[level]' WHERE username='$_POST[username]'";
			mysql_query($sql);
			$hal="data_akun";
			break;
		}
		
		case "pelanggan_update":
			{
				$nama_tabel="pelanggan";
				$values="nama='$_POST[nmPelanggan]', alamat='$_POST[alamatPel]', 
				keterangan='$_POST[ketPel]', no_hp='$_POST[no_hp]'";
				$kondisi="id_anggota='$_POST[id_anggota]'";
				$hal="data_pelanggan";
				update($nama_tabel,$values,$kondisi);
				break;
			}
	}//end switch
	
switch($hapus){
	//pemilihan fungsi delete
	
	case "pelanggan_delete":
			{
				$nama_tabel="pelanggan";
				$kondisi="id_anggota='$_GET[id]'";
				$hal="data_pelanggan";
				delete($nama_tabel,$kondisi);
				break;
			}
	
}
	if ($url=="transaksi")
	{
		lompat_ke($hal);
	}
	else
	{
		lompat_ke("index.php?halaman=".$hal);
	}
?>