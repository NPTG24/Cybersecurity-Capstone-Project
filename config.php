<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$dbHost =$url['localhost'];
$dbUsername =$url['root'];
$dbPassword =$url[''];
$dbDatabase =substr($url['proyect_db'], 1);
$conn=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbDatabase);

?>