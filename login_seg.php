<?php
	require "connect_sepro.php";
	if(isset($_POST["uname"]))
	{
		//$type= $_POST['type'];
		$user= $_POST['uname'];
		$pass=md5($_POST['upass']);
		$query= "SELECT sno,usern,firstn,image,verified,email FROM users WHERE usern='".mysqli_real_escape_string($link,$user)."' AND pass='".mysqli_real_escape_string($link,$pass)."'";
		$result= mysqli_query($link,$query);
		if(mysqli_num_rows($result)==0)
		{
			echo "<script>";
			echo "alert('User name or password is incorrect. Please enter correct details')";
			echo "</script>";
		}
		else
		{
			$row=mysqli_fetch_assoc($result);
			$_SESSION['user']=$row['firstn'];
			$_SESSION['image']=$row['image'];
			$_SESSION['verify']=$row['verified'];
			$_SESSION['sno']=$row['sno'];
			if($row['verified']==1)
			{
				$_SESSION['k']=1;
			}
			$_SESSION['email']=$row['email'];
			header('Location: /se_pro/index.php');
		}
	}
	?>
<html>
<head>
	<link href="/se_pro/styles/style_login1.css" type="text/css" rel="stylesheet">
	<link href="img/icon.png" rel="icon">
	<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fredericka+the+Great" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<title>User: Log in</title>
</head>
<body>
	<h1 class="header" style="text-align: center;">Login</h1>
	<br><br>
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
	<div class="form">
		<form action="login.php" method="post">
		<p>User Name</p>
		<input type="text" class="field" name="uname" autofocus required><br>
		<p>Password</p>
		<input type="password" name="upass" class="field" style="margin-left: 20px;"required><br>
		<br>
		<input type="submit" class="submit" value="Log in">
		<button onClick="location.href='/se_pro/index.php'" id="back" class="submit">Back</button>
	</div>
</body>
</html>