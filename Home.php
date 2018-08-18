<?php
include('includes/sessions.inc.php');
?>

<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
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
			<h2>Welcome</h2>
		</div>
		<div class="content">
			<div class="main">
				<h2>Thanks for visiting</h2>
				<p>Vix persius splendide cu, veri disputationi te pri. Eam debet reprehendunt 
	interpretaris et. Eam nulla dicant reformidans an. Ad facete noluisse sed, 
	meis illud laudem pri no. Cu delenit ancillae ius, mel ei mucius reformidans.
	 Ex has docendi torquatos, at argumentum signiferumque vel. Vel ex copiosae 
	 volutpat.Vix persius splendide cu, veri disputationi te pri. Eam debet reprehendunt 
	interpretaris et. Eam nulla dicant reformidans an. Ad facete noluisse sed, 
	meis illud laudem pri no. Cu delenit ancillae ius, mel ei mucius reformidans.
	 Ex has docendi torquatos, at argumentum signiferumque vel. Vel ex copiosae 
	 volutpat.</p>

				<div class="flexslider">
					<ul class="slides">
						<li>
						<img src="images/view5-400.jpg" />
						</li>
						<li>
						<img src="images/view1-400.jpg" />
						</li>
						<li>
						<img src="images/view2-400.jpg" />
						</li>
						<li>
						<img src="images/view3-400.jpg" />
						</li>
					</ul>
				</div>

			</div>
			<div class="sideBar">
				<h3>About Me</h3>
				<p>Lorem ipsum dolor sit amet, in omnesque recteque eam. Has iuvaret verterem in, 
	idque utamur in ius, usu ea aliquid scaevola voluptatibus. Qui et insolens 
	persequeris. Duo an quas numquam. Omnesque persecuti cotidieque cum ex. 
	Laudem labores ancillae ea pri, mel vero probo ut. His cu brute ancillae, 
	eu lorem laboramus persecuti vix, per ea nonumes qualisque eloquentiam.
	
	Vix persius splendide cu, veri disputationi te pri. Eam debet reprehendunt 
	interpretaris et. Eam nulla dicant reformidans an. Ad facete noluisse sed, 
	meis illud laudem pri no. Cu delenit ancillae ius, mel ei mucius reformidans.
	 Ex has docendi torquatos, at argumentum signiferumque vel. Vel ex copiosae 
	 volutpat.Lorem ipsum dolor sit amet, in omnesque recteque eam. Has iuvaret verterem in, 
	idque utamur in ius, usu ea aliquid scaevola voluptatibus. Qui et insolens 
	persequeris. Duo an quas numquam. Omnesque persecuti cotidieque cum ex. 
	Laudem labores ancillae ea pri, mel vero probo ut. His cu brute ancillae, 
	eu lorem laboramus persecuti vix, per ea nonumes qualisque eloquentiam.
	
	Vix persius splendide cu, veri disputationi te pri. Eam debet reprehendunt 
	interpretaris et. Eam nulla dicant reformidans an. Ad facete noluisse sed, 
	meis illud laudem pri no. Cu delenit ancillae ius, mel ei mucius reformidans.
	 Ex has docendi torquatos, at argumentum signiferumque vel. Vel ex copiosae 
	 volutpat.Vix persius splendide cu, veri disputationi te pri. Eam debet reprehendunt 
	interpretaris et. Eam nulla dicant reformidans an. Ad facete noluisse sed, 
	meis illud laudem pri no. Cu delenit ancillae ius, mel ei mucius reformidans.
	 Ex has docendi torquatos, at argumentum signiferumque vel. Vel ex copiosae 
	 volutpat.</p>
			</div>
		</div>

		<footer>
			<p>&copy; Copyright 2017</p>
		</footer>

	</div>
</script>

	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript">></script>

	<script src="js/jquery.flexslider.js">
	</script>

	<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });

</script>
<script src="js/jquery-3.2.1.min.js"></script>
 <script> var js321 = jQuery.noConflict()
js321('.burgerMenu').on('click', function(ev){
	ev.preventDefault();
	$(this).toggleClass('animateBurger');
	$('nav').slideToggle('fast');
});
js321(window).on('resize', function(ev){
	//console.info(window.innerWidth);
	if(window.innerWidth > 600){
		$('nav ul').attr('style','');	
	};
});
</script>

</body>

</html>