<!DOCTYPE html>
<html>
<head>
	<title>
		Koperasi-Barang
	</title>
	<?php include 'style.php';?>
	<?php include 'koneksi.php';?>
	<script type="text/javascript">
		$('#document').ready(function  () {
			$('li.menu').click(function(){
		    $('li.menu').removeClass("active");
		    $(this).addClass("active");
		});
		});
	</script>
</head>
<body>
<div class="container">
	<div class="ro clearfix">
		<header>
			<img src="../logo.jpg" class="img img-responsive displayed">
		</header>
	</div>
</div>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12">
			<nav class="navbar navbar-inverse" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
					 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span>
					 <span class="icon-bar"></span></button> <a class="navbar-brand" href="../"><i class="glyphicon glyphicon-home"></i> Home</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="menu">
							<a  href="page_barang.php" target="iframe">Stock Barang</a>
						</li>
						<li class="menu">
							<a  href="page_kategori.php" target="iframe">Data Kategori</a>
						</li>
						<li class="menu">
							<a  href="page_suplier.php" target="iframe">Data Suplier</a>
						</li>
						
					</ul>
				</div>
			</nav>
		</div>
</div>
</div>
<iframe name="iframe" id="iframe" frameborder="0" width="100%" height="800px" src="page_barang.php">
	
</iframe>