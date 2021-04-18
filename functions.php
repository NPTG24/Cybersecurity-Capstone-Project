<?php

include "config.php";

function getValue($camp, $campWhere, $value)
{
    global $conn;
    
    $stmt = $conn->prepare("SELECT $camp FROM register WHERE $campWhere = ? LIMIT 1");
    $stmt->bind_param('s', $value);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    
    if ($num > 0)
    {
        $stmt->bind_result($_camp);
        $stmt->fetch();
        return $_camp;
    }
    else
    {
        return null;	
    }
}


function SendEmail($email, $name, $subject, $body){
		
    require_once 'PHPMailer/PHPMailerAutoload.php';
    
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587; 
    
    $mail->Username = 't6059778@gmail.com'; 
    $mail->Password = 'qwert987yuiop'; 
    
    $mail->setFrom('t6059778@gmail.com', 'Recover password'); 
    $mail->addAddress($email, $name);
    
    $mail->Subject = $subject;
    $mail->Body   = $body;
    $mail->IsHTML(true);
    
    if($mail->send())
    return true;
    else
    return false;
}


