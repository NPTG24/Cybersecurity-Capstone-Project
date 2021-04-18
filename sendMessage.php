<?php

include "config.php";
session_start();
if($_POST)
{
	$user=$_SESSION['name'];
	$to=$_POST['to'];
    $msg=$_POST['msg'];

	$verify = "SELECT * FROM register WHERE name = '$to'";
	$verify_user = mysqli_query($conn, $verify);
	if(mysqli_num_rows($verify_user) > 0){
		function encrypt($msg, $encrypt_key){
			$key = hex2bin($encrypt_key);
			$nonceSize = openssl_cipher_iv_length('aes-256-ctr');
			$nonce = openssl_random_pseudo_bytes($nonceSize);
	
			$ciphertext = openssl_encrypt($msg,'aes-256-ctr',$key,OPENSSL_RAW_DATA,$nonce);
			return base64_encode($nonce.$ciphertext);
		}
		$private_secret_key = '1f4276378ad3214c873928dbef42743f';
		$encrypted = encrypt($msg, $private_secret_key);
	
		$sql="INSERT INTO `chat`(`name`,`receives`,`message`) VALUES ('".$user."','".$to."', '".$encrypted."')";
		echo '
		<script> 
			alert("Message sent succesfully"); 
			window.location = "/chat_project/sendMessage.php";
		</script>';
	
	
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
	else{
		echo '
		<script> 
			alert("Username does not exist!"); 
			window.location = "/chat_project/home.php";
		</script>';
	}
	
	
}
else
{
	header('location:index.php');
}
?>