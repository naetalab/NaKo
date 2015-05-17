<?php include 'koneksi.php';?>
<?php include 'style.php';?>
<?php $id=$_GET['id'];?>
					<div class="panel-body">
						<table class="table table-condensed table-bordered">
						<thead class="bg-primary">
							<td colspan="8"></td>
						</thead>
							<thead class="bg-success">
								<th>Nama Kategori</th><th class="text-center">Aksi</th>	
							</thead>
							<form action="update_kategori.php" method="POST" class="form-group">
							<tbody>
							<?php 
								$query=mysql_query("select * from kategori where id='$id'");
								while( $datakategori=mysql_fetch_assoc($query)): 
							;?>
								<tr>
									<td>
									<input class="form-control" name="nama_kategori" value="<?php echo $datakategori['nama_kategori'];?>">										
									<input type="hidden" name="id_kategori" value="<?php echo $datakategori['id'];?>">										
									</td>
									
									<td class="text-center">
										<button class="btn btn-block btn-warning"  type="submit">
											<i class="glyphicon glyphicon-open"></i>
										</button>
									</td>
								</tr>
							<?php endwhile;?>	
							</tbody>
						</form>	
						</table>
					</div>
					
				</div>