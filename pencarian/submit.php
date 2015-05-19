<?php  

include "config.php";
$mk=ucwords(htmlentities($_POST['mk']));
$sks=ucwords(htmlentities($_POST['sks']));
$smstr=htmlentities($_POST['smstr']);
$nilai=htmlentities($_POST['nilai']);



if(empty($mk) || empty($sks)) {

	?>Data Anda belum lengkap. silahkan ulangi <a href="?page=form"> input Form</a><?php

}else{

		$query= mysql_query("insert krs(id,mk,sks,smstr,nilai)
values('NULL','$mk','$sks','$smstr','$nilai')");
	if($query){
		echo "Berhasil input data ke database ";
		?><a href="?page=tampil">Lihat data di Tabel</a><?php
	}else{
		echo "Gagal input data";
		echo mysql_error();
	}
	
}
?>