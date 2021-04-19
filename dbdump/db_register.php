<?php


$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$dbHost =$url['us-cdbr-east-03.cleardb.com'];
$dbUsername =$url['bfb973d3caa39c'];
$dbPassword =$url['41b2fe72'];
$dbDatabase =$url['heroku_a3a45f89798acbc'];



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