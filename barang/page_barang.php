<?php include 'koneksi.php';?>
<?php include 'style.php';?>
<div class="container">
	<div class="row clearfix">

		<div class="col-md-12">
			<div class="col-md-4">
						
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Input Data Barang</h3>
					</div>
					<form class="form-group" method="POST" action="insert_barang.php">
					<div class="panel-body">
						<label>Nama</label>
						<input class="form-control" name="nama_barang" type="" placeholer="">
						<label>Harga Beli</label>
						<input class="form-control" name="harga_beli" type="" placeholer="">
						<label>Harga Jual</label>
						<input class="form-control" name="harga_jual" type="" placeholer="">
						<label>Kategori</label>
						<select name="kategori" class="form-control">
						<?php $query=mysql_query("select * from kategori where 1"); while($datakategori=mysql_fetch_assoc($query)):?>
							<option value="<?php echo $datakategori['nama_kategori'];?>"><?php echo $datakategori['nama_kategori'];?></option>
						<?php endwhile;?>	
						</select>
						<label>Suplier</label>
						<select name="suplier" class="form-control">
						<?php $query=mysql_query("select * from suplier where 1"); while($datasuplier=mysql_fetch_assoc($query)):?>
							<option value="<?php echo $datasuplier['nama_suplier'];?>"><?php echo $datasuplier['nama_suplier'];?></option>
						<?php endwhile;?>	
						</select>						
						<label>Stock</label>
						<input class="form-control" name="stock" type="number" min="0" placeholer="">
					</div>
					
					<div class="panel-footer">
						<button class="btn btn-block btn-default" type="submit"><i class="glyphicon glyphicon-save"></i> Simpan</button>
					</div>
					</form>	
				</div>
			</div>
			<div class="col-md-8">
			<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Tabel Data Barang</h3>
					</div>
				<iframe frameborder="0" src="tabel_barang.php" height="380px" width="100%">
					
				</iframe>
			<div class="panel-footer">
				<div class="text-center">
					<p>Data Koperasi - <?php echo date('m-d-Y');?></p>
				</div>
			</div>	
			</div>
		</div>
	</div>
</div>
