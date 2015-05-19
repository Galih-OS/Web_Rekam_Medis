<?php
include "konektor.php";
include "function_trans.php";

$LastID=FormatNoTrans(getLastTrans());
?>

<html>
<head>
 <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
	<body>
		<div class="row">

			<div class="col-md-2">
			</div>
				
				<div class="col-md-8">
				<?php include "navbar.php"; ?>
						<div class="panel panel-default">
						<div class="panel-body">

							
										<div>
											<input type="text" disabled value="<?php echo $LastID ?>">
										</div>
										<br>

										<div class='input-group date' id='datetimepicker2'>
											<input type='text' class="form-control" disabled
											value="<?php date_default_timezone_set("Asia/Jakarta");echo date("d-m-Y H:i:s");?>" />
											<span class="input-group-addon">
												<span class="glyphicon glyphicon-calendar"></span>
											</span>
										</div>
										<br>	

							
							
										<div>
											<?php include "sesstrans.php";?>
										</div>
						</div><!-- panel body -->
						</div><!-- panel default -->
					
			
				
				</div><!-- col md 8 -->

			<div class="col-md-2">
			</div>

		</div>



	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>