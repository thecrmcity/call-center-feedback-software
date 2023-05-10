<?php
session_start();
include_once('../config.php');

?>

<?php
if(isset($_POST['ceoforget']))
{
	if(!empty($_POST['ceomail']))
	{
		$ceomail = $_POST['ceomail'];
		$logsql = "SELECT * FROM user_login WHERE user_email_id ='$ceomail'";
		$logres = mysqli_query($conn, $logsql);
	 	$logrows = mysqli_fetch_array($logres);
		$empid = $logrows['user_email_id'];
		$empname = $logrows['user_name'];

	if($ceomail == $empid)
	{
		
		$sqltoll = "INSERT INTO password_reset(pass_emp_id, pass_emp_name) VALUES ('$empid','$empname')";
		$restoll = mysqli_query($conn,$sqltoll);
		header('Location:login.php');
		$_SESSION['msg'] = "<div class='alert-success'>Request Sent! Please contact It Department!</div>";
		
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