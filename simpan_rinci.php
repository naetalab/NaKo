<?php
session_start();
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
if ($_SESSION['level'] == "admin")
	{
$warna1="#c0d3e2";
$warna2="#cfdde7";
$warna=$warna1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="style/style_index.css" type="text/css">
<style type="text/css">
#noBorder
{
	border:none;	
}
table
{
	margin:5px 9px;
}
td
{
	padding:5px 9px;
	border:1px solid #c0d3e2;
}
#namaField{
	color:#FFF;
	background-color:#333;
	text-align:center;
	padding-top:7px;
	border:none;
}
</style>
</head>

<body>
<?php
	$param="SELECT * FROM simpan WHERE jual_id='$_GET[id]'";
	$qparam=mysql_query($param);
	$dparam=mysql_fetch_array($qparam);
?>
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td id="noBorder">No.Transaksi</td>
    <td id="noBorder">:</td>
    <td id="noBorder"><?php echo $dparam['jual_id']; ?></td>
  </tr>
  <tr>
    <td id="noBorder">No.Nota</td>
    <td id="noBorder">:</td>
    <td id="noBorder"><?php echo $dparam['no_nota']; ?></td>
  </tr>
  <tr>
    <td id="noBorder">Nama Pelanggan</td>
    <td id="noBorder">:</td>
    <td id="noBorder"><?php echo $dparam['pelanggan_nama']; ?></td>
  </tr>
  <tr>
    <td id="noBorder">simpan Awal</td>
    <td id="noBorder">:</td>
    <td id="noBorder"><?php echo "Rp ".digit($dparam['simpan_awal']); ?></td>
  </tr>
  <tr>
    <td id="noBorder">Keterangan</td>
    <td id="noBorder">:</td>
    <td id="noBorder"><?php echo $dparam['keterangan']; ?></td>
  </tr>
</table>
<table cellspacing="1" cellpadding="0">
  <tr>
  	<td id="namaField">No</td>
    <td id="namaField">Tanggal Nabung</td>
    <td id="namaField">Jumlah Nabung</td>
    <td id="namaField">Sisa Saldo</td>
	
  </tr>
  <?php
  	$sql="SELECT * FROM simpan_detail WHERE jual_id='$_GET[id]' ORDER BY inc ASC";
	$query=mysql_query($sql);
	$no=1;
	while($data=mysql_fetch_array($query))
	{
		if ($warna==$warna1){
				$warna=$warna2;
			}
			else{
				$warna=$warna1;
			}
  ?>
  <tr bgcolor=<?php echo $warna; ?>>
  	<td><?php echo $no; ?></td>
    <td><?php echo $data['tgl_bayar']; ?></td>
    <td align="right"><?php echo digit($data['jml_bayar']); ?></td>
    <td align="right"><?php echo digit($data['sisa_bayar']); ?></td>
  </tr>
  <?php $no++; } ?>
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