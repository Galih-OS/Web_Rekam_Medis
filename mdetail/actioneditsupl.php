<html>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
	#pad-top{ padding-top:30px;}
	</style>
	<?php include "konektor.php"; ?>
  </head>
<body id="pad-top">
<form method="POST">
	<div class="row">
		<div class="col-md-2">
		</div>
	
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-body">
					<?php  
						$action = $_GET['action'];
						if($action == "update"){
							if(isset($_POST['edit']))
							{

								$kuery = mysql_query("UPDATE supplier SET nama_supplier = '".$_POST['namas']."', almt_supplier = '".$_POST['almt']."', telp_supplier = '".$_POST['telp']."',kota_supplier = '".$_POST['kota']."' WHERE id_beras = '".$_GET['id']."'");
								if ($kuery) { ?>
									<div class="panel panel-success">
										<div class="panel-body">
											Sukses
											<?php echo "<script language=javascript>parent.location.href='index.php';</script>"; ?>
										</div>
									</div>				
							<?php }
								else { ?> 
									<div class="panel panel-success">
										<div class="panel-body">
											Gagal
										</div>
									</div>	
								<?php }
								//Re-Load Data from DB
								
							}

						$sql = mysql_query("SELECT id_supplier, nama_supplier, almt_supplier, telp_supplier, kota_supplier FROM supplier WHERE id_supplier = '".$_GET['id']."'");
							$data = mysql_fetch_array($sql);
						?>

						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">ID Beras&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
							<input type="text" class="form-control"  name="id" aria-describedby="sizing-addon2" value="<?php echo $data['id_supplier']; ?>"required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">Nama Beras</span>
							<input type="text" class="form-control"  name="namas" aria-describedby="sizing-addon2" value="<?php echo $data['nama_supplier']; ?>"required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">Harga Beras</span>
							<input type="text" class="form-control" placeholder="Harga" name="almt" aria-describedby="sizing-addon2" value="<?php echo $data['almt_supplier'];?>" required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">Stock Beras&nbsp;</span>
							<input type="text" class="form-control" placeholder="Stock" name="telp" aria-describedby="sizing-addon2" value="<?php echo $data['telp_supplier'];?>"required>
						</div>
						<br>
						<div class="input-group">
							<span class="input-group-addon" id="sizing-addon2">Stock Beras&nbsp;</span>
							<input type="text" class="form-control" placeholder="Stock" name="telp" aria-describedby="sizing-addon2" value="<?php echo $data['kota_supplier'];?>"required>
						</div>
						<br>
							<div class="btn" role="group" style="float:right;">
								<input  type="submit"  value="edit" name="edit"  class="btn btn-primary" /> 
							</div>
						<?php
						} // tutup action update

						else if($action=="delete"){
							mysql_query("DELETE FROM supplier WHERE id_supplier = '".$_GET['id']."'");
							echo "<script language=javascript>parent.location.href='supplier.php';</script>";
						}
						else if($action == "tambah"){
							include "insertBeras.php";
						}
						?>
					</div><!-- Panel Body -->
				</div><!-- Panel Default -->

			</div><!-- COL-MD-6 -->	

		   <div class="col-md-2">
		   </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
		</div> <!-- tutut row-->
  </body>
</html>