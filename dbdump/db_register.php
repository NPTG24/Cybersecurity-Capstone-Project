<?php


$dbHost ='remotemysql.com';
$dbUsername ='5AEawBMs48';
$dbPassword ='SwE7zrSYhS';
$dbDatabase ='5AEawBMs48';


$conn=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbDatabase);

?>

<table border="1">
<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Password</td>
			<td>Phone</td>
            <td>Address</td>
            <td>Date</td>
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