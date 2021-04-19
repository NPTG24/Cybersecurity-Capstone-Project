<?php 
    include "config.php";
    include "functions.php";

    if($_POST)
	{
        $email = $_POST["email"];
        $number = escape($_POST["number"]);

        $sql = "SELECT * FROM register WHERE email = '$email'";
        $sql2 = "SELECT * FROM register WHERE number = '$number'";
        $query =  mysqli_query($conn, $sql);
        $num = mysqli_num_rows($query);
        $query2 =  mysqli_query($conn, $sql);
        $num2 = mysqli_num_rows($query);
        if ($num >= 1 and $num2 >= 1){
            while($row = mysqli_fetch_assoc($query)){
                if(password_verify($number, $row['number']))
                {
                    $_SESSION['email'] = $row['email'];
                    header("Location: recoverpass.php?var1=$email&var2=$number");
                }
                else{
                    echo '
                    <script> 
                        alert("email or phone not found"); 
                        window.location = "/recover.php";
                    </script>';
                }
            }
        }
        else{
            echo '
            <script> 
                alert("email or phone not found"); 
                window.location = "/recover.php";
            </script>';
        }
    }
    else{
        echo '
        <script> 
            alert("email or phone not found"); 
            window.location = "/recover.php";
        </script>';
    }

?>