<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
	echo'<script>alert("You are not logged in. Please logged in first!")</script>';
	echo'<script>window.location.href = "login.html"</script>';
}
include "conn.php";

$src = $_SESSION['agtemail'];
$dst = $_POST['dst'];
$text = $_POST['message'];
$datetime = date('y-m-d h:i:s');

$sql = "INSERT INTO message_t (msg_src, msg_dst, msg_text, msg_date_time) VALUES ('".$src."','".$dst."','".$text."','".$datetime."')";

mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn) <=0)
{
	die("<script>alert('Fail: unable to send message!');window.history.go(-1);</script>");
}

echo "<script>alert('Successfully sent message!')</script>";
echo "<script>window.location.href='Agent Interface.php';</script>";
?>