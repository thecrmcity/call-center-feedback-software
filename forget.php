<?php
session_start();
include_once('config.php');

?>

<?php
if(isset($_POST['agentforget']))
{
	if(!empty($_POST['forgetId']))
	{
		$forgetId = strtoupper($_POST['forgetId']);
		$logsql = "SELECT * FROM user_employee WHERE user_employee_id ='$forgetId'";
		$logres = mysqli_query($conn, $logsql);
	 	$logrows = mysqli_fetch_array($logres);
		$empid = $logrows['user_employee_id'];
		$empname = $logrows['user_emp_name'];

	if($forgetId == $empid)
	{
		
		$sqlval = "UPDATE user_employee SET gen_pass='2' WHERE user_employee_id='$empid'";
		$resll = mysqli_query($conn,$sqlval);
		header('Location:login.php');
		$_SESSION['msg'] = "<div class='alert-success'>Request Sent! Please contact It Department!</div>";
		$sqltoll = "INSERT INTO password_reset(pass_emp_id, pass_emp_name, counter) VALUES ('$empid','$empname','1')";
		$restoll = mysqli_query($conn,$sqltoll);
		
	}
	else
	{
		header('Location:login.php');
		$_SESSION['msg'] = "<div class='alert-danger'>Employee Id Not Correct. Please input right data!</div>";
	}
	}
	else
	{
		header('Location:login.php');
		$_SESSION['msg'] = "<div class='alert-warning'>Something went wrong. Please try again!</div>";

	}
	

}

?>