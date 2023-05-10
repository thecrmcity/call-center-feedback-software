<?php
session_start();
include_once('../config.php');
include("checkit.php");
check_it_login();
$itmail = $_SESSION['ituser'];
$itname = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Employee | 360 Feedback</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="..	/assets/img/silarisinfo-fevicon.png" type="image/gif">
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
											
											<?php 
											$sql = "SELECT * FROM user_employee WHERE gen_pass='2'";
											$res = mysqli_query($conn,$sql);
											$nums = mysqli_num_rows($res);

											?>
											<tr>
											<td width="1%">No. <span style="color:yellow;font-weight: bold"><?php echo $nums ?></span> <span id="assend" class="float-right"><i class="fas fa-angle-double-down btn-asc"><input type="submit" name="assed" value="" hidden=""></i></span></td>
											<td width="2%">Name</td>
											<td width="2%">Employee Id</td>
											<td width="2%">Process</td>
											<td width="1%">Reset</td>
											
										</tr>
										</thead>
										<tbody>
											<form class="" method="get" action="">
											<?php
																						
												$count=1;
												$sqlpro = "SELECT * FROM user_employee WHERE gen_pass='2'";
												$sqlprores = mysqli_query($conn, $sqlpro);
												if(mysqli_num_rows($sqlprores)>0)
												{
													while($fetch = mysqli_fetch_array($sqlprores))
													{
														?>
														<tr>
											<td width="1%"><?php echo $count ?></td>
											<td width="2%"><p><?php echo $fetch['user_emp_name']?></p></td>
											<td width="2%"><p><?php echo $fetch['user_employee_id']?></p></td>
											<td width="2%"><p><?php echo $fetch['user_emp_process']?></p></td>
											
											<td width="1%"><a href="password.php?reset=<?php echo $fetch['user_employee_id']?>" class="btn-gen">Reset</a></td>
											
										</tr>	
										<?php
										$count++;
													}
												}
											
											?>
											</form>
										</tbody>
										</form>
									</table>
									</div>
								
								</div>
								<div class="col-lg-5">
									
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
 
 if(isset($_GET['reset']))
 {
 	$reset = $_GET['reset'];
 	$pasReset = "Null";
 	
 	

 	$insertsql = "UPDATE user_employee SET user_password='$pasReset', gen_pass='0' WHERE user_employee_id ='$reset'";
					$insetres = mysqli_query($conn,$insertsql);
					if($insetres == true)
					{
                      
						header('Location:password.php');
						echo "<script>alert('Password Reset Successfully !')</script>";
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