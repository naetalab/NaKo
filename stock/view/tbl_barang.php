<div class="container">
<table class="table table-bordered table-condensed">
	<thead>
		<th>NO</th>
		<th>Kode Barang </th>
		<th>Nama Barang</th>
		<th>Harga</th>
		<th>Stok</th>
		<th>Satuan</th>
	</thead>
	<?php while ($hasil as $row) :?>
	<tr>
		<td><?php echo $row['kode_barang'];?></td>
		<td><?php echo $row['nama_barang'];?></td>
		<td><?php echo $row['harga'];?></td>
		<td><?php echo $row['stok'];?></td>
		<td><?php echo $row['satuan'];?></td>
	</tr>
	<?php endforeach;?>
</table>	
</div>
