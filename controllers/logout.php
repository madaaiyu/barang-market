<?php
@session_start();
session_destroy();

if($_GET['page']=="admin")
{
	echo '<script language="javascript"> 
 		window.location="../index.php";  
 		</script>';
}

if($_GET['page']=="staff")
{
	echo '<script language="javascript"> 

 		window.location="../index.php"; 
 		</script>';	
}

if($_GET['page']=="client")
{
	echo '<script language="javascript"> 

 		window.location="../index.php"; 
 
 		</script>';	
}
?>