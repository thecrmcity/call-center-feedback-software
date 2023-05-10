<?php
session_start();
include_once('../config.php');
include("ceocheck.php");
check_ceo();
$ceomail = $_SESSION['ceomail'];
$ceoname = $_SESSION['ceoname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Allude | 360 Feedback</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/img/silarisinfo-fevicon.png" type="image/gif">
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
							<p>Hi, <span style="font-weight: bold"><?php echo $ceoname;?></span></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="dashboard-text">
							<div class="you-are">
								<table class="table table-striped ">
									
										<tr>
											<td>Full Name :</td>
											<td>Dilip Kumar</td>
											<td>Employee Id :</td>
											<td>SIPLIND17501</td>
										</tr>
										<tr>
											<td>Process / Department:</td>
											<td>SIPLIND17501</td>
											<td>Sub-Process</td>
											<td>Web Developer</td>
										</tr>
										<tr>
											<td>Mobile Number</td>
											<td><input type="text" name="" value="" placeholder="" class="form-control"></td>
											<td>Feedback for</td>
											<td><select class="form-control">
												<option value="0" selected disabled>Select</option>
												<option value="Team_Leader">Team Leader</option>
												<option value="Assistant_Manager">Assistant Manager</option>
												<option value="Quality_Assurance">Quality Assurance</option>
												<option value="MIS">MIS</option>
												<option value="Manager">Manager</option>
												<option value="Sr_Manager ">Sr. Manager </option>
												<option value="Assistant_Vice_President">Assistant Vice President</option>
												<option value="Vice_President">Vice President</option>
												<option value="other">Other</option>


											</select></td>
										</tr>
										<tr>
											<td>Subject</td>
											<td colspan="3"><input type="text" name="" value="" placeholder="" class="form-control"></td>
										</tr>
										<tr>
											<td>Message</td>
											<td colspan="3"><textarea  rows="3" class="form-control"></textarea></td>
										</tr>
										<tr>
											<td></td>
											<td colspan="3"><input type="submit" name="" value="Submit" placeholder="" class="btn btn-dark"></td>
										</tr>
										<tr>
											
											<td colspan="4" class="text-center"> Silaris Infomation Pvt ltd &copy; 2021 | Silaris Info</td>
										</tr>
									
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script src="../assets/main.js"></script>
  <script src="../assets/popup.js"></script>
  <script src="../assets/bootstrap.js"></script>
</body>
</html>