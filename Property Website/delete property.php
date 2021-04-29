<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
	echo'<script>alert("You are not logged in. Please logged in first!")</script>';
	echo'<script>window.location.href = "homepage.html"</script>';
}


include ('conn.php');
$sql='DELETE FROM property_t WHERE prop_id='.$_GET['id'];
	
if(mysqli_query($conn, $sql))
	echo '<script>alert("Data successfully deleted!");</script>';
else
	echo '<script>alert("Unable to delete data!");</script>';

mysqli_close($conn);

echo '<script>window.location.href = "Agent interface.php";</script>';
?>	