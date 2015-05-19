<?php require_once('../Connections/koneksi.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_koneksi, $koneksi);
$query_pasien = "SELECT * FROM dokter";
$pasien = mysql_query($query_pasien, $koneksi) or die(mysql_error());
$row_pasien = mysql_fetch_assoc($pasien);
$totalRows_pasien = mysql_num_rows($pasien);

	if(isset($_POST['submit'])) {
		
		$con=mysql_connect ('localhost','root','') or die (mysql_error());
		mysql_select_db ('medis') or die (mysql_error());
		
		$query = "SELECT * FROM pasien WHERE nm_pasien LIKE '%$_POST[cari]%' ";
				
		$exeee = mysql_query($query);
		echo "<center>Pasien</center>";
		echo "<form action='' method='POST'>";
		echo "<table border='1' align='center'>";
		echo "	<tr align='center'>
					<td>No.</td>
					<td>Nama Pasien</td>
					<td>Jenis Kelamin MK</td>
					<td>Alamat</td>
				</tr>
				";
			$no = 1;
			while($row = mysql_fetch_assoc($exeee)){
				
			echo "	<tr align='center'>
							<td><input size='3' read-only name='' value='".$no."'></td>
							<td><input size='10' read-only name='nm_pasien' value='".$row['nm_pasien']."'></td>
							<td><input size='8' read-only name='j_kel' value='".$row['j_kel']."'></td>
							<td><input size='8' read-only name='alamat' value='".$row['alamat']."'></td>
							<td></td>
					</tr>";
				$no++;
			}
		echo "</table>";
		echo "</form>";
	}

mysql_free_result($pasien);
?>
