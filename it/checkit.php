<?php
function check_it_login()
{
if(strlen($_SESSION['ituser'])==0)
	{	
		$host=$_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="index.php";		
		$_SESSION['ituser']="";
		header("Location: http://$host$uri/$extra");
	}
}
?>