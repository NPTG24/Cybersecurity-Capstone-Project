<?php 
	session_start();
	if(isset($_SESSION['name']))
	{
		include "layouts/header2.php"; 
		include "config.php"; 

		
		$sql="SELECT * FROM `chat`";

		$query = mysqli_query($conn,$sql);
?>
<style>
  h2{
color:white;
  }
  label{
color:white;
  }
  span{
	  color:#673ab7;
	  font-weight:bold;
  }
  .container {
    margin-top: 3%;
    width: 60%;
    background-color: #26262b9e;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #673AB7;
	}
	.display-chat{
		height:300px;
		background-color:#d69de0;
		margin-bottom:4%;
		overflow:auto;
		padding:15px;
	}
	.message{
		background-color: #c616e469;
		color: white;
		border-radius: 5px;
		padding: 5px;
		margin-bottom: 3%;
	}
  </style>

<meta http-equiv="refresh" content="20">
<script>

      $(document).ready(function(){
        // Set trigger and container variables
        var trigger = $('.container .display-chat '),
            container = $('#content');
        
        // Fire on click
        trigger.on('click', function(){
          // Set $this for re-use. Set target from data attribute
          var $this = $(this),
            target = $this.data('target');       
          
          // Load target page into container
          container.load(target + '.php');
          
          // Stop normal link behavior
          return false;
        });
      });
    </script>


<div class="container">
  <center><h2>Sent messages <span style="color:#dd7ff3;">
  </center></br>
   <form class="form-horizontal" method="post" action="sendMessage.php">
    <div class="form-group">
      <div class="col-sm-10">        
	    <textarea name="to" class="form-control" placeholder="To..."></textarea>
        <textarea name="msg" class="form-control" placeholder="Enter your message here ..."></textarea>
      </div>


	         
      <div class="col-sm-2">
        <button type="submit" class="btn btn-primary" >Send</button>
		<a href="home.php" class="btn btn-primary">Home</a>
		<a href="mymessage.php" class="btn btn-primary">Sent messages</a>
	  	<a href="message.php" class="btn btn-primary">Received messages</a>
      </div>


<?php

?>

</body>
</html>
<?php

	}
	else
	{
		header('location:index.php');
	}
?>
