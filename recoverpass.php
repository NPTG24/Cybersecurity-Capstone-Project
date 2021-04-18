<?php 
    include "layouts/header.php"; 
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
  <?php
  $var1 = $_GET["var1"];
  $var2 = $_GET["var2"];
?>
  <form class="form-horizontal" method="post" action="conf_recoverpass.php?var1=<?php echo $var1;?>&var2=<?php echo $var2;?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" pattern="(?=^(?:[^A-Z]*[A-Z]))(?=^(?:[^a-z]*[a-z]))(?=^(?:\D*\d))(?=^(?:\w*\W))^[A-Za-z\d\W]{8,}$" class="form-control" id="pwd" placeholder="Enter your new password" name="password" required>
        <label>Password must contain minimum 8 characters, at least one uppercase letter, one lowercase letter, one number and one special character</label><br>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-5 col-sm-10">
        <button type="submit" class="btn btn-primary">Change</button>
      </div>
    </div>
  </form>
</div>