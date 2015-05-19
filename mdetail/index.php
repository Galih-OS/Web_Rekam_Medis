<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<style>
	#pad-top{ padding-top:30px;}
	</style>
	<?php include "konektor.php"; ?>
  </head>
  <body>
	<div class="row">
		  <div class="col-md-2">
		  </div>
		    
				<div class="col-md-8">
				<?php include "navbar.php"; ?>
					<form method="POST">
						<div class="panel panel-default">
						<div class="panel-body">
							<div class="input-group">
								  <span class="input-group-addon" id="sizing-addon2">Nama Supplier&nbsp;</span>
								  <input type="text" class="form-control" placeholder="Nama Supplier" name="namasup" aria-describedby="sizing-addon2" required>
							</div>
							<br>
							<div class="input-group">
								  <span class="input-group-addon" id="sizing-addon2">Alamat Supplier</span>
								  <input type="text" class="form-control" placeholder="Alamat Supplier" name="almt" aria-describedby="sizing-addon2" required>
							</div>
							<br>
							<div class="input-group">
								  <span class="input-group-addon" id="sizing-addon2">Telp Supplier&nbsp;&nbsp;&nbsp;&nbsp;</span>
								  <input type="text" class="form-control" placeholder="Telp Supplier" name="telp" aria-describedby="sizing-addon2" required>
							</div>
							<br>
							<div class="input-group">
								  <span class="input-group-addon" id="sizing-addon2">Kota Supplier&nbsp;&nbsp;&nbsp;&nbsp;</span>
								  <input type="text" class="form-control" placeholder="Kota Supplier" name="kota" aria-describedby="sizing-addon2" required>
							</div>
							<br>

									<div class="btn" role="group" aria-label="...">
									  <input type="submit" name="simpan" value="Insert" class="btn btn-primary" /> 
									</div>
									<br>
									<br>
									
									<?php  
									if(isset($_POST['simpan']))
									{
										$query = mysql_query("INSERT INTO supplier(nama_supplier, almt_supplier, telp_supplier, kota_supplier) VALUES ('".$_POST['namasup']."','".$_POST['almt']."','".$_POST['telp']."','".$_POST['kota']."')");

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
												Gagal<?php echo "".mysql_error(); ?>
											  </div>
											</div>
										<?php }
										
									}
									?>		
					
									<div class="panel panel-default">
										<div class="panel-body">
										<?php include "readsupl.php"; ?>
										</div><!-- Panel Body -->
									</div><!-- Panel Default -->


						</div><!-- Panel Body -->
						</div><!-- Panel Default -->
					</div><!-- FORM -->
				</div><!-- COL-MD-6 -->	
			
			
		   <div class="col-md-2">
		   </div>
   </div>
   
	
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>