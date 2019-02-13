<?php
require 'core.php';
	$allowed="QWERTYUIOPLKJHGFDSAZXCVBNMqwertyuioplkjhgfdsazxcvbnm1234567890";
	$shuffle=str_shuffle($allowed);
	$_SESSION['final']=substr($shuffle,0,10);
	$to=$_SESSION['email'];
	$subject="Verification Code";
	$body="Your One-Time verification code is: "."\n\n".$_SESSION['final'];
	$header="From: Verification Code<vcode@maama.com>";
	if(!mail($to,$subject,$body,$header))
	{
		echo "<script>";
		echo "alert('Cannot connect to server. Please check your internet connection and try again later.')";
		echo "</script>";

	}
	else
	{
		$_SESSION['success']=0;
		header('Location: verify_account.php');
	}
?>
