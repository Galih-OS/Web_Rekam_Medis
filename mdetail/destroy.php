<?php
session_start();
session_destroy();
echo "<script language=javascript>parent.location.href='trans.php';</script>";
?>

