<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/development-bundle/demos/demos.css">
<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/development-bundle/themes/ui-lightness/jquery.ui.all.css">
<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/validationEngine/css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="JQuery-UI-1.8.17.custom/validationEngine/css/template.css" type="text/css"/>
	<script src="JQuery-UI-1.8.17.custom/validationEngine/js/jquery-1.4.4.min.js" type="text/javascript"></script>
    <script src="JQuery-UI-1.8.17.custom/validationEngine/js/jquery.validationEngine-id.js" type="text/javascript" charset="utf-8"></script>
	<script src="JQuery-UI-1.8.17.custom/validationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
    </script> 
    <script>
            jQuery(document).ready( function() {
                // binds form submission and fields to the validation engine
                jQuery("#formID").validationEngine();
            });
    </script> 
<style type="text/css">
#formID
{
	border:none;
	margin:0px;
	padding:0px;
}
td
{
	padding:5px 9px;
	border:none;
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
</style>
<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

	echo "
	<form id=formID name=formInput method=post action=proses.php>
	  <input type=hidden name=proses id=proses value=$_GET[kode] />";
//form data piutang
	if($_GET['kode']=="piutang_insert"){
		//pemanggilan fungsi penambahan
		$a="SELECT * FROM piutang";
		$b="SELECT inc FROM piutang ORDER BY inc DESC LIMIT 1";
		$inc=penambahan($a, $b);
    echo "    
        <div id=judulHalaman><strong>Form input data piutang</strong></div>
        <table border=0 cellspacing=2 cellpadding=0>
          <tr>
            <td>piutang ID <input type=hidden name=piutang_inc id=piutang_inc value=$inc /></td>
            <td>:</td>
            <td><input name=piutang_id type=text id=input class=validate[required] size=70 maxlength=70 value='UTANG-$inc' /></td>
          </tr>
          <tr>
            <td>Nama piutang</td>
            <td>:</td>
            <td><label>
              <input name=nmpiutang type=text id=input class=validate[required] size=70 maxlength=70 />
            </label></td>
          </tr>
          <tr>
            <td>Alamat piutang</td>
            <td>:</td>
            <td><label>
              <input name=alamatSup type=text id=input class=validate[required] size=70 maxlength=100 />
            </label></td>
          </tr>
          <tr>
            <td>Kota piutang</td>
            <td>:</td>
            <td><label>
              <input name=kotaSup type=text id=input class=validate[required] size=70 maxlength=70 />
            </label></td>
          </tr>
          <tr>
            <td>Email piutang</td>
            <td>:</td>
            <td><label>
              <input name=emailSup type=text id=input class=validate[required] size=70 maxlength=70 />
            </label></td>
          </tr>
          <tr>
            <td>Kontak piutang</td>
            <td>:</td>
            <td><label>
              <input name=kontakSup type=text id=input class=validate[required] size=70 />
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>
              <input type=submit name=SimpanSup id=tombol value=Simpan />
            </label>
              <label>
                <input type=reset name=BatalSup id=tombol value=Batal />
              </label></td>
          </tr>
        </table>";
	}else{  
//form data pelanggan
	//pemanggilan fungsi penambahan
		$a="SELECT * FROM pelanggan";
		$b="SELECT inc FROM pelanggan ORDER BY inc DESC LIMIT 1";
		$inc=penambahan($a, $b);
	echo "
        <div id=judulHalaman><strong>Form input data anggota</strong></div>
        <table border=0 cellspacing=2 cellpadding=0>
          <tr>
            <td>ID Anggota<input type=hidden name=pelanggan_inc id=pelanggan_inc value=$inc /></td>
            <td>:</td>
            <td><input type=text name=pelanggan_id id=input class=validate[required] value='AGT-$inc' /></td>
          </tr>
          <tr>
            <td>Nama </td>
            <td>:</td>
            <td><label>
              <input name=nmPelanggan type=text id=input class=validate[required] size=70 maxlength=70 />
            </label></td>
          </tr>
          <tr>
            <td>Alamat </td>
            <td>:</td>
            <td><label>
              <input name=alamatPel type=text id=input class=validate[required] size=70 maxlength=100 />
            </label></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td><label>
              <input name=ketPel type=text id=input class=validate[required] size=70 maxlength=70 />
            </label></td>
          </tr>
          <tr>
            <td>No Telp/HP</td>
            <td>:</td>
            <td><label>
              <input name=no_hp type=text id=input class=validate[required] size=70 maxlength=70 />
            </label></td>
          </tr>
          
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><label>
              <input type=submit name=SimpanPel id=tombol value=Simpan />
            </label>
              <label>
                <input type=reset name=BatalPel id=tombol value=Batal />
              </label></td>
          </tr>
        </table>";
	}
     echo " </form>";

?>