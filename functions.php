<?php

function getValue($camp, $campWhere, $value)
{
    global $mysqli;
    
    $stmt = $mysqli->prepare("SELECT $camp FROM  WHERE $campWhere = ? LIMIT 1");
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

function generaTokenPass($user_id)
{
    global $mysqli;
    
    $token = generateToken();
    
    $stmt = $mysqli->prepare("UPDATE register SET token_password=?, password_request=1 WHERE id = ?");
    $stmt->bind_param('ss', $token, $user_id);
    $stmt->execute();
    $stmt->close();
    
    return $token;
}

function SendEmail($email, $name, $subject, $body){
		
    require_once 'PHPMailer/PHPMailerAutoload.php';
    
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tipo de seguridad'; //Modificar
    $mail->Host = 'dominio'; //Modificar
    $mail->Port = puerto; //Modificar
    
    $mail->Username = 'correo emisor'; //Modificar
    $mail->Password = 'password de correo emisor'; //Modificar
    
    $mail->setFrom('correo emisor', 'nombre de correo emisor'); //Modificar
    $mail->addAddress($email, $nombre);
    
    $mail->Subject = $asunto;
    $mail->Body    = $cuerpo;
    $mail->IsHTML(true);
    
    if($mail->send())
    return true;
    else
    return false;
}
