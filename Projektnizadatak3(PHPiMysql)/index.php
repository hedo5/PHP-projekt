<?php

    session_start();
	
	# Database connection
	include ("baza.php");
	
	# Variables MUST BE INTEGERS
    if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
	if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }
	
	# Variables MUST BE STRINGS A-Z
    if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }
	
	if (!isset($menu)) { $menu = 1; }
	
print '
<!DOCTYPE HTML>
<html>

	<head>
	    <link rel="stylesheet" href="new1.css">
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="some description">
        <meta name="keywords" content="keyword 1, keyword 2, keyword 3, keyword 4, kejword 5, ...">
		<title>360 fotografija</title>
	</head>
<body>
	<header>
		<div'; 
		if ($_GET['menu'] > 1) { print ' class="slikasub"'; } else { print ' class="slika"'; }  print '></div>
		<nav>';
			include("menu.php");
		print '	</nav>
	</header>
	<main>';	
	if (isset($_SESSION['message'])) {
			print $_SESSION['message'];
			unset($_SESSION['message']);
		}

	if (!isset($_GET['menu']) || $_GET['menu'] == 1) { include("index.php"); }

	else if ($_GET['menu'] == 2) { include("novosti.php"); }

	else if ($_GET['menu'] == 3) { include("kontakt.php"); }

	else if ($_GET['menu'] == 4) { include("onama.php"); }
	
	else if ($_GET['menu'] == 5) { include("galerija.php"); }
	
	else if ($_GET['menu'] == 6) { include("registracija.php"); }
	
	else if ($_GET['menu'] == 7) { include("prijava.php"); }
	
	else if ($_GET['menu'] == 8) { include("administrator.php"); }
	

	
	print '
	</main>
		<footer>
		<p>Copyright &copy; 2020 Matej Hedzet. <a href="https://github.com/hedo5/PHP-projekt"><img src="foto/github-octocat.png" title="Github" alt="Github"></a></p>
	</footer>
</body>
</html>';
?>