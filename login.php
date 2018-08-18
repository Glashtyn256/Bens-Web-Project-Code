<?php

include('includes/sessions.inc.php');
include('includes/conn.inc.php');
include('includes/functions.inc.php');


if(isset($_POST['login'])){
    
   
    //$username = !empty($_POST['username']) ? trim($_POST['username']) : null;
   // $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    $username = safeString($_POST['username']);
    $passwordAttempt = safeString($_POST['password']);

    if(empty($_POST['username']) || empty($_POST['password']))
    {
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a><br>";
        die('You have left one of the fields empty');
    }


    $sql = "SELECT UserID, Username, Password FROM Tbl_User WHERE Username = :username";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    
    
    $Tbl_User = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    if($Tbl_User === false){
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a><br>";
        die('Incorrect username / password combination!');
       
    } else{
        

        $validPassword = password_verify($passwordAttempt, $Tbl_User['Password']);
        // if (password_needs_rehash($Tbl_User['Password'],  PASSWORD_BCRYPT, array("cost" => 12))) {
        //     // If so, create a new hash, and replace the old one
        //     $new_hash = password_hash($Tbl_User['Password'], PASSWORD_BCRYPT, array("cost" => 12));
        //     $sql = "UPDATE Tbl_User SET Password='$new_hash' WHERE Username = :username";
        //     $stmt = $pdo->prepare($sql);
        //     $stmt->bindValue('Password', $new_hash);
        //     $stmt->execute();
        // }
        
     
        if($validPassword){
            
            $_SESSION['user_id'] = $Tbl_User['UserID'];
            $_SESSION['logged_in'] = time();
            
          
            header('Location: home.php');
            exit;
            
        } else{
            
            
            echo "<br/><a href='login.php;'>Go Back</a><br>";
            die('Incorrect username / password combination!');
            
            
        }
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
			<h2>Login</h2>
		</div>
		<div class="content">
			<div class="main">
				<h2>Login</h2>
  
        <form action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username"><br>
            <label for="password">Password</label>
            <input type="password" name="password"><br>
            <input type="submit" name="login" value="Login">
        </form>

        <p>If you do not have a account please</p><a href="Register.php">Register here</a>

        </div>
		</div>

		<footer>
			<p>&copy; Copyright 2017</p>
		</footer>

	</div>
    </body>
</html>