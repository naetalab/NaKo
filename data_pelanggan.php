<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
if (!isset($_POST['proses']) and ($_POST['proses']=="form1"))
	{
		$qtmpil_pel="select * from pelanggan order by inc asc";
	}
	elseif (isset($_POST['proses']) and ($_POST['tcari']==""))
	{
		$qtmpil_pel="select * from pelanggan order by inc asc";
	}
	else
	{
		$qtmpil_pel="SELECT * FROM pelanggan WHERE nama LIKE '%$_POST[tcari]%'";	
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="style/data.css" type="text/css">

</head>
<body>
<div id="judulHalaman"><strong>Data Anggota</strong></div>
<form id="form1" name="form1" method="post" action="index.php?halaman=data_pelanggan">
<input name="proses" type="hidden" value="form1" />
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td>Pencarian Anggota</td>
  </tr>
  <tr>
    <td><input name="tcari" id="input" type="text" size="25" /><input name="bcari" id="tombol" type="submit" value="cari" /></td>
  </tr>
</table>
</form>
<?php
	$warna1="#c0d3e2";
	$warna2="#cfdde7";
	$warna=$warna1;
?> 
      <table cellspacing="1" cellpadding="0">
        <tr>
          <td id="namaField">ID Anggota</td>
          <td id="namaField">Nama</td>
          <td id="namaField">Alamat</td>
          <td id="namaField">Keterangan</td>
          <td id="namaField">No Telp/HP</td>
          
          <td colspan="2" id="namaField">
          <?php echo "<a href=index.php?halaman=form_data_master&kode=pelanggan_insert>"; ?>
            <div id="tombol">tambah data</div>
          <?php echo "</a>"; ?>  
          </td>
        </tr>
        <?php 
		$qp_pel=mysql_query($qtmpil_pel);
		
		while($row3=mysql_fetch_array($qp_pel)){
			if ($warna==$warna1){
				$warna=$warna2;
			}
			else{
				$warna=$warna1;
			}
		?>
        <tr bgcolor=<?php echo $warna; ?>>
          <td><?php echo "$row3[id_anggota]"; ?></td>
          <td><?php echo "$row3[nama]"; ?></td>
          <td><?php echo "$row3[alamat]"; ?></td>
          <td><?php echo "$row3[keterangan]"; ?></td>
          <td><?php echo "$row3[no_hp]"; ?></td>
          <td><?php echo "<a href=index.php?halaman=form_ubah_data&kode=pelanggan_update&id=$row3[id_anggota]>"; ?>
          	  <div id="tombol">ubah</div>
			  <?php echo "</a>";?>
          </td>
          <td><?php echo "<a href=proses.php?proses=pelanggan_delete&id=$row3[id_anggota]>"; ?>
          	  <div id="tombol" onclick="return confirm('Apakah Anda akan menghapus data ini ?')">hapus</div>
			  <?php echo "</a>"; ?>
          </td>
        </tr>
        <?php } ?>
      </table>
</body>
</html>