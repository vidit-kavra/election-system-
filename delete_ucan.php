<?php
	require "connect_sepro.php";
	require "core.php";
	
	if(!admin())
	{
		?>
			<script>
				alert('Please log in as Admin first');
				window.location.replace('admin_login.php');
			</script>
		<?php
	}
	
	if(isset($_POST['user']))
	{
		$user=$_POST['user'];
		$query="UPDATE users SET verified='0' WHERE sno='".mysqli_real_escape_string($link,$user)."'";
		mysqli_query($link,$query);
		echo "<script>";
		echo "alert('Selected voter has been removed')";
		echo "</script>";
	}

	if(isset($_POST['candidate']))
	{
		$candidate=$_POST['candidate'];
		$query="UPDATE candidates SET verified='0' WHERE sno='".mysqli_real_escape_string($link,$candidate)."'";
		mysqli_query($link,$query);
		echo "<script>";
		echo "alert('Selected candidate has been removed')";
		echo "</script>";
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
	<title>Edit User/Candidate list</title>
</head>
<body>
	<h1 class='header'> Admin Panel</h1>
	<br>
	<div class="link">
		<a href="add_anouncement.php" class="tab" >Add Anouncement</a>
		<a href="new_election.php" class="tab">New Election</a>
		<a href="add_candidate.php" class="tab">Add Candidate</a>
		<a href="delete_ucan.php" class="tab" style="margin-left: 0px; margin-right: 0px; background-color: rgba(244,66,83,0.9); color:white;">&#9654;Edit User/Candidate</a>
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
		<div class="inner_left">
			<p> Select voter to remove from voter's list:</p>
			<form action="delete_ucan.php" method="POST">
				<select name="user" class="rfield">
					<?php
						$query="SELECT sno,CONCAT(firstn,' ',lastn) AS name FROM users WHERE verified='1' ORDER BY firstn";
						$result=mysqli_query($link,$query);
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								$sno=$row['sno'];
								echo "<option value='$sno'>".$row['name']."</option>";
							}
						}
						else
						{
							echo "<script>";
							echo "alert('No voters yet!')";
							echo "</script>";
						}
					?>
				</select>
				<input type="submit" value="Delete" class="button" style="margin: 0px auto; margin-top: 50px;">
			</form>
		</div>
		<div class="inner_center"></div>
		<div class="inner_right">
			<p> Select candidate to remove from candidate's list:</p>
			<form action="delete_ucan.php" method="POST">
				<select name="candidate" class="rfield">
					<?php
						$query="SELECT sno,CONCAT(fname,' ',lname) AS name FROM candidates WHERE verified='1' ORDER BY fname";
						$result=mysqli_query($link,$query);
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								$sno=$row['sno'];
								echo "<option value='$sno'>".$row['name']."</option>";
							}
						}
						else
						{
							echo "<script>";
							echo "alert('No candidates yet!')";
							echo "</script>";
						}
					?>
				</select>
				<input type="submit" value="Delete" class="button" style="margin: 0px auto; margin-top: 50px;">
			</form>
		</div>
	</div>
</body>
</html>