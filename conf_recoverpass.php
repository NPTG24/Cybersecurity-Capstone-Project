<?php 
    include "config.php";



    if($_POST)
	{
        $email = $_GET["var1"];
        $number = $_GET["var2"];

        $sql = "SELECT * FROM register WHERE email = '$email'";
        $query =  mysqli_query($conn, $sql);
        $num = mysqli_num_rows($query);
        if ($num == 1){
            while($row = mysqli_fetch_assoc($query)){
                if(password_verify($number, $row['number']))
                {
                    $pass = $_POST["password"];
                    $Newhash = password_hash($pass, PASSWORD_DEFAULT);
                    $sql2 ="UPDATE register SET password = '".$Newhash."' WHERE email = '".$email."'";
                    if(mysqli_query($conn, $sql2)==TRUE){
                        echo '
                        <script> 
                            alert("updated password"); 
                            window.location = "/login.php";
                        </script>';
                    }
                }
            }
        }
        else{
            echo '
            <script> 
                alert("error"); 
                window.location = "/recover.php";
            </script>';
        }
    }

?>