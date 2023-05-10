<?php
session_start();
include_once('../config.php');
include("checkit.php");
check_it_login();
$itmail = $_SESSION['ituser'];
$itname = $_SESSION['name'];
?>
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
 	$canpass = "Null";
 	$empstatus = '1';

 	$insertsql = "INSERT INTO user_employee(user_employee_id, user_emp_name, user_emp_process, user_emp_sbpro, user_emp_mobile, user_emp_head, user_password, gen_pass, upload_by, user_action) VALUES ('$canempid','$canempname','$canprocess','$cansubpro','$canmobile','$cantrainer','$canpass' ,'0','$itname','$empstatus')";
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

		$sqldel = "DELETE FROM user_employee WHERE user_emp_id='$delete'";
		$resdel = mysqli_query($conn,$sqldel);
		if($sqldel == true)
		{
			header('Location:addcan.php');
			
		}

	
}


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
						<div class="feedback-box">
							<div class="row">
								<div class="col-lg-7">
									<div class="table-log">
											<table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
										<thead class="bg-info">
											<tr>
												<?php
													$sqldata = "SELECT DISTINCT user_emp_process FROM user_employee WHERE user_action='1'";
													$sqlres = mysqli_query($conn, $sqldata);
												?>
												<form method="get" action="">
												<td colspan="4"><select class="form-foult" name="processname">
													<option disabled value="" selected>Select Process</option>
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
											if(isset($_SESSION['pro']))
											{
												$prod = $_SESSION['pro'];
												$sql = "SELECT * FROM user_employee WHERE user_emp_process='$prod' AND user_action='1'";
												$res = mysqli_query($conn,$sql);
												$nums = mysqli_num_rows($res);
											}
											else
											{
												$sql = "SELECT * FROM user_employee WHERE user_action='1'";
												$res = mysqli_query($conn,$sql);
												$nums = mysqli_num_rows($res);
											}

											?>
											<tr>
											<td>No. <span style="color:yellow;font-weight: bold"><?php echo $nums ?></span> <a href="?asd=assend"><span id="assend" class="float-right"><i class="fas fa-angle-double-down btn-asc"></i></span></a></td>
											<td>Name</td>
											<td>Employee Id</td>
											<td>Process</td>
											<td>Subprocess</td>
											<td>Action</td>
										</tr>
										</thead>
										<tbody>
											<?php
											$count=1;
											if(isset($_GET['processname']))
											{
												$processname = $_GET['processname'];
												$_SESSION['pro'] = $processname;
												$sqlpro = "SELECT * FROM user_employee WHERE user_emp_process= '$processname' AND user_action='1'";
												$sqlprores = mysqli_query($conn, $sqlpro);
												if(mysqli_num_rows($sqlprores)>0)
												{
													while($fetch = mysqli_fetch_array($sqlprores))
													{
														?>

											<tr>
											<td><?php echo $count;?></td>
											<td><p><?php echo $fetch['user_emp_name'];?></p></td>
											<td><p><?php echo $fetch['user_employee_id'];?></p></td>
											<td><p><?php echo $fetch['user_emp_process'];?></p></td>
											<td><p><?php echo $fetch['user_emp_sbpro'];?></p></td>
											<td><a href="addcan.php?delete=<?php echo $fetch['user_emp_id'];?>" class="btn-del">Delete</a></td>
										</tr>
										<?php
										$count++;
													}
												}
											}
											else
											{
                                            	if(!isset($_GET['asd']))
                                                {
                                                $count=1;
												$sqlpro = "SELECT * FROM user_employee WHERE user_action='1' ORDER BY user_emp_id DESC";
												$sqlprores = mysqli_query($conn, $sqlpro);
												if(mysqli_num_rows($sqlprores)>0)
												{
													while($fetch = mysqli_fetch_array($sqlprores))
													{
														?>
														<tr>
														<td><?php echo $count; ?></td>
														<td><p><?php echo $fetch['user_emp_name'];?></p></td>
														<td><p><?php echo $fetch['user_employee_id'];?></p></td>
														<td><p><?php echo $fetch['user_emp_process'];?></p></td>
														<td><p><?php echo $fetch['user_emp_sbpro'];?></p></td>
														<td><a href="addcan.php?delete=<?php echo $fetch['user_emp_id'];?>" class="btn-del">Delete</a></td>
														</tr>	
													<?php
													$count++;
													}
												}
                                                }
                                            	else
                                                {
                                                $count=1;
												$sqlpro = "SELECT * FROM user_employee WHERE user_action='1'";
												$sqlprores = mysqli_query($conn, $sqlpro);
												if(mysqli_num_rows($sqlprores)>0)
												{
													while($fetch = mysqli_fetch_array($sqlprores))
													{
														?>
														<tr>
														<td><?php echo $count; ?></td>
														<td><p><?php echo $fetch['user_emp_name'];?></p></td>
														<td><p><?php echo $fetch['user_employee_id'];?></p></td>
														<td><p><?php echo $fetch['user_emp_process'];?></p></td>
														<td><p><?php echo $fetch['user_emp_sbpro'];?></p></td>
														<td><a href="addcan.php?delete=<?php echo $fetch['user_emp_id'];?>" class="btn-del">Delete</a></td>
														</tr>	
													<?php
													$count++;
													}
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
													<option value="" selected="" disabled="">Select Process</option>
													<option value="SBI">SBI</option>
													<option value="Quality">Quality</option>
													<option value="MAX">Max</option>
													<option value="HDFC">HDFC</option>
													<option value="HSBC">HSBC</option>
													<option value="IHO">IHO</option>
													<option value="HRD">HRD</option>
													<option value="VOLTAS">VOLTAS</option>
                                                  	<option value="AMEX">AMEX</option>
                                                  	<option value="RSA">RSA</option>
                                                  	<option value="SKYWORTH">SKYWORTH</option>
                                                  	<option value="CREDOPS">CREDOPS</option>
                                                  	<option value="Software">Software</option>
                                                    <option value="IT">IT</option>
                                                    <option value="ISMS">ISMS</option>
                                                    <option value="IT-PUN">IT-PUN</option>
                                                    <option value="IT-MUM">IT-MUM</option>
                                                    <option value="HR">HR</option>
                                                    <option value="HR-Gur">HR-Gur</option>
                                                    <option value="HR-Amex">HR-Amex</option>
                                                    <option value="HR-Audit">HR-Audit</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Admin-MUM">Admin-MUM</option>
                                                    <option value="Admin-PUN">Admin-PUN</option>
                                                	<option value="TATA">TATA</option>
                                                	<option value="CPP POS">CPP POS</option>
												</select>
											</div>
											<div class="form-group">
												<select class="form-control" name="cansubpro">
													<option value="0" selected="" disabled="">Select Sub-Process</option>
                                                  	<option value="Null">Null</option>
													<option value="Flexi">Flexi</option>
													<option value="CPP">CPP</option>
													<option value="Upgrade">Upgrade</option>
													<option value="Encash">Encash</option>
													<option value="Quality">Quality</option>
													<option value="OTP">OTP</option>
													<option value="Welcome">Welcome</option>
													<option value="Retention">Retention</option>
													<option value="ISA">ISA</option>
													<option value="Bharat Zup">Bharat Zup</option>
													<option value="OTP(GGN)">OTP(GGN)</option>
													<option value="INBOUND">INBOUND</option>
													<option value="Service">Service</option>
													<option value="ERGO">ERGO</option>
													<option value="Canara">Canara</option>
                                                  <option value="MSO">MSO</option>
                                                  <option value="MSO (PUNE)">MSO (PUNE)</option>
                                                  <option value="MSO (MUMBAI)">MSO (MUMBAI)</option>
                                                  <option value="IHO">IHO</option>
                                                  <option value="HRD">HRD</option>
                                                  <option value="VOLTAS">VOLTAS</option>
                                                  <option value="EDM">EDM</option>
                                                  <option value="RSA">RSA</option>
                                                  <option value="SKYWORTH">SKYWORTH</option>
                                                  <option value="CREDOPS">CREDOPS</option>
                                                 <option value="AIA">AIA</option>
                                                <option value="CPP POS">CPP POS</option>
			
												</select>
											</div>
											<div class="form-group">
												<input type="text" name="cantrainer" value="" placeholder="Manager Name" class="form-control">
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