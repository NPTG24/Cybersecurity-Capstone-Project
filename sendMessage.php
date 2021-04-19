<?php

include "config.php";
include "functions.php";
session_start();
if($_POST)
{
	$user=$_SESSION['name'];
	$to=$_POST['to'];
    $msg=escape($_POST['msg']);

	$verify = "SELECT * FROM register WHERE name = '$to'";
	$verify_user = mysqli_query($conn, $verify);
	if(!empty($verify_user) AND mysqli_num_rows($verify_user) > 0){
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
	
	
		$query = mysqli_query($conn,$sql);
		if($query)
		{
			echo '
			<script> 
				alert("Message sent succesfully"); 
				window.location = "/chatpage.php";
			</script>';
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
			window.location = "/chatpage.php";
		</script>';
	}
	
	
}
else
{
	header('location:index.php');
}
?>