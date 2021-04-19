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
<?php
  $login = false;
  include "config.php";
  if($_POST)
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM `register` where email = '$email'";
		$query =  mysqli_query($conn, $sql);
    $num = mysqli_num_rows($query);
    if ($num == 1)
		{
      while($row = mysqli_fetch_assoc($query)){
        if(password_verify($password, $row['password']))
        {
          $login = true;
			    session_start();
			    $_SESSION['name'] = $row['name'];
			    header('Location: home.php');
        }
        else{
          echo '
          <script> 
            alert("Incorrect email or password"); 
            window.location = "/login.php";
          </script>';
        }
      }
		}
		else{
      echo '
      <script> 
        alert("Incorrect email or password"); 
        window.location = "/login.php";
      </script>';
		}
	}
?>

<div class="container">

  <center><h2>Login</h2></center></br>
  <form class="form-horizontal" method="post" action="">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
	  
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter your password" name="password">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="recover.php" class="btn btn-primary">Did you forget your password?</a>
      </div>
    </div>
  </form>
</div>

</body>
</html>
