<?php 
	# Stop Hacking attempt
	define('__APP__', TRUE);
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	# Start session
    session_start();
	
	# Database connection
	include ("dbconn.php");
	
	# Variables MUST BE INTEGERS
    if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
	if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
	
	# Variables MUST BE STRINGS A-Z
    if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }
	
	if (!isset($menu)) { $menu = 1; }
	
	# Classes & Functions
    include_once("functions.php");
	
print '
<!DOCTYPE html>
<html>
	<!-- Modified Copyright &copy; ' . date("Y") . ' Silvio Klaić. https://github.com/sklaic1/sfinga-project-php-api -->
	<!-- Original Copyright &copy; 2021 Alen Šimec. https://github.com/asimec1/project-php-api -->
	<head>
		<!-- CSS -->
		<link rel="stylesheet" href="style.css">
		<!-- End CSS -->
		<!-- meta elements -->
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="Sfinga savez, test webpage">
        <meta name="keywords" content="sfinga, gladiatus, game, savez">
        <meta name="author" content="info@sklaic.info">
		<!-- favicon meta -->
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		<!-- end favicon meta -->
		<!-- end meta elements -->
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
		<!-- End Google Fonts -->
		<title>Sfinga savez - PHP API</title>
	</head>
<body>
	<header>
		<div'; if ($menu > 1) { print ' class="hero-subimage"'; } else { print ' class="hero-image"'; }  print '></div>
		<nav>';
			include("menu.php");
		print '</nav>
	</header>
	<main>';
		if (isset($_SESSION['message'])) {
			print $_SESSION['message'];
			unset($_SESSION['message']);
		}
	# Homepage
	if (!isset($menu) || $menu == 1) { include("home.php"); }
	# News
	else if ($menu == 2) { include("news.php"); }
	# Contact
	else if ($menu == 3) { include("contact.php"); }
	# About us
	else if ($menu == 4) { include("about-us.php"); }
	# Register
	else if ($menu == 5) { include("register.php"); }
	# Signin
	else if ($menu == 6) { include("signin.php"); }
	# Admin webpage
	else if ($menu == 7) { include("admin.php"); }
	# API WAIFU
	else if ($menu == 10) { include("waifu.php"); }
	# API HNB
	else if ($menu == 11) { include("gallery.php"); }
	print '
	</main>
	<footer>
		<p>Sfinga savez <a href="https://sfinga-savez.forumcroatian.com" style="color:#fff">forum</a></p>
	</footer>
</body>
</html>';
?>
