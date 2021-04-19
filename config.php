<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$dbHost =$url['us-cdbr-east-03.cleardb.com'];
$dbUsername =$url['bfb973d3caa39c'];
$dbPassword =$url['41b2fe72'];
$dbDatabase =$url['heroku_a3a45f89798acbc'];


$conn=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbDatabase);

?>