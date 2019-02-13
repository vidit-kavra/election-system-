<html>
<head>
	<title>Election System</title>
	<link href="styles/style_index.css" type="text/css" rel="stylesheet">
	<link href="img/icon.png" rel="icon">
	<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Limelight" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bungee+Inline|Fredericka+the+Great" rel="stylesheet">
	<?php
	require 'connect_sepro.php';
	require 'core.php';
	?>
</head>
<body>
	<h1 class="header">Hostel Election System&nbsp;&nbsp;</h1>
	<div class="grid">
		<a href="index.php" class="tabbutton">Home</a>

		<a href="vote_panel.php" class="tabbutton">Vote Now</a>
		<a href="registration.php" class="tabbutton">Register</a>
		<a href="login.php" class="tabbutton">Log in</a>
		<div class="droptrigger">
		<button class="tabbutton" style="height: 40px; width: 40px;">&#9660</button>
		<div class="dropcontent">

					<?php$real= $_SESSION['image'];?>
					<img src='$real' class='item' style='height:150px; width: 150px;
					<a href='verify_account.php' class='item'>Verify Account</a>
					<a href='logout_user.php' class='item'>Log Out</a>
	</div></div>
	</div>
	<hr style="width:94%">
	<div class="body">
		<img src="img/test1.jpg" class="slide vish_fading">
		<img src="img/test2.png" class="slide vish_fading">
		<img src="img/test3.jpg" class="slide vish_fading">
	</div>
	<script src="js_index.js"></script>
	<script>
		slideshow();
	</script>
	<div class="not_panel" style="text-align:center;">
		<u><h3 style="background-color: white;height:40px;line-height:40px; position: relative; width=100%;">Anouncements</h3></u>
		
		<?php
				$temp=$row['line'];
				echo "<p class=\"anounce\">"."&#9755"." "."$temp"."</p>";
		?>
	</div>
	<hr style="width:94%"><br>
	<div class="footer"></div>
</body>
</html>