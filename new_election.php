<?php 
	require 'core.php';
	require 'connect_sepro.php';
	if(!admin())
	{		
		?>
			<script>
				alert('Please log in as Admin first');
				window.location.replace('admin_login.php');
			</script>
		<?php
	}
	if(isset($_POST['name']))
	{
		$name=$_POST['name'];
		$query="SELECT election FROM elections WHERE election='".mysqli_real_escape_string($link,$name)."'";
		$result=mysqli_query($link,$query);
		if(mysqli_num_rows($result)==0)
		{
			$query="INSERT INTO elections (election) VALUES ('".mysqli_real_escape_string($link,$name)."')";
			mysqli_query($link,$query);
			/*$query="SELECT MAX(sno) AS 't' FROM elections";
			$result=mysqli_query($link,$query);
			$row=mysqli_fetch_assoc($result);
			$row2=$row['t'];
			$add='vcast'.$row2;
			$query="ALTER TABLE users ADD $add INT( 1 ) NULL DEFAULT '0'";
			mysqli_query($link,$query);*/
			echo "<script>";
			echo "alert('New election added successfully!')";
			echo "</script>";
		}
		else
		{
			echo "<script>";
			echo "alert('Election already exist! Try another name')";
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
	<title>New Election</title>
</head>
<body>
	<h1 class="header">Admin Panel</h1>
	<br>
	<div class="link">
		<a href="add_anouncement.php" class="tab" >Add Anouncement</a>
		<a href="new_election.php" class="tab" style="margin-left: 0px; margin-right: 0px; background-color: rgba(244,66,83,0.9); color:white;">&#9654;New Election</a>
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
	<div class="vl"></div>
	<div class="body">
	<p> Add New Election </p>
		<form action="new_election.php" method="POST">
			<input type='text' maxlength='30' placeholder='Election Name' pattern="[A-Za-z].{2,}" title="Only alphabetical characters allowed." style="margin-left:405px; margin-top: 100px;" name="name" class="field" autofocus required>
			<input type="submit" value="Create" style="margin-left:465px;" class="button">
		</form>
	</div>
</body>
</html>