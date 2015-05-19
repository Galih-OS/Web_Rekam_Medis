<?php 
session_start();
include "konektor.php";
include "function_trans.php";
$LastID=FormatNoTrans(getLastTrans());
date_default_timezone_set("Asia/Jakarta");
$tanggal = date("y-m-d G:i:s");;
//echo $LastID;


$sql = mysql_query("insert into transaksi(id_trans, tgl_trans) values ('$LastID','$tanggal')");

$awal = $_SESSION['isi'];
	$j=0;
	while($j <= $awal){
		$beras = @$_SESSION['akhir'][$j][4];
		$jumlah = @$_SESSION['akhir'][$j][2];
		if($LastID!="" and $beras!="" and $jumlah!=""){
			$query = mysql_query("
				INSERT INTO detil_transaksi (id_trans, id_beras, jumlah_beras)
				values('$LastID','$beras', '$jumlah')
			");
			
		}
		$j++;
	}
	echo "<script type='text/javascript'>alert('Data berhasil disimpan')</script>";
	echo "<script>document.location.href='trans.php?action=read';</script>";
	unset($_SESSION['isi']);
	unset($_SESSION['nilai']);
	echo "".mysql_error();

?>