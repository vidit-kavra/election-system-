<?php
	require "connect_sepro.php";
	require 'core.php';
	if(!loggedin())
	{
		?>
		<script>
			alert('You need to login first!');
			window.location.replace('login.php');
		</script>
		
		<?php
	}

	if(isset($_SESSION['k'])&&!empty($_SESSION['k']))
	{
		?>
		<script>
		alert('Account is already verified');
		window.location.replace('index.php');
		</script>
		<?php
	}
	
	if(isset($_POST['code']))
	{
		$code=$_POST['code'];
		if($code==$_SESSION['final'])
		{
			$_SESSION['k']=1;
			$mal=$_SESSION['email'];
			$query="UPDATE users SET verified='1' WHERE email='".mysqli_real_escape_string($link,$mal)."'";
			mysqli_query($link,$query);
			header('Location: verified.php');
		}
		else
		{
			header('Location: index.php');
		}
	}
	?>
<html>
<head>
	<title>Account Verification</title>
</head>
<body>
	<h1>Verify your account.</h1><br>
	</p>Click the below button to get OTP:</p>
	<input type='button' onclick="location.href='send_code.php'" value="Send OTP">
	<p>Copy the code and paste it in the box below.</p>
	<form action="verify_account.php" method="POST">
		<input type="text" name="code" placeholder="Paste your code here" maxlength="10" autofocus>
		<input type="submit" value="Verify">
	</form>
</body>
</html>