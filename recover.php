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
  <form class="form-horizontal" method="post" action="conf_recover.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
        </div>
        </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="number">Phone:</label>
        <div class="col-sm-10">
          <input type="tel" class="form-control" id="number" placeholder="Enter your mobile phone number" name="number" required>
        </div>
      </div>
      <div class="col-sm-offset-5 col-sm-10">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
    </div>
  </form>
</div>


