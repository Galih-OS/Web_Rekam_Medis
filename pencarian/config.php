<?php
	//koneksi ke database
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbnm = "kuliah";
	
	$conn = mysql_connect($host, $user, $pass);
	if($conn){
		$open = mysql_select_db($dbnm);
		if(!$open){
			echo("database tidak dapat di buka");	
		}
	}else{
		echo("Server mysql tidak terhubung");
	}
?>