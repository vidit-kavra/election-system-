<?php 
	require 'core.php';
	require 'connect_sepro.php';
	 
	if(admin())
	{
		header("Location: se_pro/admin_welcome.php");
	}		
	if(isset($_POST['name']))
	{
		$admin_username="Admin";
		$admin_password= "Admin123";
		$name=$_POST['name'];
		$password=$_POST['password'];
		if($name==$admin_username&&$password==$admin_password)
		{
			$_SESSION['admin']="Admin";
			header("Location: admin_welcome.php");
		}
		else 
		{
			echo "<script>";
			echo "alert('Wrong username or password. Please try again')";
			echo "</script>";
		}
	}
?>
<html>
<head>
	<link href="img/icon.png" rel="icon">
	<link href="/se_pro/styles/style_admin1.css" type="text/css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fredericka+the+Great" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<title>Admin Login</title>
</head>
<body>
	<h1 class = 'header'>Admin Panel</h1>
	<br>
	<div class="link">
		<a href="add_anouncement.php" class="tab" >Add Anouncement</a>
		<a href="new_election.php" class="tab">New Election</a>
		<a href="add_candidate.php" class="tab">Add Candidate</a>
		<a href="delete_ucan.php" class="tab">Edit User/Candidate</a>
		<a href="end_election.php" class="tab">Start/End Election</a>
		 <?php 
			if(admin())
			{
				echo "<a href='logout_admin.php' class='tab'>Logout</a>";
			}
		?>
	</div>
	<div class="vl" style="margin-left: 5px;"></div>
	<div class="body" style="margin-left: 6px;">
		<p>Enter Admin Details</p> 
		<form action="admin_login.php" method="POST" style="margin-left: 150px">
			<input type='text' maxlength='30' placeholder='Username' name="name" class="field" autofocus required>
			<input type="password" maxlength='40' class="field" name="password" placeholder="Password" required>
			<input type="submit" value="Login" class="button">
		</form>
	</div>
</body>
</html>