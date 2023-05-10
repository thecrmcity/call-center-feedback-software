<section class="leftbar">
	<div class="logo-dash">
		<img src="../assets/img/silarisinfo-logo.png" alt="" class="dash-logo">
	</div>
	
	<ul class="list-nav">
		<!-- <a href="dashboard.php"><li class="list-nav-item "><i class="fas fa-id-card"></i> Dashboard</li></a> -->
		<a href="allmail.php"><li class="list-nav-item active"><i class="fas fa-chalkboard-teacher"></i> All Mail</li></a>
		<!-- <a href="profile.php"><li class="list-nav-item "><i class="fas fa-user-cog"></i> Profile</li></a> -->
		<a href="change.php"><li class="list-nav-item "><i class="fas fa-user-lock"></i> Change Password</li></a>
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