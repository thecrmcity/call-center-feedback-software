<?php include('header.php');?>
<?php

if(isset($_POST['agentlogin']))
{
	$agentid = strtoupper($_POST['agentid']);
	
	

	 $logsql = "SELECT * FROM user_employee WHERE user_employee_id='$agentid' AND user_password='Null' AND gen_pass='0'";
	 $sqlconn = mysqli_query($conn, $logsql);
	
		 $sqlres = mysqli_fetch_array($sqlconn);
		 $_SESSION['agentid'] = $sqlres['user_employee_id'];
		 $_SESSION['agenthead'] = $sqlres['user_emp_head'];
		 $_SESSION['agentname'] = $sqlres['user_emp_name'];
		 $userpass = $sqlres['user_password'];
		 $genpass = $sqlres['gen_pass'];
		if($userpass == 'Null' && $genpass == '0')
		{
			header('Location:create.php');
		}
		else
		{
			header('Location:login.php');
		}
		 
	
	

}

?>
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
								<img src="assets/img/silarisinfo-logo.png" alt="">
								<div class="login-agent pt-3" id="login-agent">
									<form class="" method="post" action="">
										<div class="form-group">
											<input type="text" name="agentid" value="" placeholder="Agent Id..." class="inputinfo">
										</div>
										
										<div class="form-group">
											<input type="submit" name="agentlogin" value="Login" class="inputinfobtn">
										</div>
									</form>
									<p>Silaris Informations Pvt Ltd &copy; 2021 | <span class="forgentpass" id="forgentpass">Forget Password </span></p>
									<p>If you are not registered Click <a href="quick-feedback.php" class="badge badge-danger blink_me"> Quick Feedback</a></p>
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
	<div class="myDIV" id="myDIV"><img src="assets/img/blink-home.gif" class="img-fluid"></div>
	<div class="myhide" id="myhide">
		<ul>
			<li><a href="it">IT</a></li>
			<li><a href="admin">Admin</a></li>
			<li><a href="ceo">CEO</a></li>
			<li><a href="index.php">Agent</a></li>
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



	<script src="assets/main.js"></script>
  <script src="assets/popup.js"></script>
  <script src="assets/bootstrap.js"></script>
</body>
</html>