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
				<div class="col-md-2 thumbnail" style="background-color:orange; height:640px;">
					<div class="col-md-12 thumbnail" style="font-family:Verdana; font-weight:bold; background-color:transparent; border:transparent; color:white;">
						<div style="font-size:14pt; text-align:right;">
							Menu Utama
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
					<div style="text-align:center; font-family:Verdana; font-size:36pt;">Laporan Penjualan</div><hr>
					<?php
						include 'koneksi.php';
					?>
					<p>
					<table width="1000px" align="center" border="1">
						<tr style="background-color:#E8DEBD">
						<th style="text-align:center">Kode Jual</th>
						<th style="text-align:center">Total Harga</th>
						<th style="text-align:center">Aksi</th>
						</tr>
						<?php
						$result = mysql_query("SELECT kode_jual, total_harga FROM penjualan");
						$no=1;
						while($data=mysql_fetch_array($result)){?>
						<form action="" method="POST">
						<tr style="text-align:center">
							<td width="100px"><input style="width:100%" type="text" readonly="1" name="kode_jual" value="<?php echo $data['kode_jual']?>" /></td>
							<td width="100px"><input style="width:100%" type="text" readonly="1" name="total_harga" value="<?php echo "Rp. ".$data['total_harga']?>" /></td>
							<td width="100px"><input style="width:100%" type="submit" name="tbCari" value="Cari"></td>
						</tr>
						</form>
						<?php
						}
						?>
						</table>
						<p><br/><br/><br>
						<div style="text-align:center; font-family:Verdana; font-size:36pt;">Laporan Penjualan Berdasarkan Kode</div><hr>
						<table width="1000px" align="center" border="1">
						<tr style="background-color:#E8DEBD">
						<th style="text-align:center">Kode Jual</th>
						<th style="text-align:center">Tanggal</th>
						<th style="text-align:center">Nama Barang</th>
						<th style="text-align:center">Harga</th>
						<th style="text-align:center">Kuantiti</th>
						<?php
						if(isset($_POST['tbCari'])){
						include 'koneksi.php';
						$kode_jual = $_POST['kode_jual'];
						$hasil = mysql_query("SELECT p.kode_jual, p.tanggal_jual, b.nama_barang, b.harga, dp.kuantiti, p.total_harga FROM penjualan p, detil_penjualan dp, barang b WHERE p.kode_jual = dp.kode_jual AND b.id_barang = dp.id_barang AND p.kode_jual = '$kode_jual'");
						while($data=mysql_fetch_array($hasil)){?>
						<form action="" method="POST">
						<tr style="text-align:center">
							<td><input style="width:100%" type="text" readonly="1" name="kode_jual" value="<?php echo $data['kode_jual']?>" /></td>
							<td><input style="width:100%" type="text" readonly="1" name="tanggal_jual" value="<?php echo $data['tanggal_jual']?>" /></td>
							<td><input style="width:100%" type="text" readonly="1" name="nama_barang" value="<?php echo $data['nama_barang']?>" /></td>
							<td><input style="width:100%" type="text" readonly="1"  name="harga" value="<?php echo "Rp. ".$data['harga']?>" /></td>
							<td><input style="width:100%" type="text" readonly="1"  name="kuantiti" value="<?php echo $data['kuantiti']?>" /></td>
						</tr>
						</form>
							<?php
							}
							?>
						<?php
						}
						?>
					</table><hr>
				</div>
			</div>
		</div>
	</body>
</html>