<?php 
	$to="vrajpoot47@gmail.com";
	$subject="Test";
	$body="qwertyuiop";
	$header="From: Verification Code<verify@vish.com>";
	if(mail($to,$subject,$body,$header))
	{
		echo "huh";
	}
	else
	{
		echo ":(";
	}
?>