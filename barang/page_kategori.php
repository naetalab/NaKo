<?php include 'koneksi.php';?>
<?php include 'style.php';?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12">
			<div class="col-md-4">
						
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Input Data Kategori</h3>
					</div>
					<form class="form-group" method="POST" action="insert_kategori.php">
					<div class="panel-body">
						<label>Nama Kategori</label>
						<input class="form-control" name="nama_kategori" type="" placeholer="">
						
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
						<h3>Tabel Data Kategori</h3>
					</div>
				<iframe frameborder="0" src="tabel_kategori.php" height="380px" width="100%">
					
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
