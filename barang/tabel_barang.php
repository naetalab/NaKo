<?php include 'koneksi.php';?>
<?php include 'style.php';?>

					<div class="panel-body">
						<table class="table table-condensed table-bordered">
						<thead class="bg-primary">
							<td colspan="8"></td>
						</thead>
							<thead class="bg-success">
								<th>Nama</th><th>Harga Beli</th><th>Harga Jual</th><th>Jenis</th><th>Suplier</th><th>Stock</th><th class="text-center">Aksi</th>
							</thead>
							<tbody>
							<?php 
								$query=mysql_query("select * from barang where 1");
								while( $databarang=mysql_fetch_assoc($query)): 
							;?>
								<tr>
									<td>
										<?php echo $databarang['nama_barang'];?>
									</td>
									<td>
										<?php echo $databarang['harga_beli'];?>
									</td>
									<td>
										<?php echo $databarang['harga_jual'];?>
									</td>
									<td>
										<?php echo $databarang['kategori_barang'];?>
									</td>
									<td>
										<?php echo $databarang['suplier'];?>
									</td>
									<td>
										<?php echo $databarang['stock'];?>
									</td>
									<td class="text-center">
										<a class="btn btn-warning" href="edit_barang.php?id=<?php echo $databarang['id'];?>">
											<i class="glyphicon glyphicon-edit"></i>
										</a>
										<a class="btn btn-danger" href="delete_barang.php?id=<?php echo $databarang['id'];?>">
											<i class="glyphicon glyphicon-remove"></i>
										</a>
									</td>
								</tr>
							<?php endwhile;?>	
							</tbody>
						</table>
					</div>
					
				</div>