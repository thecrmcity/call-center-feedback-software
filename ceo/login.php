<?php
session_start();
include_once('../config.php');

?>
<?php

if(isset($_POST['ceologin']))
{
	$ceomail = $_POST['ceomail'];
	$ceopass = $_POST['ceopass'];
	

	 $logsql = "SELECT * FROM user_login WHERE user_email_id ='$ceomail' AND user_password = '$ceopass'";
	 $sqlconn = mysqli_query($conn, $logsql);
	
		 $sqlres = mysqli_fetch_array($sqlconn);
		 $_SESSION['ceomail'] = $sqlres['user_email_id'];
		 
		 $_SESSION['ceoname'] = $sqlres['user_name'];
		if($sqlconn == true)
		{
			header('Location:../ceo/allmail.php');
		}
		else
		{
			$_SESSION['msg'] = "<div class='alert-danger myalert'>Please contant IT Department</div>";
		}
		 
	
	

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>360 Feedback | Silaris</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../assets/img/silarisinfo-fevicon.png" type="image/gif">
  <link rel="stylesheet" href="../assets/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" type="text/css" href="../assets/style.css">
  <script src="../assets/jquery.js"></script>
</head>
<body>
<section class="login-blk">
	<div class="tringle"></div>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="login-aread">
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
								<img src="../assets/img/silarisinfo-logo.png" alt="">
								<div class="login-agent pt-3" id="login-agent">
									<form class="" method="post" action="">
										<div class="form-group">
											<input type="text" name="ceomail" value="" placeholder="Email..." class="inputinfo">
										</div>
										<div class="form-group">
											<input type="password" name="ceopass" value="" placeholder="Password..." class="inputinfo">
										</div>
										<div class="form-group">
											<input type="submit" name="ceologin" value="Login" class="inputinfobtn">
										</div>
									</form>
									<p>Silaris Informations Pvt Ltd &copy; 2021 | <span class="forgentpass" id="forgentpass">Forget Password </span></p>
								</div>
								
								<div class="forget-password pt-3" id="forget-password">
									<form class="" method="post" action="forget.php">
										<div class="form-group">
											<input type="text" name="ceomail" value="" placeholder="Email..." class="inputinfo">
										</div>
										<div class="form-group">
											<input type="submit" name="ceoforget" value="Submit" class="inputinfobtn">
										</div>
									</form>
									<p>Silaris Informations Pvt Ltd &copy; 2021 | <span class="forgentpass" id="agentlog">Login </span></p>
								</div>
								<?php
									if(isset($_SESSION['msg']))
									{
										echo $_SESSION['msg'];
										session_destroy();
									}

								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<div class="myDIV" id="myDIV"><img src="../assets/img/blink-home.gif" class="img-fluid"></div>
	<div class="myhide" id="myhide">
		<ul>
			<li><a href="../it">IT</a></li>
			<li><a href="../admin">Admin</a></li>
			<li><a href="login.php">CEO</a></li>
			<li><a href="../index.php">Agent</a></li>
		</ul>
		
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
	  $("#myDIV").click(function(){
	  	$("#myhide").toggle();
	  });
	});
</script>


	<script src="../assets/main.js"></script>
  <script src="../assets/popup.js"></script>
  <script src="../assets/bootstrap.js"></script>
</body>
</html>