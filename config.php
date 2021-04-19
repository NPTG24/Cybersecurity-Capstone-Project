<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$dbHost =$url['localhost'];
$dbUsername =$url['root'];
$dbPassword =$url[''];
$dbDatabase =$url['proyect_db'];
$conn=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbDatabase);

?>