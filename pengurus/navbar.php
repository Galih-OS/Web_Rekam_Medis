<?php
include ("akses.php"); 
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
	<div class="navbar navbar-top">
		<div class="navbar-inner">
			<div class="container">
				<div class="nav-collapse">
					<ul class="nav">
					  <li class="active"><a href="#">Data</a></li>
					  <li><a href="http://localhost:8080/medis/" align="left">Logout</a>
					  <li><a href="viewall.php" align="left">Transaksi</a>
					  </li>					  
					</ul>
				<form class="navbar-form navbar-left" role="search" method="POST" action="pencarian.php">
					<div class="form-group">
					  <div align="right">
						<input type="text" name="cari" class="form-control" placeholder="Nama / Alamat Pasien" align="center" /> 
						&nbsp&nbsp
						<button name="submit" type="submit" class="btn btn-default">Cari</button>
					  </div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>