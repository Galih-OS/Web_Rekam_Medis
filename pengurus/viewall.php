<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Bootstrap 101 Template</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 thumbnail" style="background-color:orange; height:710px;">
					<div class="col-md-12 thumbnail" style="font-family:Verdana; font-weight:bold; background-color:transparent; border:transparent; color:white;">
						<div style="font-size:14pt; text-align:right;">
							Transaksi
						</div><hr>
						<div style="font-size:12pt; text-align:right;">
							Input Data
						</div>
						<div style="font-size:10pt; text-align:right;">
							<a href="inputBarang.php">Barang</a><br/>
							<a href="inputPegawai.php">Pegawai</a><br/>
							<a href="transaksi.php">Transaksi</a>
						</div><hr>
						<div style="font-size:12pt; text-align:right;">
							Laporan
						</div>
						<div style="font-size:10pt; text-align:right;">
							<a href="reportBarang.php">Barang</a><br/>
							<a href="reportPegawai.php">Pegawai</a><br/>
							<a href="reportTransaksi.php">Transaksi</a>
						</div>
					</div>
				</div>
				<div class="col-md-10 thumbnail">
					<div style="text-align:center; font-family:Verdana; font-size:36pt;">Transaksi Penjualan</div><hr>
					<form action method="POST">
						<table style="font-family:Verdana; font-weight:bold; background-color:transparent; border:transparent; margin-left:auto; margin-right:auto;">
							<tr height="30px">
								<td>Kode Jual&nbsp</td>
								<td width="20px">:</td>
								<td><input type="text" name="kode_jual" value="<?php
									include 'koneksi.php';
									$query = "SELECT COUNT(kode_jual)+1 as COUNT FROM penjualan";
									$exec = mysql_query($query);
									$row = mysql_fetch_assoc($exec);
									$row =$row['COUNT'];
									if($row < 10){
									$kode_jual = "TR00".$row;	
									echo $kode_jual;}
									else if ($row >=10 && $row < 100){
									$kode_jual = "TR0".$row;	
									echo $kode_jual;
									}
									else{
									$kode_jual = "TR".$row;	
									echo $kode_jual;
									}?>">
								</td>
							</tr>
							<tr height="30px">
								<td>Tanggal</td>
								<td>:</td>
								<td><input type="text" name="tanggal" value="<?php 
										include 'koneksi.php';
										$query = "SELECT NOW()";
										$exec = mysql_query($query);
										$row = mysql_fetch_array($exec);
										echo $row['NOW()'];
										$tanggal = $row['NOW()'];
									?>" />
								</td>
							</tr>
							<tr height="30px">
								<td>ID Kasir&nbsp</td>
								<td>:</td>
								<td><select name="id_pegawai">
										<?php  
											include 'koneksi.php';
											$query = "SELECT id_pegawai FROM pegawai";
											$exec = mysql_query($query);
											while($row = mysql_fetch_assoc($exec))
											{
												$id_pegawai = $row["id_pegawai"];
												echo "<option value='".$row['id_pegawai']."'>".$row['id_pegawai']."</option>";
											}
										?>
									</select>
								</td>
							</tr>
						</table><hr>
						<table border="0" style="font-family:Verdana; font-weight:bold; background-color:transparent; margin-left:auto; margin-right:auto;">
							<tr height="30px">
								<td>Nama Barang&nbsp</td>
								<td>:&nbsp</td>
								<td>
									<select name="nama_barang">
									<?php  
										include 'koneksi.php';
										$query = "SELECT nama_barang FROM barang";
										$exec = mysql_query($query);
										while($row = mysql_fetch_assoc($exec))
										{
											$nama_barang = $row["nama_barang"];
											echo "<option value='".$row['nama_barang']."'>".$row['nama_barang']."</option>";
										}
									?>
									</select>
								</td>
								<td style="padding-left:20px;">Kuantitas&nbsp</td>
								<td>:&nbsp</td>
								<td><input type="number" name="kuantiti" value="1"></td>
							</tr>
							<tr height="50px">
								<td colspan="6" style="text-align:center;">
									<input type="submit" name="tambah" value="Tambah" />
								</td>
							</tr>
						</table>
					</form><hr>
					<?php
					include 'koneksi.php';
					if(isset($_POST['tambah']))
					{
						$nama_barang=$_POST['nama_barang'];
						$kuantiti=$_POST['kuantiti'];
						$cari=mysql_query("select * from barang where nama_barang='$nama_barang'"); 
						while ($data=  mysql_fetch_array($cari))
							{
								$harga=$data['harga'];
								$id_barang=$data['id_barang'];
							}
						$sub_total=$kuantiti*$harga;
						$hasil = mysql_query("Insert into keranjang values('','$kode_jual','$id_barang','$kuantiti','$sub_total')");
							if($hasil){
							?>
							<?php
							echo '<script languange="javascript">window.location="Transaksi.php"</script>';
							?>
							<?php
							}
					}
					?>
					
					<?php
						include 'koneksi.php';
						if(isset($_POST['hapus']))
						{
							$hapus = mysql_query("DELETE FROM keranjang WHERE kode_jual='$kode_jual'");
						}
					?>
					
					<?php
						include 'koneksi.php';
					?>
					<p>
					<table width="1000px" align="center" border="1">
						<tr style="background-color:#E8DEBD">
						<th style="text-align:center">Kode Jual</th>
						<th style="text-align:center">Nama Barang</th>
						<th style="text-align:center">Harga Barang</th>
						<th style="text-align:center">Kuantiti</th>
						<th style="text-align:center">Sub total</th>
						<th style="text-align:center">Aksi</th>
						</tr>
						<?php
						$result = mysql_query("SELECT k.kode_jual, b.nama_barang, b.harga, k.kuantiti, k.sub_total FROM barang b, keranjang k WHERE b.id_barang=k.id_barang");
						$no=1;
						while($data=mysql_fetch_array($result)){?>
						<form action="" method="POST">
						<tr style="text-align:center">
							<td><input style="width:100%" type="text" readonly="1" name="kode_jual" value="<?php echo $data['kode_jual']?>" /></td>
							<td><input style="width:100%" type="text" readonly="1" name="nama_barang" value="<?php echo $data['nama_barang']?>" /></td>
							<td><input style="width:100%" type="text" readonly="1" name="harga" value="<?php echo $data['harga']?>" /></td>
							<td><input style="width:100%" type="text" readonly="1"  name="kuantiti" value="<?php echo $data['kuantiti']?>" /></td>
							<td><input style="width:100%" type="text" readonly="1"  name="sub_total" value="<?php echo $data['sub_total']?>" /></td>
							<td><input type="submit" name="hapus" value="Hapus" /></td>
						</tr>
						</form>
						<?php
						}
						?>
					</table><hr>
					<div style="text-align:center; font-family:Verdana; font-weight:bold;">
						<form action="" method="POST">
							<input type="submit" name="simpan" value="Simpan"/>
						</form>
					</div>
					<?php
					if(isset($_POST['simpan'])){
					?><hr>
					<table border="0" style="font-family:Verdana; font-weight:bold; background-color:transparent; margin-left:auto; margin-right:auto;">
					<tr>
					<?php
					include 'koneksi.php';
					$result = mysql_query("select * from pegawai where id_pegawai='$id_pegawai'");
					while ($data=  mysql_fetch_array($result))
						{
							$nama_pegawai=$data['nama_pegawai'];
						}
						?>
					<form action="" method="POST">	
					<tr height="30px">
						<td>ID Kasir&nbsp</td>
						<td>:&nbsp</td>
						<td><?php echo $id_pegawai;?></td>
					</tr>
					<tr height="30px">
					<td>Nama Kasir&nbsp</td>
					<td>:</td>
					<td><?php echo $nama_pegawai;?></td>
					</tr>
					<tr height="30px">
					<td>Tanggal</td>
					<td>:</td>
					<td><?php echo $tanggal ?></td>
					</tr>
					<tr height="30px">
						<td>Total Bayar</td>
						<td>:</td>
						<td>Rp.
						<input type="text" name="uang" value="<?php
						include 'koneksi.php';
						$result=mysql_query("select sum(sub_total) as st from keranjang");
						while($data=mysql_fetch_array($result))
						{
							echo $data['st'];
						}
						?>" />
						</td>
					</tr>
					<tr height="30px">
						<td>Bayar</td>
						<td>:</td>
					<td>Rp. <input type="text" name="uang" value=""></td>
					</tr>
					<tr height="30px">
					<td></td>
					<td></td>
					<td>
						<input type="submit" name="pembayaran" value="Bayar" />
					</td>
				</tr>
					</table>
					</form>
					<?php
					}
					?>
					<?php
		if(isset($_POST['pembayaran'])){
		include 'koneksi.php';
		$result=mysql_query("select sum(sub_total) as st from keranjang");
		while($data=mysql_fetch_array($result))
		{
			$totalbyr=$data['st'];
		}
		$bayar=$_POST['uang'];
		$bayar2=$bayar-$totalbyr;
		$hasil = mysql_query("Insert into penjualan values('$kode_jual','$tanggal','$id_pegawai','$totalbyr', '$bayar','$bayar2')");
			if($hasil)
			{
				$result2 = mysql_query("SELECT * FROM keranjang");
				while($data=mysql_fetch_array($result2))
				{
					$id_barang = $data['id_barang'];
					$kuantiti = $data['kuantiti'];
					$sub_total = $data['sub_total'];
					$hasil2 = mysql_query("INSERT INTO detil_penjualan VALUES ('','$kode_jual','$id_barang','$kuantiti','$sub_total')");
					if($hasil2)
					{
						$hapus = mysql_query("DELETE FROM keranjang");
						echo '<script languange="javascript">window.location="Transaksi.php"</script>';
					}
				}
			}
		}
		
		?>
		
		<?php
					if(isset($_POST['hapus'])){
					include 'koneksi.php';
					$nama_barang = $_POST['nama_barang'];
					$hasil = mysql_query("delete from keranjang where nama_barang='$nama_barang'");
					if($hasil){
					echo '<script languange="javascript">alert ("Transaksi Berhasil")</script>';
					echo '<script languange="javascript">window.location="Transaksi.php"</script>';
					}
					}
				?>
				</div>
			</div>
		</div>
	</body>
</html>