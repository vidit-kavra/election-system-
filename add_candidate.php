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
	
	if(isset($_POST['fname']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$phno=$_POST['phno'];
		$sex=$_POST['sex'];
		$election=$_POST['election'];
		$query="SELECT fname FROM candidates WHERE email='".mysqli_real_escape_string($link,$email)."'";
		$result=mysqli_query($link,$query);
		if(mysqli_num_rows($result)==0)
		{
			if ($_FILES["image"]["size"] > 2000000) 
			{
				echo "<script>";
				echo "alert('File Size too large!')";
				echo "</script>"; 
			}
			else
			{
				$info= pathinfo($_FILES['image']['name']);
				$ext= $info['extension'];
				if($ext=='png'||$ext=='jpg'||$ext=='jpeg')
				{
					$query="INSERT INTO candidates (fname,lname,phno,email,election,sex) VALUES ('".mysqli_real_escape_string($link,$fname)."','".mysqli_real_escape_string($link,$lname)."','".mysqli_real_escape_string($link,$phno)."','".mysqli_real_escape_string($link,$email)."','".mysqli_real_escape_string($link,$election)."','".mysqli_real_escape_string($link,$sex)."')";
					mysqli_query($link,$query);
					$query="SELECT MAX(sno) FROM candidates";
					$result=mysqli_query($link,$query);
					$row=mysqli_fetch_assoc($result);
					$t=$row['MAX(sno)'];
					$newname=$t.".".$ext;
					$target= 'candidates_img/'.$newname;
					move_uploaded_file($_FILES['image']['tmp_name'], $target);
					$query="UPDATE candidates SET image='$target' where sno='$t'";
					mysqli_query($link,$query);
					echo "<script>";
					echo "alert('Candidate successfully registered')";
					echo "</script>";					
				}
				else
				{
					echo "<script>";
					echo "alert('Please select valid image file. (jpg, jpeg or png)')";
					echo "</script>";
				}
			}
		}
		else
		{
			echo "<script>";
			echo "alert('E-mail already exists')";
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
	<title>Add Candidate</title>
</head>
<body>
	<h1 class="header">Admin Panel</h1>
	<br>
	<div class="link">
		<a href="add_anouncement.php" class="tab" >Add Anouncement</a>
		<a href="new_election.php" class="tab">New Election</a>
		<a href="add_candidate.php" class="tab" style="margin-left: 0px; margin-right: 0px; background-color: rgba(244,66,83,0.9); color:white;">&#9654;Add Candidate</a>
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
	<p>Fill Candidate info</p>
		<form action="add_candidate.php" method="POST" enctype="multipart/form-data">
			<input type="text" class="rfield" name="fname" maxlength="20" pattern="[A-Za-z].{2,}"  placeholder="First Name" required autofocus>
			<input type="text" class="rfield" name="lname" maxlength="20" pattern="[A-Za-z].{2,}" placeholder="Last Name" required>
			<input type="email" class="rfield" name="email" maxlength="50" placeholder="E-mail" required>
			<input type="number" class="rfield" name="phno" pattern="{10}" min="7000000000" max="9999999999" placeholder="Phone no." maxlength="10" required>
			<br><input type="radio" name="sex" value="M" style="margin-left:170px;" checked><p style="text-align:left; font-size:17px; display:inline-block;">Male</p>
			<input type="radio" name="sex" value="F" ><p style="text-align:left; font-size:17px; display:inline-block;">Female</p>
			<p style="text-align:left; font-size:17px; display:inline-block; margin-left: 88px;">Select Election:</p><select name="election" class="rfield" style="margin-left: 0px; ">
				<?php
					$query="SELECT sno,election FROM elections";
					$result=mysqli_query($link,$query);
					if(mysqli_num_rows($result)==0)
					{
						echo "<script>";
						echo "alert('Please add an election first.')";
						echo "</script>";
					}
					else
					{
						while($row=mysqli_fetch_assoc($result))
						{
							$sno=$row['sno'];
							$election=$row['election'];
							echo "<option value='$sno'>".$election."</option>";
						}
					}
				?>
			</select>
			<br>
			<p style="text-align:left; font-size:17px; display:inline-block; margin-top:50px; margin-left:250px;">Select candidate's image:</p><input type="file" name="image" required>
			<input type="submit" value="Add Candidate" style="margin-left:360px;" class="button">
		</form>
	</div>
</body>
</html>