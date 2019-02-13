<?php
	require "core.php";
	require "connect_sepro.php";
	if(!admin())
	{
		?>
			<script>
				alert('Please log in as Admin first');
				window.location.replace('admin_login.php');
			</script>
		<?php
	}
	if(isset($_POST['anounce']))
	{
		$text=$_POST['anounce'];
		$query="INSERT INTO anouncement (line) VALUES ('".mysqli_real_escape_string($link,$text)."')";
		if(mysqli_query($link,$query))
		{
			echo "<script>";
			echo "alert('Anouncement has been successfully recorded')";
			echo "</script>";
		}
		else
		{
			echo "<script>";
			echo "alert('Please enter valid input')";
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
	<title>Add Anouncement</title>
</head>
<body>
	<h1 class="header">Admin Panel</h1>
	<br>
	<div class="link">
		<a href="add_anouncement.php" class="tab" style="margin-left: 0px; margin-right: 0px; background-color: rgba(244,66,83,0.9); color:white;">&#9654;Add Anouncement</a>
		<a href="new_election.php" class="tab">New Election</a>
		<a href="add_candidate.php" class="tab">Add Candidate</a>
		<a href="delete_ucan.php" class="tab">Edit User/Candidate</a>
		<a href="end_election.php" class="tab">Start/End Election</a>
		 <?php 
			if(admin())
			{
				echo "<a href='logout_admin.php' class='tab'>"."Logout"."</a>";
			}
		?>
	</div>
	<div class="vl"></div>
	<div class="body">
	<p>Add An Anouncement below:</p>
		<form action="add_anouncement.php" method="POST" style="text-align: center;">
			<textarea name="anounce" class="textarea" maxlength="200" autofocus>
			</textarea>
			<input type="submit" value="Submit" style="margin-left:450px;" class="button">
		</form>
	</div>
</body>
</html>