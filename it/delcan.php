<?php
session_start();
include_once('../config.php');
include("checkit.php");
check_it_login();
$itmail = $_SESSION['ituser'];
$itname = $_SESSION['name'];
?>

<?php
include("../PHPExcel/IOFactory.php");
include("../PHPExcel.php");


	

if(isset($_POST['uploadsubmit']))
{	
	$filename = $_FILES['uploadfile']['name'];
	$uploadfile = $_FILES['uploadfile']['tmp_name'];

	$target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	

$canpass = "google@123";
date_default_timezone_set('Asia/Kolkata');
$creaton = date('d-m-Y H:i:s');



$objExcel = PHPExcel_IOFactory::load($uploadfile);

foreach($objExcel->getWorksheetIterator() as $worksheet)
{
	$highestrow = $worksheet -> getHighestRow();

	for($row=2;$row<=$highestrow;$row++)
	{
		
		$silarisid=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
		$empname=@$worksheet->getCellByColumnAndRow(2,$row)->getValue();
		
		$empprocess=@$worksheet->getCellByColumnAndRow(3,$row)->getValue();
		$empsubpro=@$worksheet->getCellByColumnAndRow(4,$row)->getValue();
		$emptrainer=@$worksheet->getCellByColumnAndRow(5,$row)->getValue();
      	$empmobile ='Null';
		$empstatus='0';


		$insertsql = "UPDATE user_employee SET user_action='0' WHERE user_employee_id='$silarisid'";
		$insetres = mysqli_query($conn,$insertsql);
					if($insetres == true)
					{
						
						header('Location:delete.php');
						
					}
		
		
		

	}
}


}





?>