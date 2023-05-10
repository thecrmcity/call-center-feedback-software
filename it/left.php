<section class="leftbar">
	<div class="logo-dash">
		<img src="../assets/img/silarisinfo-logo.png" alt="" class="dash-logo">
	</div>
	
	<ul class="list-nav">
		<!-- <a href="dashboard.php"><li class="list-nav-item "><i class="fas fa-id-card"></i> Dashboard</li></a> -->
		<a href="addcan.php"><li class="list-nav-item active"><i class="fas fa-user-plus"></i> Add Employee</li></a>
		<a href="delete.php"><li class="list-nav-item "><i class="fa fa-trash"></i> Delete</li></a>
		<a href="change.php"><li class="list-nav-item "><i class="fas fa-user-lock"></i> Change Password</li></a>
		<a href="../uploads/empolyee_data.xls" download=""><li class="list-nav-item"><i class="fas fa-download"></i> Format File</li></a>
		<a href="password.php"><li class="list-nav-item"><i class="fas fa-user-lock"></i> Password Request</li></a>


		<a href="logout.php"><li class="list-nav-item "><i class="fas fa-power-off"></i> Logout</li></a>


	</ul>
</section>

<script>
$(document).ready(function(){
  $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
});
});	
</script>