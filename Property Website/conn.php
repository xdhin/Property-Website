<?php
$server = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = 'wdt_property';

$conn = mysqli_connect($server, $username, $password ,$dbname);

if(mysqli_connect_errno())
{
	die("Failed to connect to MySQL:".mysqli_connect_errno());
}
else 
	echo "<script>alert('Connection Success!');</script>";
?>