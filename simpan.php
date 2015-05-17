<?php
//this function created by Sigit Dwi Prasetyo
//More information visit www.sixghakreasi.com / 0818956973
if ($_SESSION['level'] == "admin")
	{
if (!isset($_POST['proses']))
{
	$tampil="SELECT * FROM simpan ORDER BY pelanggan_nama ASC";
	$sum="SELECT SUM(simpan_sisa) AS total FROM simpan";
	$PAwl="SELECT SUM(simpan_awal) AS PAwl FROM simpan";
	$TjmlB="SELECT SUM(jml_bayar) AS TjmlB FROM simpan";
}
else
{
	if ($_POST['keterangan']=="semua")
	{
		$tampil="SELECT * FROM simpan ORDER BY pelanggan_nama ASC";
		$sum="SELECT SUM(simpan_sisa) AS total FROM simpan";
		$PAwl="SELECT SUM(simpan_awal) AS PAwl FROM simpan";
		$TjmlB="SELECT SUM(jml_bayar) AS TjmlB FROM simpan";
	}
	else
	{
		$tampil="SELECT * FROM simpan WHERE keterangan='$_POST[keterangan]' ORDER BY pelanggan_nama ASC";
		$sum="SELECT SUM(simpan_sisa) AS total FROM simpan WHERE keterangan='$_POST[keterangan]' ORDER BY pelanggan_nama ASC";
		$PAwl="SELECT SUM(simpan_awal) AS PAwl FROM simpan WHERE keterangan='$_POST[keterangan]' ORDER BY pelanggan_nama ASC";
		$TjmlB="SELECT SUM(jml_bayar) AS TjmlB FROM simpan WHERE keterangan='$_POST[keterangan]' ORDER BY pelanggan_nama ASC";
	}
}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#lunas
{
	color:#09F;
}
#blmLunas
{
	color:#333;
}
</style>
</head>

<body>
<div id="judulHalaman"><strong>Data simpan</strong></div>
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td>
    <form id="form1" name="form1" method="post" action="index.php?halaman=simpan_cari">
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td>Pilih kategori pencarian</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><label>
            <select name="pilih" id="input">
              <option>pelanggan_nama</option>
              <option>no_nota</option>
            </select>
          </label></td>
          <td>
            <input type="text" name="tcari" id="input" />
            <input type="submit" name="bcari" id="tombol" value="cari" />
          </td>
        </tr>
      </table>
	</form>
    </td>
    <td>
    <form id="form2" name="form2" method="post" action="index.php?halaman=simpan">
    <input name="proses" type="hidden" value="form2" />
      <table border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td>Pilih Keterangan</td>
        </tr>
        <tr>
          <td>
          	<select name="keterangan" id="input">
          	  <option selected="selected">semua</option>
          	  <option>Bad Financial</option>
          	  <option>Good Financial</option>
          	</select>
          	<label>
          	  <input type="submit" name="ok" id="tombol" value="ok" />
       	    </label></td>
        </tr>
      </table>
    </form>
    </td>
  </tr>
</table>

<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td id="namaField">No</td>
    <td id="namaField">No.Transaksi</td>
    <td id="namaField">Tgl Transaksi</td>
    <td id="namaField">Nama Anggota</td>
    <td id="namaField">Simpan Awal</td>
    <td id="namaField">Kredit</td>
    <td id="namaField">Saldo</td>
    <td id="namaField">Tgl </td>
    <td id="namaField">Keterangan</td>
    <td colspan="2" id="namaField">
          <?php echo "<a href=index.php?halaman=form_simpan>"; ?>
            <div id="tombol">tambah data</div>
          <?php echo "</a>"; ?>  
          </td>
  </tr>
  
  <?php

  	$no=1;
	$qtampil=mysql_query($tampil);
	while($data=mysql_fetch_array($qtampil))
	{
		$tgl_nabung=pecah_tgl($data['tgl_nabung']);
		$tglTmpo=$tgl_nabung[0];
		$blnTmpo=$tgl_nabung[1];
		$thnTmpo=$tgl_nabung[2];
		$thNow=date(Y);
		$blnNow=date(m);
		$tglNow=date(d);
		$tanda=hitungDenda($thnTmpo, $blnTmpo, $tglTmpo, $thNow, $blnNow, $tglNow);
		if ($tanda!=0)
		{
			if ($data['keterangan']!="Bad Financial")
			{
				$warna="#F99";
			}
			else
			{
				$warna="#dee9f1";
			}
		}
		else
		{
			$warna="#dee9f1";
		}
		if ($data['keterangan']=="Bad Financial")
		{
			$ket="Bad Financial";
		}
		else
		{
			$ket="Good Financial";
		}
  ?>
  <tr bgcolor="<?php echo $warna; ?>">
  	<td><?php echo $no; ?></td>
    <td><?php echo $data['jual_id']; ?></td>
    <td><?php echo $data['tgl_jual']; ?></td>
    <td><?php echo $data['pelanggan_nama']; ?></td>
    <td align="right"><?php echo digit($data['simpan_awal']); ?></td>
    <td align="right"><?php echo digit($data['jml_bayar']); ?></td>
    <td align="right"><?php echo digit($data['simpan_sisa']); ?></td>
    <td><?php echo $data['tgl_nabung']; ?></td>
    <td id="<?php echo $ket; ?>"><?php echo $data['keterangan']; ?></td>
    <td>
    <a href="#" onclick="javascript:wincal=window.open('simpan_rinci.php?id=<?php echo $data['jual_id']; ?>','Lihat Data','width=790,height=400,scrollbars=1');"><div id="tombol">rincian</div></a>
    </td>
    <td>
	<a href="<?php echo "index.php?halaman=simpan_bayar&id=$data[jual_id]";?>"><div id="tombol">Nabung</div></a>
    </td>
  </tr>
  <?php
	$no++;
	}
  ?>
  <tr>
  	<td style="color:#FFF;border:none;background-color:#333" colspan="4" align="right">Total :</td>
    <td style="color:#FFF;border:none;background-color:#333" align="right">
    <?php
		$qPAwl=mysql_query($PAwl);
		$dPAwl=mysql_fetch_array($qPAwl);
		echo digit($dPAwl['PAwl']);
	?>
    </td>
    <td style="color:#FFF;border:none;background-color:#333" align="right">
    <?php
		$qTjmlB=mysql_query($TjmlB);
		$dTjmlB=mysql_fetch_array($qTjmlB);
		echo digit($dTjmlB['TjmlB']);
	?>
    </td>
   	<td style="color:#FFF;border:none;background-color:#333" align="right">
        <?php
		$qsum=mysql_query($sum);
		$dsum=mysql_fetch_array($qsum);
		echo digit($dsum['total']);
		?>
     </td>
     <td style="color:#FFF;border:none;background-color:#333" colspan="4">&nbsp;</td>
   	</tr>
</table>

</body>
</html>
<?php
	}
	else
	{
		echo "anda tidak berhak meng-akses halaman ini !";
	}
?>