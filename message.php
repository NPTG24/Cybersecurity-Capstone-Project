
<?php
  session_Start();
  include "layouts/header2.php"; 
  include "config.php"; 
  include "decryp_msg.php";
  $name = $_SESSION['name'];

  $sql = "SELECT * FROM chat WHERE receives='$name'";
  $res = mysqli_query($conn,$sql);
?>
  <div class="container">
  <center><h2>Your received messages<span style="color:#dd7ff3;"></span></h2>
  </center></br>
   <div class="display-chat" id = "display-chat">
  <table width="800" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td width="53" align="center" valign="top"><strong>Message</strong></td>
      <td width="321" align="center" valign="top"><strong>From</strong></td>
	  <td width="321" align="center" valign="top"><strong>Date</strong></td>
    </tr>
    <?php

  
	$i = 0; 
  
	while($row = mysqli_fetch_array($res)){
    $msg=$row['message'];
    $decrypted=decrypt($msg, $private_secret_key);
    ?>
    <tr bgcolor="<?php if($row['viewed'] == "yes") { echo "#FFE8E8"; } else { if($i%2==0) { echo "#FFE7CE"; } else { echo "#FFCAB0"; } } ?>">
      <td align="center" valign="top"><?php echo $decrypted?></td>
      <td align="center" valign="top"><?php echo $row['name']?></td>
	  <td align="center" valign="top"><?php echo $row['created_on']?></td>
    
    </tr>
    <?php $i++;
  } ?>

<a href="home.php" class="btn btn-primary">Home</a>
<a href="chatpage.php" class="btn btn-primary">New message</a>
<a href="mymessage.php" class="btn btn-primary">Sent messages</a>
</table>
    

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

