<?php
session_start();
include_once('../config.php');
include("checkit.php");
check_it_login();
$itmail = $_SESSION['ituser'];
$itname = $_SESSION['name'];
?>
<?php

if(isset($_POST['deldata']))
{
  $empval = implode(',',$_POST['empval']);
  $holdpops = explode(',', $empval);
  foreach ($holdpops as $pop )
	{
    	$edel = "DELETE FROM user_employee WHERE user_emp_id='$pop'";
    	$deres = mysqli_query($conn,$edel);
    	if($deres == true)
        {
          header('Location:delete.php');
        }
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
													$sqldata = "SELECT DISTINCT user_emp_process FROM user_employee";
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
												$sql = "SELECT * FROM user_employee WHERE user_emp_process='$prod'";
												$res = mysqli_query($conn,$sql);
												$nums = mysqli_num_rows($res);
											}
											else
											{
												$sql = "SELECT * FROM user_employee";
												$res = mysqli_query($conn,$sql);
												$nums = mysqli_num_rows($res);
											}

											?>
											<tr>
											<td width="2%">No. <span style="color:yellow;font-weight: bold"><?php echo $nums ?></span> <span id="assend" class="float-right"><i class="fas fa-angle-double-down btn-asc"><input type="submit" name="assed" value="" hidden=""></i></span></td>
											<td width="8%">Name</td>
											<td width="2%">Employee Id</td>
											<td width="2%">Process</td>
											<td width="2%">Subprocess</td>
											<td width="2%"><div class="custom-control custom-switch"><input type="checkbox" name="" value="" class="chk_all custom-control-input" id="switch1"><label class="custom-control-label" for="switch1"> All</label> </div></td>
										</tr>
										</thead>
										<tbody>
											<?php
											$count=1;
											if(isset($_GET['processname']))
											{
												$processname = $_GET['processname'];
												$_SESSION['pro'] = $processname;
												$sqlpro = "SELECT * FROM user_employee WHERE user_emp_process= '$processname'";
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
											<td width="2%"><input type="checkbox" name="empval[]" value="<?php echo $row['user_emp_id'];?>" class="chk_me"></td></td>
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
											<td width="2%"><input type="checkbox" name="empval[]" value="<?php echo $row['user_emp_id'];?>" class="chk_me"></td></td>
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
										<form class="" method="post" action="delcan.php" enctype="multipart/form-data">
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
		$(document).ready(function(){
		  $(".chk_all").click(function(){
		    $(".chk_me").prop('checked', this.checked);
		  });
		  
		  
		});
	</script>
  <script src="../assets/popup.js"></script>
  <script src="../assets/bootstrap.js"></script>
</body>
</html>