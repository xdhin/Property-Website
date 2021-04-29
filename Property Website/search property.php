<!DOCTYPE html>

<?php
include("conn.php");
session_start();
if(!isset($_SESSION['logged_in']))
{
	echo'<script>alert("You are not logged in. Please logged in first!")</script>';
	echo'<script>window.location.href = "homepage.html"</script>';
}
?>

<html>
    <head lang="en">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Property management system where user can view information of property available, rent, and buy property on the website.">
        <meta name="author" content="Chia Xue Qian">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!--link rel="stylesheet" href="style.css"-->

        <title>Welcome to WDT Property</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="Pic\logo.jpeg" width="140" height="50" alt="Company Logo" loading="lazy">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="homepage.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="business process.html">Business Operation</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="gallery.html">Gallery</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About Us</a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="company background.html">Company Background</a>
                        <a class="dropdown-item" href="board of directors.html">Board of Directory</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact Us</a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="faqs.html">FAQs</a>
                        <a class="dropdown-item" href="enquiry & feedback form.html">Enquiry & Feedback Form</a>
                        <a class="dropdown-item" href="contact information.html">Contact Information</a>
                      </div>
                    </li>
                  </ul>
                </div>
                <a href="logout.php" class="badge badge-danger my-2 my-sm-0 text-wrap" style="width: 8rem ;height: 2rem;">Logout</a>
              </nav>
        </header>
        <br>
        <div = "whole">
            <div class="container">
                <div class="row">
                    <p>Welcome,agent!</p>
                </div>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                              <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Business Operation</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">About Us</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-10">
                        <div class="property-list">
						<form action = "search property.php" method = "post">
						<div class ="textbox">
						<input type="text" class="form-control" name= "search_key" placeholder="Search location">
						</div>
						<br>
						<div>
						<button type ="submit" class="btn btn-primary">Search</button>
						</div>
						</form>
						<br>
						<h3>Property List</h3>
						<br>
							<table border = "1" style = "text-align:center" width="100%">
							<tr bgcolor = "#CC99FF">
							<th>Name</th>
							<th>Type</th>
							<th>Address</th>
							<th>Unit</th>
							<th>Area(m<sup>2</sup>)</th>
							<th>Price(RM)</th>
							<th>Down Payment(%)</th>
							<th>Year Built</th>
							<th>Status</th>
							<th>Edit</th>
							<th>Delete</th>
							</tr>
<?php
	$search_key = isset($_POST['search_key'])?
	$_POST['search_key']:'';
	if ($search_key == NULL)
	{
		echo"<script>alert('Please key in your search key first!');</script>";
	}
	else
	{
	}
	$sql ="SELECT * FROM property_t WHERE prop_name LIKE '%".
	$search_key. "%'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)<=0)
	{
			echo "<script>alert('No Result!');</script>";
	}
	else
	{
		
	while($rows = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$rows['prop_name']."</td>";
		echo "<td>".$rows['prop_type']."</td>";
		echo "<td>".$rows['prop_street'].", ".$rows['prop_city']." ".$rows['prop_zipcode']." ".$rows['prop_state'].", ".$rows['prop_nation'].            "</td>";
		echo "<td>".$rows['prop_door']."</td>";
		echo "<td>".$rows['prop_length']*$rows['prop_width']."</td>";
		echo "<td>".$rows['prop_price']."</td>";
		echo "<td>".$rows['prop_down_payment']."</td>";
		echo "<td>".$rows['prop_year_built']."</td>";
		echo "<td>".$rows['prop_status']."</td>";
		echo "<td><a href='edit property.php?id=".$rows['prop_id']."'><button>Edit</button></a></td>";
		echo "<td><a href='delete property.php?id=".$rows['prop_id']."'><button>Delete</button></a></td>";
		echo "</tr>";
	}
	}
	?>
							</table>
							<br>
							<br>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>
            <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">WDT Property</th>
                    <th scope="col">Useful Links</th>
                    <th scope="col">Contact</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="800">We are the only professionals you can trust to manage your property.</td>
                    <td>
                        <a href="business process.html">Business Operation</a><br>
                        <a href="gallery.html">Gallery</a><br>
                        <a href="company background.html">Company Background</a><br>
                        <a href="board of directors.html">Board of Directory</a><br>
                        <a href="faqs.html">FAQs</a><br>
                        <a href="enquiry & feedback form.html">Enquiry & Feedback Form</a><br>
                        <a href="contact information.html">Contact Information</a><br>
                    </td>
                    <td>
						<h6><b>WDT Property</b></h6>
						<div class="row">
						<div class="col-sm-2">
						Address:
						</div>
						<div class="col-sm-10">
                        Technology Park Malaysia<br>
						Bukit Jalil, Kuala Lumpur 57000<br>
						Malaysia<br>
						</div>
						<div class="col-sm-2">
                        Email: 
						</div>
						<div class="col-sm-10">
						wdtproperty4u@mail.com
                        </div>
						<div class="col-sm-2">
						Phone:
						</div>
						<div class="col-sm-10">
						+603 8899 3333
						</div>
						<div class="col-sm-2">
                        Fax:
						</div>
						<div class="col-sm-10">
						+603 8899 4444
						</div></div>
                    </td>
                  </tr>
                  <tr>
                      <td colspan="3" style="text-align: center;">
                        <hr>All rights reserved. Copyright &copy; 2020 WDT Property
                      </td>
                  </tr>
                </tbody>
              </table>
        </footer>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
<style>
input type=[submit]{
	background-color:blue;
}
#whole{
	background-color:mintcream;
}
footer{
	background-color:silver;
}
</style>