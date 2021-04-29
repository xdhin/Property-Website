<?php

include("conn.php");
session_start();
if(!isset($_SESSION['logged_in']))
{
	echo'<script>alert("You are not logged in. Please logged in first!")</script>';
	echo'<script>window.location.href = "homepage.html"</script>';
}

$pname = $_GET['name'];
$ptype = $_GET['type'];
$pdoorno = $_GET['doorno'];
$pstreet = $_GET['street'];
$pcity = $_GET['city'];
$pzipcode = $_GET['zipcode'];
$pstate = $_GET['state'];
$pnation = $_GET['nation'];
$plength = $_GET['length'];
$pwidth = $_GET['width'];
$pprice = $_GET['price'];
$pdownpayment = $_GET['downpayment'];
$pyearsbuilt = $_GET['yearsbuilt'];
$pstatus = $_GET['status'];

$sql = "INSERT INTO property_t (prop_name, prop_type, prop_nation, prop_state, prop_zipcode, prop_city, prop_street 
,prop_door, prop_length, prop_width, prop_price, prop_down_payment, prop_year_built, prop_status) VALUES 
('".$pname."','".$ptype."','".$pnation."','".$pstate."','".$pzipcode."','".$pcity."','".$pstreet."'
,'".$pdoorno."','".$plength."','".$pwidth."','".$pprice."','".$pdownpayment."','".$pyearsbuilt."','".$pstatus."')";

mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn) <=0)
{
	die("<script>alert('Fail: unable to insert new data!');window.history.go(-1);</script>");
}

echo "<script>alert('Successfully insert new property!')</script>";
echo "<script>window.history.go(-2);</script>";
?>