<?php
//this function created by Sigit Dwi Prasetyo
//More information visit www.sixghakreasi.com / 0818956973
session_start();
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";
$a="SELECT * FROM piutang";
$b="SELECT inc FROM piutang ORDER BY inc DESC LIMIT 1";
$inc=penambahan($a, $b);
if (isset($_POST['run'])and($_POST['run']=="form2"))

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="style/style_form_transaksi.css" type="text/css"  />
<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/development-bundle/themes/ui-lightness/jquery.ui.all.css">
<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/development-bundle/demos/demos.css">
<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/validationEngine/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/validationEngine/css/template.css" type="text/css"/>
	<script src="JQuery-UI-1.8.17.custom/validationEngine/js/jquery-1.4.4.min.js" type="text/javascript"></script>
    <script src="JQuery-UI-1.8.17.custom/validationEngine/js/jquery.validationEngine-id.js" type="text/javascript" charset="utf-8"></script>
	<script src="JQuery-UI-1.8.17.custom/validationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	jQuery(document).ready( function() {
                // binds form submission and fields to the validation engine
                jQuery("#formID").validationEngine();

            });
    </script>  

	<script src="JQuery-UI-1.8.17.custom/development-bundle/jquery-1.7.1.js"></script>
	<script src="JQuery-UI-1.8.17.custom/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="JQuery-UI-1.8.17.custom/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="JQuery-UI-1.8.17.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
    <script src="JQuery-UI-1.8.17.custom/development-bundle/ui/i18n/jquery.ui.datepicker-id.js"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	$(function() {
		$( "#datepicker1" ).datepicker();
	});
	</script>
<style type="text/css">
#formID
{
	border:none;
	margin:0px;
	padding:0px;
}
#formID1
{
	border:none;
	margin:0px;
	padding:0px;
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
body {
	color:#315567;
	background-color:#e9e9e9;
	font-size:11px;
	font-family:Verdana, Geneva, sans-serif;
}
#datepicker{
	padding:3px 5px;
	margin:0px 3px;
	border:1px solid #c0d3e2;
	border-radius:3px;
}
#datepicker1{
	padding:3px 5px;
	margin:0px 3px;
	border:1px solid #c0d3e2;
	border-radius:3px;
}
#noborder
{
	border:none;
}
</style>
</head>

<body>
<div id="page"> 
<a href="index.php"><div id="keluar">close</div></a>
<div class="header"><h1>Transaksi Piutang</h1></div>
<div class="halaman">
  <div class="tengah">
	<div class="batas_isi">
    <div class="isi">
<table border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td>
      <form id="form1" name="form1" method="post" action="proses.php">
            <input type="hidden" name="proses" id="proses" value="jual_insert" />
          <table border="0" cellspacing="1" cellpadding="0">
            <tr><input name="inc" type="hidden" value="<?php echo "$inc"; ?>" />
              <td id="noborder">No. Transaksi</td>
              <td id="noborder">:</td>
              <td id="noborder"><input name="jual_id" type="hidden" value="<?php echo "JL-$inc"; ?>" /><?php echo "JL-$inc"; ?></td>
            </tr>
            <tr>
              <td id="noborder">No. Nota</td>
              <td id="noborder">:</td>
              <td id="noborder">
                <input type="text" name="no_nota" id="input" value="<?php echo "nota-$inc"; ?>" />
              </td>
            </tr>
            <tr>
              <td id="noborder">Tgl. Transaksi</td>
              <td id="noborder">:</td>
              <td id="noborder">
                <input type="text" name="tgl_jual" id="datepicker" value="<?php echo date(d)."/".date(m)."/".date(Y);?>" />
              </td><input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" />
            </tr>
            <tr>
              <td id="noborder">Pelanggan</td>
              <td id="noborder">:</td>
              <td id="noborder"><select name="pelanggan_nama" id="input">
                <option>umum</option>
                <?php
                $pel="SELECT * FROM pelanggan ORDER BY inc ASC";
                $qpel=mysql_query($pel);
                while ($dtpel=mysql_fetch_array($qpel)){
              echo "
                <option>$dtpel[pelanggan_nama]</option>";
                }
                ?>
              </select></td>
            </tr>
         
          <tr>
            <td id="noborder">Total Pinjam</td>
            <td id="noborder">:</td>
            <td id="noborder"><label>
              <input type="text" name="jml_bayar" id="input" class="validate[required]" />
            </label></td>
          </tr>
          <tr>
            <td id="noborder">Tgl jatuh tempo</td>
            <td id="noborder">:</td>
            <td id="noborder"><label>
              <input type="text" name="tgl_jatuh_tempo" id="datepicker1" />
            </label></td>
          </tr>
          <tr>
            <td id="noborder">&nbsp;</td>
            <td id="noborder">&nbsp;</td>
            <td id="noborder">
              <input type="submit" name="simpan" id="tombol" value="simpan" />
              <input type="reset" name="batal" id="tombol" value="batal" />
            </td>
          </tr>
        </table>
      </form>
    </td>
    
  </tr>
</table>
		</div>
    </div>
    </div>  
  </div>
</div>
</body>
</html>