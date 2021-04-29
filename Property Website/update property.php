<?php

include ('conn.php');

$sql = 'UPDATE property_t SET prop_name = "'.$_POST['name'].'", prop_type = "'.$_POST['type'].'",
prop_nation = "'.$_POST['nation'].'", prop_state = "'.$_POST['state'].'", 
prop_zipcode = "'.$_POST['zipcode'].'", prop_city = "'.$_POST['city'].'", 
prop_street = "'.$_POST['street'].'", prop_door = "'.$_POST['doorno'].'",
prop_length = "'.$_POST['length'].'", prop_width = "'.$_POST['width'].'",
prop_price = "'.$_POST['price'].'", prop_down_payment = "'.$_POST['downpayment'].'",
prop_year_built = "'.$_POST['yearsbuilt'].'", prop_status = "'.$_POST['status'].'" WHERE prop_id = '.$_POST['id'];

mysqli_query($conn, $sql);

if(mysqli_affected_rows($conn) <=0)
{
	die("<script>alert('Cannot update data!');</script>");
	echo "<script>window.location.href = 'Agent Interface.php';</script>";
}
else
{
	echo "<script>alert('Successfully to update data!');</script>";
	echo "<script>window.location.href='Agent Interface.php';</script>";
}
?>	