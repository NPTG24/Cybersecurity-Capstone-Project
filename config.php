<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$dbHost =$url['us-cdbr-east-03.cleardb.com'];
$dbUsername =$url['bfb973d3caa39c'];
$dbPassword =$url['41b2fe72'];
$dbDatabase =substr($url['heroku_a3a45f89798acbc'],1);

$active_group = 'default';
$query_builder = TRUE;

$conn=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbDatabase);

?>