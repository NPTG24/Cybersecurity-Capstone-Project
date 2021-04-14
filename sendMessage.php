<?php

include "config.php";
session_start();
if($_POST)
{
	$name=$_SESSION['name'];
	$to=$_POST['to'];
    $msg=$_POST['msg'];
    
	$sql="INSERT INTO `chat`(`name`,`receives`,`message`) VALUES ('".$name."','".$to."', '".$msg."')";

	$query = mysqli_query($conn,$sql);
	if($query)
	{
		header('Location: chatpage.php');
	}
	else
	{
		echo "Something went wrong";
	}
	
	}
?>