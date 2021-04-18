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