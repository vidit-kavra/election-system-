<?php
	session_start();
	ob_start();
	
	function loggedin(){
		if(isset($_SESSION['user'])&&!empty($_SESSION['user']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function admin(){
		if(isset($_SESSION['admin'])&&!empty($_SESSION['admin']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
?>