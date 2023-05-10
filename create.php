<?php
session_start();
include_once('config.php');
$agentid = $_SESSION['agentid'];
$agenthead = $_SESSION['agenthead'];
$agentname = $_SESSION['agentname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>360 Feedback | Silaris</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/img/silarisinfo-fevicon.png" type="image/gif">
  <link rel="stylesheet" href="assets/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="assets/style.css">
  <script src="assets/jquery.js"></script>

</head>
<body>
<section class="login-blk">
	<div class="tringle"></div>
	<div class="circle"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="login-area">
					<div class="row">
						<div class="col-lg-6">
							<div class="signin-blk">
								<h2>WELCOME TO <span style="color:#383838;">360-FEEDBACK</span></h2>
								<p>This portal has been created for your help. You can give any kind of information related to the company. Any kind of degradation is happening or you want to give some suggestive. Your opinion will be heard for any kind of information.</p>
								<p><small><em>* You are free to give your information. Your Id information will be kept secret.</em></small></p>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="signintext">
								<img src="assets/img/silarisinfo-logo.png" alt="">
								<div class="login-agent pt-3" id="login-agent">
									<form class="" method="post" action="">
										<div class="form-group">
											
										<div class="form-group">
											<input type="password" name="agentpass" value="" placeholder="Password..." class="inputinfo">
										</div>
										<div class="form-group">
											<input type="password" name="againpass" value="" placeholder="Again Password..." class="inputinfo">
										</div>
										<div class="form-group">
											<input type="submit" name="agentlogin" value="Submit" class="inputinfobtn">
										</div>
									</form>
									<p>Silaris Informations Pvt Ltd &copy; 2021 | <span class="forgentpass" id="forgentpass">Forget Password </span></p>
								</div>
								
								<div class="forget-password pt-3" id="forget-password">
									<form class="" method="post" action="forget.php">
										<div class="form-group">
											<input type="text" name="forgetId" value="" placeholder="Agent Id..." class="inputinfo">
										</div>
										<div class="form-group">
											<input type="submit" name="agentforget" value="Submit" class="inputinfobtn">
										</div>
									</form>
									<p>Silaris Informations Pvt Ltd &copy; 2021 | <span class="forgentpass" id="agentlog">Login </span></p>
								</div>
								<?php
									if(isset($_SESSION['msg']))
									{
										echo $_SESSION['msg'];
										
									}

								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
</section>
<script type="text/javascript">
	$(document).ready(function(){
	  
	  $("#forgentpass").click(function(){
	    $("#forget-password").show();
	    $("#login-agent").hide();
	  });
	  $("#agentlog").click(function(){
	    $("#forget-password").hide();
	    $("#login-agent").show();
	  });
	});
</script>


<?php

if(isset($_POST['agentlogin']))
{
	$agentpass = $_POST['agentpass'];
	$againpass = $_POST['againpass'];

	if($agentpass == $againpass)
	{
			$logsql = "UPDATE user_employee SET user_password='$agentpass',gen_pass='1' WHERE user_employee_id='$agentid'";
	
	 $sqlconn = mysqli_query($conn, $logsql);
	
		if($sqlconn == true)
		{
			header('Location:login.php');
		}
		else
		{
			$_SESSION['msg'] = "<div class='alert-danger myalert'>Please contant IT Department</div>";
		}
		 
	
	}
	else
	{
		echo "<script>alert('Password Not Match! Please Try Again')</script>";
	}


	

}

?>
	<script src="assets/main.js"></script>
  <script src="assets/popup.js"></script>
  <script src="assets/bootstrap.js"></script>
</body>
</html>