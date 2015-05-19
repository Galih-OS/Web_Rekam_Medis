<?php
function getLastTrans() 
{ 
$querycount="SELECT MAX(no) as LastID FROM transaksi"; 
$result=mysql_query($querycount) or die(mysql_error()); 
$row=mysql_fetch_array($result, MYSQL_ASSOC);
return $row['LastID']; 
}

function FormatNoTrans($num) { 
		$num=$num+1; switch (strlen($num)) 
		{     
		case 1 : $NoTrans = "TRA0000".$num; break;     
		case 2 : $NoTrans = "TRA000".$num; break;     
		case 3 : $NoTrans = "TRA00".$num; break;     
		case 4 : $NoTrans = "TRA0".$num; break;     
		default: $NoTrans = $num;        
		}           
		return $NoTrans; 
} 
?>