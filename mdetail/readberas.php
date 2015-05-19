<html>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Beras</th>
                <th>Nama Beras</th>
                <th>Harga Beras (Rp)</th>
                <th>Stock Beras</th>
				<th>ID Supplier</th>
				<th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
		<?php 
			$SQL = "SELECT * FROM beras";
			$result = mysql_query($SQL);

			while ( $db_field = mysql_fetch_assoc($result) ) {
		?>
            <tr>
                <td><?php echo $db_field['id_beras'] ?></td>
                <td><?php echo $db_field['nama_beras'] ?></td>
                <td><?php echo $db_field['harga_beras'] ?></td>
                <td><?php echo $db_field['stock'] ?></td>
				<td><?php echo $db_field['id_supplier'] ?></td>
				
				<td>
					<a href="actioneditberas.php?action=update&id=<?php echo $db_field['id_beras']; ?>" ><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
					<a href="actioneditberas.php?action=delete&id=<?php echo $db_field['id_beras']; ?>" ><span class="glyphicon glyphicon-remove"></span></a>
				</td>
				
            </tr>
		<?php  
			}
		?>
        </tbody>
    </table>
	
	
</body>
</html>
	



