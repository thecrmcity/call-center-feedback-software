<?php
session_start();
include_once('../config.php');
include("checkadmin.php");
check_admin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Allude | 360 Feedback</title>
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
								<div class="col-lg-3">
									<div class="table-log">
											<table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
										<thead class="bg-info">
											<tr>
											<td width="2%" class="th-sm">S.No</td>
											<td width="2%" class="th-sm">Mail</td>
											<td width="2%" class="th-sm">Action</td>
										</tr>
										</thead>
										<tbody>
											<?php

											$sqlfeeb = "SELECT * FROM feedback_content";
											$feedres = mysqli_query($conn,$sqlfeeb);
											
											$count =1;
											if(mysqli_num_rows($feedres)>0)
											{
												while($feedrows = mysqli_fetch_array($feedres))
												{
													?>

											<tr>
											<td width="1%"><?php echo $count;?></td>
											<td width="2%"><p class="feedsub"><?php echo $feedrows['feedback_subject']?></p></td>
											<td width="1%"><a href="dashboard.php?view=<?php echo $feedrows['feedback_id']?>" class="btn-view">View</a></td>
										</tr>
										<?php
										$count++;
												}
											}
											?>
										</tbody>
										
									</table>
									</div>
								
								</div>
								<div class="col-lg-9">
									<div class="mail-view-blk">
										<table class="table table-striped table-bordered" width="100%">
											<?php
											if(isset($_GET['view']))
											{
												$feedview = $_GET['view'];

											$viewsql = "SELECT * FROM feedback_content WHERE feedback_id='$feedview'";
											$viewres = mysqli_query($conn,$viewsql);
											$viewrows = mysqli_fetch_array($viewres);
											$emdel = $viewrows['feedback_id'];

											echo "<tr>";
											echo "<td>Employee Name :</td>";
											echo "<th>".$viewrows['employee_name']."</th>";
											echo "<td>Employee Id :</td>";
											echo "<th>".$viewrows['employee_id']."</th>";
											echo "</tr>";

											echo "<tr>";
											echo "<td>Process /Department :</td>";
											echo "<th>".$viewrows['employee_pro']."</th>";
											echo "<td>Sub-Process</td>";
											echo "<th>".$viewrows['empoyee_sub_pro']."</th>";
											echo "</tr>";

											echo "<tr>";
											echo "<td>Mobile Number</td>";
											echo "<th>".$viewrows['employee_mobile']."</th>";
											echo "<td>Head / Trainer</td>";
											echo "<th>".$viewrows['employee_head']."</th>";
											echo "</tr>";

											echo "<tr>";
											echo "<td>Subject</td>";
											echo "<th colspan='3'>".$viewrows['feedback_subject']."</th>";
											echo "</tr>";

											echo "<tr>";
											echo "<td>Feedback</td>";
											echo "<td colspan='3'><textarea cols='85' class='textarefeed' scroll='on'>" .$viewrows['feedback_text']."</textarea></td>";
											echo "</tr>";

											echo "<tr>";
											echo "<td></td>
													<td>".$viewrows['feedback_on']."</td>
													<td></td>
													<td><a href='dashboard.php?del=$emdel' class='btn btn-danger btn-block'>Delete</a></td>";
											echo "</tr>";
											}
											else
											{
											// 	$feedview = 2;

											// $viewsql = "SELECT * FROM feedback_content WHERE feedback_id='$feedview'";
											// $viewres = mysqli_query($conn,$viewsql);
											// $viewrows = mysqli_fetch_array($viewres);

											echo "<tr>";
											echo "<td>Employee Name :</td>";
											echo "<th>***********</th>";
											echo "<td>Employee Id :</td>";
											echo "<th>***********</th>";
											echo "</tr>";

											echo "<tr>";
											echo "<td>Process /Department :</td>";
											echo "<th>***********</th>";
											echo "<td>Sub-Process</td>";
											echo "<th>***********</th>";
											echo "</tr>";

											echo "<tr>";
											echo "<td>Mobile Number</td>";
											echo "<th>***********</th>";
											echo "<td>Head / Trainer</td>";
											echo "<th>***********</th>";
											echo "</tr>";

											echo "<tr>";
											echo "<td>Subject</td>";
											echo "<th>***********</th>";
											echo "</tr>";

											echo "<tr>";
											echo "<td>Feedback</td>";
											echo "<td colspan='3'>*********</td>";
											echo "</tr>";

											echo "<tr>";
											echo "<td></td>
													<td></td>
													<td></td>
													<td><a href='' class='btn btn-danger btn-block'>Delete</a></td>";
											echo "</tr>";
											}
											

											?>
											
											
												
											
										</table>

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
  <script src="../assets/popup.js"></script>
  <script src="../assets/bootstrap.js"></script>
  <script type="text/javascript">
	$(document).ready(function () {
$('#dtDynamicVerticalScrollExample').DataTable({
"scrollY": "50vh",
"scrollCollapse": true,
});
$('.dataTables_length').addClass('bs-select');
});
</script>

<?php

if(isset($_GET['del']))
{
	$del = $_GET['del'];
	$itmail = $_SESSION['ituser'];
	$itname = $_SESSION['name'];

	$petsql = "SELECT * FROM feedback_content";
	$ressql = mysqli_query($conn, $petsql);
	if(mysqli_num_rows($ressql)>0)
	{
		$sqldel = "DELETE FROM feedback_content WHERE feedback_id='$del'";
		$resdel = mysqli_query($conn,$sqldel);
		if($sqldel == true)
		{
			header('Location:allmail.php');
			
		}

	}
}


?>
</body>
</html>