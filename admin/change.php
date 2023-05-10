<?php
session_start();
include_once('../config.php');
include("checkadmin.php");
check_admin();
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
			<?php include_once('leftbar.php');?>
		</div>
		<div class="col-lg-10 no-mp">
			<div class="dashboard-view">
				<div class="tringle opaci"></div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="dashboard-top">
							<h3>Hi, <span style="font-weight: bold">Dilip Kumar</span></h3>
							<a href="logout.php"><i class="fas fa-power-off"></i></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="dashboard-text">
							<div class="you-are">
								<table class="table table-striped ">
									<form class="" method="post" action="">
										
										
										<tr>
											<td>Current Password</td>
											<td colspan="3"><input type="text" name="" value="" placeholder="***********" class="form-control" disabled="" ></td>
											
										</tr>
										<tr>
											<td>New Password</td>
											<td colspan="3"><input type="password" name="newpass" value="" placeholder="" class="form-control"></td>
										</tr>
										<tr>
											<td>Confirm Password</td>
											<td colspan="3"><input type="password" name="confirmpass" value="" placeholder="" class="form-control"></td>
										</tr>
										<tr>
											<td></td>
											<td colspan="3"><input type="submit" name="changesub" value="Submit" placeholder="" class="btn btn-dark"></td>
										</tr>
										<tr>
											
											<td colspan="4" class="text-center"> Silaris Infomation Pvt ltd &copy; 2021 | Silaris Info</td>
										</tr>
									</form>
								</table>
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