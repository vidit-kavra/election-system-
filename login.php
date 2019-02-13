<?php
	require "core.php";
	
	if(loggedin())
	{
		header('Location: /se_pro/index.php');
	}
	else
	{
		include 'login_seg.php';
	}
	?>