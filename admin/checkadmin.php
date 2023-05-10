<?php
function check_admin()
{
if(strlen($_SESSION['admin'])==0)
	{	
		$host=$_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="index.php";		
		$_SESSION['admin']="";
		header("Location: http://$host$uri/$extra");
	}
}
?>