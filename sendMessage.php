<?php

include "config.php";
session_start();
if($_POST)
{
	$name=$_SESSION['name'];
	$to=$_POST['to'];
    $msg=$_POST['msg'];
    

	function encrypt($msg, $encrypt_key){
		$key = hex2bin($encrypt_key);
		$nonceSize = openssl_cipher_iv_length('aes-256-ctr');
		$nonce = openssl_random_pseudo_bytes($nonceSize);

		$ciphertext = openssl_encrypt($msg,'aes-256-ctr',$key,OPENSSL_RAW_DATA,$nonce);
		return base64_encode($nonce.$ciphertext);
	}
	$private_secret_key = '1f4276378ad3214c873928dbef42743f';
	$encrypted = encrypt($msg, $private_secret_key);

	$sql="INSERT INTO `chat`(`name`,`receives`,`message`) VALUES ('".$name."','".$to."', '".$encrypted."')";


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
else
{
	header('location:index.php');
}
?>