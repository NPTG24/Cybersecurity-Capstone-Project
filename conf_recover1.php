<?php 
    include "config.php";

    if($_POST)
	{
        $email = $_POST["email"];
        $phone = $_POST["number"];

        $sql = "SELECT * FROM register WHERE email = '$email'";
        $query =  mysqli_query($conn, $sql);
        $num = mysqli_num_rows($query);
        if ($num == 1){
            while($row = mysqli_fetch_assoc($query)){
                if(password_verify($phone, $row['number']))
                {
                    $_SESSION['email'] = $row['email'];
                    header('Location: recoverpass.php');
                }
            }
        }
        else{
            echo '
            <script> 
                alert("email or phone not found"); 
                window.location = "/chat_project/recover.php";
            </script>';
        }
    }

?>