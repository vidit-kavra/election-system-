<?php
	$code='tea';
	$tt='noset';
	require "core.php";
	require "connect_sepro.php";
	if(!loggedin())
	{
		?>
		
		<script>
			alert('You need to login first!');
			window.location.replace('login.php');
		</script>	
	<?php
	}
	
	
?>

<html>
<head>
	<title>Voting panel</title>
	<link href="/se_pro/styles/style_vote_panel1.css" type="text/css" rel="stylesheet">
	<link href="img/icon.png" rel="icon">
	<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fredericka+the+Great" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
</head>
<body>
	<h1 class="header" style="text-align: center;">Voting Panel</h1>
	<div class="grid">
		<a href="index.php" class="tabbutton" title="Home"> <img class="icon" src="img/home.png"> </a>

		<a href="vote_panel.php" class="tabbutton" title="Vote now"> <img class="icon" src="img/unnamed.png"> </a>
		<a href="registration.php" class="tabbutton" title="Register Now"> <img class="icon" src="img/icon_reg4.png"> </a>
		<?php 
		if(loggedin()){
			echo "<p class='par'>".$_SESSION['user']."</p>";
		}
		else
		{
			echo "<a href='login.php' class='tabbutton' title='Login'><img class='icon' src='img/icon_login1.png' ></a>";
		}
		?>
		<div class="droptrigger">
		<a class="tabbutton" style="height: 45px;width: 40px;padding-top: 12px;">&#9660</a>
		<div class="dropcontent">
		<?php
			if(loggedin())
			{
					$real= $_SESSION['image'];
					echo "<img src='$real' class='item' style='height:150px; width: 150px;margin-top:10px;'>";
					echo "<a href='verify_account.php' class='item'>Verify Account</a>";
					echo "<a href='logout_user.php' class='item'>Log Out</a>";
			}
			else
			{
				echo "<img src='img/default_user.jpg' class='item' style='height:150px; width: 150px;margin-top:10px;'>";
				echo "<p class='item'>Not logged in</p>";
			}
		?>
	</div></div>
	</div>
	<hr style="width:94%;background-color:rgb(244, 66, 83);border: none;height: 2px ">
	<form action="vote_panel.php" method="GET">
	<br>
	<span style="margin-left: 500px; font-size: 20px; color: rgb(244,66,83);">Please Select the category:</span>
		<select name="election" style="display: inline-block;">
			<?php 
				$query="SELECT sno,election FROM elections WHERE active='1'";
				$result=mysqli_query($link,$query);
				while($row=mysqli_fetch_assoc($result))
				{
					$sno=$row['sno'];
					echo "<option value='$sno'>".$row['election']."</option>";
				}
			?>
		</select>
		<input type="submit" value="Go">
	</form>
	<?php
			if(isset($_GET['election']))
	{ 
		$_SESSION['what']=$_GET['election'];
		$code= $_GET['election'];
		echo "<form action='vote_panel.php' method='POST'>";
		echo "<input type='submit' style=\"margin-left: 615px;\" value='Vote'>";
		echo "<br><br>";
		$query1="SELECT sno,fname,lname,phno,image,sex from candidates WHERE election='".mysqli_real_escape_string($link,$code)."' AND verified='1'";
		$result1=mysqli_query($link,$query1);
		while($row=mysqli_fetch_assoc($result1))
		{
			$d=$row['sno'];
			$imh=$row['image'];
			echo "<div class='division' style=\" margin-left:38px;  background-color: rgba(244,66,83,0.45); width: 94%;\">";
			echo "<img src='$imh' class='image'>";
			echo "<p class='name'><strong>".$row['fname']." ".$row['lname']."</strong><br><br>Contact: ".$row['phno']."<br><br>";
			if($row['sex']=='M')
			{
				echo "Male";
			}
			else 
			{
				echo "Female";
			}
			echo "</p>";
			echo "<p style='display:inline;margin-left:60px;'><strong>Vote</strong></p>";
			echo "<input type='radio' name='jitado' value='$d' required></div>";
			echo "<hr style=\"background-color: white; width: 94%; height: 2px;\">";
		}
		echo "</form>";
	}
if(isset($_POST['jitado']))
	{
		$tr=$_SESSION['sno'];
		$column="vcast".$_SESSION['what'];
		$query2="SELECT verified,$column AS 'ans' FROM users WHERE sno='$tr'";
		if(!$result2=mysqli_query($link,$query2))
		{
			echo "as";
		}
		$row=mysqli_fetch_assoc($result2);
		$p=$row['ans'];
		if($row['verified']==1)
		{
				if($p==0)
				{
					$up=$_POST['jitado'];
					$query="UPDATE candidates SET vcount=vcount+1 WHERE sno='$up'";
					mysqli_query($link,$query);
					$query="UPDATE users SET $column='1' WHERE sno=$tr";
					mysqli_query($link,$query);
					echo "<script>";
					echo "alert('Your vote for this category has been recorded successfully')";
					echo "</script>";
				}
				else
				{
					echo "<script>";
					echo "alert('You\'hv already given your vote for this category')";
					echo "</script>";
				}
		}
		else
		{
			echo "<script>";
			echo "alert('Your account is not verified. Please verify your account first')";
			echo "</script>";
		}
	}
	?>
</body>
</html>