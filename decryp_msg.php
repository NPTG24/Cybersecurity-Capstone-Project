<?php

function decrypt($msg, $encrypt_key){
    $key = hex2bin($encrypt_key);
    $msg = base64_decode($msg);
    $nonceSize = openssl_cipher_iv_length('aes-256-ctr');
    $nonce = mb_substr($msg,0,$nonceSize,'8bit');
    $ciphertext = mb_substr($msg,$nonceSize,null,'8bit');

    $plaintext = openssl_decrypt($ciphertext,'aes-256-ctr',$key,OPENSSL_RAW_DATA,$nonce);
    return $plaintext;
}
$private_secret_key = '1f4276378ad3214c873928dbef42743f';
?>