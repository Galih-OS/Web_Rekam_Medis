<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_konektor = "localhost";
$database_konektor = "medis";
$username_konektor = "root";
$password_konektor = "";
$konektor = mysql_pconnect($hostname_konektor, $username_konektor, $password_konektor) or trigger_error(mysql_error(),E_USER_ERROR); 
?>