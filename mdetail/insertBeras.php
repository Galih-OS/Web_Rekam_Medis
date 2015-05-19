<!DOCTYPE html>
<html lang="en">
					<form method="POST">

							<div class="input-group">
								  <span class="input-group-addon" id="sizing-addon2">Nama Beras</span>
								  <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" required>
							</div>
							<br>
							<div class="input-group">
								  <span class="input-group-addon" id="sizing-addon2">Harga Beras</span>
								  <input type="text" class="form-control" placeholder="Harga" name="harga" aria-describedby="sizing-addon2" required>
							</div>
							<br>
							<div class="input-group">
								  <span class="input-group-addon" id="sizing-addon2">Stock Beras&nbsp;</span>
								  <input type="text" class="form-control" placeholder="Stock" name="stock" aria-describedby="sizing-addon2" required>
							</div>
							<br>
							<div class="input-group">
								  <span class="input-group-addon" id="sizing-addon2">ID Supplier&nbsp;&nbsp;&nbsp;</span>
								  <input type="text" class="form-control" readonly name="idsup" value="<?php echo $_GET['id']; ?>" >
							</div>

									<div class="btn" role="group" aria-label="...">
									  <input type="submit" name="simpan" value="Insert" class="btn btn-primary" /> 
									</div>
									<br>
									<br>
									
							<div class="row">
								
								<div class="col-md-2">
									<?php  
									if(isset($_POST['simpan']))
									{
										$query = mysql_query("INSERT INTO beras (nama_beras, harga_beras, stock,id_supplier) VALUES ('".$_POST['nama']."','".$_POST['harga']."','".$_POST['stock']."','".$_POST['idsup']."')");

										if($query){ ?>
											<div class="panel panel-success">
											  <div class="panel-body">
												Sukses
											  </div>
											</div>
										<?php }
										else { ?>
											<div class="panel panel-success">
											  <div class="panel-heading">
												<h3 class="panel-title">Message</h3>
											  </div>
											  <div class="panel-body">
												Gagal
											  </div>
											</div>
										<?php }
										
									}
									?>		
								</div>
								
							</div>
					
									<div class="panel panel-default">
										<div class="panel-body">
										<?php include "readberas.php"; ?>
										</div><!-- Panel Body -->
									</div><!-- Panel Default -->


						<!-- Panel Body -->
						<!-- Panel Default -->
					</div><!-- FORM -->

				<!-- COL-MD-6 -->	
		 
</html>