<?php
session_start();
if(!isset($_SESSION['logged_in']))
{
	echo'<script>alert("You are not logged in. Please logged in first!")</script>';
	echo'<script>window.location.href = "homepage.html"</script>';
}
?>

<!DOCTYPE html>
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
                <a href="logout.html" class="badge badge-danger my-2 my-sm-0 text-wrap" style="width: 8rem; height:2rem;">Logout</a>
              </nav>
        </header>
        <br>
        <div id = "whole">
            <div class="container">
                <div class="row">
                    <p>Messages</p>
                </div>
            </div>
            <br>
<?php

include('conn.php');

$sql = 'SELECT * FROM message_t WHERE msg_id ='.$_GET['msgid'];
$result = mysqli_query ($conn, $sql);
$row = mysqli_fetch_assoc($result);

mysqli_free_result ($result);
mysqli_close($conn);
?>
            <div class="container">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <form method="POST" action="agent reply.php">
                            <p><u>Reply Messages</u></p>
							<div class="col-4">
								<input type="text" class="form-control" name="dst" value = "<?php echo $row['msg_src']?>" placeholder="" readonly/>
                            </div>
							<br>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-10" style= "width:500px;">
                                            <input type="text" class="form-control" name="message"	 placeholder="Leave Your Message Here..">
											
                                        </div>
                                         <input type="submit" class="btn btn-primary" value="Send" />
									</div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                           
                        </form>
                    </div>
                    <div class="col-2"></div>
                </div>
            
            <br>
        <br>
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
#whole{
	background-color:mintcream;
}
footer{
	background-color:silver;
}
</style>