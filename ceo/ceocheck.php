<?php
function check_ceo()
{
if(strlen($_SESSION['ceomail'])==0)
	{	
		$host=$_SERVER['HTTP_HOST'];
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra="index.php";		
		$_SESSION['ceomail']="";
		header("Location: http://$host$uri/$extra");
	}
}
?>