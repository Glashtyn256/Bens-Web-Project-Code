<?php

include('includes/sessions.inc.php');
include('includes/conn.inc.php');
include('includes/functions.inc.php');


if(isset($_POST['signup'])){


    $email = safeEmail($_POST['email']);

    if(validEmail($_POST['email']))
        {
            $fullname = safeString($_POST['fullname']);
            $lastname = safeString($_POST['lastname']);
            $username = safeString($_POST['username']);
            $pass = safeString($_POST['password']);  
            //$email = safeEmail($_POST['email']);
        }
        else{
            echo "<a href='javascript:self.history.back();'>Go Back</a><br>";
            die ("Not a valid Email");
        }

if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['fullname']) || empty($_POST['lastname']))
    {
      echo "<a href='javascript:self.history.back();'>Go Back</a><br>";
      die ("You've not placed anything in");
    }
    

    //$username = safeString($_POST['username']);
   // $pass = safeString($_POST['password']);  
 
    $sql = "SELECT COUNT(username) AS numU FROM Tbl_User  WHERE Username = :username";
    $stmt = $pdo->prepare($sql);
    
    
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($row['numU'] > 0){
        echo "<a href='javascript:self.history.back();'>Go Back</a><br>";
        die('That username already exists!');
    }


    $sql = "SELECT COUNT(email) AS numE FROM Tbl_User WHERE Email = :email";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($row['numE'] > 0){
        echo "<a href='javascript:self.history.back();'>Go Back</a><br>";
        die('That Email already exists!');
    }
    

    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
  
    $sql = "INSERT INTO Tbl_User (Fullname, Lastname,Username, Password, Email) VALUES (:fullname, :lastname, :username, :password, :email)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':fullname', $fullname);
    $stmt->bindValue(':lastname', $lastname);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':email', $email);
 
    //Execute the statement and insert the new account.
    $success = $stmt->execute();
    
 
    if($success){
        
        echo "<a href='login.php'>Login</a><br>";
       die('Thank you for registering with our website.');
        
    }
    
}

?>



<!DOCTYPE html>
<html>
     <head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" href="css/mobile.css">
	<link rel="stylesheet" media="only screen and (min-width : 600px)" href="css/desktop.css">

	<link rel="stylesheet" href="css/flexslider.css" type="text/css">
        
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
					<li>
						<h1>BWP</h1>
					</li>
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
			<h2>Register</h2>
		</div>
		<div class="content">
			<div class="main">
				<h2>Register</h2>
				
        <form action="register.php" method="post">
             <label for="Fullname">First name</label>
            <input type="text" id="fullname" name="fullname"><br>
             <label for="username">last name</label>
            <input type="text" id="lastname" name="lastname"><br>
            <label for="username">Username</label>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password"><br>
            <label for="email">Email</label>
            <input type="email" id="email" name="email"><br>
            <input type="submit" name="signup" value="Register"></button>
        </form>

        </div>
		</div>

		<footer>
			<p>&copy; Copyright 2017</p>
		</footer>

	</div>
    </body>
</html>