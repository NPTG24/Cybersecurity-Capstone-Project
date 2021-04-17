<?php

$conn=mysqli_connect('localhost','root','','proyect_db');

?>

<table border="1">
<tr>
			<td>id</td>
			<td>name</td>
			<td>email</td>
			<td>password</td>
			<td>number</td>
            <td>adress</td>
            <td>modified_on</td>
		</tr>
<?php
$sql="SELECT * from register";
$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res)){
?>
	<tr>
		<td><?php echo $row['id'] ?></td>
		<td><?php echo $row['name'] ?></td>
		<td><?php echo $row['email'] ?></td>
		<td><?php echo $row['password'] ?></td>
		<td><?php echo $row['number'] ?></td>
        <td><?php echo $row['address'] ?></td>
        <td><?php echo $row['modified_on'] ?></td>
	</tr>
<?php 
}
 ?>
</table>