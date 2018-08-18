
<?php
//ini_set('display_errors', 1);
// ^Displays errors that show up in PHP
include('includes/conn.inc.php');
include('includes/sessions.inc.php');
include('includes/authorize.php');
?>

<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WebGame</title>
	<link rel="stylesheet" href="css/snakeGameMobile.css">
	<link rel="stylesheet" media="only screen and (min-width : 600px)" href="css/snakeGameDesktop.css">
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
		<h2>Snake</h2>
	</div>

	<div class="content">
		<div class="gameMain">
		
		<h2 id="scoreBoard">0</h2>
		<canvas width="300" height="300" id="snakeCanvas"></canvas>
		<p><button id="start">Start Game</button></p>
		<h3 id="msg">&nbsp</h3>
 		<!-- &nbsp space that will not break into a new line. -->
		<div id="newHighScore">
    		<form id="playerInfo">
				<input type="hidden" name="playerScore" id="playerScore">
				<p><input type="text" name="playerName" id="playerName" placeholder="Enter name here"></p>
				<p><input type="submit" value="Join Hall of Fame" id="playerUpdate">
				</p>
        	</form>
		
    	</div>
		</div>

		




		<div class="sideBar">
		<h3>HIGHSCORE TABLE</h3>
		<ul class="highScores"></ul>
		
	<!-- <table>
		<tbody>
		<tr>
		<th>Position</th>
		<th>Name</th>
		<th>Score</th>
		</tr>
		<"?"php
		$queryHighscore = "SELECT * FROM Tbl_Highscore ORDER BY Score DESC";
		$stmt = $pdo->query($queryHighscore);
		$position = 1;
		foreach ($pdo->query($queryHighscore) as $row) {
			echo "<tr>
			<td>{$position}</td>
			<td>{$row['Name']}</td>
			<td>{$row['Score']}</td>
			</tr>";
			$position = $position + 1;
		}
		?p>
		
		</table> -->

		<!-- // for ($i=1; $i <= 10; $i++) {
		// 	$rows = $pdo->query($queryHighscore); 
		// 	echo "<tr>
		// 	<td>{$i}</td>
		// 	<td>{$row['Name']}</td>
		// 	<td>{$row['Score']}</td>
		// 	</tr>";
		// 	}
		// echo "</tbody></table>";
		// 				 -->
			
			
		</div>
		
	</div>
	 <div class="imgGrid">
					<div class="grid">
						<p>Fake fake accreditation</p>
						<img src="images/flogo.jpg" alt="">
						
					</div>
					<div class="grid">
						<p>Fake Gaming accreditation</p>
						<img src="images/flogo1.jpg" alt="">
						
					</div>
					<div class="grid">
						<p>Fake zone accreditation</p>
						<img src="images/flogo2.jpg" alt="">
						
					</div>
					<div class="grid">
						<p>Fake devil accreditation</p>
						<img src="images/flogo3.jpg" alt="">
						
					</div>
				</div> 

	</div>
	<footer>
		<p>&copy; Copyright 2017</p>
	</footer>
	
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/snake.js"></script>
<script src="js/main.js"></script>
</body>
</html>
