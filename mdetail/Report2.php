						<?php
include "konektor.php";
error_reporting(0);
?>

<html>
<head>
 <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
	<body>
		<div class="row">

			<div class="col-md-2">
			</div>
				
				<div class="col-md-8">
				<?php include "navbar.php"; ?>
						<div class="panel panel-default">
						<div class="panel-body">
							<form method="post">
							<div class="form-group">
								<label>Cari Bulan</label>
							

								  <select class="form-control" name="bulan">
										<option value="1"> JANUARI </option>
										<option value="2"> FEBRUARI</option>
										<option value="3"> MARET</option>
										<option value="4"> APRIL</option>
										<option value="5"> MEI</option>
										<option value="6"> JUNI</option>
										<option value="7"> JULI</option>
										<option value="8"> AGUSTUS</option>
										<option value="9"> SEPTEMBER</option>
										<option value="10"> OKTOBER</option>
										<option value="11"> NOVEMBER</option>
										<option value="12"> DESEMBER</option>
								  </select>
								  
							</div>
							<div class="btn" role="group">
								<input  type="submit"  value="Cari" name="tombol"  class="btn btn-primary" /> 
							</div>
							</form>
							

							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID Beras</th>
										<th>Nama Beras</th>
										<th>Jumlah</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									$bulan = $_POST['bulan'];
									$SQL = "SELECT b.id_beras, b.nama_beras, count(dt.id_beras) as idb FROM detil_transaksi dt join beras b on dt.id_beras = b.id_beras join transaksi t on t.id_trans = dt.id_trans 
									WHERE month(t.tgl_trans)='$bulan' 
									group by b.id_beras, b.nama_beras";
									$result = mysql_query($SQL);

									while ( $db_field = mysql_fetch_array($result) ) {
								?>
									<tr>
										<td><?php echo $db_field['id_beras'] ?></td>
										<td><?php echo $db_field['nama_beras'] ?></td>
										<td><?php echo $db_field['idb'] ?></td>
									</tr>
								<?php  
									}
									$bulan1 = $_POST['bulan'];
									$SQL2 = "SELECT count(dt.id_beras) as id
									FROM detil_transaksi dt join transaksi t on dt.id_trans = t.id_trans 
									WHERE month(tgl_trans)='$bulan1'";
									$result2 = mysql_fetch_array(mysql_query($SQL2));
								?>
									<tr>
										<td colspan="2">Total Beras</td>
										<td> <?php echo $result2['id']; ?> </td>
									</tr>
								</tbody>
							</table>
														
						</div><!-- panel body -->
						</div><!-- panel default -->
					
			
				
				</div><!-- col md 8 -->

			<div class="col-md-2">
			</div>

		</div>



	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
