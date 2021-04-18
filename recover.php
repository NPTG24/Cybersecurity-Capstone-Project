<?php 
    include "layouts/header.php"; 
    include "config.php";
    include "functions.php";

    if($_POST)
    {
        $email=$_POST['email'];
        $vere = "SELECT * FROM register WHERE email = '$email'";
        $verify_email = mysqli_query($conn, $vere);
        if(mysqli_num_rows($verify_email) > 0){
            $user_id = getValue('id', 'email', $email);
            $user_id = getValue('name', 'email', $email);

            $token = generaTokenPass($email);
            $url = 'http://'.$_SERVER["SERVER_NAME"].'/chat_project/recoverpass.php?user_id='.$user_id.'&token='.$token;

            $subject = 'Recover password - Users system'
            $body = "Hello $name to reset your password click here -> <a href='$url'>$url</a>";

            if()


        }
    
    }


?>
<style>
  h2{
color:white;
  }
  label{
color:white;
  }
  .container {
    margin-top: 5%;
    width: 50%;
    background-color: #26262b9e;
    padding-top:5%;
    padding-bottom:5%;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #673AB7;
}
</style>

<div class="container">

  <center><h2>Recover password</h2></center></br>
  <form class="form-horizontal" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
        </div>
        </div>    
      <div class="col-sm-offset-5 col-sm-10">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
    </div>
  </form>
</div>