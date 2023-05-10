<?php
session_start();
include_once('../config.php');
include("checkit.php");
check_it_login();
$ceomail = $_SESSION['ituser'];
$agentname = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Change Password | 360 Feedback</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../assets/img/silarisinfo-fevicon.png" type="image/gif">
  <link rel="stylesheet" href="../assets/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" type="text/css" href="../assets/style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="../assets/jquery.js"></script>
</head>
<body>
<section class="dashboard-blk">
	<div class="row">
		<div class="col-lg-2 no-mp">
			<?php include_once('left.php');?>
		</div>
		<div class="col-lg-10 no-mp">
			<div class="dashboard-view">
				<div class="tringle opaci"></div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="dashboard-top">
							<p>Hi, <span style="font-weight: bold"><?php echo $itname;?></span></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="dashboard-text">
							<div class="changepass">
                            		<form class="" method="post" action="">
                            				<div class="form-group">
                            					<label>New Password</label>
                            					<input type="password" name="newpass"  placeholder="New Password..." class="form-control" required>
                            				</div>
                            				<div class="form-group">
                            					<label>Confirm Password</label>
                            					<input type="password" name="confirmpass"  placeholder="Confirm Password..." class="form-control" required>
                            				</div>
                            				<div class="form-group">
                            					
                            					<input type="submit" name="changesub" value="Submit" class="btn btn-dark">
                            				</div>
                            		</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php

if(isset($_POST['changesub']))
{
	$newpass = $_POST['newpass'];
	$confirmpass = $_POST['confirmpass'];

	if($newpass == $confirmpass)
	{
		$sqlupate = "UPDATE user_login SET user_password = '$newpass' WHERE user_post ='it'";
		$sqlres = mysqli_query($conn, $sqlupate);
		if($sqlres == true)
		{
			echo "<script>alert('Password Changed Successfully!')</script>";
		}
	}
	else
	{
		echo "<script>alert('Password Not Match. Try Again!')</script>";
	}
}

?>
<script src="../assets/main.js"></script>
  <script src="../assets/popup.js"></script>
  <script src="../assets/bootstrap.js"></script>
</body>
</html>