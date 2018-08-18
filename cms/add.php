<?php
//ini_set('display_errors', 1);

include('../includes/conn.inc.php');
include('../includes/sessions.inc.php');
include('../includes/functions.inc.php');
include('../includes/authorizeadmin.php');


?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Add CMS</title>
	<link rel="stylesheet" href="../css/mobile.css">
	<link rel="stylesheet" media="only screen and (min-width : 600px)" href="../css/desktop.css">
</head>
<body>
	<header>
	<div class="container">
		<div class="burgerMenu">
				<div class="menuLabel">Menu</div>
				<div class="bars">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>
			</div>
			<h1 class="mobH1">BWP</h1>

	<nav>
		<ul>
			<li><h1>BWP</h1></li>
					<li><a href="../Home.php">Home</a></li>
					<li><a href="../WebGame.php">WebGame</a></li>
					<li><a href="../CV.php">CV</a></li>
					<li><a href="../Search.php">Search</a></li>
					<li><a class="link" href="../logout.php" style="text-decoration:none">logout</a><li>
			
		</ul>
	</nav>
	</div>
	</header>


<div class="container">
	<div class="banner">
		<h2>Add Data</h2>
	</div>
	<div class="content">
		<div class="main">
		<h2>Please input the correct Data</h2>
		<p>Here we are able to add data into the input fields securely pleas emake sure youve added the correct data into the fields</p>
		<div>	
						<?php

		if (isset($_POST['addT1'])) 
		{
			echo
			"<form action='add_validate.php' method='post' name='Addform'>
					<table width='25%' border='0'>
						<tr> 
							<td>Project Name</td>
							<td><input type='text' name='pName'></td>
						</tr>
						<tr> 
							<td>Project Description</td>
							<td><input type='text' name='pDescription'></td>
						</tr>
						<tr> 
							<td>Project Download</td>
							<td><input type='text' name='pDownload'></td>
						</tr>
						<tr> 
							<td>Project Filesize</td>
							<td><input type='text' name='pFilesize' placeholder='float only'></td>
						</tr>
						<tr> 
							<td>Project Released</td>
							<td><input type='text' name='pReleased'placeholder='YYYY-MM-DD'></td>
						</tr>
						<tr> 
							<td></td>
							<td><input type='submit' name='t1Submit' value='Add'></td>
						</tr>
					</table>
				</form> ";
		} else if (isset($_POST['addT2']))
			{
				
				echo"<form action='add_validate.php' method='post' name='form2'>
					<table width='25%' border='0'>
						<tr> 
							<td>Fullname</td>
							<td><input type='text' name='Fullname'></td>
						</tr>
						<tr> 
							<td>Lastname</td>
							<td><input type='text' name='Lastname'></td>
						</tr>
						<tr> 
							<td>Email</td>
							<td><input type='email' name='Email'></td>
						</tr>
						<tr> 
							<td>Username</td>
							<td><input type='text' name='Username'></td>
						</tr>
						<td>Password</td>
							<td><input type='password' name='Password'></td>
						<tr> 
							<td></td>
							<td><input type='submit' name='t2Submit' value='Add'></td>
						</tr>
					</table>
				</form> ";
			}
        ?>
			</div>		
		</div>
	</div>
	
	<footer>
		<p>&copy; Copyright 2017</p>
	</footer>
	
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
