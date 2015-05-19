<html>
<body>
 <div class="bs-example">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat Supplier</th>
                <th>Telp Supplier</th>
				<th>Kota Supplier</th>
				<th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
		<?php 
			$SQL = "SELECT * FROM supplier";
			$result = mysql_query($SQL);

			while ( $db_field = mysql_fetch_assoc($result) ) {
		?>
            <tr>
                <td><?php echo $db_field['id_supplier'] ?></td>
                <td><?php echo $db_field['nama_supplier'] ?></td>
                <td><?php echo $db_field['almt_supplier'] ?></td>
                <td><?php echo $db_field['telp_supplier'] ?></td>
				<td><?php echo $db_field['kota_supplier'] ?></td>
				<td>
					<a href="actioneditsupl.php?action=update&id=<?php echo $db_field['id_supplier']; ?>" ><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
					<a href="actioneditsupl.php?action=delete&id=<?php echo $db_field['id_supplier']; ?>" ><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
					<a href="actioneditsupl.php?action=tambah&id=<?php echo $db_field['id_supplier']; ?>" ><span class="glyphicon glyphicon-plus-sign"></span></a>
				</td>
				
            </tr>
		<?php  
			}
		?>
        </tbody>
    </table>
	
	
</body>
</html>
	



