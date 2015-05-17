<?php include 'koneksi.php';?>
<?php include 'style.php';?>
<?php $id=$_GET['id'];?>
					<div class="panel-body">
						<table class="table table-condensed table-bordered">
						<thead class="bg-primary">
							<td colspan="8"></td>
						</thead>
							<thead class="bg-success">
								<th>Nama suplier</th><th>Alamat Suplier</th><th class="text-center">Aksi</th>	
							</thead>
							<form action="update_suplier.php" method="POST" class="form-group">
							<tbody>
							<?php 
								$query=mysql_query("select * from suplier where id='$id'");
								while( $datasuplier=mysql_fetch_assoc($query)): 
							;?>
								<tr>
									<td>
									<input class="form-control" name="nama_suplier" value="<?php echo $datasuplier['nama_suplier'];?>">										
									<input type="hidden" name="id_suplier" value="<?php echo $datasuplier['id'];?>">										
									</td>
									<td>
										<input class="form-control" name="alamat_suplier" value="<?php echo $datasuplier['alamat_suplier'];?>">
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