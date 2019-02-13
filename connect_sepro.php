<?php
 $host='localhost';
 $db='sepro';
 $user='root';
 $pass='';
 
  if(!$link=mysqli_connect($host,$user,$pass,$db))
  {
	  echo '<script>alert "error";</script>';
}
?>