<style type="text/css">
td{
	border:none;
}

#input{
	height:20px;
	border:1px solid #c0d3e2;
}
</style>
<?php
require_once "library/koneksi.php";
require_once "library/fungsi_standar.php";

	echo "
	<form id=formUbahData name=formUbahData method=post action=proses.php>
	<input type=hidden name=proses id=proses value=$_GET[kode] />";
	if($_GET['kode']=="pelanggan_update"){
	$pesan="SELECT * FROM pelanggan WHERE id_anggota='$_GET[id]'";
		$query=mysql_query($pesan);
		$data=mysql_fetch_array($query);
	echo "	<h1>Ubah data anggota</h1>
        <table border=0 cellspacing=2 cellpadding=0>
          <tr>
            <td>ID Anggota <input type=hidden name=id_anggota id=pelanggan_id value='".$data[id_anggota]."' /></td>
            <td>:</td>
            <td>$data[id_anggota]</td>
          </tr>
          <tr>
            <td>Nama </td>
            <td>:</td>
            <td><label>
              <input name=nmPelanggan type=text id=input size=70 maxlength=70 value='".$data[nama]."' />
            </label></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><label>
              <input name=alamatPel type=text id=input size=70 maxlength=100 value='".$data[alamat]."' />
            </label></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td><label>
              <input name=ketPel type=text id=input size=70 maxlength=70 value='".$data[keterangan]."' />
            </label></td>
          </tr>
          <tr>
            <td>No Telp/HP</td>
            <td>:</td>
            <td><label>
              <input name=no_hp type=text id=input size=70 maxlength=70 value='".$data[no_hp]."' />
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
	echo "</form>";
?>