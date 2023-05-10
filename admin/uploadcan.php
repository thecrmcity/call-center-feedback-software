<?php
session_start();
include_once('../config.php');
include("checkadmin.php");
check_admin();
?>

<?php
include("{$_SERVER['DOCUMENT_ROOT']}/360Feedback/PHPExcel/IOFactory.php");
include("{$_SERVER['DOCUMENT_ROOT']}/360Feedback/PHPExcel.php");

$target_dir = "../uploads/";
	

if(isset($_POST['uploadsubmit']))
{	
	$filename = $_FILES['uploadfile']['name'];
	$uploadfile = $_FILES['uploadfile']['tmp_name'];

	$target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file);

	$loadfile = $target_dir.$_FILES['uploadfile']['name'];

$canpass = "google@123";
date_default_timezone_set('Asia/Kolkata');
$creaton = date('d-m-Y H:i:s');



$objExcel = PHPExcel_IOFactory::load($loadfile);

foreach($objExcel->getWorksheetIterator() as $worksheet)
{
	$highestrow = $worksheet -> getHighestRow();

	for($row=2;$row<=$highestrow;$row++)
	{
		
		$silarisid=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
		$empname=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
		$empmobile=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
		$empprocess=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
		$empsubpro=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
		$emptrainer=$worksheet->getCellByColumnAndRow(6,$row)->getValue();
		$empstatus=$worksheet->getCellByColumnAndRow(7,$row)->getValue();


		$insertsql = "INSERT INTO user_employee(user_employee_id, user_emp_name, user_emp_process, user_emp_sbpro, user_emp_mobile, user_emp_head, user_password, upload_by, user_action) VALUES ('$silarisid','$empname','$empprocess','$empsubpro','$empmobile','$emptrainer','$canpass' ,'Admin','$empstatus')";
					$insetres = mysqli_query($conn,$insertsql);
					if($insetres == true)
					{
						
						header('Location:addcan.php');
						echo "<scipt>alert('Data Save Successfully')</script>";
					}
		
		
		

	}
}


}





?>