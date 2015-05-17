<?php include 'koneksi.php';?>
<?php include 'style.php';?>

					<div class="panel-body">
						<table class="table table-condensed table-bordered">
						<thead class="bg-primary">
							<td colspan="8"></td>
						</thead>
							<thead class="bg-success">
								<th>Nama suplier</th><th>Alamat</th><th class="text-center">Aksi</th>
							</thead>
							<tbody>
							<?php 
								$query=mysql_query("select * from suplier where 1");
								while( $datasuplier=mysql_fetch_assoc($query)): 
							;?>
								<tr>
									
									<td>
										<?php echo $datasuplier['nama_suplier'];?>
									</td>
									<td>
										<?php echo $datasuplier['alamat_suplier'];?>
									</td>
	
									<td class="text-center">
										<a class="btn btn-warning" href="edit_suplier.php?id=<?php echo $datasuplier['id'];?>">
											<i class="glyphicon glyphicon-edit"></i>
										</a>
										<a class="btn btn-danger" href="delete_suplier.php?id=<?php echo $datasuplier['id'];?>">
											<i class="glyphicon glyphicon-remove"></i>
										</a>
									</td>
								</tr>
							<?php endwhile;?>	
							</tbody>
						</table>
					</div>
					
				</div>