<?php
session_start();
if((empty($_GET["destroy"])==FALSE)){
 session_destroy();
 echo "<a href='beli_n.php'>kembali</a>";
}
?>
<html>
<body>
	<form name="f" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			
		
			<div class="form-group">
				<label>Nama Beras</label>
			  <?php 
				$tmpberas = mysql_query("select b.id_beras, b.nama_beras, s.id_supplier, s.nama_supplier 
				from beras b join supplier s on s.id_supplier = b.id_supplier");
			  ?>

			  <select class="form-control" name="beras">
				<?php
					while ( $muter = mysql_fetch_assoc($tmpberas) ) { ?>
						<option value="<?php echo $muter['id_beras']; ?>"> <?php echo $muter['nama_beras']." - ".$muter['nama_supplier']; ?> </option>
					<?php }
				?>
			  </select>
			</div>

			<div class="input-group">
			  <span class="input-group-addon" id="sizing-addon2">Jumlah Beras</span>
			  <input type="text" name="jumlah" class="form-control" aria-describedby="sizing-addon2">
			</div><br>
	
	<div class="btn" role="group" aria-label="..." style="float:right;">
		<input type="submit" name="button" value="Tambah" class="btn btn-primary" /> 
	</div><br><br>

	</form>
	<form action="actiontrans.php" method="post">
	<div class="panel panel-default">
	<div class="panel-body">
		<h1 align="center">TRANSAKSI</h1>
	<table class="table table-striped">
	<th>No</th>
	<th>Nama</th>
	<th>Harga</th>
	<th>Jumlah</th>
	<th>SubTotal</th>
	<?php
	$awal=1;$sub=0;$total=0;
	if (@$_POST["beras"]!=''){
		if (empty($_SESSION["isi"])==TRUE){
			$_SESSION["isi"]=1;
		}else{
			$_SESSION["isi"]++;
		}
		@$beras = $_POST['beras'];
		$tampil = mysql_fetch_array(mysql_query("select nama_beras, harga_beras from beras where id_beras = '$beras'"));
		@$nama= $tampil["nama_beras"];
		@$harga=$tampil["harga_beras"];
		@$jumlah=trim($_POST["jumlah"]);
		@$sub=$harga*$jumlah;		
		//@$xx=$xx+$sub;
		$_SESSION["akhir"][$_SESSION["isi"]]=array($nama,$harga,$jumlah,$sub,$beras);
	}else{
		echo "<script type='text/javascript'>alert('Silahkan isi terlebih dahulu!')</script>";
	}

		@$awal = $_SESSION["isi"];
		
		for ($i=0;$i<=$awal;$i++) {
		if (@$_SESSION['akhir'][$i][0]!=''){ ?>
			<tr>
					<td><?php echo $i ?></td>
					<td><?php echo @$_SESSION['akhir'][$i][0] ?></td>
					<td><?php echo @$_SESSION['akhir'][$i][1] ?></td>
					<td><?php echo @$_SESSION['akhir'][$i][2] ?></td>
					<td><?php echo @$_SESSION['akhir'][$i][3] ?></td>
			</tr>
				
			
			<?php }
			$total=@$_SESSION['akhir'][$i][3]+$total;
		}
	
	?>
	<tr>
				<td colspan="5">
					<input type="submit" class="btn btn-primary" value="Save" name="simpan"/>
					<a href='destroy.php'><input type='button' value='hancurkan' class="btn btn-danger"></a>
				</td>
			</tr>	
	</table>
		<div style="float:right;">
			<?php
			
				//if($ok==1)
				//{
				//	echo "<tr><td>Potongan</td><td>: Rp.</td><td align=right> $disc</td></tr>";
				//}
				echo "<tr><td>Total Bayar</td><td> : Rp.</td><td align=right> $total</td></tr>";
			?>
		</div><br></br>

		
	</div>
	</div>
	</form>


	
</body>
</html>