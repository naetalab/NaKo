<?php

session_start();
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

$hal=$_GET['halaman'];
	if (empty($hal)){
			$hal="beranda";
	}
// cek apakah user yang mengakses halaman ini sudah melalui login atau belum
// logikanya jika user telah login dan sukses, maka SESSION level dan SESSION username ini pasti sudah ada
// jika ada user yang mencoba akses halaman ini tanpa login, maka logikanya kedua SESSION belum ada

if (isset($_SESSION['level']) && isset($_SESSION['username']))
{
// tampilkan menu.
// menu hanya ditampilkan bila halaman ini diakses oleh user yang telah login
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Website Koperasi</title>
<link rel="stylesheet" href="style/style_index.css" type="text/css"  />

</head>

<body>
<div id="page">  
  <div class="header"><img src="logo.jpg" />
  <div id="box">
	<div id="tgl"><?php echo tanggal();?></div>
	<div id="akun"><?php echo $_SESSION['nama']; ?></div>
   </div>
  </div>
  <div id="menu-bg">
  <div id="menu">
<?php  
// cek level user apakah admin atau bukan
if ($_SESSION['level'] == "admin")
{ 
	echo 
	"<ul id=main>
	  <li><a href=index.php>Beranda</a></li>
	  <li><a href=index.php?halaman=data_pelanggan>Anggota</a></li>
	  <li><a href=index.php?halaman=simpan>Simpan</a></li>
      <li><a href=index.php?halaman=piutang>Pinjam</a></li>
	  <li><a href=index.php?halaman=data_akun>Data Akun</a></li>
	  <li><a href='barang'>Data Barang</a></li>
	  <li><a href=index.php?#>Laporan</a></li>
      <li><a href=logout.php>Keluar</a></li>
    </ul>";
}
else
{
	echo 
	"<ul id=main>
	 <li><a href=index.php?halaman=data_pelanggan>Pelanggan</a></li>
      <li><a href=logout.php>Keluar</a></li>
    </ul>";
}
?>
  </div>
  </div>
<div class="halaman">
  <div class="tengah">
	<div class="batas_isi">
    <div class="isi">
   	<?php
		require_once $hal.".php";
	?>
    </div>
    </div>
    </div>  
  </div>
 <div class="BatasBawah"></div>
</div>
</body>
</html>
<?php
}
else
{
	lompat_ke("form_login.php");
}
?>