<?php
include ("config.php"); 
$query = $_POST['query'];
$pencarian = $_POST['pencarian'];

	
if ($_POST['submit']) {
	$query=mysql_query("select * from krs where $pencarian like '%$query%' ");
	$cek=mysql_num_rows($query);
	?>
	<table border="1" class="datatable">
	<tr>
		<th>No</th><th>**Mata Kuliah**</th>
		<th>*Sks*</th><th>*Smstr*</th><th>*Nilai*</th>
		
	</tr>
	<?php
	if($cek){
	
		while($row=mysql_fetch_array($query)){
	?>
	<tr>
		<td><?php echo $no=$no+1;?></td>
		<td><?php echo $row['mk'];?></td>
		<td><?php echo $row['sks'];?></td>
		<td><?php echo $row['smstr'];?></td>
		<td><?php echo $row['nilai'];?></td>
		
	</tr>
	
	
	<?php
			
		}
		
	}else{
		echo "Tidak ada data";
	}
	
}else{
	unset($_POST['submit']);
}
?>
</table><br />

<?php

?>