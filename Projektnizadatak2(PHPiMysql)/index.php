<?php
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

	if (!isset($_GET['menu']) || $_GET['menu'] == 1) { include("index.php"); }

	else if ($_GET['menu'] == 2) { include("novosti.php"); }

	else if ($_GET['menu'] == 3) { include("kontakt.php"); }

	else if ($_GET['menu'] == 4) { include("onama.php"); }
	
	else if ($_GET['menu'] == 5) { include("galerija.php"); }
	

	#	<h1>Virtualne šetnje i 360 panorame</h1>
	#	<figure>
	#		<img src="foto/google_trusted.png" alt="Google" title="Google">
	#		<figcaption>Certificiran Google Street fotograf</figcaption>
	#	</figure>
	#	<p>Trebate li prezentirati atraktivan interijer ili eksterijer, virtualne šetnje i 360 panorame su pravo su rješenje.</p>
	#	<p>Uz pomoć specijalizirane opreme i novih tehnologija možemo izraditi jednu ili više panorama koje HotSpots linkovima povezujemo u virtualnu šetnju vašeg objekta. Panoramu možete pomicati u svim smjerovima i dobijate dojam kao da se nalazite na licu mjesta.</p>
	#	<p>Cijena virtualne šetnje formira se ovisno o broju panorama (lokacija) i složenosti fotografiranja, te da li je potrebna naknadna dorada fotografija.</p>
	
	print '
	</main>
		<footer>
		<p>Copyright &copy; 2020 Matej Hedzet. <a href="https://github.com/hedo5/PHP-projekt"><img src="foto/github-octocat.png" title="Github" alt="Github"></a></p>
	</footer>
</body>
</html>';
?>