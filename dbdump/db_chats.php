<?php

$conn=mysqli_connect('localhost','root','','proyect_db');

?>

<table border="1">
<tr>
			<td>ID</td>
			<td>User</td>
			<td>Receives</td>
			<td>Message</td>
			<td>Created_on</td>
		</tr>
<?php
$sql="SELECT * from chat";
$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res)){
?>
	<tr>
		<td><?php echo $row['id'] ?></td>
		<td><?php echo $row['name'] ?></td>
		<td><?php echo $row['receives'] ?></td>
		<td><?php echo $row['message'] ?></td>
		<td><?php echo $row['created_on'] ?></td>
	</tr>
<?php 
}
 ?>
</table>