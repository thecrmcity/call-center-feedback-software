<?php
session_start();
include_once('../config.php');
include("checkadmin.php");
check_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Employee | 360 Feedback</title>
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
						<div class="feedback-box">
							<div class="row">
								<div class="col-lg-7">
									<div class="table-log">
											<table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
										<thead class="bg-info">
											<tr>
												<?php
													$sqldata = "SELECT DISTINCT user_emp_process FROM user_employee GROUP BY user_emp_process";
													$sqlres = mysqli_query($conn, $sqldata);
												?>
												<form method="get" action="">
												<td colspan="4"><select class="form-foult" name="processname">
													<option disabled value="0" selected>Select Process</option>
													<?php
														if (mysqli_num_rows($sqlres)>0) {
							                 while($rows = mysqli_fetch_array($sqlres)) {
							                     echo '<option value="' . $rows['user_emp_process'] . '">' . $rows['user_emp_process']. '</option>';
							                 }
							             }
													?>
												</select></td>
												<td colspan="2"><input type="submit" name="proapply" value="Apply" class="form-foult"></td>
												</form>
												<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
											</tr>
											<?php 
											$sql = "SELECT * FROM user_employee";
											$res = mysqli_query($conn,$sql);
											$nums = mysqli_num_rows($res);

											?>
											<tr>
											<td width="2%">No. <span style="color:yellow;font-weight: bold"><?php echo $nums ?></span> <span id="assend" class="float-right"><i class="fas fa-angle-double-down btn-asc"><input type="submit" name="assed" value="" hidden=""></i></span></td>
											<td width="8%">Name</td>
											<td width="2%">Employee Id</td>
											<td width="2%">Process</td>
											<td width="2%">Subprocess</td>
											<td width="2%">Action</td>
										</tr>
										</thead>
										<tbody>
											<?php
											$count=1;
											if(isset($_GET['processname']))
											{
												$processname = $_GET['processname'];
												$sqlpro = "SELECT DISTINCT user_emp_process FROM user_employee WHERE user_emp_process= '$processname'";
												$sqlprores = mysqli_query($conn, $sqlpro);
												if(mysqli_num_rows($sqlprores)>0)
												{
													while($fetch = mysqli_fetch_array($sqlprores))
													{
														?>

											<tr>
											<td width="2%"><?php echo $count ?></td>
											<td width="3%"><p><?php echo $fetch['user_emp_name']?></p></td>
											<td width="2%"><p><?php echo $fetch['user_employee_id']?></p></td>
											<td width="2%"><p><?php echo $fetch['user_emp_process']?></p></td>
											<td width="2%"><p><?php echo $fetch['user_emp_sbpro']?></p></td>
											<td width="2%"><a href="" class="btn-del">Delete</a></td>
										</tr>
										<?php
										$count++;
													}
												}
											}
											else
											{
												$count=1;
												$sqlpro = "SELECT * FROM user_employee";
												$sqlprores = mysqli_query($conn, $sqlpro);
												if(mysqli_num_rows($sqlprores)>0)
												{
													while($fetch = mysqli_fetch_array($sqlprores))
													{
														?>
														<tr>
											<td width="2%"><?php echo $count ?></td>
											<td width="3%"><p><?php echo $fetch['user_emp_name']?></p></td>
											<td width="2%"><p><?php echo $fetch['user_employee_id']?></p></td>
											<td width="2%"><p><?php echo $fetch['user_emp_process']?></p></td>
											<td width="2%"><p><?php echo $fetch['user_emp_sbpro']?></p></td>
											<td width="2%"><a href="addcan.php?delete=<?php echo $fetch['user_emp_id']?>" class="btn-del">Delete</a></td>
										</tr>	
										<?php
										$count++;
													}
												}
											}
											?>
										</tbody>
										</form>
									</table>
									</div>
								
								</div>
								<div class="col-lg-5">
									<div class="addcan-form">
										<form class="" method="post" action="" >
											<div class="form-group">
												<input type="text" name="canempid" value="" placeholder="Employee Id" class="form-control">
											</div>
											<div class="form-group">
												<input type="text" name="canempname" value="" placeholder="Employee Name" class="form-control">
											</div>
											<div class="form-group">
												<input type="text" name="canmobile" value="" placeholder="Mobile Number" class="form-control">
											</div>
											<div class="form-group">
												<select class="form-control" name="canprocess">
													<option value="0" selected="" disabled="">Select Process</option>
													<option value="CHOICe">CHOICe</option>
													<option value="Max Welcome">Max Welcome</option>
													<option value="Max ISA">Max ISA</option>
													<option value="Max Customer Service">Max Customer Service</option>
													<option value="American Express">American Express</option>
													<option value="Max Service">Max Service</option>
													<option value="HDFC Ergo">HDFC Ergo</option>
													<option value="Max Retention">Max Retention</option>
													<option value="SBI ADD ON">SBI ADD ON</option>
													<option value="Max Sales">Max Sales</option>
													<option value="HSBC Credits Cards">HSBC Credits Cards</option>
													<option value="RSA">RSA</option>
													<option value="SBI">SBI</option>
													<option value="Bajaj Finserv">Bajaj Finserv</option>
													<option value="Voltas">Voltas</option>


												</select>
											</div>
											<div class="form-group">
												<select class="form-control" name="cansubpro">
													<option value="0" selected="" disabled="">Select Sub-Process</option>
													<option value="NA">NA</option>
													<option value="Email">Email</option>
													<option value="SDPL">SDPL</option>
													<option value="Renewals">Renewals</option>
													<option value="Retail">Retail</option>
													<option value="Max Retention">Max Retention</option>
													<option value="OTP">OTP</option>
													<option value="OSP">OSP</option>
													<option value="Flexipay">Flexipay</option>
													<option value="Encash">Encash</option>
													<option value="Bajaj Finserv">Bajaj Finserv</option>
													<option value="CPP">CPP</option>
													<option value="Upgrade">Upgrade</option>
													


												</select>
											</div>
											<div class="form-group">
												<input type="text" name="cantrainer" value="" placeholder="TL/ Trainer" class="form-control">
											</div>
											<div class="form-group">
												<input type="submit" name="singledata" value="Submit" class="btn btn-dark" onclick="return confirm('Are you Sure?')">
											</div>
										</form>
									</div>
									<div class="addcan-form">
										<form class="" method="post" action="uploadcan.php" enctype="multipart/form-data">
											<div class="form-group">
												<input type="file" name="uploadfile" value="" class="form-control">
											</div>
											<div class="form-group">
												<input type="submit" name="uploadsubmit" value="Submit" class="btn btn-dark" onclick="return confirm('Are you Sure?')">
											</div>
										</form>
									</div>
								</div>
								

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="../assets/main.js"></script>
<?php
 
 if(isset($_POST['singledata']))
 {
 	$canempid = $_POST['canempid'];
 	$canempid =	strtoupper($canempid);
 	$canempname = $_POST['canempname'];
 	$canmobile = $_POST['canmobile'];
 	$canprocess = $_POST['canprocess'];
 	$cansubpro = $_POST['cansubpro'];
 	$cantrainer = $_POST['cantrainer'];
 	$canpass = "google@123";
 	$empstatus = '1';

 	$insertsql = "INSERT INTO user_employee(user_employee_id, user_emp_name, user_emp_process, user_emp_sbpro, user_emp_mobile, user_emp_head, user_password, upload_by, user_action) VALUES ('$canempid','$canempname','$canprocess','$cansubpro','$canmobile','$cantrainer','$canpass' ,'$itname','$empstatus')";
					$insetres = mysqli_query($conn,$insertsql);
					if($insetres == true)
					{
						
						header('Location:addcan.php');
					}		


 }


?>

<?php

if(isset($_GET['delete']))
{
	$delete = $_GET['delete'];
	$itmail = $_SESSION['ituser'];
	$itname = $_SESSION['name'];

	$petsql = "SELECT * FROM user_employee WHERE upload_by='$itname'";
	$ressql = mysqli_query($conn, $petsql);
	if(mysqli_num_rows($ressql)>0)
	{
		$sqldel = "DELETE FROM user_employee WHERE user_emp_id='$delete'";
		$resdel = mysqli_query($conn,$sqldel);
		if($sqldel == true)
		{
			header('Location:addcan.php');
			
		}

	}
}


?>
<script type="text/javascript">
	$(document).ready(function()
	{
		$('.fa-angle-double-down').click(function(){
			$('.fa-angle-double-down').toggleClass("fa-angle-double-up");
			


		});
		
	});
	
</script>
  <script src="../assets/popup.js"></script>
  <script src="../assets/bootstrap.js"></script>
</body>
</html>