<?php include 'koneksi.php';?>
<?php include 'style.php';?>

					<div class="panel-body">
						<table class="table table-condensed table-bordered">
						<thead class="bg-primary">
							<td colspan="8"></td>
						</thead>
							<thead class="bg-success">
								<th>Nama Kategori</th><th class="text-center">Aksi</th>
							</thead>
							<tbody>
							<?php 
								$query=mysql_query("select * from kategori where 1");
								while( $datakategori=mysql_fetch_assoc($query)): 
							;?>
								<tr>
									
									<td>
										<?php echo $datakategori['nama_kategori'];?>
									</td>
	
									<td class="text-center">
										<a class="btn btn-warning" href="edit_kategori.php?id=<?php echo $datakategori['id'];?>">
											<i class="glyphicon glyphicon-edit"></i>
										</a>
										<a class="btn btn-danger" href="delete_kategori.php?id=<?php echo $datakategori['id'];?>">
											<i class="glyphicon glyphicon-remove"></i>
										</a>
									</td>
								</tr>
							<?php endwhile;?>	
							</tbody>
						</table>
					</div>
					
				</div>