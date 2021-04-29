<?php
session_start();

include('conn.php');
$agtemail = $_POST['agtemail'];
$agtpassw = $_POST['agtpassw'];
$sql = 'SELECT agt_email FROM agent_t WHERE agt_email = "'.$agtemail.'" AND agt_password = "'.$agtpassw.'"';
$login = mysqli_query($conn, $sql);
$_SESSION['agtemail'] = $_POST['agtemail'];
if (mysqli_affected_rows($conn) !=1){
	echo '<script>alert("Email and Password not matched")</script>';
	echo '<script>window.location.href = "Homepage.html"</script>';
}else{
	$user = mysqli_fetch_assoc($login);
	$_SESSION['logged_in'] = $user['agt_email'];
	echo '<script>alert("You are logged in")</script>';
	echo '<script>window.location.href = "Agent Interface.php"</script>';
}
?>