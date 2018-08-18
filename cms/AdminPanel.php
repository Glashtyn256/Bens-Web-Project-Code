<?php
//ini_set('display_errors', 1);

require('../includes/conn.inc.php');
include('../includes/sessions.inc.php');
include('../includes/functions.inc.php');
include('../includes/authorizeadmin.php');
?>

<!doctype html>
<html>
<head>
	<title>Admin Panel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
		<h2>CMS</h2>
	</div>
	<div class="content">
		<div class="main">
		<h2>Content Managment System</h2>
		<p>This is where you can manage your websites content, choose to add delete or update any piece of information from the database
		which will impact the website itself.</p>
					<div>	
					
					<!-- <a href="add.php?tableNumber=1">Add New Data</a><br><br> -->
					<form action='add.php' method='post'>
					<input type='submit' name='addT1' value='Add New Data T1'>
					</form><br>
						<table border=0>
					
						<tr bgcolor='#CCCCCC'>
							<td>Project ID</td>
							<td>Project Name</td>
							<td>Project Description</td>
							<td>Project Download</td>
							<td>Project Filesize</td>
							<td>Project Released</td>
							<td>Update</td>
						</tr>
						<?php
						$pTable = $pdo->query("SELECT * FROM Tbl_Projects ORDER BY pID");

						while($row = $pTable->fetch(PDO::FETCH_ASSOC)) {         
							echo "<tr>";
							echo "<td>".$row['pID']."</td>";
							echo "<td>".$row['pName']."</td>";
							echo "<td>".$row['pDescription']."</td>";
							echo "<td>".$row['pDownload']."</td>";
							echo "<td>".$row['pFilesize']."</td>";
							echo "<td>".$row['pReleased']."</td>";
							echo "<td><form action='edit.php' method='post'>
							<input type ='hidden' name='pID' value='$row[pID]'>
							<input type='submit' name='editT1' value='Edit'>
							</form>

							<form action='delete.php' method='post'>
							<input type ='hidden' name='pID' value='$row[pID]'>
							<input type='submit' name='deleteT1' value='Delete'>
							</form> </td>";    
							
						}
						?>
						</table>
					

						<?php
							

							include('../includes/conn.inc.php');
				
							$tUser = $pdo->query("SELECT * FROM  Tbl_User ORDER BY UserID DESC");
					?>
					<form action='add.php' method='post'>
					<input type='submit' name='addT2' value='Add New Data T2'>
					</form><br>
					
						<table width='100%' border=0>
					
						<tr bgcolor='#CCCCCC'>
							<td>ID</td>
							<td>Fullname</td>
							<td>Lastname</td>
							<td>Email</td>
							<td>Username</td>
							<td>Update</td>
						</tr>
						<?php     
						while($row = $tUser->fetch(PDO::FETCH_ASSOC)) {         
							echo "<tr>";
							echo "<td>".$row['UserID']."</td>";
							echo "<td>".$row['Fullname']."</td>";
							echo "<td>".$row['Lastname']."</td>";
							echo "<td>".$row['Email']."</td>";
							echo "<td>".$row['Username']."</td>";
							echo "<td><form action='edit.php' method='post'>
							<input type ='hidden' name='UserID' value='$row[UserID]'>
							<input type='submit' name='editT2' value='Edit'>
							</form>
							<form action='delete.php' method='post'>
							<input type ='hidden' name='UserID' value='$row[UserID]'>
							<input type='submit' name='deleteT2' value='Delete'>
							</form> </td>";
							        
						}
						?>
						</table>
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
