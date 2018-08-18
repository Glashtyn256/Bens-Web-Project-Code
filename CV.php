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
	<title>Bens CV</title>
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
		<h2>CV</h2>
	</div>
	<div class="content">
		<div class="main">
		<h2>Qualifications</h2>
		<p>This page holds my qulifications and projects which ive done with several artists blah blah</p>


		<button class="accordion">St Ninians High School</button>
		<div class="panel">
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis 
			parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec 
			pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
			mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat 
			vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. 
			Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum 
			rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et 
			ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla 
			mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.</p>
		</div>

		<button class="accordion">Isle of Man College</button>
		<div class="panel">
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis 
			parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec 
			pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
			mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat 
			vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. 
			Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum 
			rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et 
			ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla 
			mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.</p>
		</div>

		<button class="accordion">Sheffield Hallam University</button>
		<div class="panel">
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis 
			parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec 
			pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede 
			mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat 
			vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. 
			Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum 
			rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et 
			ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla 
			mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc.</p>
		</div>


		</div>
			<div class="sideBar">
				<h3 style=>Lanuages Studied</h3>
				
				<div class="tab">
					<button class="tablinks" onclick="openLanuage(event, 'C++')">C++</button>
					<button class="tablinks" onclick="openLanuage(event, 'C#')">C#</button>
					<button class="tablinks" onclick="openLanuage(event, 'Python')">Python</button>
					<button class="tablinks" onclick="openLanuage(event, 'HTML')">HTML</button>
				</div>

				
				<div id="C++" class="tabcontent">
					<h3>C++</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis 
			parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec 
			pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </p>
				</div>

				<div id="C#" class="tabcontent">
					<h3>C#</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis 
			parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec 
			pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </p> 
				</div>

				<div id="Python" class="tabcontent">
					<h3>Python</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis 
			parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec 
			pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </p>
				</div>

				<div id="HTML" class="tabcontent">
					<h3>HTML</h3><form action="adminlogin.php" >
	<button id="hideme" type="submit" height="1px" width="1px"></button>
	</form>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis 
			parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec 
			pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </p>
				</div>

			</div>
		
	</div>


	<div class="search-box">
		<div>
	<h2>Search my Projects</h2>
	<p>Lorem ipsum dolor sit amet, in omnesque recteque eam. Has iuvaret verterem in, 
	idque utamur in ius, usu ea aliquid scaevola voluptatibus. Qui et insolens 
	persequeris. Duo an quas numquam. Omnesque persecuti cotidieque cum ex. 
	Laudem labores ancillae ea pri, mel vero probo ut. His cu brute ancillae, 
	eu lorem laboramus persecuti vix, per ea nonumes qualisque eloquentiam.
	
	Vix persius splendide cu, veri disputationi te pri. Eam debet reprehendunt 
	interpretaris et. Eam nulla dicant reformidans an. Ad facete noluisse sed, 
	meis illud laudem pri no. Cu delenit ancillae ius, mel ei mucius reformidans.
	 Ex has docendi torquatos, at argumentum signiferumque vel. Vel ex copiosae 
	 volutpat.</P>
		</div>
	<label for="Search">Search - </label>
	<input type="text" autocomplete="off" placeholder="Search Project" />
		<div class="searchresult">

		</div><br>
	</div>

	<footer>
		
		<p>&copy; Copyright 2017</p>
	</footer>
	
</div>

<script src="js/jquery-3.2.1.min.js"></script>

<script src="js/_accordion.js"></script>
<script src="js/_tab.js"></script>
<script src="js/main.js"></script>
<script src="js/_ajaxqueryproject.js"></script>
</body>
</html>
