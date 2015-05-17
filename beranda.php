<?php
if ($_SESSION['level'] == "admin")
	{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<Center>

<H1> SELAMAT DATANG  !  </H1>
<Br/>

<img src="kop.png" height='300' width='300'>

<H3>KOPERASI GEMI MUKTI KECAMATAN TUKDANA INDRAMAYU</H3>
<H3>HAK DAN BADAN HUKUM </H3>
<H3>NO. 7966/BH/PAD/KWK-10/XI/1997</H3>
<H3> Tanggal 24 November 1997 </H3>
<H3> Jln. Raya Tukdanana, Desa Tukdana, Telp. (0234)-352660</H3>

</Center>



</body>
</html>
<?php
	}
	else
	{
		echo "anda tidak berhak meng-akses halaman ini !";
	}
?>