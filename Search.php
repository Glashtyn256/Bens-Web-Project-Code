<?php
include('includes/sessions.inc.php');
include('includes/conn.inc.php');
include('includes/functions.inc.php');
include('includes/authorize.php');

?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search</title>
	<link rel="stylesheet" href="css/mobile.css">
	<link rel="stylesheet" media="only screen and (min-width : 600px)" href="css/desktop.css">
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
					<li><a href="Home.php">Home</a></li>
					<li><a href="WebGame.php">WebGame</a></li>
					<li><a href="CV.php">CV</a></li>
					<li><a href="Search.php">Search</a></li>
					<?php if(isset($_SESSION['logged_in'])){ ?>
  					<li><a class="link" href="logout.php" style="text-decoration:none">logout</a></li>
					<?php }
					else{ ?>
  					<li><a class="link" href="login.php" style="text-decoration:none">login</a></li>
					<?php } ?>
		</ul>
	</nav>
	</div>
	</header>


<div class="container">
	<div class="banner">
		<h2>Search</h2>
	</div>
	<div class="content">
		<div class="main">
		<h2>Search my database for information you might need</h2>
        <p>Basically you can search my database mutliple tables with different search criteria for each table</p>
		<!-- <form method="post" action="Search.php">
			<label for="checkFirstName">First name</label>
			<input type="checkbox" name"Fullname" value="Fullname">
			<label for="checkLastName">Last name</label>
			<input type="checkbox" name"Lastname" value="Lastname">
			<label for="checkEmail">Last name</label>
			<input type="checkbox" name"Email" value="Email">
			<label for="checkUsername">Last name</label>
			<input type="checkbox" name"Username" value="Username">
			<div>
			<input type="text" name="q" placeholder="Search">
			<input type="submit" name"=uSearch" value="Find">
			</div>
			</form> -->

			<!-- <select name="column">
				 <option value="">Select Filter Option</option>
				<option value="Firstname">FirstName</option>
				<option value="Lastname">LastName</option> 
				</select> -->
			
		
				<form action="Search.php" method="post" id="tableform">
				Search - <input type="text" name="term">
					<select name="tblList" form="tableform">
					<option value="1">Project</option>
					<option value="2">User</option>
					<option value="3">Artists</option>
					<option value="4">Programmers</option>
					</select>
					<input type="submit" name="searchq">
					</form>

					

			
			<?php
					if(isset($_POST['searchq']))
					{
						if(isset($_POST['term']))
						{
							$term = safeString($_POST['term']). '%';
							$table = safeInt($_POST['tblList']);

							switch($table)
							{
							case 1:
									$sql = "SELECT * FROM Tbl_Projects WHERE pName LIKE :term OR pReleased LIKE :term ORDER BY pName" ;
									$stmt = $pdo->prepare($sql);
									$stmt->bindParam(':term', $term);

									$stmt->execute();
								  
									if($stmt->rowCount() > 0)
									{
									   echo"<table width='100%' border=0>
										   <tr bgcolor='#CCCCCC'>
										   <td>Project Name</td>
											<td>Project Description</td>
											<td>Project Download</td>
										   <td>Filesize (GB)</td>
										   <td>Released</td>
										   </tr>";
										while($row = $stmt->fetch())
										{
										   echo "<tr>";
										   echo "<td>".$row['pName']."</td>";
										   echo "<td>".$row['pDescription']."</td>";
										   echo "<td>".$row['pDownload']."</td>";
										   echo "<td>".$row['pFilesize']."</td>";
										   echo "<td>".$row['pReleased']."</td>";
										   echo"</tr>";
										}
									} 
									else
									{
										echo "<p>No matches found</p>";
									}
									echo"</table>";
								  	break;
							case 2:
									$sql = "SELECT * FROM Tbl_User WHERE Fullname LIKE :term OR Lastname LIKE :term OR Username LIKE :term ORDER BY Fullname";
									$stmt = $pdo->prepare($sql);
									// bind parameters to statement
									$stmt->bindParam(':term', $term);
									// execute the prepared statement
									$stmt->execute();
								  
									if($stmt->rowCount() > 0)
									{
									   echo"<table width='100%' border=0>
										   <tr bgcolor='#CCCCCC'>
										   <td>User Username</td>
										   <td>User Firstname</td>
											<td>User Lastname</td>
											<td>User Contact</td>
										   
										   </tr>";
										while($row = $stmt->fetch())
										{
										   echo "<tr>";
										   echo "<td>".$row['Username']."</td>";
										   echo "<td>".$row['Fullname']."</td>";
										   echo "<td>".$row['Lastname']."</td>";
										   echo "<td>".$row['Email']."</td>";
										   echo"</tr>";
										}
									} 
									else
									{
										echo "<p>No matches found</p>";
									}
									echo"</table>";
								  	break;
							case 3:
									$sql = "SELECT * FROM Tbl_Artists WHERE aFullname LIKE :term OR aEmail LIKE :term ORDER BY aFullname";
									$stmt = $pdo->prepare($sql);
									// bind parameters to statement
									$stmt->bindParam(':term', $term);
									// execute the prepared statement
									$stmt->execute();
								  
									if($stmt->rowCount() > 0)
									{
									   echo"<table width='100%' border=0>
										   <tr bgcolor='#CCCCCC'>
										   <td>Artist Fullname</td>
										   <td>Artist Email</td>
										   </tr>";
										while($row = $stmt->fetch())
										{
										   echo "<tr>";
										   echo "<td>".$row['aFullname']."</td>";
										   echo "<td>".$row['aEmail']."</td>";
										   echo"</tr>";
										}
									} 
									else
									{
										echo "<p>No matches found</p>";
									}
									echo"</table>";
								  	break;
							case 4:
										$sql = "SELECT * FROM Tbl_Programmers WHERE Fullname LIKE :term OR Email LIKE :term ORDER BY Fullname";
									$stmt = $pdo->prepare($sql);
									// bind parameters to statement
									$stmt->bindParam(':term', $term);
									// execute the prepared statement
									$stmt->execute();
								  
									if($stmt->rowCount() > 0)
									{
									   echo"<table width='100%' border=0>
										   <tr bgcolor='#CCCCCC'>
										   <td>Programmers Fullname</td>
										   <td>Programmers Email</td>
										   </tr>";
										while($row = $stmt->fetch())
										{
										   echo "<tr>";
										   echo "<td>".$row['Fullname']."</td>";
										   echo "<td>".$row['Email']."</td>";
										   echo"</tr>";
										}
									} 
									else
									{
										echo "<p>No matches found</p>";
									}
									echo"</table>";
								  	break;
							}
							
						}
						

					}




			?>
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
