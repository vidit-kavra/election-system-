<html>
<head>
	<title>Election System</title>
	<link href="/se_pro/styles/style_index1.css" type="text/css" rel="stylesheet">
	<link href="img/icon.png" rel="icon">
	<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fredericka+the+Great" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<?php
	require 'connect_sepro.php';
	require 'core.php';
	?>
</head>
<body>
	<h1 class="header">Hostel Election System</h1>
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
	<div class="body">
		<!--<img src="img/proto3.jpg" class="slide vish_fading">
		<img src="img/proto2.png" class="slide vish_fading">
		<img src="img/2.png" class="slide vish_fading">
		<img src="img/proto5.jpg" class="slide vish_fading">
		<img src="img/1.jpg" class="slide vish_fading">-->
		<div class="image_holder">
			<img src="img/proto3.jpg" class="slider_image">
			<img src="img/proto2.png" class="slider_image">
			<img src="img/2.png" class="slider_image">
			<img src="img/proto5.jpg" class="slider_image">
		</div>
	</div>
	<script src="js_index.js"></script>
	<script>
		//slideshow();
	</script>
	<br> <hr style="width:94%;background-color:rgb(244, 66, 83);border: none;height: 2px ">
	<div class="not_panel" style="text-align:center;">
		<h3 style="background-color: white;height:40px;line-height:40px;color: rgb(244, 66, 83); position: relative;margin-bottom: -8px; width=100%;">Announcements</h3>
		<hr style="width: 40%; background-color: rgb(244, 66, 83);border: none;height:1px;">
		<?php
			$query="SELECT line FROM anouncement ORDER BY sno DESC";
			$result=mysqli_query($link,$query);
			while($row=mysqli_fetch_assoc($result))
			{
				$temp=$row['line'];
				echo "<p class=\"anounce\">"."&#9755"." "."$temp"."</p>";
			}
		?>
	</div>
	<div class="card">
		<div class="over">
			<p class="det"> Vidit Kavra (4th sem) </p>
		</div>
	</div>
	<div class="card">
		<div class="over">
			<p class="det"> B. Tech. in CSE </p>
		</div>
	</div>
	<div class="card">
		<div class="over">
			<p class="det"> Roll No:- 1604510055</p>
		</div>
	</div>
	<div class="card">
		<div class="over">
			<p class="det"> Serial No:- 115/16 </p> 
		</div>
	</div>
	<div class="card">
		<div class="over">
			<p class="det"> HBTU, Kanpur </p>
		</div>
	</div>
	<hr style="width:94%;background-color:rgb(244, 66, 83);border: none;height: 2px ">
</body>
</html>