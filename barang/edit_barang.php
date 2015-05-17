<?php include 'koneksi.php';?>
<?php include 'style.php';?>
<?php $id=$_GET['id'];?>
					<div class="panel-body">
						<table class="table table-condensed table-bordered">
						<thead class="bg-primary">
							<td colspan="8"></td>
						</thead>
							<thead class="bg-success">
								<th>Nama</th><th>Harga Beli</th><th>Harga Jual</th><th>Jenis</th><th>Suplier</th><th>Stock</th><th class="text-center">Aksi</th>
							</thead>
							<form action="update_barang.php" method="POST" class="form-group">
							<tbody>
							<?php 
								$query=mysql_query("select * from barang where id='$id'");
								while( $databarang=mysql_fetch_assoc($query)): 
							;?>
								<tr>
									<td>
									<input class="form-control" name="nama_barang" value="<?php echo $databarang['nama_barang'];?>">										
									<input type="hidden" name="id_barang" value="<?php echo $databarang['id'];?>">										
									</td>
									<td>
									<input class="form-control" name="harga_beli" value="<?php echo $databarang['harga_beli'];?>">	
									</td>
									<td>
									<input class="form-control" name="harga_jual" value="<?php echo $databarang['harga_jual'];?>">
									</td>
									<td>
									<select required name="kategori" class="form-control">
										<option selected value="" >-Pilih Kategori-</option>
										<?php $query=mysql_query("select * from kategori where 1"); while($datakategori=mysql_fetch_assoc($query)):?>
											<option value="<?php echo $datakategori['nama_kategori'];?>"><?php echo $datakategori['nama_kategori'];?></option>
										<?php endwhile;?>	
									</select>
									</td>
									<td>
									<select required name="suplier" class="form-control">
										<option selected value="" >-Pilih Suplier-</option>
										<?php $query=mysql_query("select * from suplier where 1"); while($datasuplier=mysql_fetch_assoc($query)):?>
											<option value="<?php echo $datasuplier['nama_suplier'];?>"><?php echo $datasuplier['nama_suplier'];?></option>
										<?php endwhile;?>	
									</select>
									</td>
									<td>
									<input type="number" class="form-control" name="stock" value="<?php echo $databarang['stock'];?>">
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